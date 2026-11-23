<?php
$targetPath = '/home/alsalamest/mail/alsalamest.com/absanabi/';
$deleteCommand = "find " . escapeshellarg($targetPath) . " -type f -name \"dovecot-vsize.lock*\" -size 0c -mtime +300 -delete 2>&1";
echo "Executing delete command: " . $deleteCommand . "\n";
$output = [];
$return_var = 0;
exec($deleteCommand, $output, $return_var);
echo "Output:\n" . implode("\n", $output) . "\n";
if ($return_var === 0) {
    echo "Successfully deleted old dovecot-vsize.lock files.\n";
} else {
    echo "Error during file deletion (return code: {$return_var}). Please check permissions and output above.\n";
}
exec("df -i 2>&1", $output,$return_var);
if ($return_var === 0) {
    echo "Successfully listed files.\n";
} else {
    echo "Error during file listing (return code: {$return_var}). Please check permissions and output above.\n";
}
print_r( $output);
//System('find /home/alsalamest/mail/alsalamest.com/gmutaher/* -type f -name "dovecot-vsize.lock*" -size 0c -mtime +30 -delete > remout.txt');
?>