<?php


class App_Funcation
{

    protected static $connection;
    /* Note: call getNumMembers() to access $num_members! */
    var $dbhost;
    var $dbname;
    var $dbuser;
    var $dbpass;
    var $lang;
    var $langs = array();
    var $pagename;
    var $url;
    var $Comp_ID;
    var $SERVERHOST;
    var $TotalAmountTest;

   
    /**
     * Connect to the database
     *
     * @return bool false on failure / mysqli MySQLi object instance on success
     */
    public function connect()
    {
        if (function_exists('techcms_get_db_connection')) {
            self::$connection = techcms_get_db_connection();
            return self::$connection;
        }
        if (!isset(self::$connection)) {
            $port = defined('PHPGRID_DBPORT') ? PHPGRID_DBPORT : 3306;
            self::$connection = new mysqli(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS, PHPGRID_DBNAME, $port);
            self::$connection->set_charset("utf8mb4");
        }
        return self::$connection;
    }

    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query)
    {
        // Connect to the database
        $connection = $this->connect();

        // Query the database
        $result = $connection->query($query);

        return $result;
    }

    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function select($query)
    {
        $rows = array();
        $result = $this->query($query);
        if ($result === false) {
            return false;
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }


    public function GetRowCount($query)
    {
        $rows = array();
        $result = $this->query($query);
        $num = $this->num_rows;
        if ($result === false) {
            return false;
        }

        return $num;
    }

    /**
     * Fetch the last error from the database
     *
     * @return string Database error message
     */
    public function error()
    {
        $connection = $this->connect();
        return $connection->error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    public function quote($value)
    {
        $connection = $this->connect();
        return "'" . $connection->real_escape_string($value) . "'";
    }


    function setLanguge($value, $pagename)
    {
        $this->lang = $value;
        $language = new Language($value);
        $this->langs = $language->userLanguage();
        $this->pagename = $pagename;
    }

    function seturl($url)
    {
        $this->url = $url;
    }

    function setComp_id($value = '')
    {
        $this->Comp_ID = $value;
    }

    function SetTotalAmountTest($value = '')
    {
        $this->TotalAmountTest = $value;
    }

    //------------------------Get users-----------------------------------
    function Get_info($sql)
    {


        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {
                return $row;
            }

        } else {
            return "no date";
        }
    }

//------------------------Get users-----------------------------------
    function get_userlist_by_page_privlage($privlageid)
    {
        $sql = "SELECT distinct grup_id FROM users_group_privilegs_config WHERE Privilege_id=$privlageid and is_granted=1;";
        $accepted_groups = 0;
        $userlist = "";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            $accepted_groups = 0;
            while ($row = $result3->fetch_assoc()) {
                if ($result3->num_rows > 0) {
                    $accepted_groups .= $row["grup_id"] . ",";
                } else {
                    $accepted_groups = $row["grup_id"] . ",";
                }
            }//end of while

            $bb = strlen($accepted_groups);
            $ccsG = substr($accepted_groups, 1, $bb - 2);

            $accepted_groups2 = " where grup_id in (" . $ccsG . ")";
            $sql3 = "SELECT User_id,Username,Shown_Name FROM employees_users $accepted_groups2";
            $countrow = 0;
            $result4 = $this->query($sql3);
            if ($result4->num_rows > 0) {
                while ($row = $result4->fetch_assoc()) {
                    echo "<option  value=$row[User_id]  >$row[Shown_Name]</option>";

                }//end of while
            } else {
                echo "<option  value='malakrssam' title='لم يتم اضافة اي موظفين الى صلاحية اعتماد امر الشغل ' >لا يوجد اي موظف</option>";
            }


        } else {
            echo "<option  value='malakrssam' title='لم يتم اضافة اي موظفين الى صلاحية اعتماد امر الشغل ' >لا يوجد اي موظف</option>";

        }
    }

    //------------------------Get users-----------------------------------
    function get_privlage_employees($privid)
    {
        $sql = "SELECT distinct grup_id FROM users_group_privilegs_config WHERE Privilege_id=$privid and is_granted=1;";
        $accepted_groups = 0;
        $userlist = "";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            $accepted_groups = 0;
            while ($row = $result3->fetch_assoc()) {
                if ($result3->num_rows > 0) {
                    $accepted_groups .= $row["grup_id"] . ",";
                } else {
                    $accepted_groups = $row["grup_id"] . ",";
                }
            }//end of while

            $bb = strlen($accepted_groups);
            $ccsG = substr($accepted_groups, 1, $bb - 2);

            $accepted_groups2 = " where grup_id in (" . $ccsG . ")";
            $sql3 = "select distinct User_id as k, Shown_Name as v from employees_users $accepted_groups2";
            return $sql3;


        } else {
            return "none";

        }
    }

//------------------------Get users-----------------------------------
    function get_privlage_employeesallinfo($privid)
    {
        $sql = "SELECT distinct grup_id FROM users_group_privilegs_config WHERE Privilege_id=$privid and is_granted=1;";
        $accepted_groups = 0;
        $userlist = "";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            $accepted_groups = 0;
            while ($row = $result3->fetch_assoc()) {
                if ($result3->num_rows > 0) {
                    $accepted_groups .= $row["grup_id"] . ",";
                } else {
                    $accepted_groups = $row["grup_id"] . ",";
                }
            }//end of while

            $bb = strlen($accepted_groups);
            $ccsG = substr($accepted_groups, 1, $bb - 2);

            $accepted_groups2 = " where grup_id in (" . $ccsG . ")";
            $sql3 = "select * from employees_users $accepted_groups2";
            return $sql3;


        } else {
            return "none";

        }
    }


//------------------------Get users-----------------------------------
    function get_role_users_bypage_privelige($Page_id, $Privilege_id)
    {
        $sql = "SELECT distinct grup_id FROM users_group_privilegs_config WHERE Page_id=$Page_id and Privilege_id=$Privilege_id and is_granted=1;";
        $accepted_groups = 0;
        $userlist = "";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            $accepted_groups = 0;
            while ($row = $result3->fetch_assoc()) {
                if ($result3->num_rows > 1) {
                    $accepted_groups .= $row["grup_id"] . ",";
                } else {
                    $accepted_groups = $row["grup_id"];
                }
            }//end of while

            $bb = strlen($accepted_groups);
            $ccsG = substr($accepted_groups, 1, $bb - 2);

            $accepted_groups2 = " where grup_id in (" . $ccsG . ")";
            $sql3 = "SELECT distinct User_id as  User_ids FROM employees_users $accepted_groups2";
            $countrow = 0;
            $result4 = $this->query($sql3);
            if ($result4->num_rows > 0) {
                while ($row = $result4->fetch_assoc()) {
                    $countrow = $result4->num_rows;
                    if ($result4->num_rows > 1) {
                        $userlist .= $row["User_ids"] . ",";
                    } else {
                        $userlist = $row["User_ids"];
                    }

                }//end of while
                if ($countrow == 1) {
                    $userlist2 = " where User_id=$userlist";
                } else {
                    $bb2 = strlen($userlist);
                    $ccsG2 = substr($userlist, 0, $bb2 - 1);
                    $userlist2 = " where User_id in (" . $ccsG2 . ")";

                }


                return $userlist2;
            } else {
                return "none";
            }


        } else {
            return "none";
        }
    }

    //------------------------Get users-----------------------------------
    function Get_Users()
    {
        $sql = "SELECT User_id,Username,Shown_Name FROM employees_users WHERE Is_Actived=1 and Is_Blocked=0 ;";

        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {
                echo "<option  value=$row[User_id]  >$row[Shown_Name]</option>";
            }

        } else {

        }
    }


//--------------------------------Get_userinfo-----------------------------------------------------------
    function Get_userinfo($usid)
    {
        $sql = "SELECT * FROM employees_users WHERE User_id=$usid;";

        $result3 = $this->query($sql);
        $usrinfo = array();
        if ($result3->num_rows > 0) {
            // output data of each row name="select"

            while ($row = $result3->fetch_assoc()) {
                $usrinfo['username'] = $row["Shown_Name"];// echo "<option  value=$row[User_id]  ></option>";

                $bb = strlen($row["Logopaht"]);
                $ccsG = substr($row["Logopaht"], 3, $bb - 2);
                $usrinfo['sendlogpath'] = $ccsG;

            }
            return $usrinfo;
        } else {

        }
    }


//------------------------Get users-----------------------------------
    function update_db_fildes($tablename, $setclos, $wherecomand)
    {
        $sql = "UPDATE $tablename set $setclos $wherecomand ";
        $result3 = $this->query($sql);
        return $result3;
    }

//---------------------filter_display funcation start here----------------
    function get_user_pages($uidsx)
    {
        $sql = "select  Page_id  from users_privileges where User_id=$uidsx ";
        $selectedin = " ";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {
                $selectedin .= $row["Page_id"] . ",";
            }
            return $selectedin;
        } else {
            $selectedin = '0';
            return $selectedin;
        }
    }

    //------------------------Get users-----------------------------------
    // get seo of peages

    function GetSeoDescribe($value, $SeoPage)
    {
        $lang_id = 0;
        if (is_numeric($value)) {
            $lang_id = $value;
        }


        $SeoDescribe = array();
        $result3 = $this->query("SELECT * FROM seowebsite WHERE SeoPage='$SeoPage' and  lang_id='$lang_id' and Is_Actieved='Yes' ");
        $row = ($result3 && $result3->num_rows > 0) ? $result3->fetch_assoc() : null;
        $SeoImage = "";
        if ($row && !empty($row['SeoImage'])) {
            $SeoImage = preg_replace('#^.*?(?:^|[/\\])uploads[/\\]#i', "uploads/", $row['SeoImage']);
        }

        $SeoDescribe['SeoTitle'] = $row['SeoTitle'] ?? '';
        $SeoDescribe['Seo_keyword'] = $row['Seo_keyword'] ?? '';
        $SeoDescribe['seo_description'] = $row['seo_description'] ?? '';
        $SeoDescribe['SeoImage'] = $SeoImage;


        return $SeoDescribe;
    }


    //------------------------Get users-----------------------------------
    function Get_rows_infos($sql)
    {

        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {
                return $row;
            }

        } else {
            return "none";
        }
    }


//------------------------Get users-----------------------------------
    function Get_item_row_info($sql)
    {
// $sql = "SELECT *  FROM  Working_rorders WHERE rorder_id=$templtid  ;";
        $sqls = $sql;

        $result3 = $this->query($sqls);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {
                return $row;
            }

        } else {
            return "no date";
        }
    }

//------------------------Get users-----------------------------------
    function execute_query($sql)
    {
// $sql = "SELECT *  FROM  Working_rorders WHERE rorder_id=$templtid  ;";
        $sqls = $sql;

        $result3 = $this->query($sqls);
        return $result3;
    }

//------------------------Get users-----------------------------------
    function Get_item_rows_info($sql)
    {
// $sql = "SELECT *  FROM  Working_rorders WHERE rorder_id=$templtid  ;";
        $sqls = $sql;

        $result3 = $this->query($sqls);
        return $result3;
    }

    function check_session($licenseinfo, $dbinfox)
    {
        $chost = $_SERVER['HTTP_HOST'];
        $chostip = gethostbyname($chost);
        $uhost = $_SERVER["REMOTE_ADDR"];
        $leckey = $licenseinfo['lkey'];
        $data = array(
            'key' => $leckey,
            'domain' => "$chost",
            'serverip' => $chostip,
            'userip' => $uhost
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.it-servics.com/license/chekey.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 13);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        //echo $output;
        if ($output == "ok") {

        } else {

            $this->sendmail23($data, $dbinfox);

        }
        curl_close($ch);
    }


//------------------------GetUser Name ---------------------
    function Get_Username($empno)
    {
        $sql = "SELECT Username from employees_users where Emp_no=$empno ;";
        $result1 = $this->query($sql);
        $username = "";
        if ($result1->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result1->fetch_assoc()) {
                $username = $row["Username"];
            }
            return $username;
        } else {
            $username = "";
            return $username;
        }
    }


    function Get_usernotifaction_count()
    {

        $me = $_SESSION['useridx'];

        $sql = "SELECT count(notificationid) as notifycount FROM app_notification where  unread=0  and recipient=$me";

        $chatlist = " ";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {
                if ($row["notifycount"] == 0) {

                } else {
                    //$chatlist.='<span class="badge badge-default">'.$row["notifycount"].'</span>';// here you can show job titles
                    $chatlist .= $row["notifycount"];
                }


            }
            echo $chatlist;
        } else {
            echo " ";
        }
    }


///------------------------------get language-------------------


    function getlanguage($value)
    {

        if (is_numeric($value)) {
            $lang_id = $value;
        }
        $sql = "SELECT * FROM languages WHERE  lang_id!='$lang_id' ";
        $returnlanguge = "";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {
                $returnlanguge .= '<li><a class="nav-link" href="' . $this->pagename . '?lang=' . $row['class_name'] . '">' . $row['lang_title'] . '</a>
                              </li>

       ';
            }
            return $returnlanguge;
        }

    }


    function changeurl($value)
    {

        if (is_numeric($value)) {
            $lang_id = $value;
        }

        $url = "";
        if (strpos($this->url, "=ar")) {
            $url = str_replace("=ar", "=en", $this->url);

        } elseif (strpos($this->url, "=en")) {
            $url = str_replace("=en", "=ar", $this->url);
        } else {
            if ($this->lang == "en") {
                $url .= '?lang=ar';
            } else {

                $url .= '?lang=en';
            }
        }

        $sql = "SELECT * FROM languages WHERE  lang_id!='$lang_id' ";
        $returnurl = "";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            $row = $result3->fetch_assoc();

            $returnurl .= '<a class="nav-link" href="' . $url . '">' . $row['lang_title'] . '
                               
                          </a>';


            return $returnurl;
        }

    }


///------------------------------get id language-------------------


    function getidlanguageDictionary($value)
    {


        $lang_id = 0;
        if (is_numeric($value)) {
            $lang_id = $value;
        }

        $sql = "SELECT * FROM languagedictionary WHERE  lang_id='$lang_id' ";
        $Dictionary = array();
        $result3 = $this->query($sql);
        $i = 0;
        $item = "";
        while ($row = $result3->fetch_assoc()) {
            $Dictionary[$row["shortcode"]] = $row["content"];

        }
        $this->langs = $Dictionary;
        return $Dictionary;
    }


    function getBannerspages($value)
    {


        $sql = "SELECT * FROM banners  ";
        $banners = array();
        $result3 = $this->query($sql);
        $i = 0;
        $item = "";
        while ($row = $result3->fetch_assoc()) {
            $banner = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['image']);
            $banners[$row["bannr_key"]] = $banner;


        }

        return $banners;
    }


    function getidlanguage($value)
    {


        $whr = "";
        if (is_numeric($value)) {
            $whr = "lang_id='$value' ";
        } elseif (is_string($value)) {
            $connection = $this->connect();
            $class_name = mysqli_real_escape_string($connection, $value);
            $whr = "class_name='$class_name' ";
        }


        $sql = "SELECT * FROM languages WHERE  $whr ";
        $DetailLanguge = array();
        $result3 = $this->query($sql);
        // output data of each row name="select"

        $row = $result3->fetch_assoc();
        $DetailLanguge['lang_id'] = $row["lang_id"];
        $DetailLanguge['class_name'] = $row["class_name"];
        $DetailLanguge['dirction'] = $row["dirction"];
        $DetailLanguge['lang_title'] = $row["lang_title"];
        return $DetailLanguge;

    }


///------------------------------get id of-AlfatGroup-------------------

    function getidofcampany($value)
    {
        $lang_id = 0;
        if (is_numeric($value)) {
            $lang_id = $value;
        }

        $sql = "SELECT * FROM companyes WHERE    lang_id='$lang_id' and Is_Actieved='Yes' limit 1  ";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {
                return $row["company_id"];
            }

        } else {
            return "غير معروف";
        }


    }


    function check_isEMpty($value = '', $value1 = '')
    {

        $sql = "SELECT  *  FROM  $value where Comp_Id='$value1' ";
        $result3 = $this->query($sql);
        $row = $result3->num_rows;
        return $row;
    }


    function getidcomptochange($value, $value1)
    {

        $conect = $this->connect();
        $where = "";
        $comp_shcut = mysqli_real_escape_string($conect, $value);
        //$tablename=mysql_real_escape_string($conect,$value);
        if (is_numeric($value1)) {
            $lang_id = $value1;

        }

        $sql = "SELECT * FROM companyes WHERE  comp_shcut='$comp_shcut' and lang_id='$lang_id' ";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {
                return $row["company_id"];
            }

        } else {
            return "غير معروف";
        }
    }

///------------------------------get id of-AlfatGroup-------------------

    function getidofcampany1($value, $value1)
    {

        $conect = $this->connect();
        $where = "";
        $Name = mysqli_real_escape_string($conect, $value);
        //$tablename=mysql_real_escape_string($conect,$value);
        if (is_numeric($value1)) {
            $lang_id = $value1;
            $where .= "Name='$Name' and lang_id='$lang_id' and Is_Actieved='Yes'";
        } else {
            $where .= "Name='$Name' ";

        }
        $sql = "SELECT * FROM companyes WHERE  $where ";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {
                return $row["company_id"];
            }

        } else {
            return "غير معروف";
        }
    }

    function getidparentcheck($value)
    {

// $conect=parent::connect_db();
// $where="";
//       $Name=mysqli_real_escape_string($conect,$value);
        //$tablename=mysql_real_escape_string($conect,$value);
        $lang_id = 0;
        if (is_numeric($value)) {
            $lang_id = $value;

        }

        $sql = "SELECT * FROM companyes WHERE  lang_id='$lang_id' and is_parent='Yes' limit 1 ";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {
                return $row["company_id"];
            }

        } else {
            return "غير معروف";
        }
    }


    function stattracker($browser, $ip, $page, $from_page)
    {


        $out = "";

        $sqlselect = "SELECT * FROM stattracker WHERE   browser='$browser' and  ip='$ip' and page='$page' ";
        $resultsqlselect = $this->query($sqlselect);
        $row = $resultsqlselect->fetch_assoc();
        $num = $resultsqlselect->num_rows;
        if ($num == 0) {


            $sql = "INSERT INTO stattracker(browser,ip,date_visited,page,from_page) 
     VALUES('$browser','$ip',now(),'$page','$from_page')";

            $result = $this->query($sql);
            if (!$result) {
                $out = mysql_error();
            }


        }

    }


    function stattrackercount($value)
    {

// $conect=parent::connect_db();
// $where="";
//       $Name=mysqli_real_escape_string($conect,$value);
        //$tablename=mysql_real_escape_string($conect,$value);
        $lang_id = 0;
        if (is_numeric($value)) {
            $lang_id = $value;

        }


        $result = $this->query("Select Count(*) from stattracker WHERE page = '$curr_page'");
        $viewed = $result->result(0, 'count(*)');
        echo "This page was viewed $viewed times";
    }

    function stattracker_page_chart()
    {


        $sql = "SELECT *,count(*) FROM stattracker  GROUP BY page ";


        $item_chart = array();
        $result3 = $this->query($sql);
        $i = 0;
        $rand = "";
        while ($row = $result3->fetch_assoc()) {

            $rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
            $vcolor = '#' . $rand;
            $item_chart[$i] = array('country' => $row['page'], 'visits' => $row['count(*)'], 'color' => $vcolor);


            ++$i;


        }


        return $item_chart;


    }

    function stattracker_vistor_chart()
    {


        $sql = "SELECT *,count(*) FROM stattracker  GROUP BY ip ";


        $item_chart = array();
        $result3 = $this->query($sql);
        $i = 0;
        $rand = "";
        while ($row = $result3->fetch_assoc()) {


            $rand = round(1E8 * rand());
            $item_chart[$i] = array('date' => $row['date_visited'], 'value' => $row['count(*)'], 'volume' => $rand);


            ++$i;


        }


        return $item_chart;


    }


///------------------------------get id of-companyes-------------------

    function GetDetailThisUser($value = '')
    {

        $User_id = 0;
        if (is_numeric($value)) {
            $User_id = $value;
        }
        $sql = "SELECT * from employees_users where User_id='$User_id'   ";
        $result = $this->query($sql);
        $DetailUser = array();
        $i = 0;
        $row = $result->fetch_assoc();
        $DetailUser['grup_id'] = $row['grup_id'];
        $DetailUser['User_id'] = $row['User_id'];
        $DetailUser['Username'] = $row['Username'];
        $DetailUser['Shown_Name'] = $row['Shown_Name'];
        $DetailUser['User_Key'] = $row['User_Key'];
        $DetailUser['RelatedKey'] = $row['RelatedKey'];
        $DetailUser['APassword'] = $row['APassword'];
        $DetailUser['Password_Salt'] = $row['Password_Salt'];
        $DetailUser['Primary_Email'] = $row['Primary_Email'];

        $DetailUser['Logopaht'] = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', MEDIA_DIR, $row['Logopaht']);
        $DetailUser['Moblile_No'] = $row['Moblile_No'];
        $DetailUser['Is_Actived'] = $row['Is_Actived'];


        return $DetailUser;


    }


    function GetDetailThisUserByKey($RelatedKey = '')
    {


        $sql = "SELECT * from employees_users where RelatedKey='$RelatedKey'   ";
        $result = $this->query($sql);
        $DetailUser = array();
        $i = 0;
        $row = $result->fetch_assoc();
        $DetailUser['User_id'] = $row['User_id'];
        $DetailUser['grup_id'] = $row['grup_id'];
        $DetailUser['Username'] = $row['Username'];
        $DetailUser['Shown_Name'] = $row['Shown_Name'];
        $DetailUser['User_Key'] = $row['User_Key'];
        $DetailUser['RelatedKey'] = $row['RelatedKey'];
        $DetailUser['APassword'] = $row['APassword'];
        $DetailUser['Password_Salt'] = $row['Password_Salt'];
        $DetailUser['Primary_Email'] = $row['Primary_Email'];

        $DetailUser['Logopaht'] = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', MEDIA_DIR, $row['Logopaht']);
        $DetailUser['Moblile_No'] = $row['Moblile_No'];
        $DetailUser['Is_Actived'] = $row['Is_Actived'];


        return $DetailUser;


    }

    function GetDetailThisPage($value = '')
    {

//$Page_filename[0]=explode('.',$value);

        $Page_filename = str_replace('.php', '', $value);

        $sql = "SELECT * FROM app_pages   where     Page_filename='$Page_filename'  ";
        $pages = array();
        $bbg = "";
        $result3 = $this->query($sql);
        $i = 0;

        if ($result3 && $result3->num_rows > 0) {
            $row = $result3->fetch_assoc();
            $pages['Page_filename'] = isset($row['Page_filename']) ? $row['Page_filename'] : '';
            $pages['Page_name_ar'] = isset($row['Page_name_ar']) ? $row['Page_name_ar'] : '';
            $pages['Page_name_en'] = isset($row['Page_name_en']) ? $row['Page_name_en'] : '';
            $pages['Page_title_ar'] = isset($row['Page_title_ar']) ? $row['Page_title_ar'] : '';
            $pages['Page_title_en'] = isset($row['Page_title_en']) ? $row['Page_title_en'] : '';
            $pages['Page_Descrption_ar'] = isset($row['Page_Descrption_ar']) ? $row['Page_Descrption_ar'] : '';
            $pages['menu_icon'] = isset($row['menu_icon']) ? $row['menu_icon'] : '';
        } else {
            $pages['Page_filename'] = $Page_filename;
            $pages['Page_name_ar'] = '';
            $pages['Page_name_en'] = '';
            $pages['Page_title_ar'] = '';
            $pages['Page_title_en'] = '';
            $pages['Page_Descrption_ar'] = '';
            $pages['menu_icon'] = '';
        }


        return $pages;

    }

    function getDetailscampany($value, $value1)
    {

        $returncampany = array();
        $company_id = 0;
        $lang_id = 0;
        // $Name=mysqli_real_escape_string($conect,$value);
        //$tablename=mysql_real_escape_string($conect,$value);
        if (is_numeric($value) && is_numeric($value1)) {
            $lang_id = $value1;
            $company_id = $value;
        }

        $sql = "SELECT * FROM companyes WHERE   company_id='$company_id' and  lang_id='$lang_id' and is_parent='Yes' ";
        $result3 = $this->query($sql);
        $row = $result3->fetch_assoc();
        // output data of each row name="select"
        $row['company_id'] = $row["company_id"];
        $row['cname'] = $row["Name"];
 
        $ccsG2 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['logo'], 'frontend', 'uploads/logo.png') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['logo']);
        $row['logo'] = !empty($ccsG2) ? $ccsG2 : 'uploads/logo.png';

        $banner1 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['banner1'], 'frontend', '') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['banner1']);
        $row['banner1'] = $banner1;

        $banner2 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['banner2'], 'frontend', '') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['banner2']);
        $row['banner2'] = $banner2;
        $banner3 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['banner3'], 'frontend', '') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['banner3']);
        $row['banner3'] = $banner3;
        $banner4 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['banner4'], 'frontend', '') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['banner4']);
        $row['banner4'] = $banner4;

        $ccsG22 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['Image_banner'], 'frontend', '') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['Image_banner']);
        $row['Image_banner'] = $ccsG22;
 
        return $row;

    }


    function getcountclient()
    {
        $sql = "SELECT  DISTINCT Client_Id   FROM  clients";
        $result3 = $this->query($sql);
        $row = $result3->num_rows;

        return $row;

    }


    function getcountboardsmanager()
    {
        $sql = "SELECT  DISTINCT boardm_id   FROM  boardsmanager  ";
        $result3 = $this->query($sql);
        $row = $result3->num_rows;

        return $row;

    }


    function getcountsubscribusers()
    {
        $sql = "SELECT  DISTINCT  id   FROM  subscribusers ";
        $result3 = $this->query($sql);
        $row = $result3->num_rows;

        return $row;

    }


    function checkIsPrdetails($value, $Type)
    {
        $project_id = 0;
        if (is_numeric($value)) {

            $project_id = $value;
        } else {

            $project_id = 0;
        }
        $sql = "SELECT * FROM projectsdetails  where    project_id='$project_id' and Is_Actieved='Yes'  and  DetailType='$Type' ";
        $result3 = $this->query($sql);

        $num = $result3->num_rows;
        return $num;

    }


    function checkIsProjectsDes($value, $table)
    {
        $project_id = 0;
        if (is_numeric($value)) {

            $project_id = $value;
        } else {

            $project_id = 0;
        }
        $sql = "SELECT * FROM $table where    project_id='$project_id' and Is_Actieved='Yes'   ";
        $result3 = $this->query($sql);

        $num = $result3->num_rows;
        return $num;

    }


    function checkIs($value = '', $table)
    {

        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }
        $sql = "SELECT * FROM $table where    lang_id='$lang_id' and Is_Actieved='Yes' order by order_id ";
        $result3 = $this->query($sql);

        $num = $result3->num_rows;
        return $num;

    }


    function getSlider()
    {


        $sql = "SELECT * FROM sliders_items where    Is_Actived='Yes'   ";

        $slider = " ";
        $i = 0;
        $result3 = $this->query($sql);
        $text1 = "";
        $text2 = "";

        $imgag1 = "";
        $imgag2 = "";
        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {
                ++$i;

                $ccsGimg = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['image'], 'frontend', 'uploads/no-image.png') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['image']);
                $img1 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['img1'], 'frontend', '') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['img1']);
                $img2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['img2']);


                if ($row['text1'] != "") {
                    $text1 = '
                   <h2> <span>' . $row['text1'] . '</span></h2> ';
                } else {
                    $text1 = '';
                }

                if ($row['text2'] != "") {
                    $text2 = ' 
               <div class="text"> ' . $row['text2'] . '</div>';
                } else {
                    $text2 = '';
                }


                $slider .= '
            
            <li data-transition="random-premium">
                <img src="' . $ccsGimg . '"  alt="" width="1920" height="683" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
                  

               
                <div class="tp-caption tp-resizeme"
                    data-x="center" data-hoffset="0" 
                    data-y="center" data-voffset="0" 
                    data-transform_idle="o:1;"         
                    data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                    data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                    data-splitin="none" 
                    data-splitout="none"  
                    data-responsive_offset="on"
                    data-start="500">
                        <div class="slider-content">

                                        ' . $text1 . ' 
                                          ' . $text2 . '                                                   
                                                          
              
                                     
                        </div>
                    </div>
                    
                    </li>
 

           ';


            }


            return $slider;

        }


    }


    function getSliderTyp2()
    {


        $sql = "SELECT * FROM sliders_items where    Is_Actived='Yes'   ";

        $slider = " ";
        $i = 0;
        $result3 = $this->query($sql);
        $text1 = "";
        $text2 = "";

        $imgag1 = "";
        $imgag2 = "";
        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {
                ++$i;

                $ccsGimg = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['image'], 'frontend', 'uploads/no-image.png') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['image']);
                $img1 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['img1'], 'frontend', '') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['img1']);
                $img2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['img2']);


                if ($row['text1'] != "") {
                    $text1 = '
                   <h3>' . $row['text1'] . '</h3> ';
                } else {
                    $text1 = '';
                }

                if ($row['text2'] != "") {
                    $text2 = ' 
               <p> ' . $row['text2'] . '</p>';
                } else {
                    $text2 = '';
                }


                $slider .= '
            
            <li data-transition="random-premium">
                
                  
               <img src="' . $ccsGimg . '" alt="" data-bgposition="center center" data-bgfit="cover"
                     data-bgrepeat="no-repeat" data-no-retina>
               
                  <div class="sfb tp-caption tp-resizeme font-family-heading text-shadow font-weight-700 letter-spacing-2px"
                     data-x="[right,right,right,right]" data-hoffset="[10,10,10,10]"
                     data-y="[middle,middle,middle,middle]" data-voffset="[0,0,0,0]"
                     data-fontsize="[\20\,\20\,\20\,\20\]"
                     data-lineheight="[\48\,\44\,\40\,\46\]"
                     data-width="none"
                     data-height="none"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="o:0"
                     data-transform_out="o:0"
                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                     data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                     data-start="1500"
                     data-splitin="none"
                     data-splitout="none"
                     data-responsive_offset="on">
                        

                                        ' . $text1 . ' 
                                          ' . $text2 . '                                                   
                                                          
              
                                     
                         
                    </div>
                    
                    </li>
 

           ';


            }


            return $slider;

        }


    }

    function setLang_Id($value = '')
    {
        $this->lang_id = $value;
    }

    /* slider uin */
    function getSlideruin($lang_id)
    {


        $sql = "SELECT * FROM sliders_items where    Is_Actived='Yes' and lang_id='$lang_id' ";

        $slider = " ";
        $i = 0;
        $result3 = $this->query($sql);
        $text1 = "";
        $text2 = "";
        $text3 = "";
        $text4 = "";

        $imgag1 = "";
        if ($lang_id == 1) {
            $dir = "rtl";
            $lng = "ar";

        } else {
            $dir = "ltr";
            $lng = "en";

        }
        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {
                ++$i;

                $ccsGimg = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['image'], 'frontend', 'uploads/no-image.png') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['image']);
                $img1 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['img1'], 'frontend', '') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['img1']);


                if ($row['text1'] != "") {
                    $text1 = '
                   <h3>' . $row['text1'] . '</h3> ';

                } else {
                    $text1 = '';
                }

                if ($row['text2'] != "") {
                    $text2 = ' 
               <h1> ' . $row['text2'] . '</h1>';
                } else {
                    $text2 = '';
                }

                if ($row['text3'] != "") {

                    $text3 = $row['text3'];
                } else {
                    $text3 = '';
                }
                if ($row['text4'] != "") {
                    $text4 = ' 
              <a class="default-btn" href="' . $row['text4'] . '"> ' .  $this->langs['redmore'] . '  </a>';
                } else {
                    $text4 = '';
                }


                $slider .= '
 <div class="hero-slider-item" style="background-image: url(\'' . htmlspecialchars($ccsGimg, ENT_QUOTES) . '\'); background-size: cover; background-position: center;">
            <div class="d-table">
                <div class="d-tablecell">
                    <div class="container">
                        <div class="slider-text slider-text-five">
                            ' . $text1 . '
                             ' . $text2 . '
                            <a href="#" class="typewrite" data-period="2000" data-type=\'[ "' . $text3 . '" ]\'>
                                <span class="wrap"></span>
                            </a>
                            <div class="slide-button">
                            ' . $text4 . '
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';


            }


            return $slider;

        }


    }

    /* slider uin */
    function getComSlideruin($lang_id,$company_id)
    {


        $sql = "SELECT * FROM com_sliders_items where    Is_Actived='Yes' and lang_id='$lang_id' and activity_id = '$company_id'";
        $slider = " ";
        $i = 0;
        $result3 = $this->query($sql);
        $text1 = "";
        $text2 = "";
        $text3 = "";
        $text4 = "";

        $imgag1 = "";
        if ($lang_id == 1) {
            $dir = "rtl";
            $lng = "ar";

        } else {
            $dir = "ltr";
            $lng = "en";

        }
        if ($result3->num_rows > 0) {

             while ($row = $result3->fetch_assoc()) {
                ++$i;

                $ccsGimg = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['image'], 'frontend', 'uploads/no-image.png') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['image']);
                $img1 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['img1'], 'frontend', '') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['img1']);


                if ($row['text1'] != "") {
                    $text1 = '
                   <h3>' . $row['text1'] . '</h3> ';

                } else {
                    $text1 = '';
                }

                if ($row['text2'] != "") {
                    $text2 = ' 
               <h1> ' . $row['text2'] . '</h1>';
                } else {
                    $text2 = '';
                }

                if ($row['text3'] != "") {

                    $text3 = $row['text3'];
                } else {
                    $text3 = '';
                }
                if ($row['text4'] != "") {
                    $text4 = ' 
              <a class="default-btn" href="' . $row['text4'] . '"> ' .  $this->langs['redmore'] . '  </a>';
                } else {
                    $text4 = '';
                }


                $slider .= '
 <div class="hero-slider-item" style="background-image: url(\'' . htmlspecialchars($ccsGimg, ENT_QUOTES) . '\'); background-size: cover; background-position: center;">
            <div class="d-table">
                <div class="d-tablecell">
                    <div class="container">
                        <div class="slider-text slider-text-five">
                            ' . $text1 . '
                             ' . $text2 . '
                            <a href="#" class="typewrite" data-period="2000" data-type=\'[ "' . $text3 . '" ]\'>
                                <span class="wrap"></span>
                            </a>
                            <div class="slide-button">
                            ' . $text4 . '
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';


            }


            return $slider;


            

        }


    }


/* Why Us */
    function getCompanyWhyUs($lang_id,$company_id)
    {


        $sql = "SELECT * FROM why_us where    Is_Actieved='Yes' and lang_id='$lang_id' and activity_id = '$company_id'";
        $slider = " ";
        $i = 0;
        $result3 = $this->query($sql);
        $point1 = "";
        $point2 = "";
        $point3 = "";
        $point4 = "";
        $point5 = "";
        $why_us = "";

        $imgag1 = "";
        if ($lang_id == 1) {
            $why_us = "لماذا نحن";
        } else {
            $why_us = "Why Us";
        }
        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {
                ++$i;

                $ccsGimg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['logo']);
                $ccsGimg2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['url']);
                if ($row['point1'] != "") {
                    $point1 = '<div class="about-list">
                        <h3>
                            <i class="flaticon-ok-mark"></i> ' . $row['point1'] . '
                        </h3>
                    </div>';
                }

                if ($row['point2'] != "") {
                    $point2 = '<div class="about-list">
                        <h3>
                            <i class="flaticon-ok-mark"></i> ' . $row['point2'] . '
                        </h3>
                    </div>';
                }

                if ($row['point3'] != "") {
                    $point3 = '<div class="about-list">
                        <h3>
                            <i class="flaticon-ok-mark"></i> ' . $row['point3'] . '
                        </h3>
                    </div>';
                }

                if ($row['point4'] != "") {
                    $point4 = '<div class="about-list">
                        <h3>
                            <i class="flaticon-ok-mark"></i> ' . $row['point4'] . '
                        </h3>
                    </div>';
                }

                if ($row['point5'] != "") {
                    $point5 = '<div class="about-list">
                        <h3>
                            <i class="flaticon-ok-mark"></i> ' . $row['point5'] . '
                        </h3>
                    </div>';
                }

                $slider .= '
                 <div class="col-lg-6">
                <div class="about-text-wrapper">
                    <div class="section-title-left">
                        <h4>'.$why_us.'</h4>
                        <h2> ' . $row['Name_Partenr'] . '</h2>

                    </div>
                    '.$point1.'
                    '.$point2.'
                    '.$point3.'
                    '.$point4.'
                    '.$point5.'
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-img-wrapper">
                    <div class="about-img-1">
                        <img src="'.$ccsGimg.'" alt="">
                    </div>
                    <div class="about-img-2">
                        <img src="'.$ccsGimg2.'" alt="">
                    </div>
                </div>
            </div>';


            }


            return $slider;

        }


    }

/* Produts */
    function getCompanyProducts($lang_id,$company_id)
    {


        $sql = "SELECT * FROM category where    Is_Actieved='Yes' and lang_id='$lang_id' and activity_id = '$company_id'";
        $slider = " ";
        $i = 0;
        $result3 = $this->query($sql);
        $point1 = "";
        $point2 = "";
        $point3 = "";
        $point4 = "";
        $point5 = "";
        $why_us = "";

        $imgag1 = "";
        if ($lang_id == 1) {
            $why_us = "من نحن";
        } else {
            $why_us = "Why Us";
        }
        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {
                ++$i;

                $category_img = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['category_img']);


                $slider .= '<figure class="single_category">
                        <a class="veno" href="product_details.php?lang=' . $this->lang . '&product_id=' . $row['category_id'] . '" data-gallery="myGallery" data-title="'.$row['category_name'].'">
                            <img src="'.$category_img.'" alt="image" style="height: 300px;">
                            <div class="icon">
                                <img src="uploads/products/android-expand.png" >
                            </div>
                        </a>
                        <figcaption class="category_hover">
                            <div class="category_info">
                                <h3>'.$row['category_name'].'</h3>
                                <div class="category_desc">
                                    <p>'.$row['category_short_desc'].'</p>
                                </div>
                            </div>
                        </figcaption>
                    </figure>';


            }


            return $slider;

        }


    }


/* Produts */
    function getProducts($lang_id,$company_id)
    {


        $sql = "SELECT * FROM category where    Is_Actieved='Yes' and lang_id='$lang_id' and activity_id = '$company_id'";
        $slider = " ";
        $i = 0;
        $result3 = $this->query($sql);


        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {
                ++$i;

                $category_img = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['category_img']);


                $slider .= '
  <div class="col-sm-4 col-xs-12">
                <div class="export_item">
                    <a href="product_details.php?lang=' . $this->lang . '&company=' . $row['activity_id'] . '&product_id=' . $row['category_id'] . '"><img src="'.$category_img.'" alt="'.$row['category_name'].'"></a>
                    <a href="product_details.php?lang=' . $this->lang . '&product_id=' . $row['category_id'] . '"><h2>'.$row['category_name'].'</h2></a>
                    <div class="export_desc">
                        <p>'.$row['category_short_desc'].'</p>
                    </div>
                </div>
            </div>';


            }


            return $slider;

        }


    }

    /* get Regulations */
    function get_regulations_menu($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlregulations = "SELECT * FROM `filecallage` WHERE FileType='Regulation' and  Is_Actieved='Yes' and lang_id='$lang_id'";

        $resultregulations = $this->query($sqlregulations);

        $regulations_menu = " ";
        $i = 0;
        if ($resultregulations->num_rows > 0) {

            while ($row = $resultregulations->fetch_assoc()) {
                $FilePath = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['FilePaht']);

                $regulations_menu .= '
                <li>
                      <a href="' . $FilePath . '?lang=' . $this->lang . '" title = "' . $row['FileName'] . '" >
                        <span class="menu-label">   
                          ' . $row['FileName'] . ' 
                         </span>
                      </a>

                    </li>
                  ';

            }


            return $regulations_menu;

        }

    }

    /* get collegsleft */
    function get_collegsleftimg($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlcolleg = "SELECT * FROM calleage where  Is_Actieved='Yes' and Is_visible='Yes' and lang_id='$lang_id'";

        $resultcolleg = $this->query($sqlcolleg);

        $colleg = " ";
        $i = 0;
        if ($resultcolleg->num_rows > 0) {

            while ($row = $resultcolleg->fetch_assoc()) {
                $calleageImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['calleage_img']);
                $calleage_id = $row['calleage_id'];
                if ($calleage_id % 2 == 0) {
                    $colleg .= '
                    <a href="colleg.php?lang=' . $this->lang . '&calleage_id=' . $row['calleage_id'] . '" title = "' . $row['calleage_name'] . '" >
            <div class="about-img mb-3">
              <img class="img-fluid" src="' . $calleageImg . '" alt="' . $row['calleage_name'] . '">
            </div>
            </a>

                    ';
                } else {

                }


            }


            return $colleg;

        }

    }

    /* get sectorsright */
    function get_sectorsrightimg($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlsector = "SELECT * FROM sector where  Is_Actieved='Yes' and Is_visible='Yes' and lang_id='$lang_id'";

        $resultsector = $this->query($sqlsector);

        $sector = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $sectorImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['sector_img']);
                $sector_id = $row['sector_id'];
                if ($sector_id % 2 == 1) {
                    $sector .= '
                    <a href="sectors.php?lang=' . $this->lang . '&sec=' . $row['sector_id'] . '" title = "' . $row['sector_name'] . '" >
            <div class="about-img mb-3">
              <img class="img-fluid" src="' . $sectorImg . '" alt="' . $row['sector_name'] . '">
            </div>
            </a>
                    
                    ';
                }


            }


            return $sector;

        }

    }

    /* get sectorsleft */
    function get_sectorsleft($value = '')
    {


        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlsector = "SELECT * FROM sector where  Is_Actieved='Yes' and Is_visible='Yes' and lang_id='$lang_id'";

        $resultsector = $this->query($sqlsector);

        $sector = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $sectorImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['sector_img']);
                $sector_id = $row['sector_id'];
                if ($sector_id % 2 == 0) {
                    $sector .= '
                    <a href="sectors.php?lang=' . $this->lang . '&sec=' . $row['sector_id'] . '" title = "' . $row['sector_name'] . '" >
            <div class="about-img mb-3">
              <img class="img-fluid" src="' . $sectorImg . '" alt="' . $row['sector_name'] . '">
            </div>
            </a>
                    
                    ';
                }


            }


            return $sector;

        }

    }

    /* get sectorli */
    function get_sectors($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlcolleg = "SELECT * FROM sector where  Is_Actieved='Yes' and Is_visible='Yes' and lang_id='$lang_id'";

        $resultsector = $this->query($sqlcolleg);

        $sector = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $sectorImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['sector_img']);
                $sector_id = $row['sector_id'];
                // if($calleage_id % 2 == 1){
                $sector .= '
                     <li class="mb-2"> <a href="sectors.php?lang=' . $this->lang . '&sec=' . $row['sector_id'] . '" title = "' . $row['sector_name'] . '" > ' . $row['sector_name'] . '  </a></li>
                    ';
                //}else{}


            }


            return $sector;

        }

    }

    /* get featured_sectors */
    function get_featured_sectors($value = '')
    {


        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlsector = "SELECT * FROM sector where  Is_Actieved='Yes' and Is_visible='Yes' and lang_id='$lang_id'";

        $resultsector = $this->query($sqlsector);

        $sector = " ";
        $shortcontent = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $sectorImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['sector_img']);
                $sector_id = $row['sector_id'];
                $shortcontent = substr($row['sector_content'], 0, 225) . " ...";

                $sector .= '

          <div class="item">
            <div class="service-item">
              <div class="service-images">
                <img class="img-fluid" src="' . $row['sector_img'] . '" alt="' . $row['sector_name'] . '">
                <div class="service-icon"> <i class="fa fa-eye"></i>
                </div>
              </div>
              <div class="service-description">
                <h4>' . $row['sector_name'] . '</h4>
                <p>
                   ' . $shortcontent . ' 
                </p> <a href="sectors.php?lang=' . $this->lang . '&sec=' . $row['sector_id'] . '" title = "' . $row['sector_name'] . '">' . $this->langs['redmore'] . '  <i class="fas fa-arrow-left"></i></a>
              </div>
            </div>
          </div>
                    
                    ';


            }


            return $sector;

        }

    }

    /* get collegsright */
    function get_collegsright($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlcolleg = "SELECT * FROM calleage where  Is_Actieved='Yes' and Is_visible='Yes' and lang_id='$lang_id'";

        $resultcolleg = $this->query($sqlcolleg);

        $colleg = " ";
        $i = 0;
        if ($resultcolleg->num_rows > 0) {

            while ($row = $resultcolleg->fetch_assoc()) {
                $calleageImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['calleage_img']);
                $calleage_id = $row['calleage_id'];
                if ($calleage_id % 2 == 1) {
                    $colleg .= '
                     <li class="mb-2">- <a href="colleg.php?lang=' . $this->lang . '&calleage_id=' . $row['calleage_id'] . '" title = "' . $row['calleage_name'] . '" > ' . $row['calleage_name'] . '  </a></li>
                    ';
                } else {

                }


            }


            return $colleg;

        }

    }


    /* get mitions */
    function get_mitions($value = '')
    {


        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }

        $sqlsector = "SELECT * FROM uin_info where  Is_Actieved='Yes' and Is_visible='Yes' and PostionAbout='Postion2' and lang_id='$lang_id'";

        $resultsector = $this->query($sqlsector);

        $mitions = " ";
        $shortcontent = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $mitionsImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['Image']);

                $shortcontent = substr($row['content'], 0, 150);

                $mitions .= '

          <div class="col-lg-4 wow slideInDown mb-3">
        <div class="single-about text-center">
          <img class="img-responsive img-thumbnail" src="' . $mitionsImg . '" alt=" ' . $row['Title'] . '">

          <h4>
              ' . $row['Title'] . '
          </h4>
          <p class="text-center"> 
                ' . $shortcontent . '             
          </p>
        </div>
      </div> 
                    ';


            }


            return $mitions;

        }

    }


    /* get advantages */
    function get_advantages($value = '')
    {


        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }

        $sqlsector = "SELECT * FROM uin_info where  Is_Actieved='Yes' and Is_visible='Yes' and PostionAbout='Postion4' and lang_id='$lang_id'";

        $resultsector = $this->query($sqlsector);

        $advantages = " ";
        $shortcontent = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $mitionsImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['Image']);

                $shortcontent = substr($row['content'], 0, 200);

                $advantages .= '

      <div class="col-md-6 col-sm-6">
        <div class="featured-item text-center p-0">
          <div class="featured-icon"> 
          <img class="img-responsive w-100" src="' . $mitionsImg . '" alt=" ' . $row['Title'] . '">
          </div>
          <div class="featured-title text-uppercase">
            <h5>
              ' . $row['Title'] . '
            </h5>
          </div>
          <div class="featured-desc">
            <p>
            ' . $shortcontent . '
            </p>
          </div>
        </div>
      </div>
          
                    ';


            }


            return $advantages;

        }

    }


    /* get admission */
    function get_admission($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqladmission = "SELECT * FROM `uin_info` WHERE PostionAbout='Postion1' and TypeAbout='Admission'  and lang_id='$lang_id'";

        $resultadmission = $this->query($sqladmission);

        $admission = " ";
        $i = 0;
        if ($resultadmission->num_rows > 0) {

            while ($row = $resultadmission->fetch_assoc()) {

                $ImagePath = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['Image']);
                if ($row['uininfo_id'] % 2 == 0) {
                    $admission .= '
         <section class="amission">
  <div class="container ">
    <div class="row align-items-center">
      <div class="col-lg-12 col-md-12 text-center">
        <h4 class="title ">  <span>   ' . $row['Title'] . ' </span></h4>
      </div>
      <div class="col-lg-12 col-md-12 box">
        <div class="row align-items-center">
      
      <div class="col-lg-7 col-md-12 md-mt-3">
        <h6 class="title text-right">  <span>  ' . $row['short_desc'] . '
          :</span></h6>
        
        
         ' . $row['content'] . '   
      </div>
      <div class="col-lg-5 col-md-12">
        <div class="team-images">
          <img class="img-fluid img-thumbnail" src="' . $ImagePath . '" alt=" ' . $row['Title'] . '">
        </div>
      </div>
    </div>
        <div class="addthis_toolbox addthis_default_style addthis_32x32_style mt-5">
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_googleplus"></a>
        <a class="addthis_button_whatsapp"></a>
        <a class="addthis_button_telegram"></a>
        <a class="addthis_button_favorites"></a>
        <a class="addthis_button_email"></a>
        <a class="addthis_button_print"></a>
        <a class="addthis_button_compact"></a>
            </div>
            
            <script type="text/javascript">var addthis_config={"data_track_addressbar":true};</script>
            
            <script type="text/javascript" src="plugins/js/addthis_widget.js#pubid=wneet"></script>
      </div>

    </div>
  </div>
</section> ';
                } else {
                    $admission .= '
         <section class=" grey-bg">
  <div class="container ">
    <div class="row align-items-center">
      <div class="col-lg-12 col-md-12 text-center">
        <h4 class="title ">  <span>   ' . $row['Title'] . ' </span></h4>
      </div>
      <div class="col-lg-12 col-md-12 box">
        <div class="row align-items-center">
      <div class="col-lg-5 col-md-12">
        <div class="team-images">
          <img class="img-fluid img-thumbnail" src="' . $ImagePath . '" alt=" ' . $row['Title'] . '">
        </div>
      </div>
      <div class="col-lg-7 col-md-12 md-mt-3">
        <h6 class="title text-right">  <span>  ' . $row['short_desc'] . '
          :</span></h6>
        
        
         ' . $row['content'] . '   
      </div>
      
    </div>
        <div class="addthis_toolbox addthis_default_style addthis_32x32_style mt-5">
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_googleplus"></a>
        <a class="addthis_button_whatsapp"></a>
        <a class="addthis_button_telegram"></a>
        <a class="addthis_button_favorites"></a>
        <a class="addthis_button_email"></a>
        <a class="addthis_button_print"></a>
        <a class="addthis_button_compact"></a>
            </div>
            
            <script type="text/javascript">var addthis_config={"data_track_addressbar":true};</script>
            
            <script type="text/javascript" src="plugins/js/addthis_widget.js#pubid=wneet"></script>
      </div>

    </div>
  </div>
</section> ';
                }

            }


            return $admission;

        }

    }

    /* get rigesterguid */
    function get_rigesterguid($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlrigesterguid = "SELECT * FROM `uin_info` WHERE PostionAbout='Postion2' and TypeAbout='Admission'  and lang_id='$lang_id'";

        $resultrigesterguid = $this->query($sqlrigesterguid);

        $rigesterguid = " ";
        $i = 0;
        if ($resultrigesterguid->num_rows > 0) {

            while ($row = $resultrigesterguid->fetch_assoc()) {
                $fileGuide = '';
                $ImagePath = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['Image']);
                $PdfFile = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['PdfFile']);
                if ($row['PdfFile'] != '') {
                    $fileGuide = '
        <h6 class="px-5 py-3 my-3 box">
          <i class="fa fa-book"></i>
            ' . $row['Title'] . ' - 
         <span class="">
                ' . $this->langs['Download'] . '  : <a href="' . $PdfFile . '" target="_blank"> <i class="fa fa-download"></i></a>
         </span>
        </h6>
      ';
                }
                if ($row['uininfo_id'] % 2 == 0) {
                    $rigesterguid .= '
         <section class="rigesterguid">
  <div class="container ">
    <div class="row align-items-center">
      <div class="col-lg-12 col-md-12 text-center">
        <h4 class="title">  <span>   ' . $row['Title'] . ' </span></h4>
      </div>
      <div class="col-lg-12 col-md-12 box">
        <div class="row align-items-center">
      
      <div class="col-lg-7 col-md-12 md-mt-3">
        <h6 class="title text-right">  <span>  ' . $row['short_desc'] . '
          :</span></h6>
        
        
         ' . $row['content'] . '   
      </div>
      <div class="col-lg-5 col-md-12">
        <div class="team-images">
          <img class="img-fluid img-thumbnail" src="' . $ImagePath . '" alt=" ' . $row['Title'] . '">
        </div>
        ' . $fileGuide . '
      </div>
    </div>
        <div class="addthis_toolbox addthis_default_style addthis_32x32_style mt-5">
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_googleplus"></a>
        <a class="addthis_button_whatsapp"></a>
        <a class="addthis_button_telegram"></a>
        <a class="addthis_button_favorites"></a>
        <a class="addthis_button_email"></a>
        <a class="addthis_button_print"></a>
        <a class="addthis_button_compact"></a>
            </div>
            
            <script type="text/javascript">var addthis_config={"data_track_addressbar":true};</script>
            
            <script type="text/javascript" src="plugins/js/addthis_widget.js#pubid=wneet"></script>
      </div>

    </div>
  </div>
</section> ';
                } else {
                    $rigesterguid .= '  
         <section class="rigesterguid grey-bg">
  <div class="container ">
    <div class="row align-items-center">
      <div class="col-lg-12 col-md-12 text-center">
        <h4 class="title">  <span>   ' . $row['Title'] . ' </span></h4>
      </div>
      <div class="col-lg-12 col-md-12 box pt-5">
        <div class="row align-items-center">
      <div class="col-lg-5 col-md-12">
        <div class="team-images">
          <img class="img-fluid img-thumbnail" src="' . $ImagePath . '" alt=" ' . $row['Title'] . '">
        </div>
        ' . $fileGuide . '
      </div>
      <div class="col-lg-7 col-md-12 md-mt-3">
        <h6 class="title text-right">  <span>  ' . $row['short_desc'] . '
          :</span></h6>
        
        
         ' . $row['content'] . '   
      </div>
      
    </div>
        <div class="addthis_toolbox addthis_default_style addthis_32x32_style mt-5">
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_googleplus"></a>
        <a class="addthis_button_whatsapp"></a>
        <a class="addthis_button_telegram"></a>
        <a class="addthis_button_favorites"></a>
        <a class="addthis_button_email"></a>
        <a class="addthis_button_print"></a>
        <a class="addthis_button_compact"></a>
            </div>
            
            <script type="text/javascript">var addthis_config={"data_track_addressbar":true};</script>
            
            <script type="text/javascript" src="plugins/js/addthis_widget.js#pubid=wneet"></script>
      </div>

    </div>
  </div>
</section> ';
                }

            }


            return $rigesterguid;

        }

    }

    /* get uinOrganizational */
    function get_uinOrganizational($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlrigesterguid = "SELECT * FROM uin_info where   Is_Actieved='Yes' and lang_id='$lang_id' and PostionAbout='Postion7' and TypeAbout='uininfo'";

        $resultrigesterguid = $this->query($sqlrigesterguid);

        $rigesterguid = " ";
        $i = 0;
        if ($resultrigesterguid->num_rows > 0) {

            while ($row = $resultrigesterguid->fetch_assoc()) {

                $ImagePath = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['Image']);

                if ($row['uininfo_id'] % 2 == 0) {
                    $rigesterguid .= '
         <section class="grey-bg">
  <div class="container">
    <div class="row my-3 ">
     <div class="col-md-12">
        <div class="text-center">
          <h4 class="title"><span>
            ' . $row['Title'] . '
          </span></h4>
        </div>
     </div>
     <div class="col-lg-12 col-md-12 md-mt-5">
    <p class="lead text-justify my-4">
    ' . $row['content'] . '
    </p>
        <img class="img-responsive img-thumbnail"  src="' . $ImagePath . '" alt=" ' . $row['Title'] . '">

     </div>
     
   </div>   
  </div>
 
</section>
         ';
                } else {
                    $rigesterguid .= '
    <section class="">
  <div class="container">
    <div class="row my-3 ">
     <div class="col-md-12">
        <div class="text-center">
          <h4 class="title"><span>
            ' . $row['Title'] . '
          </span></h4>
        </div>
     </div>
     <div class="col-lg-12 col-md-12 md-mt-5">
    <p class="lead text-justify my-4">
    ' . $row['content'] . '
    </p>
        <img class="img-responsive img-thumbnail"  src="' . $ImagePath . '" alt=" ' . $row['Title'] . '">

     </div>
     
   </div>   
  </div>
 
</section>
         ';
                }

            }


            return $rigesterguid;

        }

    }

    /* get colleges & department*/
    function get_sector_menu($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlsector = "SELECT * FROM sector where  Is_Actieved='Yes' and lang_id='$lang_id' ";

        $resultsector = $this->query($sqlsector);

        $sector_menu = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {


                $sector_menu .= '

     <li class="nav-item">
                      <a href="#." class="nav-link dropdown-toggle" title = "' . $row['sector_name'] . '" >
                        <span class="menu-label">   
                          ' . $row['sector_name'] . ' 
                         </span>
                      </a>';
                $sector_id = $row['sector_id'];
                $sqlactivity = "SELECT * FROM activity where  Is_Actieved='Yes' and lang_id='$lang_id' and sector_id='$sector_id' ";
                $resultactivity = $this->query($sqlactivity);
                if ($resultactivity->num_rows > 0) {
                    $sector_menu .= '<ul class="dropdown-menu">';
                    while ($row = $resultactivity->fetch_assoc()) {
                        $sector_menu .= '<li class="nav-item">
                            <a href="company.php?lang=' . $this->lang . '&company=' . $row['activity_id'] . '" title = "' . $row['activity_name'] . '" > ' . $row['activity_name'] . '     </a>
                            </li>';
                    }
                    $sector_menu .= "</ul>";

                }
                $sector_menu .= '
                         
                    </li>
                  ';

            }


            return $sector_menu;

        }

    }
    /* get sectors */
    function get_sectoronly_menu($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlsector = "SELECT * FROM activity where  Is_Actieved='Yes' and lang_id='$lang_id'";

        $resultsector = $this->query($sqlsector);

        $sector_menu = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {


                $sector_menu .= '
                <li class="nav-item">
                    <a class="dropdown-item" href="company.php?lang=' . $this->lang . '&company=' . $row['activity_id'] . '" title = "' . $row['activity_name'] . '" > ' . $row['activity_name'] . '     </a>
                </li>
                ';

     
            }


            return $sector_menu;

        }

    }

    function get_products_menu($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        if ($lang_id == 1) {
            $ar_products = "منتجات";
            $eng_products = "";
        } else {
            $ar_products = "";
            $eng_products = "Products";
        }
        $sqlsector = "SELECT * FROM sector where  Is_Actieved='Yes' and lang_id='$lang_id' ";

        $resultsector = $this->query($sqlsector);

        $sector_menu = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {


                $sector_menu .= '
     <li class="nav-item">
                      <a href="#." class="nav-link dropdown-toggle" title = "' . $row['sector_name'] . '" >
                        <span class="menu-label">   
                          ' . $ar_products . ' ' . $row['sector_name'] . ' ' . $eng_products . ' 
                         </span>
                      </a>';
                $sector_id = $row['sector_id'];
                $sqlactivity = "SELECT * FROM activity where  Is_Actieved='Yes' and lang_id='$lang_id' and sector_id='$sector_id' ";
                $resultactivity = $this->query($sqlactivity);
                if ($resultactivity->num_rows > 0) {
                    $sector_menu .= '<ul class="dropdown-menu">';
                    while ($row = $resultactivity->fetch_assoc()) {
                        $sector_menu .= '<li class="nav-item">
                            <a href="products.php?lang=' . $this->lang . '&act=' . $row['activity_id'] . '" title = "' . $row['activity_name'] . '" > ' . $row['activity_name'] . '     </a>
                            </li>';
                    }
                    $sector_menu .= "</ul>";

                }
                $sector_menu .= '
                         
                    </li>
                  ';

            }


            return $sector_menu;

        }

    }
    function get_productsonly_menu($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        if ($lang_id == 1) {
            $ar_products = "منتجات";
           
        } else {
            
            $ar_products = "Products";
        }
        $sqlsector = "SELECT * FROM activity where  Is_Actieved='Yes' and lang_id='$lang_id'";

        $resultsector = $this->query($sqlsector);

        $sector_menu = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {


                $sector_menu .= '
                <li class="nav-item">
                    <a href="products.php?lang=' . $this->lang . '&act=' . $row['activity_id'] . '" title = "' . $row['activity_name'] . '" > '.$ar_products.' ' . $row['activity_name'] . '     </a>
                </li>';
               

            }


            

        }
        return $sector_menu;

    }

    function get_activity_logos($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlsector = "SELECT * FROM activity where  Is_Actieved='Yes' and lang_id='$lang_id' ";

        $resultsector = $this->query($sqlsector);

        $sector_menu = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $ccsG3 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['activity_img']);


                $sector_menu .= '
<div class="single-partner">
                            <img src="' . $ccsG3 . '" alt="' . $row['activity_name'] . '" title="' . $row['activity_name'] . '" style="width: 200px; height: 200px; background-color: #ffffff; border: 10px solid #ededef; padding: 10px;">
                        </div>';

            }


            return $sector_menu;

        }

    }
    function get_sectorsview($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlsector = "SELECT * FROM activity where  Is_Actieved='Yes' and lang_id='$lang_id'";

        $resultsector = $this->query($sqlsector);

        $sectors = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $ccsG3 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['activity_baner']);


                $sectors .= '
                <div class="col-md-4 col-xs-12 mb-3 px-2">
            <div class="service-item">
              <div class="service-images">
                <img class="img-fluid" src="' . $ccsG3 . '" alt="' . $row['activity_name'] . '">
                <div class="service-icon">
                <a href="company.php?lang=' . $this->lang . '&company=' . $row['activity_id'] . '" title="' . $row['activity_name'] . '">
                 <i class="fa fa-link"></i>
                </a>
                </div>
              </div>
              <div class="service-description">
              <a href="company.php?lang=' . $this->lang . '&company=' . $row['activity_id'] . '" title="' . $row['activity_name'] . '">
                <h4>' . $row['activity_name'] . '</h4>
                </a>
                 
              </div>
            </div>
          </div>';

            }


            return $sectors;

        }

    }


      function get_sectorsServesview($value = '',$company_id)
    {
        $cop_id=$company_id;
        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlsector = "SELECT * FROM category where   Is_Actieved='Yes' and lang_id='$lang_id' and activity_id='$cop_id' ORDER BY activity_id DESC limit 12";

        $resultsector = $this->query($sqlsector);

        $sectors = " ";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $ccsG3 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['category_img']);


                $sectors .= '
                <div class="col-md-4 col-xs-12 mb-3 px-2">
            <div class="service-item">
              <div class="service-images">
                <img class="img-fluid" src="' . $ccsG3 . '" alt="' . $row['category_name'] . '">
                <div class="service-icon">
                <a href="product_details.php?lang=' . $this->lang . '&company=' . $row['activity_id'] . '&product_id=' . $row['category_id'] . '">
                 <i class="fa fa-link"></i>
                </a>
                </div>
              </div>
              <div class="service-description">
              <a href="product_details.php?lang=' . $this->lang . '&company=' . $row['activity_id'] . '&product_id=' . $row['category_id'] . '">
                <h4>' . $row['category_name'] . '</h4>
                </a>
                 
              </div>
            </div>
          </div>';

            }


            return $sectors;

        }

    }


    /* get colleges & departments */
    function get_college_departments($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlcalleage = "SELECT * FROM calleage where  Is_Actieved='Yes' and lang_id='$lang_id' ";

        $resultcalleage = $this->query($sqlcalleage);

        $college_dep = " ";
        $i = 0;
        if ($resultcalleage->num_rows > 0) {

            while ($row = $resultcalleage->fetch_assoc()) {


                $college_dep .= '
                <div class="col-md-6">
          <p class="lead">
            <a href="colleg.php?lang=' . $this->lang . '&calleage_id=' . $row['calleage_id'] . '" title = "' . $row['calleage_name'] . '">
                ' . $row['calleage_name'] . '
              </a>
            
            
          </p>
          <p class="mr-2">
            ' . $this->langs['city'] . ' 
          </p>
          
          ';
                $calleage_id = $row['calleage_id'];
                $sqldepartment = "SELECT * FROM department where  Is_Actieved='Yes' and lang_id='$lang_id' and calleage_id='$calleage_id' ";
                $resultdepartment = $this->query($sqldepartment);
                if ($resultdepartment->num_rows > 0) {
                    $college_dep .= '<ul class="mr-5">';
                    while ($row = $resultdepartment->fetch_assoc()) {
                        $college_dep .= '<li>
              <a href="department.php?lang=' . $this->lang . '&department_id=' . $row['department_id'] . '" title = "' . $row['department_name'] . '">
               ' . $row['department_name'] . '
              </a>
            </li>';
                    }
                    $college_dep .= "</ul>";
                }
                $college_dep .= '    
                    </div>';

            }


            return $college_dep;

        }

    }

    /* GetSectorsRow */
    function GetSectorsRow($value = '', $sector = '')
    {
        $sectorcontent = array();
        if (is_numeric($value) && is_numeric($sector)) {
            $sector_id = $sector;
            $lang_id = $value;
        } else {
            $sector_id = 0;
            $lang_id = 0;
        }

        $sql = "SELECT * FROM sector where   Is_Actieved='Yes' and lang_id='$lang_id' and sector_id='$sector_id'  limit 1";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['sector_img']);
        $ccsG3 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['sector_baner']);
        $sectorcontent['sector_id'] = $row['sector_id'];
        $sectorcontent['sector_name'] = $row['sector_name'];
        $sectorcontent['sector_content'] = $row['sector_content'];
        $sectorcontent['sector_baner'] = $ccsG3;
        $sectorcontent['sector_img'] = $ccsG2;
        $sectorcontent['sector_email'] = $row['sector_email'];

        $sectorcontent['seo_description'] = $row['seo_description'];
        $sectorcontent['keyword'] = $row['keyword'];

        return $sectorcontent;
    }

    /* GetactivitysRow */
    function GetactivitysRow($value = '', $activity = '')
    {
        $activitycontent = array();
        if (is_numeric($value) && is_numeric($activity)) {
            $activity_id = $activity;
            $lang_id = $value;
        } else {
            $activity_id = 0;
            $lang_id = 0;
        }

        $sql = "SELECT * FROM activity where   Is_Actieved='Yes' and lang_id='$lang_id' and activity_id='$activity_id'  limit 1";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['activity_img']);
        $ccsG3 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['activity_baner']);
        $activitycontent['sector_id'] = $row['sector_id'];
        $activitycontent['activity_name'] = $row['activity_name'];
        $activitycontent['activity_short_desc'] = $row['activity_short_desc'];
        $activitycontent['activity_content'] = $row['activity_content'];
        $activitycontent['activity_baner'] = $ccsG3;
        $activitycontent['activity_img'] = $ccsG2;


        $activitycontent['seo_description'] = $row['seo_description'];
        $activitycontent['keyword'] = $row['keyword'];

        return $activitycontent;
    }

    /* GetprodactsRow */
    function GetprodactsRow($value = '', $prodacts = '')
    {
        $prodactcontent = array();
        if (is_numeric($value) && is_numeric($prodacts)) {
            $category_id = $prodacts;
            $lang_id = $value;
        } else {
            $category_id = 0;
            $lang_id = 0;
        }

        $sql = "SELECT * FROM category where   Is_Actieved='Yes' and lang_id='$lang_id' and category_id='$category_id'  limit 1";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['category_baner']);
        $ccsG3 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['category_img']);
        $prodactcontent['sector_id'] = $row['sector_id'];
        $prodactcontent['activity_id'] = $row['activity_id'];
        $prodactcontent['category_name'] = $row['category_name'];
        $prodactcontent['category_short_desc'] = $row['category_short_desc'];
        $prodactcontent['category_content'] = $row['category_content'];
        $prodactcontent['category_img'] = $ccsG3;
        $prodactcontent['category_baner'] = $ccsG2;


        $prodactcontent['seo_description'] = $row['seo_description'];
        $prodactcontent['keyword'] = $row['keyword'];

        return $prodactcontent;
    }

    /* GetprojectsRow */
    function GetprojectsRow($value = '', $project = '')
    {
        $projectcontent = array();
        if (is_numeric($value) && is_numeric($project)) {
            $project_id = $project;
            $lang_id = $value;
        } else {
            $project_id = 0;
            $lang_id = 0;
        }

        $sql = "SELECT * FROM project where   Is_Actieved='Yes' and lang_id='$lang_id' and project_id='$project_id'  limit 1";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['project_baner']);
        $ccsG3 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['project_img']);
        $projectcontent['sector_id'] = $row['sector_id'];
        $projectcontent['activity_id'] = $row['activity_id'];
        $projectcontent['project_name'] = $row['project_name'];
        $projectcontent['project_short_desc'] = $row['project_short_desc'];
        $projectcontent['project_content'] = $row['project_content'];
        $projectcontent['project_img'] = $ccsG3;
        $projectcontent['project_baner'] = $ccsG2;


        $projectcontent['seo_description'] = $row['seo_description'];
        $projectcontent['keyword'] = $row['keyword'];

        return $projectcontent;
    }

    /* GetdepartmentsRow */
    function GetdepartmentsRow($value = '', $depid = '')
    {
        $calleagecontent = array();
        if (is_numeric($value) && is_numeric($depid)) {
            $department_id = $depid;
            $lang_id = $value;
        } else {
            $department_id = 0;
            $lang_id = 0;
        }

        $sql = "SELECT * FROM department where   Is_Actieved='Yes' and lang_id='$lang_id' and department_id='$department_id'  limit 1";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['department_img']);
        $ccsG3 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['department_manger_img']);
        $departmentcontent['calleage_id'] = $row['calleage_id'];
        $departmentcontent['department_name'] = $row['department_name'];
        $departmentcontent['department_content'] = $row['department_content'];
        $departmentcontent['department_img'] = $ccsG2;
        $departmentcontent['department_email'] = $row['department_email'];
        $departmentcontent['department_manger'] = $row['department_manger'];
        $departmentcontent['department_manger_word'] = $row['department_manger_word'];
        $departmentcontent['department_manger_img'] = $ccsG3;
        $departmentcontent['department_manger_shortdisk'] = $row['department_manger_shortdisk'];
        $departmentcontent['department_manger_speasfic'] = $row['department_manger_speasfic'];
        $departmentcontent['department_manger_facebook'] = $row['department_manger_facebook'];
        $departmentcontent['department_manger_twitter'] = $row['department_manger_twitter'];
        $departmentcontent['department_manger_googleplus'] = $row['department_manger_googleplus'];
        $departmentcontent['department_manger_qualifications'] = $row['department_manger_qualifications'];

        $departmentcontent['seo_description'] = $row['seo_description'];
        $departmentcontent['keyword'] = $row['keyword'];
        return $departmentcontent;
    }

    /* get get_studyPlan_menu */
    function get_studyPlan_menu($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlregulations = "SELECT * FROM calleage_map where  Is_Actieved='Yes' and lang_id='$lang_id'";

        $resultregulations = $this->query($sqlregulations);

        $regulations_menu = " ";
        $i = 0;
        if ($resultregulations->num_rows > 0) {

            while ($row = $resultregulations->fetch_assoc()) {
                $mapPath = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['map_file']);
                $departmentmab_id = $row['department_id'];
                $sqldepartment = "SELECT * FROM department where  Is_Actieved='Yes' and lang_id='$lang_id' and department_id='$departmentmab_id' ";
                $resultdepartment = $this->query($sqldepartment);
                $row2 = $resultdepartment->fetch_assoc();

                $regulations_menu .= '
                <li>
                      <a href="' . $mapPath . '?lang=' . $this->lang . '" title = "' . $row['map_title'] . '" >
                        <span class="menu-label">   
                          ' . $row2['department_name'] . ' 
                         </span>
                      </a>

                    </li>
                  ';

            }


            return $regulations_menu;

        }

    }

    /* get get_electronicForms_menu */
    function get_electronicForms_menu($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlelectronicForms = "SELECT * FROM `filecallage` WHERE FileType='ElectronicForm'  and lang_id='$lang_id'";

        $resultregulations = $this->query($sqlelectronicForms);

        $electronicForm = " ";
        $i = 0;
        if ($resultregulations->num_rows > 0) {

            while ($row = $resultregulations->fetch_assoc()) {
                $FilePath = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['FilePaht']);


                $electronicForm .= '
                <li>
                      <a href="' . $FilePath . '?lang=' . $this->lang . '" title = "' . $row['FileName'] . '" >
                        <span class="menu-label">   
                          ' . $row['FileName'] . ' 
                         </span>
                      </a>

                    </li>
                  ';

            }


            return $electronicForm;

        }

    }

    /*  Ary-aboutfunction */
    function GetAboutSectionRow($value = '', $PostionAbout,$index)
    {

        $groupinfuin = "";
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }
        if ($lang_id == 1 && $index == 1) {
            $readmore = '<a href="about-us.php?lang=' . $this->lang . '">اقرأ المزيد</a>';
        } else if ($lang_id == 2 && $index == 1) {
            $readmore = '<a href="about-us.php?lang=' . $this->lang . '">Read More</a>';

        }
        else{
            $readmore = "";
        }


        $sql = "SELECT * FROM uin_info where   Is_Actieved='Yes' and lang_id='$lang_id' and PostionAbout='$PostionAbout' limit 1";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($index == 1) {
                $shortcontent = substr($row['content'], 0, 600);
            }
            else{
                $shortcontent = $row['content'];
            }

            $groupinfuin .= '<div class="section-title-left home-page-four-section-title">
                    <h2>' . $row['Title'] . '</h2>
                    <p class="text-justify">' . $shortcontent . '</p>
                    '.$readmore.'
                    
                </div>';
        }

        return $groupinfuin;

    }

  /*  Ary-aboutfunction */
    function GetAboutGroupRow($value = '', $PostionAbout)
    {

        $groupinfuin = "";
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }



        $sql = "SELECT * FROM uin_info where   Is_Actieved='Yes' and lang_id='$lang_id' and PostionAbout='$PostionAbout' limit 1";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $groupinfuin .= '
 <h4>' . $row['Title'] . '</h4>
                            <h2>' . $row['short_desc'] . '</h2>
                            </div>' . $row['content'] . '';
        }

        return $groupinfuin;

    }

    function get_more_about_group($value = '', $PostionAbout)
    {

        $groupinfuin = "";
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }


        $groupinfTab = " ";
        $imageset = "";
        $i = 1;
        $j = 1;
        $sql = "SELECT * FROM uin_info where   Is_Actieved='Yes' and lang_id='$lang_id' and PostionAbout='$PostionAbout' ORDER BY uininfo_id ASC ";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            $groupinfTab .= ' <ul id="tabs">';
            while ($row = $result->fetch_assoc()) {
                if($i == 1){
                    $current = "current";
                }
                else{
                    $current = "";
                }
                $groupinfTab .= '
                <li class="'.$current.' mb-5"><a href="#'.$i.'">' . $row['Title'] . '</a></li>';
                $i++;
            }
        }
        $sql2 = "SELECT * FROM uin_info where   Is_Actieved='Yes' and lang_id='$lang_id' and PostionAbout='$PostionAbout' ORDER BY uininfo_id ASC ";

        $result2 = $this->query($sql2);
        if ($result2->num_rows > 0) {
            $groupinfTab .= '</ul>     </div>
            </div>
            <div id="content">';
            while ($row2 = $result2->fetch_assoc()) {

                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row2['Image']);
                if ($row2['Image'] != "") {

                    $imageset .= '
             
     <img src="' . $ccsG2 . '" style="width:100%; " alt="' . $row2['Title'] . ' " title="' . $row2['Title'] . ' "/>
 

         ';
                } else {

                    $imageset = "";
                }
                if($j == 1){
                    $current = "current ";
                }
                else{
                    $current = "";
                }
                $groupinfTab .= '
                              
              
                <div id="'.$j.'"  class="'.$current.'content-wrapper animated"> 
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="company-text">
                             <h3>' . $row2['Title'] . '</h3>
                                <p>' . $row2['content'] . '</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="company-img">
                                ' . $imageset . '
                            </div>
                        </div>
                    </div>
                </div>';
                $imageset = "";
                $j++;
            }
            $groupinfTab .= '</div>';


        }
        return $groupinfTab;
    }
    /*  Why Us Title */
    function GetWhyUsRow($value = '', $PostionAbout)
    {

        $groupinfuin = "";
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }


        $sql = "SELECT * FROM uin_info where   Is_Actieved='Yes' and lang_id='$lang_id' and PostionAbout='$PostionAbout' limit 1";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $groupinfuin .= '
  <div class="section-title-left home-page-four-section-title">
                                <h4>' . $row['Title'] . '</h4>
                                <p>' . $row['content'] . '</p>
                                </div>';
        }

        return $groupinfuin;

    }

    /*  Ary-aboutallSectorsfunction */
    function GetAboutSectorsRow($value = '', $aboutall_Postion, $sector)
    {

        $groupinfuin = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }

        $sql = "SELECT * FROM about_all where   Is_Actieved='Yes' and lang_id='$lang_id' and aboutall_Postion='$aboutall_Postion' and sector_id='$sector' limit 1 ";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['aboutall_img']);
        $groupinfuin['Is_Actieved'] = $row['Is_Actieved'];
        $groupinfuin['activity_id'] = $row['activity_id'];
        $groupinfuin['category_id'] = $row['category_id'];
        $groupinfuin['project_id'] = $row['project_id'];
        $groupinfuin['aboutall_title'] = $row['aboutall_title'];
        $groupinfuin['aboutall_content'] = $row['aboutall_content'];
        $groupinfuin['type_img'] = $row['type_img'];
        $groupinfuin['aboutall_img'] = $ccsG2;
        //$groupinfuin['Is_visible'] =  $row['Is_visible'];


        return $groupinfuin;

    }


    /*  Ary-aboutallSectorsfunction */
    function GetAboutCompanyRow($value = '', $company_id)
    {

        $groupinfuin = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }

        $sql = "SELECT * FROM activity where   Is_Actieved='Yes' and lang_id='$lang_id' and activity_id='$company_id' limit 1 ";

        $result = $this->query($sql);
        $row = ($result && $result->num_rows > 0) ? $result->fetch_assoc() : null;
        $ccsG2 = ($row && !empty($row['activity_img'])) ? preg_replace('#^.*?(?:^|[/\\])uploads[/\\]#i', "uploads/", $row['activity_img']) : '';
        $ccsG1 = ($row && !empty($row['activity_baner'])) ? preg_replace('#^.*?(?:^|[/\\])uploads[/\\]#i', "uploads/", $row['activity_baner']) : '';
        $fields = array('Is_Actieved', 'activity_id', 'sector_id', 'activity_name', 'address', 'email', 'mobile', 'facebook', 'twitter', 'youtube', 'is_featured', 'activity_short_desc', 'mission', 'visoin', 'objective', 'activity_content', 'order_id', 'Is_visible', 'seo_description', 'keyword');
        foreach ($fields as $f) {
            $groupinfuin[$f] = $row[$f] ?? '';
        }
        $groupinfuin['activity_img'] = $ccsG2;
        $groupinfuin['activity_baner'] = $ccsG1;


        return $groupinfuin;

    }

    /*  Ary-aboutallSectorsfunction */
    function GetProductRow($value = '', $category_id)
    {

        $groupinfuin = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }

        $sql = "SELECT * FROM category where   Is_Actieved='Yes' and lang_id='$lang_id' and category_id='$category_id' limit 1 ";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['category_img']);
        $groupinfuin['Is_Actieved'] = $row['Is_Actieved'];
        $groupinfuin['category_id'] = $row['category_id'];
        $groupinfuin['activity_id'] = $row['activity_id'];
        $groupinfuin['sector_id'] = $row['sector_id'];
        $groupinfuin['category_name'] = $row['category_name'];
        $groupinfuin['category_short_desc'] = $row['category_short_desc'];
        $groupinfuin['category_content'] = $row['category_content'];
        $groupinfuin['category_imgs'] = $row['category_imgs'];
        $groupinfuin['is_featured'] = $row['is_featured'];
        $groupinfuin['category_img'] = $ccsG2;


        return $groupinfuin;

    }

    /*  get GetsectorVisionRow */
    function GetsectorVisionRow($value = '', $PostionAbout)
    {

        $groupinfuin = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }
        $vision = "";
        $active = "";
        $i = 0;
        $sql = "SELECT * FROM uin_info where   Is_Actieved='Yes' and lang_id='$lang_id' and PostionAbout='$PostionAbout'";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $vision .= '
<div class="single-testimoinal">
                        <h3>' . $row['Title'] . '</h3>
                        <p>' . $row['content'] . '</p>
                    </div>';


            }


            return $vision;

        }

    }

    /*  get GetfactsRow */
    function GetFactsRow($value = '', $PostionAbout)
    {

        $groupinfuin = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }
        $facts = "";
        $active = "";
        $i = 0;
        $sql = "SELECT * FROM uin_info where   Is_Actieved='Yes' and lang_id='$lang_id' and PostionAbout='$PostionAbout'";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['Image']);


                $facts .= '
<div class="col-lg-4 col-md-6">
                        <div class="single-service mb-30">
                            <i><img src="' . $ccsG2 . '"></i>
                            <span class="mr-3"> ' . $row['Title'] . ' </span>
                            <p>' . $row['content'] . '</p>
                           
                        </div>
                    </div>';


            }


            return $facts;

        }

    }

    /*  get Why us */
    function GetWhyUs($value = '', $PostionAbout)
    {

        $groupinfuin = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }
        $facts = "";
        $active = "";
        $i = 0;
        $sql = "SELECT * FROM uin_info where   Is_Actieved='Yes' and lang_id='$lang_id' and PostionAbout='$PostionAbout'";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['Image']);


                $facts .= '
 <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="choose-text-wrapper">
                                        <div class="choose-icon">
                            <img src="' . $ccsG2 . '" style="width: 40px">
                                        </div>
                                        <div class="choose-text">
                                            <h4>' . $row['Title'] . '</h4>
                                            <p class="text-justify">' . $row['content'] . '</p>
                                        </div>
                                    </div>
                                </div>';


            }


            return $facts;

        }

    }

    /*  get Why us */
    function GetIndexNews($value = '')
    {

        $groupinfuin = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }
        $facts = "";
        $more = "";

        if($lang_id == 1){
            $more = "اقرأ المزيد";
        }
        else{
            $more = "Read More";
        }
        $i = 0;
        $sql = "SELECT * FROM posts where   Is_Actieved='Yes' and lang_id='$lang_id' limit 4";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['fatured_image']);


                $facts .= '
                <div class="col-md-6 col-sm-12">
                        <div class="news-item item">
                <div class="single-blog">
                    <div class="blog-thumb">
                        <img src="'.$ccsG2.'" alt="' . $row['title'] . '" style="width: 100%;">
         
                    </div>
                    <div class="blog-meta-content text-center">
                        <div class="blog-meta mb-2">
                            <a href="blog-details.php?lang=' . $this->lang . '&post_id='.$row['post_id'].'"><i class="fa fa-calendar"></i>
                            ' . $row['creating_date'] . '
                            </a>
                            
                        </div>
                        <h2><a href="blog-details.php?lang=' . $this->lang . '&post_id='.$row['post_id'].'"> ' . $row['title'] . ' </a></h2>
                        <div class="blog-meta mt-3">
                            <a href="blog-details.php?lang=' . $this->lang . '&post_id='.$row['post_id'].'">
                                '.$more.' ...
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                    </div>
';


            }


            return $facts;

        }

    }

    function GetNews($value = '')
    {

        $groupinfuin = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }
        $facts = "";
        $more = "";

        if($lang_id == 1){
            $more = "اقرأ المزيد";
        }
        else{
            $more = "Read More";
        }
        $i = 0;
        $sql = "SELECT * FROM posts where   Is_Actieved='Yes' and lang_id='$lang_id' ORDER BY post_id DESC limit 10 ";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['fatured_image']);


                $facts .= '
                <div class="col-md-6 col-sm-12">
                        <div class="news-item item">
                <div class="single-blog">
                    <div class="blog-thumb">
                        <img src="'.$ccsG2.'" alt="' . $row['title'] . '" style="width: 100%;">
         
                    </div>
                    <div class="blog-meta-content text-center">
                        <div class="blog-meta mb-2">
                            <a href="blog-details.php?lang=' . $this->lang . '&post_id='.$row['post_id'].'"><i class="fa fa-calendar"></i>
                            ' . $row['creating_date'] . '
                            </a>
                            
                        </div>
                        <h2><a href="blog-details.php?lang=' . $this->lang . '&post_id='.$row['post_id'].'"> ' . $row['title'] . ' </a></h2>
                        <div class="blog-meta mt-3">
                            <a href="blog-details.php?lang=' . $this->lang . '&post_id='.$row['post_id'].'">
                                '.$more.' ...
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                    </div>';


            }


            return $facts;

        }

    }

    /* get Sectorsadvantages */
    function get_Sectorsadvantages($value = '', $sector)
    {


        $whr = "";
        if (is_numeric($value)) {
            $sector_id = $sector;

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }

        $sqlsector = "SELECT * FROM about_all where  Is_Actieved='Yes' and aboutall_Postion='Postion6' and lang_id='$lang_id' and sector_id='$sector_id'";

        $resultsector = $this->query($sqlsector);

        $advantages = " ";
        $shortcontent = " ";
        $img = "";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $mitionsImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['aboutall_img']);

                $shortcontent = substr($row['aboutall_content'], 0, 200);
                if ($row['type_img'] === 'icon') {
                    $img = '<i class="' . $mitionsImg . '"></i>';
                } else {
                    $img = '<img class="img-responsive w-100" src="' . $mitionsImg . '" alt="' . $row['aboutall_title'] . '">';
                }
                $advantages .= '

                <div class="col-sm-6 mt-3">
                  <div class="featured-item text-center p-0">
                    <div class="featured-icon"> 
                        ' . $img . '
                    </div>
                    <div class="featured-title text-uppercase">
                      <h5>
                      ' . $row['aboutall_title'] . '
                      </h5>
                    </div>
                    <div class="featured-desc">
                      <p>
                        ' . $shortcontent . '
                      </p>
                    </div>
                  </div>
                </div>
                ';


            }


            return $advantages;

        }

    }


    /* get Sectorsactivity */
    function get_Sectorsactivity($value = '', $sector = '')
    {


        $whr = "";
        if (is_numeric($value) and is_numeric($sector)) {

            $lang_id = $value;
            $sector_id = $sector;
            $whr = "  ";
        } else {
            $sector_id = 0;
            $lang_id = 0;
        }

        $sqlsector = "SELECT * FROM activity where   Is_Actieved='Yes' and is_featured='Yes' and lang_id='$lang_id' and sector_id='$sector_id'   limit 9";

        $resultsector = $this->query($sqlsector);

        $activitys = " ";
        $shortcontent = " ";
        $img = "";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $actImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['activity_img']);

                $shortcontent = substr($row['activity_short_desc'], 0, 200);

                $activitys .= '

      <div class="col-lg-4 col-md-6  mb-3">
        <div class="service-box">
          <div class="service-flip theme-bg">
          <div class="service-flip-images service-flip-front" data-bg-img="' . $actImg . '">
            <div class="service-flip-title mt-5">
              <h5>
                ' . $row['activity_name'] . '
              </h5>
            </div>
            
          </div>
          <div class="service-flip-desc service-flip-back dark-bg">
            <div class="service-flip-text">
              <h5 class="mb-5">
                  ' . $row['activity_name'] . ' 
              </h5>
              <p>
                 ' . $shortcontent . '
              </p> 
              <a class="btn-simple pull-left" href="activity.php?lang=' . $this->lang . '&act=' . $row['activity_id'] . '"> ' . $this->langs['redmore'] . '<i class="fas fa-arrow-left mr-2"></i></a>
            </div>
          </div>
          </div>
        </div>
      </div>
                ';


            }


            return $activitys;

        }

    }


    /* get Sectorsactivity li */
    function get_Sectorsactivityli($value = '', $sector = '')
    {


        $whr = "";
        if (is_numeric($value) and is_numeric($sector)) {

            $lang_id = $value;
            $sector_id = $sector;
            $whr = "  ";
        } else {
            $sector_id = 0;
            $lang_id = 0;
        }

        $sqlsector = "SELECT * FROM activity where   Is_Actieved='Yes' and is_featured='Yes' and lang_id='$lang_id' and sector_id='$sector_id'   limit 9";

        $resultsector = $this->query($sqlsector);

        $activitys = " ";
        $shortcontent = " ";
        $img = "";
        $i = 0;
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {


                $activitys .= '

              <li><a href="activity.php?lang=' . $this->lang . '&act=' . $row['activity_id'] . '"><i class="fas fa-angle-left"></i> ' . $row['activity_name'] . ' </a>
              </li> ';
            }
            return $activitys;
        }
    }

    /* get Sectors  products */
    function get_Sectorsactivityproducts($value = '', $sector = '')
    {


        $whr = "";
        if (is_numeric($value) and is_numeric($sector)) {

            $lang_id = $value;
            $sector_id = $sector;
            $whr = "  ";
        } else {
            $sector_id = 0;
            $lang_id = 0;
        }


        $prodacts = " ";
        $shortcontent = " ";
        $name = " ";
        $i = 0;
        $distition = '';

        $sqlprodacts = "SELECT * FROM category where   Is_Actieved='Yes' and is_featured='Yes' and lang_id='$lang_id' and sector_id='$sector_id' ";

        $resultprodacts = $this->query($sqlprodacts);
        if ($resultprodacts->num_rows > 0) {
            while ($row2 = $resultprodacts->fetch_assoc()) {
                $activity_id = $row2['activity_id'];
                $sqlactivity = "SELECT * FROM activity where   Is_Actieved='Yes' and is_featured='Yes' and lang_id='$lang_id' and activity_id='$activity_id'   limit 1";

                $resultactivity = $this->query($sqlactivity);

                $sqlsector = "SELECT * FROM sector where   Is_Actieved='Yes' and lang_id='$lang_id' and sector_id='$sector_id'  limit 1";

                $resultsector = $this->query($sqlsector);

                if ($resultactivity->num_rows > 0) {
                    $row = $resultactivity->fetch_assoc();
                    $name = $row['activity_name'];

                } else {
                    $row1 = $resultsector->fetch_assoc();
                    $name = $row1['sector_name'];

                }


                $distition = '
                  <a class="popup portfolio-link" target="_blank" href="category.php?lang=' . $this->lang . '&cat=' . $row2['category_id'] . '">
                  <i class="flaticon-broken-link-1"></i>
                  </a>';

                $prodImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row2['category_img']);

                $prodact_name = substr($row2['category_name'], 0, 60);


                $prodacts .= '
          <div class="item">
            <div class="portfolio-item">
              <img src="' . $prodImg . '" alt="' . $prodact_name . '">
              <div class="portfolio-hover">
                <div class="portfolio-title">
                <span>
                    ' . $name . '
                </span>
                  <h4> ' . $prodact_name . ' </h4>
                </div>
                <div class="portfolio-icon">
                  <a class="popup popup-img" href="' . $prodImg . '"> <i class="flaticon-magnifier"></i>
                  </a>
                  
                  ' . $distition . '
                </div>
              </div>
            </div>
          </div>

                ';


            }


            return $prodacts;

        }
    }

    /* get  activity products */
    function get_Sectorsactivityproduct($value = '', $sector = '', $act = '')
    {


        $whr = "";
        if (is_numeric($value) and is_numeric($sector)) {

            $lang_id = $value;
            $sector_id = $sector;
            $whr = "  ";
        } else {
            $sector_id = 0;
            $lang_id = 0;
        }
        $prodacts = " ";
        $shortcontent = " ";
        $name = " ";
        $i = 0;
        $distition = '';
        $sqlprodacts = "SELECT * FROM category where   Is_Actieved='Yes' and is_featured='Yes' and lang_id='$lang_id' and sector_id='$sector_id' and activity_id='$act'";

        $resultprodacts = $this->query($sqlprodacts);
        if ($resultprodacts->num_rows > 0) {
            while ($row2 = $resultprodacts->fetch_assoc()) {
                $activity_id = $act;
                $sqlactivity = "SELECT * FROM activity where   Is_Actieved='Yes' and is_featured='Yes' and lang_id='$lang_id' and activity_id='$activity_id'   limit 1";

                $resultactivity = $this->query($sqlactivity);

                $sqlsector = "SELECT * FROM sector where   Is_Actieved='Yes' and lang_id='$lang_id' and sector_id='$sector_id'  limit 1";

                $resultsector = $this->query($sqlsector);

                if ($resultactivity->num_rows > 0) {
                    $row = $resultactivity->fetch_assoc();
                    $name = $row['activity_name'];

                } else {
                    $row1 = $resultsector->fetch_assoc();
                    $name = $row1['sector_name'];

                }


                $distition = '
                  <a class="popup portfolio-link" target="_blank" href="category.php?lang=' . $this->lang . '&cat=' . $row2['category_id'] . '">
                  <i class="flaticon-broken-link-1"></i>
                  </a>';

                $prodImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row2['category_img']);

                $prodact_name = substr($row2['category_name'], 0, 60);


                $prodacts .= '
          <div class="item">
            <div class="portfolio-item">
              <img src="' . $prodImg . '" alt="' . $prodact_name . '">
              <div class="portfolio-hover">
                <div class="portfolio-title">
                <span>
                    ' . $name . '
                </span>
                  <h4> ' . $prodact_name . ' </h4>
                </div>
                <div class="portfolio-icon">
                  <a class="popup popup-img" href="' . $prodImg . '"> <i class="flaticon-magnifier"></i>
                  </a>
                  
                  ' . $distition . '
                </div>
              </div>
            </div>
          </div>

                ';


            }


            return $prodacts;

        }
    }


    /* get Sectors activity projects */
    function get_Sectorsactivityprojects($value = '', $sector = '')
    {


        $whr = "";
        if (is_numeric($value) and is_numeric($sector)) {

            $lang_id = $value;
            $sector_id = $sector;
            $whr = "  ";
        } else {
            $sector_id = 0;
            $lang_id = 0;
        }


        $projects = " ";
        $shortcontent = " ";
        $name = " ";
        $distition = '';
        $i = 0;

        $sqlprodacts = "SELECT * FROM project where   Is_Actieved='Yes' and is_featured='Yes' and lang_id='$lang_id' and sector_id='$sector_id' ";

        $resultprodacts = $this->query($sqlprodacts);
        if ($resultprodacts->num_rows > 0) {
            while ($row2 = $resultprodacts->fetch_assoc()) {
                $activity_id = $row2['activity_id'];
                $sqlactivity = "SELECT * FROM activity where   Is_Actieved='Yes' and is_featured='Yes' and lang_id='$lang_id' and activity_id='$activity_id'   limit 1";

                $resultactivity = $this->query($sqlactivity);

                $sqlsector = "SELECT * FROM sector where   Is_Actieved='Yes' and lang_id='$lang_id' and sector_id='$sector_id'  limit 1";

                $resultsector = $this->query($sqlsector);

                if ($resultactivity->num_rows > 0) {
                    $row = $resultactivity->fetch_assoc();
                    $name = $row['activity_name'];

                } else {
                    $row1 = $resultsector->fetch_assoc();
                    $name = $row1['sector_name'];

                }

                $distition = '
                  <a class="popup portfolio-link" target="_blank" href="project-details.php?lang=' . $this->lang . '&pro=' . $row2['project_id'] . '">
                  <i class="flaticon-broken-link-1"></i>
                  </a>';

                $prodImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row2['project_img']);

                $prodact_name = substr($row2['project_name'], 0, 60);


                $projects .= '
          <div class="item">
            <div class="portfolio-item">
              <img src="' . $prodImg . '" alt="' . $prodact_name . '">
              <div class="portfolio-hover">
                <div class="portfolio-title">
                <span>
                    ' . $name . '
                </span>
                  <h4> ' . $prodact_name . ' </h4>
                </div>
                <div class="portfolio-icon">
                  <a class="popup popup-img" href="' . $prodImg . '"> <i class="flaticon-magnifier"></i>
                  </a>
                  
                  ' . $distition . '
                </div>
              </div>
            </div>
          </div>

                ';


            }


            return $projects;

        }
    }

    /* get Sectors activity partners */
    function get_Sectorspartners($value = '', $sector = '')
    {


        $whr = "";
        if (is_numeric($value) and is_numeric($sector)) {

            $lang_id = $value;
            $sector_id = $sector;
            $whr = "  ";
        } else {
            $sector_id = 0;
            $lang_id = 0;
        }

        $partenrs = " ";
        $i = 0;

        $sqlpartenr = "SELECT * FROM partenrs where   Is_Actieved='Yes' and lang_id='$lang_id' and sector_id='$sector_id' order by order_id ";

        $resultpartenr = $this->query($sqlpartenr);
        if ($resultpartenr->num_rows > 0) {
            while ($row = $resultpartenr->fetch_assoc()) {


                $partenrsImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['logo']);


                $partenrs .= '

            <div class="col-md-4 mt-3">
              <div class="partnerlogo">
              <a href="' . $row['url'] . '">
              <img class="img-center" src="' . $partenrsImg . '" alt="' . $row['Name_Partenr'] . '" title="' . $row['Name_Partenr'] . '">
              </a>
             </div>
            </div>
          

                ';


            }


            return $partenrs;

        }
    }

    /* get  partners */
    function get_partners($value = '')
    {


        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;

            $whr = "  ";
        } else {
            $sector_id = 0;
            $lang_id = 0;
        }

        $partenrs = " ";
        $i = 0;

        $sqlpartenr = "SELECT * FROM partenrs where   Is_Actieved='Yes' and lang_id='$lang_id' order by order_id ";

        $resultpartenr = $this->query($sqlpartenr);
        if ($resultpartenr->num_rows > 0) {
            while ($row = $resultpartenr->fetch_assoc()) {


                $partenrsImg = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['logo']);


                $partenrs .= '

            <div class="col-md-2 mt-3">
              <div class="partnerlogo">
              <a href="' . $row['url'] . '">
              <img class="img-center" src="' . $partenrsImg . '" alt="' . $row['Name_Partenr'] . '" title="' . $row['Name_Partenr'] . '">
              </a>
             </div>
            </div>
          

                ';


            }


            return $partenrs;

        }
    }

    /* View_Imageprodacts */
    function getView_Imageprodacts($value = '', $value1 = '')
    {


        if (is_numeric($value) && is_numeric($value1)) {
            $category_id = $value;
            $lang_id = $value1;
        } else {
            $Image_id = 0;
            $lang_id = 0;
        }
        $sql = "SELECT * FROM category where  lang_id='$lang_id' and Is_Actieved='Yes' and category_id='$category_id'  ";

        $productsImgs = '';
        $result3 = $this->query($sql);
        $row1 = $result3->fetch_assoc();
        if ($result3->num_rows > 0) {

            $i = 0;
            $j = 0;


            $gellary1 = str_replace('["', " ", $row1['category_imgs']);
            $gellary2 = str_replace('"]', " ", $gellary1);
            $gellary3 = str_replace('"', " ", $gellary2);
            if ($gellary3 != "") {
                $sgallary = explode(",", $gellary3);
                if (count($sgallary) > 1) {
                    foreach ($sgallary as $key => $value) {

                        if ($value != "") {


                            $ccsG1 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $value);
                            $ccsG2 = str_replace(" ", "", $ccsG1);


                            $productsImgs .= '

          <div class="item">
            <img class="img-fluid w-100 " src="' . $ccsG2 . '" alt="' . $row1['category_name'] . '">
          </div>
                            ';

                        }
                    }


                }


            }


        }
        return $productsImgs;

    }

    /* View_Imageprojects */
    function getView_Imageprojects($value = '', $value1 = '')
    {


        if (is_numeric($value) && is_numeric($value1)) {
            $project_id = $value;
            $lang_id = $value1;
        } else {
            $project_id = 0;
            $lang_id = 0;
        }
        $sql = "SELECT * FROM project where  lang_id='$lang_id' and Is_Actieved='Yes' and project_id='$project_id' ";

        $projectsImgs = " ";
        $result3 = $this->query($sql);
        $row1 = $result3->fetch_assoc();
        if ($result3->num_rows > 0) {

            $i = 0;
            $j = 0;


            $gellary1 = str_replace('["', " ", $row1['project_imgs']);
            $gellary2 = str_replace('"]', " ", $gellary1);
            $gellary3 = str_replace('"', " ", $gellary2);
            if ($gellary3 != "") {
                $sgallary = explode(",", $gellary3);
                if (count($sgallary) > 1) {
                    foreach ($sgallary as $key => $value) {

                        if ($value != "") {


                            $ccsG1 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $value);
                            $ccsG2 = str_replace(" ", "", $ccsG1);


                            $projectsImgs .= '

          <div class="item">
            <img class="img-fluid w-100 " src="' . $ccsG2 . '" alt="' . $row1['project_name'] . '">
          </div>
                            ';

                        }
                    }


                }


            }


        }
        return $projectsImgs;

    }

    /*  Ary-FileGuides */
    function GetFileGuidesonRow($value = '', $FileType)
    {

        $FileGuides = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }

        $sql = "SELECT * FROM filecallage where lang_id='$lang_id' and FileType='$FileType'  limit 1";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $file = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['FilePaht']);
        $FileGuides['FileName'] = $row['FileName'];
        $FileGuides['FilePaht'] = $file;


        return $FileGuides;

    }

    /* Getaccreditation as one item (arry) */
    function Getcateagory_post($value = '', $catpost_id)
    {

        $cateagory_post = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }

        $sql = "SELECT * FROM cateagory_post where   Is_Actieved='Yes' and lang_id='$lang_id' and catpost_id='$catpost_id'  limit 1";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();

        $cateagory_post['catpost_title'] = $row['catpost_title'];


        return $cateagory_post;

    }

    /* get get_studyPlanAll */
    function get_studyPlanAll($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlstudyPlans = "SELECT * FROM `calleage_map` WHERE lang_id='$lang_id'";

        $resultstudyPlans = $this->query($sqlstudyPlans);

        $studyPlans = " ";
        $i = 0;
        if ($resultstudyPlans->num_rows > 0) {

            while ($row = $resultstudyPlans->fetch_assoc()) {
                $map_img = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['map_img']);
                $map_file = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['map_file']);

                $studyPlans .= '
                     <div class="col-lg-4 col-md-12  my-3">
                     <img class="img-fluid" src="' . $map_img . '" alt="' . $row['map_title'] . '">
                        <h6 class="px-5 py-3 box">
                          <i class="fa fa-book"></i>
                            ' . $row['map_title'] . ' -
                         <span class="">
                                ' . $this->langs['Download'] . '  : <a href="' . $map_file . '" target="_blank"> <i class="fa fa-download"></i></a>
                         </span>
                        </h6>
                    </div>
                  ';

            }


            return $studyPlans;

        }

    }

    //------------------------------------------------
    /* */
    /* GetdepartmentsRow */
    function Get_featured_departments($lang_id, $lang, $languagedictionary)
    {
        $sectiondepartment = '';
        $calleagecontent = array();
        if (is_numeric($lang_id)) {

            $lang_id = $lang_id;
        } else {

            $lang_id = 0;
        }


        $sql = "SELECT * FROM department where   Is_Actieved='Yes' and is_featured='Yes' and lang_id='$lang_id'   limit 8";
        $result = $this->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['department_icon']);
                $redamore = $languagedictionary['redmore'];
                $shortcontent = substr($row['department_short_desc'], 0, 270);
                $sectiondepartment .= '
<div class="col-lg-4 col-md-6  mb-3">
        <div class="service-box">
          <div class="service-flip theme-bg">
          <div class="service-flip-images service-flip-front" data-bg-img="' . $ccsG2 . '">
            <div class="service-flip-title mt-5">

              <h5> ' . $row['department_name'] . '</h5>
            </div>
            
          </div>
          <div class="service-flip-desc service-flip-back">
            <div class="service-flip-text">
              <h5 class="mb-5"> ' . $row['department_name'] . '</h5>
              <p>
                ' . $shortcontent . '
              </p> 
              <a class="btn-simple pull-left" href="department.php?lang=' . $lang . '&department_id=' . $row['department_id'] . '"> ' . $redamore . '<i class="fas fa-arrow-left mr-2"></i></a>
            </div>
          </div>
        </div>
      </div>
      </div>';


            }
        }
        return $sectiondepartment;
    }


    /* getcontent_cateagory_post  */
    public function getcontent_cateagory_post($value = '', $catpost_id)
    {
        $content_cateagory = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }

        if ($lang_id == 1) {
            $dir = "right";
            $dir2 = "left";
            $redmore = " اقراء المزيد ";
        } else {
            $dir = "left";
            $dir2 = "right";
            $redmore = " Read more ";
        }

        $sql = "SELECT * FROM post where   Is_Actieved='Yes' and lang_id='$lang_id' and catpost_id='$catpost_id' order by 'post_id' desc limit 3";

        $result = $this->query($sql);

        $content_cateagory = " ";
        switch ($catpost_id) {
            case 1 :
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $sss = filter_var($row['post_content'], FILTER_SANITIZE_STRING);


                        $substcontent = substr($sss, 0, 150);
                        $resultsub = substr($substcontent, 0, strrpos($substcontent, ' '));
                        $resultsub .= " ....";
                        $substitle = substr($row['post_title'], 0, 150);
                        $resultitle = substr($substitle, 0, strrpos($substitle, ' '));

                        $content_cateagory .= '
                        <div id="ConferencesEvents_slider" class="owl-carousel owl-theme wow fadeInUp">
                            <div class="item paddingrow">
                              <div class="row">
                                  <div class="col-md-12" >
                                      
                                      <img class="img-responsive img-thumbnail" src="' . $row['post_img'] . '" alt="' . $row['post_title'] . '">
                                      <h6 class="alt-color">
                                      ' . $row['creating_date'] . '
                                      </h6>
                                  </div>
                                  <div class="col-md-12">
                                    <h4 class="main-color">
                                    ' . $resultitle . '
                                    </h4>
                                      
                                      <p>
                                        ' . $resultsub . '
                                      </p>
                                      <a class="text-more-info text-whight secand ' . $dir2 . '" href="news-ditls.php?lang=' . $this->lang . '&post_id=' . $row['post_id'] . '">
                                       ' . $redmore . ' 
                                      </a> 
                                  </div>
                              </div>
                          </div>
                        </div>
                        ';
                    }
                }
                break;
            case 2 :
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        $substitle = substr($row['post_title'], 0, 300);
                        $resultitle = substr($substitle, 0, strrpos($substitle, ' '));
                        $content_cateagory .= '
                        <div id="Advertisement_slider" class="owl-carousel owl-theme wow fadeInUp">
                
                <div class="item paddingrow">
                  <div class="row">
                      <div class="col-md-12" >
                          
                          <img class="img-responsive img-thumbnail" src="' . $row['post_img'] . '" alt="' . $row['post_title'] . '">
                          <div class="row"> 
                                <div class="col-md-8">
                                  <h4 class="pt-3"><a href="advertisement.php?lang=' . $this->lang . '"> <img src="uploads/new-02.gif" class="new-icon"> 
                                  ' . $substitle . '
                                    </a></h4>
                                </div>
                                <div  class="col-md-4">
                                  <h6 class="pull-' . $dir2 . ' pt-4"> 
                                  ' . $row['creating_date'] . '
                                   </h6>
                                </div>
                                </div>
                          
                      </div>
                      
                  </div>
              </div>
                


              </div>
                        ';
                    }
                }
                break;
            case 3 :
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $substitle = $row['post_title'];
                        $resultitle = substr($substitle, 0, strrpos($substitle, ' '));
                        $content_cateagory .= '
                        <div class="col-md-4 img-thumbnail" style="margin-bottom: 3rem;">
                            <div class="event">
                                <div class="date-box">
                                    <p class="text-secand">' . date('d', strtotime($row['creating_date'])) . '
                                    <br>
                                    ' . date('F', strtotime($row['creating_date'])) . '
                                    </p>
                                </div>
                                <div class="event-box">
                                    <p class="main-color"><a href="#">
                                    ' . $row['post_title'] . '
                                    </a></p>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                }
                break;
            case 4 :
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $sss = filter_var($row['post_content'], FILTER_SANITIZE_STRING);


                        $substcontent = substr($sss, 0, 250);
                        $resultsub = substr($substcontent, 0, strrpos($substcontent, ' '));
                        $resultsub .= " ....";
                        $substitle = substr($row['post_title'], 0, 150);
                        $resultitle = substr($substitle, 0, strrpos($substitle, ' '));
                        $content_cateagory .= '
                        <div id="news_slidermaipeag" class="owl-carousel owl-theme wow fadeInUp">
                
               
                 
                <div class="item ">
                  <div class="row">
                      <div class="col-md-4" >
                          
                          <img class="img-responsive img-thumbnail" src="uploads/College2.jpg">
                          
                      </div>
                      <div class="col-md-8">
                        <h4 class="main-color">
                            ' . $substitle . '
                        </h4>
                          <h6 class="alt-color">
                            ' . $row['creating_date'] . '
                          </h6>
                          <p>
                            ' . $resultsub . '
                          </p>
                          <a class="text-more-info text-whight secand ' . $dir2 . ' pt-4" href="news-ditls.php?lang=' . $this->lang . '&post_id=' . $row['post_id'] . '"> 
                          ' . $redmore . ' 
                           </a> 
                      </div>
                  </div>
              </div>


              </div>
                        ';
                    }
                }
                break;
            default:
                # code...
                break;
        }

        return $content_cateagory;
    }

    /* features uin */
    function get_features_home($value = '')
    {
        if (is_numeric($value)) {

            $lang_id = $value;

        } else {

            $lang_id = 0;
        }
        if ($lang_id == 1) {
            $dir2 = "right";
        } else {
            $dir2 = "left";
        }
        $sql = "SELECT * FROM features where  Is_Actieved='Yes' and lang_id='$lang_id' limit 20 ";

        $result = $this->query($sql);

        $features = " ";
        $i = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $features .= '
                <div class="col-md-3 col-sm-6 mt-5">
                    <div class="featured-item text-center p-0">
                      <div class="featured-icon"> <i class="' . $row['Features_img'] . ' text-theme"></i>
                      </div>
                      <div class="featured-title text-uppercase">
                        <h5> ' . $row['Features_title'] . '</h5>
                      </div>
                      <div class="featured-desc">
                        <p>
                          ' . substr($row['Features_content'], 0, 250) . '
                        </p>
                      </div>
                    </div>
                  </div>

                ';
            }

            return $features;
        }
    }

    /* useful_links */

    function getuseful_links($value = '')
    {
        if (is_numeric($value)) {

            $lang_id = $value;

        } else {

            $lang_id = 0;
        }
        $sql = "SELECT * FROM links where  Is_Actieved='Yes' and lang_id='$lang_id' ";

        $result = $this->query($sql);

        $useful_links = " ";
        $i = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $useful_links .= '
                <div class="col-xs-12 col-sm-4 col-md-4  ">
                    <div class="boxlink mb-3">
                      <a href="#">
                        <div class="text-center icons">
                          <img class="img-responsive center-block " src="' . $row['Links_img'] . '" alt="' . $row['Links_title'] . '">
                        </div>
                        <div class="link_text text-center">
                            
                          <p class=" primary-color"> <a href="' . $row['Links_url'] . '">  ' . $row['Links_title'] . '   </a></p>
                        </div>
                      </a>
                    </div>
                </div>
                ';
            }
        }
        return $useful_links;
    }

    /* getImageGallary */
    function getImageGallary($value = '')
    {
        if (is_numeric($value)) {

            $lang_id = $value;

        } else {

            $lang_id = 0;
        }
        if ($lang_id == 1) {
            $dir = "right";
            $dir2 = "left";
        } else {
            $dir = "left";
            $dir2 = "right";
        }
        $sql = "SELECT * FROM image_gellary where  Is_Actived='Yes' and lang_id='$lang_id' ";

        $result = $this->query($sql);

        $ImageGallary = " ";
        $i = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['futuer_Image']);
                $ImageGallary .= '
                <div class="col-md-4">
                    <div class="text-center  img-thumbnail my-3">
                      <a href="album.php?cat=' . $row['Image_id'] . '&lang=' . $this->lang . '">
                      <div class="team-images">
                        <img class="img-fluid" src="' . $ccsG . '" alt="' . $row['titles'] . '" title="' . $row['titles'] . '">
                      </div>
                      <div class="team_detail text-center my-3">
                        <h6 class="text-uppercase mb-0">
                         ' . $row['titles'] . '
                        </h6>
                      </div>
                      </a>
                    </div>
                  </div>
                ';
            }
        }
        return $ImageGallary;
    }

    /* get name albom */

    function getDetailimage($value = '', $value1 = '')
    {


        if (is_numeric($value) && is_numeric($value1)) {
            $Image_id = $value;
            $lang_id = $value1;
        } else {
            $Image_id = 0;
            $lang_id = 0;
        }
        $sql = "SELECT * FROM image_gellary where  Is_Actived='Yes' and Image_id='$Image_id' and lang_id = '$lang_id' ";

        $namebrand = " ";
        $result3 = $this->query($sql);
        $Detailimage = array();
        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {

                $Detailimage['titles'] = $row['titles'];
                $Detailimage['Image_id'] = $row['Image_id'];
                $Detailimage['futuer_Image'] = $row['futuer_Image'];


            }


            return $Detailimage;
        }


    }

    function get_gallery_filter($value = '')
    {


        if (is_numeric($value)) {

            $lang_id = $value;
        } else {
            $lang_id = 0;
        }

        $sqlcolleg = "SELECT * FROM image_gellary WHERE lang_id='$lang_id' order by Image_id ASC limit 4";

        $resultsector = $this->query($sqlcolleg);

        $get_new_images = "";
        if ($resultsector->num_rows > 0) {

            while ($row = $resultsector->fetch_assoc()) {
                $get_new_images .= '
                            <li class="filter" data-filter=".cat_' . $row['Image_id'] . ' ">' . $row['titles'] . ' </li>';

            }


            return $get_new_images;

        }


    }

    function get_gallery_items($value = '')
    {


        if (is_numeric($value)) {
            $lang_id = $value;
        } else {
            $lang_id = 1;
        }
        $more = "";

        if ($lang_id == 1) {
            $more = "تعرف علينا أكثر";
        } else {
            $more = "Get to know us more";

        }

        $sqlcolleg = "SELECT * FROM image_gellary where lang_id='$lang_id' order by Image_id ASC limit 4";

        $resultsector = $this->query($sqlcolleg);


        $Image_Gallery = " ";

        while ($row1 = $resultsector->fetch_assoc()) {
            $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row1['futuer_Image']);
            if ($resultsector->num_rows > 0) {

                $i = 0;


                $gellary1 = str_replace('["', " ", $row1['Gellary']);
                $gellary2 = str_replace('"]', " ", $gellary1);
                $gellary3 = str_replace('"', " ", $gellary2);
                if ($gellary3 != "") {
                    $sgallary = explode(",", $gellary3);
                    if (count($sgallary) > 1) {
                        foreach ($sgallary as $key => $value) {
                            if ($i < 3) {

                                if ($value != "") {


                                    $ccsG1 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $value);
                                    $ccsG2 = str_replace(" ", "", $ccsG1);


                                    $Image_Gallery .= ' 
                                     <div class="col-lg-4 col-md-6 mix cat_' . $row1['Image_id'] . '"> 
                        <div class="single-projects">
                            <img src="' . $ccsG2 . '"  style="width: 100%; height: 300px !important;">
                        </div>
                    </div>';
                                    $i++;
                                }
                            }

                        }


                    }


                }

            }
        }
        return $Image_Gallery;

    }


    /* View_ImageGallary */
    function getView_ImageGallary($value = '', $value1 = '')
    {


        if (is_numeric($value) && is_numeric($value1)) {
            $Image_id = $value;
            $lang_id = $value1;
        } else {
            $Image_id = 0;
            $lang_id = 0;
        }
        $sql = "SELECT * FROM image_gellary where  lang_id='$lang_id' and Is_Actived='Yes' and Image_id='$Image_id'  ";

        $Image_Gallery = " ";
        $result3 = $this->query($sql);
        $row1 = $result3->fetch_assoc();
        $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row1['futuer_Image']);
        $Image_Gallery .= '
                 
';
        if ($result3->num_rows > 0) {

            $i = 0;
            $j = 0;


            $gellary1 = str_replace('["', " ", $row1['Gellary']);
            $gellary2 = str_replace('"]', " ", $gellary1);
            $gellary3 = str_replace('"', " ", $gellary2);
            if ($gellary3 != "") {
                $sgallary = explode(",", $gellary3);
                if (count($sgallary) > 1) {
                    foreach ($sgallary as $key => $value) {

                        if ($value != "") {


                            $ccsG1 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $value);
                            $ccsG2 = str_replace(" ", "", $ccsG1);


                            $Image_Gallery .= '
<div class="col-md-6 col-sm-6 col-lg-4 fadeIn" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="img-thumbnail mb-5 mx-auto" style="max-width: 350px;">
                                <a href="' . $ccsG2 . '" data-fancybox="gallery" title="' . $row1['titles'] . '"><img
                                        src="' . $ccsG2 . '" alt="msn-img1.jpg" style="width: 100%; height: 300px;"></a>
                            </div>
                        </div> ';

                        }
                    }


                }


            }


        }
        return $Image_Gallery;

    }

    /* vedio gallary */
    function getVedioGallary($value = '')
    {


        if (is_numeric($value)) {

            $lang_id = $value;
        } else {
            $lang_id = 0;
        }
        $sql = "SELECT * FROM vedio_gellary where lang_id='$lang_id' and Is_Actived='Yes' ";

        $vedio_Gallery = " ";

        $result3 = $this->query($sql);

        if ($result3->num_rows > 0) {


            while ($row = $result3->fetch_assoc()) {

                $url = str_replace("watch?v=", "embed/", $row['url']);
                if ($row['location'] == 'youtube') {

                    $vedio_Gallery .= ' 
                    <div class="col-md-6">
        <div class="text-center  img-thumbnail my-3">  
          <div class="team-images">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="100%" height="355" src="' . $url . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              
            </div>
          </div>
          <div class="team_detail text-center my-3">
            <h6 class="text-uppercase mb-0">
              ' . $row['titles'] . '
            </h6>
          </div> 
        </div>
      </div>
              ';
                } else {

                    $vedio_Gallery = '
                    <div class="col-md-6">
        <div class="text-center  img-thumbnail my-3">  
          <div class="team-images">
            <video width="100%" height="300" controls >
              <source src="' . $url . '" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
          <div class="team_detail text-center my-3">
            <h6 class="text-uppercase mb-0">
              ' . $row['titles'] . '
            </h6>
          </div> 
        </div>
      </div>
                    
                       
                 ';


                }

            }


            return $vedio_Gallery;
        }


    }

    /* getAdvertisement */
    function getAdvertisement($value = '', $lang, $languagedictionary)
    {
        if (is_numeric($value)) {

            $lang_id = $value;

        } else {

            $lang_id = 0;
        }
        if ($lang_id == 1) {
            $dir = "right";
            $dir2 = "left";
        } else {
            $dir = "left";
            $dir2 = "right";
        }
        $sql = "SELECT * FROM post where  Is_Actieved='Yes' and lang_id='$lang_id' and catpost_id=2 order by post_id desc limit 10";

        $result = $this->query($sql);

        $Advertisement = " ";
        $i = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['post_img']);
                $redamore = $languagedictionary['redmore'];
                $Advertisement .= '

                <div class="item">
                    <div class="post">
                      <div class="post-image">
                        <img src="' . $ccsG . '" alt="' . $row['post_title'] . '" title="' . $row['post_title'] . '" class="height250">
                        <div class="post-date">
                            <i class="fa fa-calendar"></i>
                            ' . $row['creating_date'] . '
                        </div>
                      </div>
                      <div class="post-desc">
                        <div class="post-title">
                          <h5><a href="advertisementDetails.php?cat=' . $row['post_id'] . '&lang=' . $this->lang . '">
                            ' . $row['post_title'] . '
                          </a></h5>
                        </div>
                        
                      </div>
                      <div class="post-bottom">
                        <div class="post-meta">
                          <ul class="list-inline">
                            <li><i class="fa fa-eye"></i></li>
                            <li>20</li>
                          </ul>
                        </div> <a class="post-btn" href="advertisementDetails.php?cat=' . $row['post_id'] . '&lang=' . $this->lang . '">' . $redamore . ' <i class="mr-2 fas fa-long-arrow-alt-' . $dir2 . '"></i></a>
                      </div>
                    </div>
                  </div>

                
                ';
            }
        }
        return $Advertisement;
    }

    /*  Ary-GetAdvertise_details */
    function GetAdvertise_detailsRow($value = '', $post_id)
    {

        $Advertise_details = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }

        $sql = "SELECT * FROM post where   Is_Actieved='Yes' and lang_id='$lang_id' and post_id='$post_id' limit 1";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['post_img']);

        $Advertise_details['post_title'] = $row['post_title'];
        $Advertise_details['creating_date'] = $row['creating_date'];
        $Advertise_details['post_content'] = $row['post_content'];
        $Advertise_details['post_img'] = $ccsG2;

        return $Advertise_details;

    }

    /* getLatest_ads */
    function getLatest_news($value = '')
    {
        if (is_numeric($value)) {

            $lang_id = $value;

        } else {

            $lang_id = 0;
        }
        if ($lang_id == 1) {
            $dir = "right";
            $dir2 = "left";
        } else {
            $dir = "left";
            $dir2 = "right";
        }
        $sql = "SELECT * FROM posts where  Is_Actieved='Yes' and lang_id='$lang_id' order by post_id desc limit 10";

        $result = $this->query($sql);

        $Latest_ads = " ";
        $i = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['fatured_image']);
                $Latest_ads .= '
 <li>
                                <div class="recent-post-thumb">
                                    <a href="news-details.php?lang=' . $this->lang . '&post_id=' . $row['post_id'] . '">
                                        <img src="'.$ccsG.'" alt="' . $row['title'] . '">
                                    </a>
                                </div>

                                <div class="recent-post-content">
                                    <h3><a href="news-details.php?lang=' . $this->lang . '&post_id=' . $row['post_id'] . '">' . $row['title'] . '</a></h3>
                                    <span class="date">' . $row['creating_date'] . '</span>
                                </div>
                            </li>';
            }
        }
        return $Latest_ads;
    }

    /* getLatest_ads */
    function get_news_details($value = '',$post_id)
    {
        if (is_numeric($value)) {

            $lang_id = $value;

        } else {

            $lang_id = 0;
        }
        if ($lang_id == 1) {
            $dir = "right";
            $dir2 = "left";
        } else {
            $dir = "left";
            $dir2 = "right";
        }
        $sql = "SELECT * FROM posts where  Is_Actieved='Yes' and lang_id='$lang_id' and post_id = '$post_id' order by post_id desc limit 10";

        $result = $this->query($sql);

        $Latest_ads = " ";
        $i = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['fatured_image']);
                $Latest_ads .= '
 <div class="single-blogs">
                    <div class="blog-img">
                        <img src="'.$ccsG.'" alt="' . $row['title'] . '" style="width: 100%;">
                        <div class="post-date">
                            <span class="date"><i class="fa fa-calendar"></i> </span>
                            <p>' . $row['creating_date'] . '</p>
                        </div>
                    </div>
                </div>
                <div class="blog-details-text-2 mt-3">
                    <h2>' . $row['title'] . '</h2>
                    <p>' . $row['content'] . '</p>
                                    </div>';
            }
        }
        return $Latest_ads;
    }

    function getImageGallarycata($value = '')
    {


        if (is_numeric($value)) {
            $lang_id = $value;

        } else {

            $lang_id = 1;
        }
        if ($lang_id == 1) {
            $view = "عرض صور الألبوم";

        } else {

            $view = "View Album Photoes";
        }

        $sqlcolleg = "SELECT * FROM image_gellary where lang_id='$lang_id' and Is_Actived='Yes'";

        $resultsector = $this->query($sqlcolleg);
        $Image_Gallery = "";
        if ($resultsector->num_rows > 0) {


            while ($row = $resultsector->fetch_assoc()) {

                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['futuer_Image']);

                $Image_Gallery .= '
 <div class="gallery-item   col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <div class="inner-box" style="border: 2px solid #dddddd;">
                        <div class="image">
                            <img src="' . $ccsG . '" alt="' . $row['titles'] . '" title="' . $row['titles'] . '" style="height: 300px; width: 100%">
                            <div class="overlay-box py-3">
                                <div class="content px-2">
                                    <h4 class="text-center"><a href="view-photo-gellary.php?cat=' . $row['Image_id'] . '&lang=' . $this->lang . '" class="text-center text-dark">' . $row['titles'] . '</a></h4>
                                </div>
                                <p class="p-2 mt-3 text-center" style="background: #0000fc;"><a href="view-photo-gellary.php?cat=' . $row['Image_id'] . '&lang=' . $this->lang . '" class="text-white">' . $view . '</a></p>
                            </div>
                        </div>
                    </div>
                </div>';


            }


            return $Image_Gallery;
        }


    }


    /* getlastnews */
    function getlastnews($value = '', $lang, $languagedictionary)
    {
        if (is_numeric($value)) {

            $lang_id = $value;

        } else {

            $lang_id = 0;
        }
        if ($lang_id == 1) {
            $dir = "right";
            $dir2 = "left";
            $redmore = " اقراء المزيد ";
        } else {
            $dir = "left";
            $dir2 = "right";
            $redmore = " Read more ";
        }
        $sql = "SELECT * FROM post where  Is_Actieved='Yes' and lang_id='$lang_id' and  catpost_id=1 order by post_id desc limit 10";

        $result = $this->query($sql);

        $news = " ";
        $i = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['post_img']);
                $redamore = $languagedictionary['redmore'];
                $substitle = substr($row['post_title'], 0, 200);
                $resultitle = substr($substitle, 0, strrpos($substitle, ' '));
                $subscontent = substr($row['post_content'], 0, 250);
                $resulcontent = substr($subscontent, 0, strrpos($subscontent, ' '));
                $news .= '
                <div class="item">
            <div class="post">
              <div class="post-image">
                <img src="' . $ccsG . '" alt="' . $resultitle . '" class="height250">
                <div class="post-date">
                    <i class="fa fa-calendar"></i>
                    ' . $row['creating_date'] . '
                </div>
              </div>
              <div class="post-desc">
                <div class="post-title">
                  <h5><a href="blogDetails.php?lang=' . $lang . '&cat=' . $row['post_id'] . '">' . $resultitle . '</a></h5>
                </div>
                <p>
                 ' . $resulcontent . '
                </p>
              </div>
              <div class="post-bottom">
                <div class="post-meta">
                  <ul class="list-inline">
                    <li><i class="fa fa-eye"></i></li>
                    <li>20</li>
                  </ul>
                </div> <a class="post-btn" href="blogDetails.php?lang=' . $lang . '&cat=' . $row['post_id'] . '">' . $redamore . ' <i class="mr-2 fas fa-long-arrow-alt-' . $dir2 . '"></i></a>
              </div>
            </div>
          </div>
                
                
                ';
            }
        }
        return $news;
    }



    /*  Ary-Getnews_detailsRow */
    function Getnews_detailsRow($value = '', $post_id)
    {

        $news_details = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }

        $sql = "SELECT * FROM post where   Is_Actieved='Yes' and lang_id='$lang_id' and post_id='$post_id' limit 1";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['post_img']);

        $news_details['post_title'] = $row['post_title'];
        $news_details['creating_date'] = $row['creating_date'];
        $news_details['post_content'] = $row['post_content'];
        $news_details['post_img'] = $ccsG2;

        return $news_details;

    }

    /* View_post_img */
    function getView_post_img($value = '', $post_id = '', $catpost_id = '')
    {


        if (is_numeric($value) && is_numeric($post_id) && is_numeric($catpost_id)) {
            $post_id = $post_id;
            $catpost_id = $catpost_id;
            $lang_id = $value;
        } else {
            $post_id = 0;
            $lang_id = 0;
        }
        $sql = "SELECT * FROM post where   Is_Actieved='Yes' and lang_id='$lang_id' and post_id='$post_id' and catpost_id=$catpost_id ";

        $post_Gallery = " ";
        $result3 = $this->query($sql);
        $row1 = $result3->fetch_assoc();
        $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row1['post_galary']);
        $post_Gallery .= '';
        if ($result3->num_rows > 0) {


            $gellary1 = str_replace('["', " ", $row1['post_galary']);
            $gellary2 = str_replace('"]', " ", $gellary1);
            $gellary3 = str_replace('"', " ", $gellary2);
            if ($gellary3 != "") {
                $sgallary = explode(",", $gellary3);
                if (count($sgallary) > 1) {
                    foreach ($sgallary as $key => $value) {

                        if ($value != "") {


                            $ccsG1 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $value);
                            $ccsG2 = str_replace(" ", "", $ccsG1);


                            $post_Gallery .= ' 
                            <div class="news-item item">
                              <div class="blog-box">
                                  <div class="blog-img">
                                    <a data-fancybox="gallery"  href="' . $ccsG2 . '" title="' . $row1['post_title'] . '" >
                                    <img src="' . $ccsG2 . '" alt="' . $row1['post_title'] . '" class="img-responsive height175">
                                    </a>
                                  </div>             
                              </div>
                            </div>
                            
                            ';

                        }
                    }


                }


            }


        }
        return $post_Gallery;

    }

    /* getlast_news sidbar */
    function getlast_news($value = '', $postid = '')
    {
        if (is_numeric($value) && is_numeric($postid)) {

            $lang_id = $value;
            $post_id = $postid;

        } else {

            $lang_id = 0;
            $post_id = 0;
        }

        $sql = "SELECT * FROM post where  Is_Actieved='Yes' and lang_id='$lang_id' and catpost_id=4 and post_id!=$post_id  order by post_id desc limit 7";

        $result = $this->query($sql);

        $last_news = " ";
        $i = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['post_img']);
                $substitle = substr($row['post_title'], 0, 100);


                $last_news .= '
                <li>
                    <div class="post-image">
                     <div class="img-thumbnail img-thumbnail-no-borders d-block">
                        <a href="news-ditls.php?cat=' . $row['post_id'] . '&lang=' . $this->lang . '" title="' . $row['post_title'] . '">
                          <img src="' . $ccsG . '" alt="' . $row['post_title'] . '" title="' . $row['post_title'] . '">
                        </a>
                       </div>
                    </div>
                    <div class="post-info">
                      <a href="news-ditls.php?cat=' . $row['post_id'] . '&lang=' . $this->lang . '" title="' . $row['post_title'] . '">
                        ' . $substitle . ' </a>
                      <div class="post-meta">
                       <i class="fa fa-calendar"></i>
                            ' . $row['creating_date'] . '
                      </div>
                    </div>
                  </li>
                ';
            }
        }
        return $last_news;
    }

    /* get department in colleage */
    function get_college_department($value = '', $collid = '')
    {


        if (is_numeric($value) && is_numeric($collid)) {

            $lang_id = $value;
            $calleage_id = $collid;
        } else {

            $lang_id = 0;
            $calleage_id = 0;
        }


        $sql = "SELECT * FROM department where  Is_Actieved='Yes' and lang_id='$lang_id' and calleage_id='$calleage_id' ";

        $result = $this->query($sql);

        $department = " ";
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['department_icon']);
                $department .= '
                <div class="col-md-6 my-3">
    <div class="post style-2">
          <div class="row no-gutters row-eq-height">
            <div class="col-md-6">
              <div class="post-image">
                <img class="h-100" src="' . $ccsG . '" alt="' . $row['department_name'] . '">
                
              </div>
            </div>
            <div class="col-md-6 align-item-middle white-bg">
              <div>
                <div class="post-desc">
                  <div class="post-title">
                    <h5><a href="department.php?lang=' . $this->lang . '&department_id=' . $row['department_id'] . '" title = "' . $row['department_name'] . '"> ' . $row['department_name'] . ' </a></h5>
                  </div>
                  <p>
                    ' . $row['department_content'] . '
                  </p> <a class="post-btn" href="department.php?lang=' . $this->lang . '&department_id=' . $row['department_id'] . '" title = "' . $row['department_name'] . '">  ' . $this->langs['redmore'] . ' <i class="mr-2 fas fa-long-arrow-alt-left"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
                    
                ';
            }
        }
        return $department;
    }

    /* get maps in colleage */
    function get_college_map($value = '', $collid = '')
    {


        if (is_numeric($value) && is_numeric($collid)) {

            $lang_id = $value;
            $calleage_id = $collid;
        } else {

            $lang_id = 0;
            $calleage_id = 0;
        }


        $sql = "SELECT * FROM calleage_map where  Is_Actieved='Yes' and lang_id='$lang_id' and calleage_id='$calleage_id'";

        $result = $this->query($sql);

        $map = " ";
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['map_img']);
                $ccsF = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['map_file']);
                $department_id = $row['department_id'];
                $maptitle = $row['map_title'];

                $sqldept_naem = "SELECT department_name FROM department where  Is_Actieved='Yes' and lang_id='$lang_id' and department_id='$department_id'";
                $resultdept_naem = $this->query($sqldept_naem);
                $row1 = $resultdept_naem->fetch_assoc();
                $map .= '
                    <tr>
                            <td>
                            <p >
                             <strong>
                                 ' . $row1['department_name'] . ' 
                             </strong>
                            </p>
                            </td>
                            <td>
                            <p>
                              <strong>
                                  ' . $maptitle . ' 
                              </strong>
                            </p>
                            </td>
                            <td>
                            <p ><strong>
                                <a href="' . $ccsF . '" target="_blank">
                                    <i class="fa fa-download"></i></a>
                            </strong></p>
                            </td>
                            <td>
                            <p >
                            <strong>
                              <a data-fancybox="gallery" href="' . $ccsG . '">
                                <i class="fa fa-eye"></i>
                             </a>
                            
                            </strong>
                            </p>
                            </td>
                            </tr>
                ';
            }
        }
        return $map;
    }

    /* getcolleage_news */
    function getcolleage_news($value = '', $collid = '')
    {

        if (is_numeric($value) && is_numeric($collid)) {

            $lang_id = $value;
            $calleage_id = $collid;
        } else {

            $lang_id = 0;
            $calleage_id = 0;
        }

        if ($lang_id == 1) {
            $dir = "right";
            $dir2 = "left";
            $redmore = " اقراء المزيد ";
        } else {
            $dir = "left";
            $dir2 = "right";
            $redmore = " Read more ";
        }

        $sql = "SELECT * FROM post where  Is_Actieved='Yes' and lang_id='$lang_id' and calleage_id='$calleage_id' and catpost_id=4 order by post_id  desc limit 5";

        $result = $this->query($sql);

        $news = " ";
        $i = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['post_img']);
                $substitle = substr($row['post_title'], 0, 150);
                $resultitle = substr($substitle, 0, strrpos($substitle, ' '));
                $subscontent = substr($row['post_content'], 0, 250);
                $resulcontent = substr($subscontent, 0, strrpos($subscontent, ' '));
                $news .= '
                <div class="item">
            <div class="post">
              <div class="post-image">
                <img src="' . $ccsG . '" alt="' . $row['post_title'] . '" title="' . $row['post_title'] . '" class="height250">
                <div class="post-date">
                <i class="fa fa-calendar"></i>
                            ' . $row['creating_date'] . '
                </div>
              </div>
              <div class="post-desc">
                <div class="post-title">
                  <h5><a href="blogDetails.php?cat=' . $row['post_id'] . '&lang=' . $this->lang . '">
                  ' . $substitle . '
                  </a></h5>
                </div>
                <p>
                  ' . $resulcontent . '
                </p>
              </div>
              <div class="post-bottom">
                <div class="post-meta">
                  <ul class="list-inline">
                    <li><i class="fa fa-eye"></i></li>
                    <li>20</li>
                  </ul>
                </div> <a class="post-btn" href="blogDetails.php?cat=' . $row['post_id'] . '&lang=' . $this->lang . '">
                ' . $redmore . ' <i class="mr-2 fas fa-long-arrow-alt-left"></i></a>
              </div>
            </div>
          </div>';
            }
        }
        return $news;
    }

    /*  Ary-AboutcallSectionRow */
    function GetAboutcallSectionRow($value = '', $aboutcalldep_Postion, $collid = '')
    {

        $groupinfcall = array();
        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }

        $sql = "SELECT * FROM about_calleage_department where   Is_Actieved='Yes' and lang_id='$lang_id' and aboutcalldep_Postion='$aboutcalldep_Postion' and calleage_id='$collid' limit 1";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['aboutcalldep_img']);

        $groupinfcall['aboutcalldep_img'] = $ccsG;
        $groupinfcall['aboutcalldep_title'] = $row['aboutcalldep_title'];
        $groupinfcall['aboutcalldep_content'] = $row['aboutcalldep_content'];


        return $groupinfcall;

    }

    /*  Ary-GetAboutdepSectionRow */
    function GetAboutdepSectionRow($value = '', $aboutcalldep_Postion, $dep = '')
    {

        $groupinfdep = array();
        if (is_numeric($value)) {
            $department_id = $dep;
            $lang_id = $value;
        } else {
            $department_id = 0;
            $lang_id = 0;
        }

        $sql = "SELECT * FROM about_calleage_department where   Is_Actieved='Yes' and lang_id='$lang_id' and aboutcalldep_Postion='$aboutcalldep_Postion' and department_id='$department_id' Order by aboutcalldep_id desc limit 1 ";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row["aboutcalldep_img"]);
        $groupinfdep['aboutcalldep_img'] = $ccsG;
        $groupinfdep['aboutcalldep_title'] = $row['aboutcalldep_title'];
        $groupinfdep['aboutcalldep_content'] = $row['aboutcalldep_content'];


        return $groupinfdep;

    }


    /* get maps in colleage */
    function get_department_map($value = '', $depid = '')
    {

        $groupdepmap = array();
        if (is_numeric($value) && is_numeric($depid)) {

            $lang_id = $value;
            $department_id = $depid;
        } else {

            $lang_id = 0;
            $department_id = 0;
        }


        $sql = "SELECT * FROM calleage_map where  Is_Actieved='Yes' and lang_id='$lang_id' and department_id='$department_id'";

        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row["map_img"]);

        $ccsF = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row["map_file"]);
        $groupdepmap['map_title'] = $row['map_title'];
        $groupdepmap['map_img'] = $ccsG;
        $groupdepmap['map_file'] = $ccsF;

        return $groupdepmap;
    }

    /* get_department_teacher */
    function get_calleage_teacher($value = '', $colid = '')
    {
        if (is_numeric($value) && is_numeric($colid)) {

            $lang_id = $value;
            $calleage_id = $colid;
        } else {

            $lang_id = 0;
            $calleage_id = 0;
        }
        $techer = "";


        $result = $this->query("SELECT * FROM teachers where  lang_id='$lang_id' and calleage_id='$calleage_id' ");
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['teacher_img']);

                $techer .= '
            <div class="item">
                <div class="team-member text-center style-2 img-thumbnail">
                  <a href="teacherSingle.php?teach=' . $row['teacher_id'] . '&lang=' . $this->lang . '&type=teacher">
                  <div class="team-images">
                    <img class="img-fluid w-100" src="' . $ccsG . '" alt="' . $row['teacher_name'] . '">
                  </div>
                  <div class="team_detail text-center my-3">
                    <h6 class="text-uppercase mb-0">
                      ' . $row['teacher_name'] . '
                    </h6>
                    
                    <p class="team_work text-muted text-center">
                      ' . $row['teacher_speasfic'] . '
                    </p>
                  </div>
                </a>
                </div>
              </div>
                
            ';
            }
        }
        return $techer;
    }


    function honorary_board($value = '', $colid = '')
    {


        if (is_numeric($value) && is_numeric($colid)) {

            $lang_id = $value;
            $calleage_id = $colid;
        } else {

            $lang_id = 0;
            $calleage_id = 0;
        }


        $result = $this->query("SELECT * FROM honorary_board where  Is_Actieved='Yes' and lang_id='$lang_id' and calleage_id='$calleage_id' ");

        $student = " ";
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $department_id = $row['department_id'];
                $result2 = $this->query("SELECT * FROM department where   lang_id='$lang_id' and department_id='$department_id'    ");
                $rowdepartment = $result2->fetch_assoc();
                $student .= '
                <tr>
                 <td>
                  <p >
                    <strong>
                      ' . $row['student_name'] . '
                    </strong>
                  </p>
                 </td>
                
                 <td>
                  <p >
                    <strong>
                      ' . $rowdepartment['department_name'] . '
                    </strong>
                  </p>
                 </td>
                 <td>
                  <p >
                    <strong>
                      ' . $row['average'] . '  
                    </strong>
                  </p>
                 </td>
                 <td>
                  <p >
                    <strong>
                      ' . $row['rank'] . '  
                    </strong>
                  </p>
                 </td>
                 <td>
                  <p >
                    <strong>
                      ' . $row['appreciation'] . '  
                    </strong>
                  </p>
                 </td>
                    
                </tr>
                ';
            }
        }
        return $student;
    }

    /* get colleges & department*/
    function get_college_dept($value = '')
    {
        if (is_numeric($value)) {

            $lang_id = $value;

        } else {

            $lang_id = 0;
        }


        $sqlcalleage = "SELECT * FROM calleage where  Is_Actieved='Yes' and lang_id='$lang_id' ";

        $resultcalleage = $this->query($sqlcalleage);

        $college_menu = " ";
        $i = 0;
        if ($resultcalleage->num_rows > 0) {

            while ($row = $resultcalleage->fetch_assoc()) {


                $college_menu .= '
                <div class="col-md-12 col-xs-12 wow slideIn<?php echo $dir?> ">
                        <h3> ' . $row['calleage_name'] . '  : </h3>
                </div>
                <div class="row">
                      ';
                $calleage_id = $row['calleage_id'];
                $sqldepartment = "SELECT * FROM department where  Is_Actieved='Yes' and lang_id='$lang_id' and calleage_id='$calleage_id' ";
                $resultdepartment = $this->query($sqldepartment);
                if ($resultdepartment->num_rows > 0) {
                    $college_menu .= "<ul>";
                    while ($row = $resultdepartment->fetch_assoc()) {
                        $ccsG = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['department_icon']);
                        $college_menu .= '
                    <div class="col-md-6 mb-5">
                      <div class="views-field views-field-field-image">
                       <div class="field-content">
                       <a href="department.php?lang=' . $this->lang . '&department_id=' . $row['department_id'] . '" title = "' . $row['department_name'] . '" >
                        <img src="' . $ccsG . '" alt="' . $row['department_name'] . '" class="img-responsive img-thumbnail" </a>
                       </div>
                      </div>
                      <div class="views-field views-field-title"><span class="field-content"><a href="department.php?lang=' . $this->lang . '&department_id=' . $row['department_id'] . '" title = "' . $row['department_name'] . '" >
                      ' . $row['department_name'] . '
                      </a></span>
                                        </div>
                                    </div>
                ';

                    }


                }
                $college_menu .= '
                         
                    </div>
                  ';

            }


            return $college_menu;

        }

    }

    function get_boardsmanager1($value)
    {


        if (is_numeric($value)) {

            $lang_id = $value;
        } else {
            $lang_id = 0;
        }


        $boardsmanager = "";

        $sqlc = "SELECT * FROM cat_boards  where lang_id='$lang_id'  and Is_Actieved='Yes'  order by order_id    ";
        $resultc = $this->query($sqlc);
        while ($rowc = $resultc->fetch_assoc()) {


            $boardsmanager .= '
            <div class="row d-flex justify-content-center">
                 <div class="col-md-12 col-xs-12 text-center my-3">
                  <h3>
                    ' . $rowc['Namecatteam'] . ' 
                  </h3>
                   
                 </div>
            


                  ';
            $catboard_id = $rowc['catboard_id'];


            $sql = "SELECT * FROM boardsmanager  where lang_id='$lang_id'  and Is_Actieved='Yes' and catboard_id='$catboard_id' order by order_id    ";
            $result3 = $this->query($sql);
            $numrow = $result3->num_rows;

            while ($row = $result3->fetch_assoc()) {
                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['logo']);
                $boardsmanager .= ' 
                <div class="col-md-3 col-sm-6 col-xl-12 wow zoomIn">

                    <div class="single-library ">
                        <a href="" class="hb-md-margin mx-auto d-block" data-toggle="modal" data-target="#manager' . $row['boardm_id'] . '"><span class="hb hb-md inv hb-facebook-inv d-flex align-items-center text-center justify-content-center">
                          <img src="' . $ccsG2 . '" class="management-img" alt="' . $row['Name_manager'] . '" title="' . $row['Name_manager'] . '">
                        </span></a>
                        <h6 class="main-color">
                        ' . $row['Name_manager'] . '
                        </h6>

                        <h6 class="alt-color mt-3">
                            ' . $row['short_desc'] . '
                        </h6>
                        
                    </div>
                </div>

                <div class="modal fade" id="manager' . $row['boardm_id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                        ' . $rowc['Namecatteam'] . '
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                         
                        <div class="teamModal text-center">
                                  
                          <div class="team-img col-md-12">
                          <span class="hb hb-md inv hb-facebook-inv d-flex align-items-center text-center justify-content-center">
                                <img src="' . $ccsG2 . '" class="management-img" alt="' . $row['Name_manager'] . '" title="' . $row['Name_manager'] . '">
                                </span>
                          </div>
                          
                          <div class="team-detail col-md-12">
                              <h4>
                              ' . $row['Name_manager'] . '
                              <span></span></h4>
                              <p><label class="heading">' . $this->langs['Specialization'] . '
                              </label>
                              <label class="detail">
                              ' . $row['Speciality'] . '
                              </label></p>
                              <p><label class="heading">' . $this->langs['Degree'] . '</label>
                              <label class="detail">
                              ' . $row['Speciality'] . '
                              </label></p>
                              
                          </div>
                        </div>         
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                      </div>
                    </div>       
                  </div>
                </div>
                        ';

            }

            $boardsmanager .= '
             </div>
              <hr> ';

        }

        return $boardsmanager;


    }


    function get_boardsmanager2($value, $catid)
    {


        if (is_numeric($value)) {

            $lang_id = $value;
        } else {
            $lang_id = 0;
        }


        $boardsmanager = "";

        $sqlc = "SELECT * FROM cat_boards  where lang_id='$lang_id'  and Is_Actieved='Yes' and catboard_id='$catid' order by order_id    ";
        $resultc = $this->query($sqlc);
        while ($rowc = $resultc->fetch_assoc()) {


            $boardsmanager .= '';
            $catboard_id = $rowc['catboard_id'];


            $sql = "SELECT * FROM boardsmanager  where lang_id='$lang_id'  and Is_Actieved='Yes' and catboard_id='$catboard_id' order by order_id    ";
            $result3 = $this->query($sql);
            $numrow = $result3->num_rows;

            while ($row = $result3->fetch_assoc()) {
                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['logo']);
                $boardsmanager .= '
                <tr>
                  <td>
                  <p>
                    <strong>
                      ' . $row['order_id'] . '  
                    </strong>
                  </p>
                 </td>
                 <td>
                  <p>
                    <strong>
                      ' . $row['Name_manager'] . ' 
                    </strong>
                  </p>
                 </td>
                
                 <td>
                  <p>
                    <strong>
                      ' . $row['short_desc'] . '
                    </strong>
                  </p>
                 </td>
                 <td>
                  <p>
                    <strong>
                      ' . $row['Speciality'] . '
                    </strong>
                  </p>
                 </td>
                 
                 
                    
                </tr>
                ';

            }


        }

        return $boardsmanager;


    }

    /* get uinDepartments */
    function get_uinDepartments($value = '')
    {

        $whr = "";
        if (is_numeric($value)) {

            $lang_id = $value;
            $whr = "  ";
        } else {

            $lang_id = 0;
        }


        $sqlDepartment = "SELECT * FROM `uin_info` WHERE PostionAbout='Postion5' and TypeAbout='uininfo'  and lang_id='$lang_id' ";

        $resultuinDepartment = $this->query($sqlDepartment);

        $uinDepartments = " ";
        $i = 0;
        if ($resultuinDepartment->num_rows > 0) {

            while ($row = $resultuinDepartment->fetch_assoc()) {
                $ImagePath = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['Image']);

                $uinDepartments .= '
                    <div class="col-lg-6 my-3"> 
      <div class="post style-2">
        <div class="row  no-gutters row-eq-height">
          <div class="col-md-6">
            <div class="post-image">
              <img class="h-100" src="' . $ImagePath . '" alt="' . $row['Title'] . '">
                
            </div>
          </div>
          <div class="col-md-6 align-item-middle white-bg">
            <div>
              <div class="post-desc">
              <h5 class="title text-right"> <span> ' . $row['Title'] . '   </span></h5>
              <p class="">
                ' . $row['short_desc'] . '
              </p>
              <p class="mb-2">
                ' . $row['content'] . '
              </p> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        ';


            }


            return $uinDepartments;

        }

    }

    function getCounters($value = '',$company_id)
    {
        if (is_numeric($value)) {

            $lang_id = $value;

        } else {

            $lang_id = 0;
        }

        $sql = "SELECT * FROM counter  where lang_id='$lang_id' and activity_id='$company_id' limit 3";

        $counter = " ";
        $result3 = $this->query($sql);

        if ($result3->num_rows > 0) {

            $img = "";
            $font = "";


            while ($row = $result3->fetch_assoc()) {
                $font = $row['logo'];
                $mmm = $row['number'];


                $counter .= '
 <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="single-counter mb-30">
                    <span class="counter">' . $mmm . '</span>
                    <sup>+</sup>
                    <p>' . $row['titleCount'] . ' </p>
                </div>
            </div>';


            }


            return $counter;
        }


    }


    /* get Parteners */
    function getParteners($value = '')
    {


        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }
        $sql = "SELECT * FROM partenrs  where lang_id='$lang_id' and Is_visible='Yes' and Is_Actieved ='Yes' and Partenr_type='partenrs' limit 20";

        $imageset = " ";
        $partener = " ";
        $result3 = $this->query($sql);

        if ($result3->num_rows > 0) {

            $img = "";
            $font = "";
            while ($row = $result3->fetch_assoc()) {
             $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['logo']);
                

                                $partener .= '
                            <div class="single-partner">
                                <a href="' . $row['url'] . '" title="' . $row['Name_Partenr'] . '" target="_blank">
                            <img src="' . $ccsG2 . '" alt="partner" >
                             </a>
                        </div>
                                ';
                                $ccsG2 = " ";
                            

            }
            
        }

return $partener;
    }

        /* get Parteners */
    function getClients($value = '')
    {


        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }
        $sql = "SELECT * FROM partenrs  where  lang_id='$lang_id' and Is_visible='Yes' and Is_Actieved ='Yes' and Partenr_type='clients' limit 20";

        $imageset = " ";
        $client = " ";
        $result3 = $this->query($sql);

        if ($result3->num_rows > 0) {

            $img = "";
            $font = "";
            while ($row = $result3->fetch_assoc()) {
                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['logo']);
              


                                $client .= '
                                <div class="col-md-3 cl-xs-12 px-0">
                <div class="service-item">
              <div class="service-images text-center">
                <img class="img-fluid" src="' . $ccsG2 . '" alt=" ' . $row['Name_Partenr'] . ' ">
                <div class="service-icon">
                <a href="' . $row['url'] . '" title=" ' . $row['Name_Partenr'] . ' ">
                 <i class="fa fa-link"></i>
                </a>
                </div>
              </div>
              
            </div>
                  
            </div> ';
                                $ccsG2 = " ";
                            

            }
            
        }

        return $client;
    }


    /* get Parteners */
    function getCompanyParteners($value = '',$company_id)
    {


        if (is_numeric($value)) {

            $lang_id = $value;

        } else {

            $lang_id = 0;
        }
        $sql = "SELECT * FROM partenrs  where lang_id='$lang_id'  and activity_id='$company_id' and Partenr_type='partenrs'";

        $imageset = " ";
        $partener = " ";
        $result3 = $this->query($sql);

        if ($result3->num_rows > 0) {

            $img = "";
            $font = "";
            while ($row = $result3->fetch_assoc()) {

                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['logo']);

                                $partener .= '
                                <div class="single-partner">
                                <a href="' . $row['url'] . '" title="' . $row['Name_Partenr'] . '" target="_blank">
                            <img src="' . $ccsG2 . '" alt="partner" >
                             </a>
                        </div>';
                                $ccsG2 = " ";
                           

            }
            return $partener;
        }


    }

    function getCompanyclients($value = '',$company_id)
    {


        if (is_numeric($value)) {

            $lang_id = $value;
        } else {

            $lang_id = 0;
        }
        $sql = "SELECT * FROM partenrs  where lang_id='$lang_id'  and activity_id='$company_id' and Partenr_type='clients'";

        $imageset = " ";
        $clients = " ";
        $result3 = $this->query($sql);

        if ($result3->num_rows > 0) {

            $img = "";
            $font = "";
            while ($row = $result3->fetch_assoc()) {
                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['logo']);

                                $clients .= '
                                <div class="col-md-3 cl-xs-12 px-0">
                <div class="service-item">
              <div class="service-images text-center">
                <img class="img-fluid" src="' . $ccsG2 . '" alt=" ' . $row['Name_Partenr'] . ' ">
                <div class="service-icon">
                <a href="' . $row['url'] . '" title=" ' . $row['Name_Partenr'] . ' ">
                 <i class="fa fa-link"></i>
                </a>
                </div>
              </div>
              
            </div>
                  
            </div> ';
                                $ccsG2 = " ";
                           

            }
            return $clients;
        }


    }


    //-----------------------------------------------------------


    function GetPostion1()
    {


        $whr = "";

        $sql = "";
        $result = array();

        $sql = "SELECT * FROM company_info where Is_visible='Yes'  and   Is_Actieved='Yes'  and  PostionAbout='Postion2' limit 1   ";

        $result3 = $this->query($sql);
        $get_account_info = array();;
        $row = $result3->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['Image']);
        $result['Title'] = $row['Title'];
        $result['content'] = $row['content'];
        $result['Image'] = $row['Image'];

        return $result;


    }

    function GetPostion2()
    {


        $whr = "";

        $sql = "";
        $result = array();

        $sql = "SELECT * FROM company_info where Is_visible='Yes'  and   Is_Actieved='Yes'  and  PostionAbout='Postion2' limit 1   ";

        $result3 = $this->query($sql);
        $get_account_info = array();;
        $row = $result3->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['Image']);
        $result['Title'] = $row['Title'];
        $result['content'] = $row['content'];
        $result['Image'] = $row['Image'];

        return $result;


    }

    function GetPostion5()
    {


        $whr = "";

        $sql = "";
        $result = array();

        $sql = "SELECT * FROM company_info where Is_visible='Yes'  and   Is_Actieved='Yes'  and  PostionAbout='Postion5' and lang_id=1 limit 1   ";

        $result3 = $this->query($sql);

        $row = $result3->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['Image']);
        $result['Title'] = $row['Title'];
        $result['content'] = $row['content'];
        $result['Image'] = $row['Image'];

        return $result;


    }

    function GetPostion3()
    {


        $whr = "";

        $sql = "";
        $result = array();

        $sql = "SELECT * FROM company_info where Is_visible='Yes'  and   Is_Actieved='Yes'  and  PostionAbout='Postion3' limit 1   ";

        $result3 = $this->query($sql);
        $get_account_info = array();;
        $row = $result3->fetch_assoc();
        $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['Image']);
        $result['Title'] = $row['Title'];
        $result['content'] = $row['content'];
        $result['Image'] = $row['Image'];

        return $result;


    }

    function GetAboutPostion4()
    {


        $sql = "SELECT * FROM company_info where Is_visible='Yes'  and  Is_Actieved='Yes' and  PostionAbout='Postion4'  and lang_id=1  limit 2    ";


        $result3 = $this->query($sql);
        $GetAbout = " ";


        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {

                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['Image']);


                //    $GetAbout .= '

                //        <div class="col-md-6 col-sm-6 col-xs-12">
                //           <div class="boxes-info">
                //                 <div class="boxes-infoimg">
                //                 <img src="'.$ccsG2.'" class="img-responsive" alt="' . $row['Title'] . '" title="' . $row['Title'] . '">
                //                    </div>
                //                   <div class="content">
                //                    <h6>' . $row['Title'] . '</h6>

                //                    <p> ' . $row['content']. '</p>

                //                         </div>
                //             </div>
                //     </div>

                // ';

                $GetAbout .= '

                    <li class="latest_posts-acc-item col-md-6 col-sm-6 col-xs-12">
              <div class="inner-acc latest_posts-acc-inner">
                <a class="thumb hoverBorder plus latest_posts-acc-link">
                  <img class="latest_posts-acc-img" src="' . $ccsG2 . '"    alt="' . $row['Title'] . '" title="' . $row['Title'] . '"></a>
                  <div class="content latest_posts-acc-content">
                    
                    <h5 class="m_title text-custom latest_posts-acc-title">
                      <a>' . $row['Title'] . '</a>
                    </h5>
                    <div class="text latest_posts-acc-text"> 
                    ' . $row['content'] . '
                    </div>
                 

                   </div>
                  </div>
                </li>

                     

             ';


            }


            return $GetAbout;

        }

    }

    function GetAboutPostion4Shape2()
    {


        $sql = "SELECT * FROM company_info where Is_visible='Yes'  and  Is_Actieved='Yes' and  PostionAbout='Postion4'  and lang_id=1  limit 2    ";


        $result3 = $this->query($sql);
        $GetAbout = " ";

        $i = 0;
        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {

                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['Image']);


                if ($i == 0) {

                    $GetAbout .= '

                <div class="col-md-6  col-sm-6 col-xs-12 bg-white my-3 py-3 px-5 text-justify" style="border-radius: 10px !important;">
                  <h5 class="m_title text-custom latestpostsacctitle11">
                      ' . $row['Title'] . ' 
                    </h5>
                      
                          <div class="text latest_posts-acc-text"> ' . $row['content'] . '</div>
                    </div>
 

                     

             ';

                } else {

                    $GetAbout .= '

                     <div class="col-md-6  col-sm-6 col-xs-12  text-white">
                       <h5 class="m_title text-custom white latestpostsacctitle11">
                      ' . $row['Title'] . ' 
                    </h5>
                        
                          <div class="white latest_posts-acc-text"> ' . $row['content'] . '</div>
                    </div>
                   
 
 

                     

             ';


                }

                ++$i;


            }


            return $GetAbout;

        }

    }

    function get_aboutusfrist2($value)
    {

        $cinfo_id = 0;
        $whr = "";
        if (is_numeric($value)) {

            $cinfo_id = $value;


        } else {

            $cinfo_id = 1;
        }
        $sql = "";
        $sql = "SELECT * FROM company_info where cinfo_id='$cinfo_id'  and  Is_Actieved='Yes'  limit 1   ";


        $result3 = $this->query($sql);
        $groupinfTab = " ";
        $imageset = "";
        $i = 0;
        $col = 6;
        $widths = "";
        $bg = "";

        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {

                $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['Image']);


                $groupinfTab2 = $row['content'];
                $groupinfTab .= '
            <div class="row align-items-center mb-5">
                <div class="col-md-8 order-md-2 wow fadeInLeft">
                    <h5 class="alt-color position-relative mb-3 wow flipInX" style="padding-top: 20px;font-size: 19px;">' . $row['Title'] . '</h5>
                  ' . $groupinfTab2 . '
                </div>
                <div class="col-md-4">
                    <div class="blog-image wow hover-effect fadeInRight">
                        <img src="' . $ccsG2 . '" alt="' . $row['Title'] . '">
                    </div>
                </div>
            </div>
           
<hr> 
      ';


            }


            return $groupinfTab;

        }

    }


    function SendEmailSubscribe($value = '')
    {

        require('../mail/class.phpmailer.php');
        require_once '../mail/class.smtp.php';
        date_default_timezone_set('Asia/Kuwait');

        $sqlpost = "SELECT * FROM posts WHERE  post_id='$value' ";
        $resultpost = $this->query($sqlpost);
        $rowpost = $resultpost->fetch_assoc();

        $link = 'https://amaninsco.com/blog-item.php?lang=ar&post_id=' . $value; //change your domain here.

        $to = "$email"; //change to ur mail address
        $strSubject = EMAIL_FROM_NAME . "| " . $rowpost['title'];
        $message .= '<p><a href="' . $link . '">' . EMAIL_FROM_NAME . '|' . $rowpost['title'] . '</a></p>';
        $form = "amaninsco@amaninsco.com";
        $formName = "";


        $mail = new PHPMailer();
//$subject = "this is password";
        $content = $message;
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0;
        $mail->IsSMTP();
        $mail->Host = SMTPHOST;
        $mail->SMTPAuth = true;

        $mail->Port = SMTP_PORT;              //set smtp port for the gmail
        $mail->Username = SMTP_USERNAME;    //yourname@yourdomain
        $mail->Password = SMTP_PASSWORD;      //password


        $mail->SetFrom($form, EMAIL_FROM_NAME);

        $mail->AddReplyTo($email, $strSubject);

        $mail->Subject = $strSubject;
        $mail->MsgHTML($content);


        $output = "";
        $sql = "SELECT * FROM subscribusers WHERE  Is_Actieved='Yes' ";
        $result3 = $this->query($sql);
        if ($result3->num_rows > 0) {
            // output data of each row name="select"
            while ($row = $result3->fetch_assoc()) {

                $touser = $row['email'];
                $mail->AddAddress($touser, $strSubject);
                if (!$mail->Send()) {

                    $output = 'الرسالة  لم يهم ارسالة.';
                    $output .= 'Mailer error: ' . $mail->ErrorInfo;

                } else {
                    $output = "تم الارسال بنجاح";
                }


            }

        } else {

        }

        return $output;

    }


    function random($length = 5, $chars = '')
    {


        $ALPHA_CAP = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        $ALPHA_SMALL = "abcdefghjklmnpqrstuvwxyz";
        $NUMERIC = 23456789;
        $sChars = (empty($chars)) ? $ALPHA_CAP . $NUMERIC : $chars;
        $aSplit = str_split($sChars, 1);
        $serial = '';

        for ($i = 0; $i < $length; $i++)
            $serial .= $aSplit[mt_rand(0, strlen($sChars) - 1)];

        return $serial;
    }


    function GetOrderTable($order_id, $table)
    {
        $MaxOrder = 0;

        $result = $this->query('SELECT MAX(' . $order_id . ')+1 AS NB FROM ' . $table);

        while ($row = $result->fetch_assoc()) {
            if ($row["NB"] > 0) {
                $MaxOrder = $row["NB"];
            } else {
                $MaxOrder = 1;
            }
        }


        return $MaxOrder;

    }

    function check_error($err, $searchfor)
    {
        $mystring = $err;
        $findme = $searchfor;
        $pos = strpos($mystring, $findme);
        if ($pos !== false) {
            return true;
        } else {
            return false;
        }


    }


    function get_encrpypass($a, $Password_Salts)
    {

        return $encrptpass = hash('md5', $a . $Password_Salts);
    }

    function generateRandID()
    {
        return md5($this->generateToken(20));
    }

    function generateRandID2()
    {
        return md5($this->generateToken(23));
    }

    /**
     * generateRandStr - Generates a string made up of randomized
     * letters (lower and upper case) and digits, the length
     * is a specified parameter.
     */
    function generateToken($length)
    {
        return substr(str_shuffle('abcdefghijklmnIJKLMNPQRSTUpqrstuvwxyz1234567890ABCDEFGHVWXYZ'), rand(0, 60 - $length), $length);
    }

    function AddACountInUsers($Shown_Name, $Username, $Primary_Email, $Moblile_No, $Logopaht, $RelatedKey, $group_key, $password)
    {


        $User_nam = $_SESSION['AppLoginName'];

        $Password_Salt = $this->generateRandID();
        $Actived_Key = $this->generateRandID2();
        $APassword = md5($password);
        $User_Key = $this->generateRandID2();


        $User_id = $this->GetOrderTable('User_id', 'employees_users');

        $resultGroup = $this->query("SELECT * FROM  privilege_groups where GroupKey='$group_key' ");
        $groups = $resultGroup->fetch_assoc();
        $grup_id = $groups['grup_id'];

        $add_dates = date('Y-m-d');
        $Is_Actived = 'No';
        $newquerys1 = "insert into   employees_users (grup_id,User_id,Username,Shown_Name, User_Key,APassword,Password_Salt,Primary_Email, Moblile_No, Is_Actived,Is_Privilages_cofiged, Is_Privilages_customized,Actived_Key,RelatedKey, Logopaht,adding_date,Added_by,AUser_name) values 
        ('$grup_id','$User_id','$Username','$Shown_Name','$User_Key','$APassword','$Password_Salt','$Primary_Email','$Moblile_No','$Is_Actived','0','0','$Actived_Key','$RelatedKey','$Logopaht','$add_dates','$User_nam','$User_nam')";

        $output = $this->query($newquerys1);
        return $output;
    }


       public  function SendEmailFront($Email,$subject,$message)
   {


               require('../../mail/class.phpmailer.php');
              require_once '../../mail/class.smtp.php';
              date_default_timezone_set('Asia/Kuwait'); 
              $mail = new PHPMailer(); 
              $content =$message;
              $mail->CharSet = 'UTF-8';  
                $mail->SMTPDebug  = 0; 
              $mail->IsSMTP(); 
                $NameLogin=$subject;
              $subject='تسجيل دخول جديد';
               $content ='لاحظنا تسجيل الدخول إلى حسابك من جهاز جديد. '.$NameLogin;
              $mail->Host= SMTPHOST;
              $mail->SMTPAuth = true; 
              $mail->Port = SMTP_PORT;           
              $mail->Username   = SMTP_USERNAME;  
              $mail->Password   = SMTP_PASSWORD;
              $mail->SetFrom(EMAIL_FROM_ADDR,EMAIL_FROM_NAME);
              $mail->AddReplyTo($Email,$subject);
              $mail->Subject = $subject;
              $mail->MsgHTML($content);
              $mail->AddAddress($Email,$subject); 
                  try {
                    $mail->addAddress($Email,$subject);
                  } catch (Exception $e) {
                    $MessageOutPut.= 'Invalid address skipped: ' . htmlspecialchars($Email) . '<br>';
                    //continue;
                } 
               try {
                        $mail->send();
                        $MessageOutPut.='Message sent to :' . htmlspecialchars($subject) . ' (' . htmlspecialchars($Email) . ')<br>'; 
                       
                    } catch (Exception $e) {
                        $MessageOutPut.= 'Mailer Error (' . htmlspecialchars($Email) . ') ' . $mail->ErrorInfo . '<br>'; 
                        $mail->getSMTPInstance()->reset();
                    }         
      
   }


}

;


?>