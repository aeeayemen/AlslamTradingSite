<?php

if (!function_exists('techcms_get_db_connection')) {
    function techcms_get_db_connection() {
        static $conn = null;
        if ($conn !== null && ($conn instanceof mysqli)) {
            return $conn;
        }
        $port = defined('DB_PORT') ? DB_PORT : (defined('PHPGRID_DBPORT') ? PHPGRID_DBPORT : 3306);
        $server = defined('DB_SERVER') ? DB_SERVER : (defined('PHPGRID_DBHOST') ? PHPGRID_DBHOST : '127.0.0.1');
        $user = defined('DB_USER') ? DB_USER : (defined('PHPGRID_DBUSER') ? PHPGRID_DBUSER : 'root');
        $pass = defined('DB_PASS') ? DB_PASS : (defined('PHPGRID_DBPASS') ? PHPGRID_DBPASS : '');
        $db = defined('DB_NAME') ? DB_NAME : (defined('PHPGRID_DBNAME') ? PHPGRID_DBNAME : '');
        
        $conn = mysqli_connect($server, $user, $pass, $db, $port);
        if ($conn) {
            $conn->set_charset('utf8mb4');
        }
        return $conn;
    }
}

if (!function_exists('get_magic_quotes_gpc')) {
    function get_magic_quotes_gpc() {
        return false;
    }
}

// هذا ملف اعدادت الاتصال الخاص بقاعدة البيانات وبعض المتغيرات المستخدمه في النظام  
define("MODEL_DIR", "Models");
define("PLUGINS_DIR", "../../plugins");
define("PLUGINS_DIR_login", "../plugins");
if (is_dir(dirname(__DIR__, 2) . '/filemanager')) {
    define("FILEMANAGERPATH", "../../filemanager");
} elseif (is_dir(dirname(__DIR__, 2) . '/filemanagerx')) {
    define("FILEMANAGERPATH", "../../filemanagerx");
} else {
    define("FILEMANAGERPATH", "../../filemanager");
}
define("PHPGRIDPATH", "../");
define("MEDIA_DIR", "../../uploads/");
define("LogoAppInner", "../../uploads/logomenu.png");
define("APP_NAME", "alsalam");
define("APP_SLOGNAME", "alsalam");
define("PHPGRID_DBTYPE","mysqli"); // or mysqli
define("PHPGRID_DBHOST","bsochns6btjqes1ypfze-mysql.services.clever-cloud.com");
define("PHPGRID_DBUSER","u57xk38e4azud91m");
define("PHPGRID_DBPASS","sP4WRx2g9T6MKm5scIni");
define("PHPGRID_DBNAME","bsochns6btjqes1ypfze");
define("PHPGRID_DBPORT", 3306);
define("PHPGRID_AUTOCONNECT",1);
// Basepath for lib
define("PHPGRID_LIBPATH",dirname(__FILE__).DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR);

define("DB_SERVER", "bsochns6btjqes1ypfze-mysql.services.clever-cloud.com");
define("DB_USER", "u57xk38e4azud91m");
define("DB_PASS", "sP4WRx2g9T6MKm5scIni");
define("DB_NAME", "bsochns6btjqes1ypfze");
define("DB_PORT", 3306);

define("TBL_USERS", "employees_users");
define("TBL_ACTIVE_USERS",  "active_adusers");
define("TBL_ACTIVE_GUESTS", "active_adguests");
define("TBL_BANNED_USERS",  "banned_adusers");

/**
 * Special Names and Level Constants - the admin
 * page will only be accessible to the user with
 * the admin name and also to those users at the
 * admin user level. Feel free to change the names
 * and level constants as you see fit, you may
 * also add additional level specifications.
 * Levels must be digits between 0-9.
 */
define("ADMIN_NAME", "Admins");    //1. admin conrol all
define("GUEST_NAME", "Guest");   
define("ADMIN_LEVEL", 9);        // 2. admin level .. control the master
define("MASTER_LEVEL", 8);       // 3. master level .. master control the agent
define("AGENT_LEVEL",  6);       // 4. agent level .. agent control the member
define("AGENT_MEMBER_LEVEL", 3); // 5. agent member level .. member control his/her own account
define("GUEST_LEVEL", 0);        // 6. guest level .. guest only control himself

/**
 * This boolean constant controls whether or
 * not the script keeps track of active users
 * and active guests who are visiting the site.
 */
define("TRACK_VISITORS", true);


/**
 * Email Constants - these specify what goes in
 * the from field in the emails that the script
 * sends to users, and whether to send a
 * welcome email to newly registered users.
 */
define("EMAIL_FROM_NAME", "مؤسسة السلام للتجارة والتوكيلات العامة");
define("EMAIL_FROM_ADDR", "website@alsalamest.com");
define("EMAIL_WELCOME", true);
define("USER_TIMEOUT", 120);
define("GUEST_TIMEOUT", 5);
define("SMTPHOST", "mail.alsalamest.com");
define("SMTP_PORT", 587);
define("SMTP_USERNAME","website@alsalamest.com");
define("SMTP_PASSWORD","website@2020");
define("COOKIE_EXPIRE", 60*60*3);  //100 days by default
define("COOKIE_PATH", "/techcms/");  //Avaible in whole domain
define("APP_PATH", "/techcms/");  //Avaible in whole domain


/**
 * This constant forces all users to have
 * lowercase usernames, capital letters are
 * converted automatically.
 */
define("ALL_LOWERCASE", false);

	$app=array();
    
    $app["faviconpath"]="../../uploads/favicon.png";
    $app["SLogo_Path"]="../../uploads/logo.png";
    $app["app_default_lng"]="ar";
    $app["app_default_dir"]="rtl";
    $app["App_name_ar"]=" مؤسسة السلام ";

    $app["CopRight"]="TechSoft";
    
    if (!defined("faviconpath")) {
        define("faviconpath", $app["faviconpath"]);
    }

/**
 * Clean and normalize any image path stored in the database.
 * Returns a standardized relative path (e.g. "uploads/folder/image.png")
 * or relative to admin context (e.g. "../../uploads/folder/image.png").
 */
if (!function_exists('techcms_clean_image_path')) {
    function techcms_clean_image_path($path, $context = 'frontend', $default = '') {
        $path = trim((string)($path ?? ''));
        if ($path === '') {
            return $default;
        }
        // Normalize backward slashes to forward slashes
        $path = str_replace('\\', '/', $path);
        
        // Strip out any scheme, domain, port, and parent relative steps leading to uploads
        if (preg_match('/(?:^|[\/\\\\])uploads[\/\\\\](.*)$/i', $path, $matches)) {
            $rel = 'uploads/' . ltrim($matches[1], '/');
        } elseif (stripos($path, 'uploads/') === 0) {
            $rel = $path;
        } else {
            $rel = 'uploads/' . ltrim($path, '/');
        }
        
        if ($context === 'admin') {
            return '../../' . $rel;
        }
        return $rel;
    }
}

/**
 * Render a secure image thumbnail tag for jqgrid admin pages with fallback on missing file.
 */
if (!function_exists('techcms_render_grid_image')) {
    function techcms_render_grid_image($raw_path, $height = 25, $alt = 'image') {
        $fallback = '../../assets/images/no-image.png';
        $raw_path = trim((string)($raw_path ?? ''));
        if ($raw_path === '') {
            return "<img height='{$height}' style='max-height:{$height}px; max-width:60px; opacity:0.5; vertical-align:middle;' src='{$fallback}' alt='لا توجد صورة' title='لا توجد صورة'>";
        }
        $url = techcms_clean_image_path($raw_path, 'admin');
        $safe_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
        $safe_alt = htmlspecialchars($alt, ENT_QUOTES, 'UTF-8');
        
        return "<a class='fancybox' href='{$safe_url}' target='_blank'><img height='{$height}' style='max-height:{$height}px; max-width:60px; object-fit:contain; vertical-align:middle;' src='{$safe_url}' onerror=\"this.onerror=null; this.src='{$fallback}'; this.parentElement.removeAttribute('href');\" alt='{$safe_alt}'></a>";
    }
}
 ?>
