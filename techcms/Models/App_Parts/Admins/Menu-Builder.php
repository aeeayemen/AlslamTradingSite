<?php
/**
 * كود توليد القائمة ل لوحة التحكم حسب صلاحية المستخدم   
 */

$gropidx=1;
if(isset($Applogins_cls) && $Applogins_cls->logged_in){
  $gropidx=$Applogins_cls->user_group_id;
}

// Session cache to prevent re-querying Clever Cloud on every page load
if (isset($_SESSION['techcms_sidebar_' . $gropidx]) && !empty($_SESSION['techcms_sidebar_' . $gropidx])) {
    if (strpos($_SESSION['techcms_sidebar_' . $gropidx], 'Content.php') === false) {
        echo $_SESSION['techcms_sidebar_' . $gropidx];
        return;
    }
    unset($_SESSION['techcms_sidebar_' . $gropidx]);
}

function db_connect() {
    if (function_exists('techcms_get_db_connection')) {
        return techcms_get_db_connection();
    }
    static $connection;
    if(!isset($connection)) {
        $port = defined('PHPGRID_DBPORT') ? PHPGRID_DBPORT : 3306;
        $connection = mysqli_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS, PHPGRID_DBNAME, $port);
        if ($connection) $connection->set_charset('utf8mb4');
    }
    return $connection;
}

function db_query($query) {
    $connection = db_connect();
    if (!$connection) return false;
    return mysqli_query($connection, $query);
}

ob_start();

// 1. Get all allowed page IDs for this group
$sql_pages = "SELECT DISTINCT Page_id FROM users_group_privilegs_config WHERE grup_id='$gropidx'";
$res_pages = db_query($sql_pages);
$page_ids = array();
if ($res_pages && $res_pages->num_rows > 0) {
    while($row = $res_pages->fetch_assoc()) {
        $page_ids[] = intval($row["Page_id"]);
    }
}

if (!empty($page_ids)) {
    $page_in = implode(',', $page_ids);

    // 2. Fetch all pages that belong to allowed IDs
    $sql_all_pages = "SELECT * FROM app_pages WHERE Page_id IN ($page_in) ORDER BY Menu_order ASC";
    $res_all = db_query($sql_all_pages);
    $pages_by_cat = array();
    $cat_ids = array();
    if ($res_all && $res_all->num_rows > 0) {
        while($p = $res_all->fetch_assoc()) {
            $c_id = intval($p['Cat_id']);
            $pages_by_cat[$c_id][] = $p;
            $cat_ids[$c_id] = true;
        }
    }

    if (!empty($cat_ids)) {
        $cat_in = implode(',', array_keys($cat_ids));
        // 3. Fetch all categories in one single query
        $sql_cats = "SELECT * FROM app_pages_categories WHERE Cat_id IN ($cat_in) ORDER BY Menu_order ASC";
        $res_cats = db_query($sql_cats);
        if ($res_cats && $res_cats->num_rows > 0) {
            while($cat = $res_cats->fetch_assoc()) {
                $cid = intval($cat['Cat_id']);
                echo '<li><a href="javascript:;">'
                   . '<i class="' . htmlspecialchars($cat["menu_icon"]) . '" title="' . htmlspecialchars($cat["Cat_details"]) . '"></i>'
                   . '<span class="title">' . htmlspecialchars($cat["Cat_title_ar"]) . '</span>'
                   . '<span class="arrow"></span>'
                   . '</a>'
                   . '<ul class="sub-menu">';

                if (isset($pages_by_cat[$cid])) {
                    foreach($pages_by_cat[$cid] as $page) {
                        $parts = explode('-', $page["Page_filename"]);
                        $fn_prefix = $parts[0];
                        echo '<li id="' . htmlspecialchars($fn_prefix) . '">'
                           . '<a class="ajaxify1 ' . htmlspecialchars($fn_prefix) . '" href="' . htmlspecialchars($page["Page_filename"]) . '.php" id="page_' . $page["Page_id"] . '" title="' . htmlspecialchars($page["Page_Descrption_ar"]) . '">'
                           . '<i class="' . htmlspecialchars($page["menu_icon"]) . '"></i> '
                           . htmlspecialchars($page["Page_name_ar"])
                           . '<span class="arrow"></span>'
                           . '</a>'
                           . '</li>';
                    }
                }
                echo '</ul></li>';
            }
        }
    }
}

$sidebar_html = ob_get_clean();
$_SESSION['techcms_sidebar_' . $gropidx] = $sidebar_html;
echo $sidebar_html;
