<?php 
$dir = '/home/alsalamest/mail/alsalamest.com';


// --- Configuration ---
$startFolder = $dir; // Current directory. Change this to your desired folder, e.g., '/var/www/html'
$outputFileName = 'fsoutCleaned.html'; // Name of the HTML file to create


// Function to format bytes (remains the same)
function formatBytes($bytes, $precision = 2) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= (1 << (10 * $pow));
    return round($bytes, $precision) . ' ' . $units[$pow];
}

/**
 * Calculates total files and size for a folder and its subfolders, returning just the totals.
 * This function does NOT print anything.
 */
function getFolderStats($path) {
    $totalFiles = 0;
    $totalSize = 0;

    if (!is_dir($path)) {
        return ['totalFiles' => 0, 'totalSize' => 0];
    }

    $items = @scandir($path);
    if ($items === false) {
        return ['totalFiles' => 0, 'totalSize' => 0]; // Directory unreadable
    }

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $itemPath = $path . DIRECTORY_SEPARATOR . $item;

        if (is_dir($itemPath)) {
            $subFolderStats = getFolderStats($itemPath); // Recursive call for subfolder stats
            $totalFiles += $subFolderStats['totalFiles'];
            $totalSize += $subFolderStats['totalSize'];
        } elseif (is_file($itemPath)) {
            $fileSize = @filesize($itemPath);
            if ($fileSize === false) $fileSize = 0; // Handle unreadable file sizes
            $totalFiles++;
            $totalSize += $fileSize;
        }
    }

    return ['totalFiles' => $totalFiles, 'totalSize' => $totalSize];
}


/**
 * Traverses a folder and its subfolders, printing the HTML tree structure
 * for folders only, sorted by size (largest first).
 */
function printHtmlFolderTreeSortedBySize($path, $level = 0) {
    $indent_class = 'level-' . $level;

    if (!is_dir($path)) {
        echo "<li class='{$indent_class} error'>Error: Path not found or not a directory: " . htmlspecialchars($path) . "</li>\n";
        return;
    }

    $items = @scandir($path);
    if ($items === false) {
        echo "<li class='{$indent_class} error'>Error: Cannot read directory: " . htmlspecialchars($path) . "</li>\n";
        return;
    }

    $subfoldersData = []; // Array to hold [ 'name' => 'folder', 'path' => 'full/path', 'totalSize' => X, 'totalFiles' => Y ]

    // 1. Collect data for direct subfolders
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $itemPath = $path . DIRECTORY_SEPARATOR . $item;
        if (is_dir($itemPath)) {
            $subfolderStats = getFolderStats($itemPath); // Get stats for this subfolder and its contents
            $subfoldersData[] = [
                'name'      => $item,
                'path'      => $itemPath,
                'totalSize' => $subfolderStats['totalSize'],
                'totalFiles' => $subfolderStats['totalFiles']
            ];
        }
    }

    // 2. Sort subfolders by totalSize in descending order
    usort($subfoldersData, function($a, $b) {
        // Sort by totalSize descending (b-a for descending)
        if ($a['totalSize'] == $b['totalSize']) {
            // If sizes are equal, sort alphabetically for consistency
            return strcmp($a['name'], $b['name']);
        }
        return ($a['totalSize'] < $b['totalSize']) ? 1 : -1;
    });


    // 3. Print the sorted subfolders and recursively call for their contents
    foreach ($subfoldersData as $subfolder) {
        echo "<li class='folder {$indent_class}'>";
        echo "<span class='folder-name'>" . htmlspecialchars($subfolder['name']) . "</span> ";
        echo "<span class='stats'>(Files: " . $subfolder['totalFiles'] . ", Size: " . formatBytes($subfolder['totalSize']) . ")</span>\n";
        echo "<ul>\n"; // Start a new nested unordered list for the subfolder's contents
        printHtmlFolderTreeSortedBySize($subfolder['path'], $level + 1); // Recursively print the contents
        echo "</ul>\n"; // Close the nested unordered list
        echo "</li>\n";
    }
}


// --- Main Script Execution ---

// Start output buffering
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folder Tree Viewer (Folders Only, Sorted by Size)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; color: #333; }
        .container { max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #0056b3; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; }
        ul { list-style-type: none; padding-left: 20px; margin: 0; }
        ul ul { padding-left: 25px; /* Deeper indentation for subfolders */ }
        li { margin-bottom: 5px; line-height: 1.5; }
        li.folder { font-weight: bold; color: #333; }
        li .stats { font-weight: normal; color: #007bff; font-size: 0.9em; margin-left: 5px;}
        li.error { color: #dc3545; font-style: italic; }
        /* Optional: Add icons or expand/collapse functionality with JavaScript */
        .folder-name::before { content: '📁 '; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Folder Tree for: <?php echo htmlspecialchars(realpath($startFolder)); ?> (Folders Only, Sorted by Size)</h1>

        <div class="folder-tree">
            <ul>
                <?php
                // Get stats for the root folder
                $rootStats = getFolderStats($startFolder);

                // Display the root folder's own entry
                echo "<li class='folder level-0'>";
                echo "<span class='folder-name'>" . htmlspecialchars(basename(realpath($startFolder))) . "</span> ";
                echo "<span class='stats'>(Total Files: " . $rootStats['totalFiles'] . ", Total Size: " . formatBytes($rootStats['totalSize']) . ")</span>\n";
                echo "<ul>\n"; // Start the main unordered list for the root's contents
                printHtmlFolderTreeSortedBySize($startFolder, 1); // Start with level 1 for the contents of the root (subfolders only, sorted by size)
                echo "</ul>\n";
                echo "</li>\n";
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
<?php

// Capture the output
$htmlOutput = ob_get_clean();

// Write the captured HTML to a file
$fileResult = file_put_contents($outputFileName, $htmlOutput);

if ($fileResult !== false) {
    echo "HTML folder tree successfully generated and saved to: " . $outputFileName . "\n";
} else {
    echo "Error: Could not write HTML output to file: " . $outputFileName . "\n";
    echo "Please check directory permissions.\n";
}

?>