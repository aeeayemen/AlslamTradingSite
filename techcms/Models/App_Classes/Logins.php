<?php
/**
 * شاشة تسجيل الدخول
 */
date_default_timezone_set('Asia/Kuwait'); 
error_reporting(E_ERROR|E_PARSE);

/**
 * 
 */
 
class Applogin_DB
{
   var $Appconnection;         //The MySQL database Vconnection
   var $num_active_users;   //Number of active users viewing site
   var $num_active_guests;  //Number of active guests viewing site
   var $num_members;        //Number of signed-up users
   /* Note: call getNumMembers() to access $num_members! */
 

   /* Class constructor */
   function __construct(){
      if (function_exists('techcms_get_db_connection')) {
         $this->Appconnection = techcms_get_db_connection();
      } else {
         $this->Appconnection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME, DB_PORT);
         if ($this->Appconnection) $this->Appconnection->set_charset('utf8mb4');
      }
      $this->num_members = -1;
   }

   /**
    * confirmUserPass - Checks whether or not the given
    * username is in the database, if so it checks if the
    * given password is the same password in the database
    * for that user. If the user doesn't exist or if the
    * passwords don't match up, it returns an error code
    * (1 or 2). On success it returns 0.
    */
   function confirmUserPass($username, $password){
      /* Add slashes if necessary (for query) */
      if(!get_magic_quotes_gpc()) {
	      $username = addslashes($username);
      }

      /* Verify that user is in database */
      $q = "SELECT APassword FROM ".TBL_USERS." WHERE Username = '$username'";
      $result = mysqli_query($this->Appconnection,$q);
      if(!$result || (mysqli_num_rows($result) < 1)){
         return 1; //Indicates username failure
      }

      /* Retrieve password from result, strip slashes */
      $dbarray = mysqli_fetch_array($result);
      $dbarray['APassword'] = stripslashes($dbarray['APassword']);
      $password = stripslashes($password);

      /* Validate that password is correct */
      if($password == $dbarray['APassword']){
         return 10; //Success! CPassword and password confirmed
      }
      else{
         return 2; //Indicates password failure
      }
   }
   
   /**
    * confirmUserID - Checks whether or not the given
    * username is in the database, if so it checks if the
    * given userid is the same userid in the database
    * for that user. If the user doesn't exist or if the
    * userids don't match up, it returns an error code
    * (1 or 2). On success it returns 0.
    */
   function confirmUserID($username, $userid){
      /* Add slashes if necessary (for query) */
      if(!get_magic_quotes_gpc()) {
	      $username = addslashes($username);
      }

      /* Verify that user is in database */
      $q = "SELECT User_Key FROM ".TBL_USERS." WHERE Username = '$username'";
      $result = mysqli_query($this->Appconnection,$q);
      if(!$result || (mysqli_num_rows($result) < 1)){
         return 1; //Indicates username failure
      }

      /* Retrieve userid from result, strip slashes */
      $dbarray = mysqli_fetch_array($result);
      $dbarray['User_Key'] = stripslashes($dbarray['User_Key']);
      $userid = stripslashes($userid);

      /* Validate that userid is correct */
      if($userid == $dbarray['User_Key']){
         return 0; //0 Success! Username and userid confirmed 2 Indicates userid invalid
      }
      else{
         return 2; //Indicates userid invalid
      }
   }
   
   /**
    * usernameTaken - Returns true if the username has
    * been taken by another user, false otherwise.
    */
   function usernameTaken($username){
      if(!get_magic_quotes_gpc()){
         $username = addslashes($username);
      }
      $q = "SELECT Username  FROM ".TBL_USERS." WHERE Username  = '$username'";
      $result = mysqli_query($this->Appconnection,$q);
      return (mysqli_num_rows($result) > 0);
   }
   
   /**
    * usernameBanned - Returns true if the username has
    * been banned by the administrator.
    */
   function usernameBanned($username){
      if(!get_magic_quotes_gpc()){
         $username = addslashes($username);
      }
      $q = "SELECT Is_Blocked  FROM ".TBL_USERS." WHERE Username  = '$username' and Is_Blocked=1";
      $result = mysqli_query($this->Appconnection,$q);
      if(mysqli_num_rows($result)>0)
      {
        return 2;
      }else if(mysqli_num_rows($result)==0)
      {
        return 1;
      }
      else{
          return 1;
      }
      
   }
   
   /**
    * addNewUser - Inserts the given (username, password, email)
    * info into the database. Appropriate user level is set.
    * Returns true on success, false otherwise.
    */
  
   function usernameActived($username){
      if(!get_magic_quotes_gpc()){
         $username = addslashes($username);
      }
      $q = "SELECT Is_Actived  FROM ".TBL_USERS." WHERE Username  = '$username' and Is_Actived=0";
      $result =mysqli_query($this->Appconnection,$q);
      if(mysqli_num_rows($result)>0)
      {
        return 1;
      }else{
          return 2;
      }
      
   }
   
   /**
    * updateUserField - Updates a field, specified by the field
    * parameter, in the user's row of the database.
    */
   function updateUserField($username, $field, $value){
      $q = "UPDATE ".TBL_USERS." SET ".$field." = '$value' WHERE Username  = '$username'";
      return mysqli_query($this->Appconnection,$q);
   }
   /**
    * updateUserField - Updates a field, specified by the field
    * parameter, in the user's row of the database.
    */
   function updateUserField3($username, $field, $value){
      $q = "UPDATE  login_history SET ".$field." = '$value' WHERE User_id  = '$username'";
      return mysqli_query($this->Appconnection,$q);
   }
    /**
    * updateUserField - Updates a field, specified by the field
    * parameter, in the user's row of the database.
    *///updateHistory($this->username, $this->useridx,$this->userid,$ipadd,$this->loggedin_time,"Yes");
   function updateHistory($username, $userid, $userkey,$ipaddress,$logintime,$isactive)
   {
    $loginide=$this->getlogin_id($userid);
      $q = "insert into  login_history(User_id,Login_id,User_name,Login_sessionid,Login_ipaddress,Login_time,Is_sission_active) ".
       "values($userid,$loginide,'$username','$userkey','$ipaddress','$logintime','$isactive')";
      return mysqli_query($this->Appconnection,$q);
   }
   
   /**
    * getUserInfo - Returns the result array from a mysql
    * query asking for all information stored regarding
    * the given username. If query fails, NULL is returned.
    */
     function addActiveUser($username,$logintime)
   {
    
      $q = "insert into  Active_user(User_id,Login_time) ".
       "values($username,'$logintime')";
      return mysqli_query($this->Appconnection,$q);
   }
   
    /* removeActiveUser */
   function removeActiveUser($useid){
     
      $q = "DELETE FROM Active_user WHERE User_id = '$useid'";
      mysqli_query($this->Appconnection,$q);
    
   }
   
    /* getUserInfo */
   function getUserInfo($username){
      $q = "SELECT * FROM ".TBL_USERS." WHERE Username  = '$username'";
      mysqli_query($this->Appconnection,"SET SESSION CHARACTER_SET_RESULTS =utf8;");
      $result = mysqli_query($this->Appconnection,$q);
      
      /* Error occurred, return given name by default */
      if(!$result || (mysqli_num_rows($result) < 1)){
         return NULL;
      }
      /* Return result array */
      $dbarray = mysqli_fetch_array($result);
      return $dbarray;
   }
   //-----------------------------get use page role ----------------------------------------
   
   /* getUserInfo */
   function Get_UserPage_Roles($grupid,$pagefilename){
//    echo $grupid;
   $sqlq="SELECT Privilege_id  FROM  users_group_privilegs_config where grup_id =$grupid  AND is_granted='1' AND Page_id= ( SELECT  `Page_id` FROM  `app_pages`  WHERE  `Page_filename` ='$pagefilename')";
    $rolarrayx=array();
  mysqli_query($this->Appconnection,"SET SESSION CHARACTER_SET_RESULTS =utf8;");
     $result = mysqli_query($this->Appconnection,$sqlq);
      /* Error occurred, return given name by default */
       
      if(!$result || (mysqli_num_rows($result) < 1)){
        
     $rolarx2=$this->fix_role_list($rolarrayx);
  return $rolarx2;
      }
      
         while ($row = mysqli_fetch_assoc($result)) {
            $temparry=array();
        $temparry=$this->get_role_value($row["Privilege_id"]);
    if($temparry["rolename"]!="norole" && $temparry["rolevalue"]!="novalue")
    {
    $rname=$temparry["rolename"];
    if($rname=="can_search")
    {
     $rxval="1";
     $rolarrayx["can_select"]=$rxval;      
    }
    $rval=$temparry["rolevalue"];
     $rolarrayx["$rname"]=$rval;   
    }
     
    }
    $rolarx2=$this->fix_role_list($rolarrayx);
   return $rolarx2;
     
   }

      function GetGroupUserType($grupid){
 

   $sqlq="SELECT *  FROM  privilege_groups where grup_id ='$grupid' ";
    $GroupUser=array();
    $group_key="";
  mysqli_query($this->Appconnection,"SET SESSION CHARACTER_SET_RESULTS =utf8;");
     $result = mysqli_query($this->Appconnection,$sqlq); 
        $row=mysqli_fetch_assoc($result);
      
          $group_key=$row['GroupKey'];
   
   return $group_key;
     
   }
     //----------------------------------Get Use only--------------------------
   
      function get_role_value($rolval){
     $rolarry=array();
     switch ($rolval) {
    case "1":
     $rolarry["rolename"]="can_insert"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
    case "2":
       $rolarry["rolename"]="can_edit"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
    case "3":
        $rolarry["rolename"]="can_delete"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
     case "4":
        $rolarry["rolename"]="can_show_colums"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
     case "5":
        $rolarry["rolename"]="can_access"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
     case "6":
        $rolarry["rolename"]="can_export"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
     case "7":
        $rolarry["rolename"]="can_print"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
      case "8":
        $rolarry["rolename"]="can_search"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
    case "9":
        $rolarry["rolename"]="can_sort"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
    case "10":
        $rolarry["rolename"]="can_showtemplates"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "11":
        $rolarry["rolename"]="can_approve_proposal"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "13":
        $rolarry["rolename"]="can_approve_rorder"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "14":
        $rolarry["rolename"]="can_create_order"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "15":
        $rolarry["rolename"]="can_request_agreement"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "16":
        $rolarry["rolename"]="can_review_desiging"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "17":
        $rolarry["rolename"]="can_agree_order"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "18":
        $rolarry["rolename"]="can_send_2printer"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "19":
        $rolarry["rolename"]="can_execute_order"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "20":
        $rolarry["rolename"]="can_add_achivment"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "21":
        $rolarry["rolename"]="can_edit_achivment"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "22":
        $rolarry["rolename"]="can_select_wo_matrials"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "23":
        $rolarry["rolename"]="can_select_wo_matrials_cost"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "24":
        $rolarry["rolename"]="can_delivery_printed"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
        break;
case "25":
        $rolarry["rolename"]="can_aprove_material_exit"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "26":
        $rolarry["rolename"]="can_create_final_reciptions"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "27":
        $rolarry["rolename"]="can_approve_reciptions"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "31":
        $rolarry["rolename"]="can_create_public_camp"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "32":
        $rolarry["rolename"]="can_create_clint_camp"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "33":
        $rolarry["rolename"]="can_approve_client_scamping"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "35":
        $rolarry["rolename"]="can_show_on_map"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "36":
        $rolarry["rolename"]="can_agree_client_selection"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "37":
        $rolarry["rolename"]="can_agree_real_camp_transfer"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "38":
        $rolarry["rolename"]="can_confirm_camp_install"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;
case "39":
        $rolarry["rolename"]="can_request_photo_order"; 
     $rolarry["rolevalue"]="1";
      return $rolarry;
      break;

    default:
        $rolarry["rolename"]="norole"; 
     $rolarry["rolevalue"]="novalue";
      return $rolarry;
       break;
}
     
      /* Return result array */
        }
   //----------------------------------Get Use only--------------------------
   
      function fix_role_list($rolval){
     $rolarry=$rolval;
   if(array_key_exists("can_insert",$rolarry))
   {
    
   }else{
    $rolarry["can_insert"]=2;
   }
    if(array_key_exists("can_edit",$rolarry))
   {
    
   }else{
    $rolarry["can_edit"]=2;
   }
   
 if(array_key_exists("can_delete",$rolarry))
   {
    
   }else{
    $rolarry["can_delete"]=2;
   }
   if(array_key_exists("can_show_colums",$rolarry))
   {
    
   }else{
    $rolarry["can_show_colums"]=2;
   }
   
  if(array_key_exists("can_access",$rolarry))
   {
    
   }else{
    $rolarry["can_access"]=2;
   }
    if(array_key_exists("can_export",$rolarry))
   {
    
   }else{
    $rolarry["can_export"]=2;
   }
    if(array_key_exists("can_print",$rolarry))
   {
    
   }else{
    $rolarry["can_print"]=2;
   }
   
    
    if(array_key_exists("can_search",$rolarry))
   {
    
   }else{
    $rolarry["can_search"]=2;
   }
     
    if(array_key_exists("can_sort",$rolarry))
   {
    
   }else{
    $rolarry["can_sort"]=2;
   }
//---- --------------------------------  
if(array_key_exists("customrole1",$rolarry))
   {
    
   }else{
    $rolarry["customrole1"]=2;
   }   
//---- --------------------------------  
if(array_key_exists("customrole2",$rolarry))
   {
    
   }else{
    $rolarry["customrole2"]=2;
   }   
//---- --------------------------------  
if(array_key_exists("customrole3",$rolarry))
   {
    
   }else{
    $rolarry["customrole3"]=2;
   }   
//---- --------------------------------  
if(array_key_exists("customrole4",$rolarry))
   {
    
   }else{
    $rolarry["customrole4"]=2;
   }   
//---- --------------------------------  
if(array_key_exists("customrole5",$rolarry))
   {
    
   }else{
    $rolarry["customrole5"]=2;
   }   
//---- --------------------------------  
if(array_key_exists("customrole6",$rolarry))
   {
    
   }else{
    $rolarry["customrole6"]=2;
   }   
       
      return $rolarry;
}
            
        
   //----------------------------------Get Use only--------------------------
   
      function getUserOnly($username){
      $q = "SELECT Aduser_name  FROM ".TBL_USERS." WHERE Aduser_name  = '$username'";
      $result = mysqli_query($this->Appconnection,$q);
      /* Error occurred, return given name by default */
      if(!$result || (mysqli_num_rows($result) < 1)){
         return NULL;
      }
      /* Return result array */
      $dbarray = mysqli_fetch_array($result);
      return $dbarray;
   }
   //----------------------Get Login Id
   function getlogin_id($userid){
      $q = "SELECT max(Login_id)+1 as maxusrid FROM  login_history WHERE User_id  = '$userid'";
      $result = mysqli_query($this->Appconnection,$q);
      /* Error occurred, return given name by default */
      if(!$result || (mysqli_num_rows($result) < 1)){
         return 1;
      }
      /* Return result array */
      $dbarray = mysqli_fetch_array($result);
      if($dbarray["maxusrid"]<1)
      {
        $mx=1;
      return $mx;  
      }else{
        return $dbarray["maxusrid"];
      }
      
   }
   /**
    * getNumMembers - Returns the number of signed-up users
    * of the website, banned members not included. The first
    * time the function is called on page load, the database
    * is queried, on subsequent calls, the stored result
    * is returned. This is to improve efficiency, effectively
    * not querying the database when no call is made.
    */
   function getNumMembers(){
      if($this->num_members < 0){
         $q = "SELECT * FROM ".TBL_USERS;
         $result = mysqli_query($this->Appconnection,$q);
         $this->num_members = mysqli_num_rows($result);
      }
      return $this->num_members;
   }
   
   /**
    * calcNumActiveUsers - Finds out how many active users
    * are viewing site and sets class variable accordingly.
    */
   
   
   /**
    * calcNumActiveGuests - Finds out how many active guests
    * are viewing site and sets class variable accordingly.
    */

   
   /**
    * addActiveUser - Updates username's last active timestamp
    * in the database, and also adds him to the table of
    * active users, or updates timestamp if already there.
    */
  
   
   /* addActiveGuest - Adds guest to active guests table */
 
   
   /* These functions are self explanatory, no need for comments */
   
   /* removeActiveUser */
  
   
   /* removeActiveGuest */
  
   
   

  
   /**
    * query - Performs the given query on the database and
    * returns the result, which may be false, true or a
    * resource identifier.
    */
   function query($query){
      return mysqli_query($this->Appconnection,$query);
   }
};

/* Create database Appconnection */

class Applogins
{
   var $username;     //Username given on sign-up
   var $userid;       //Random value generated on current login
   var $useridx;       //Random value generated on current login
   var $user_group_id;    //The level to which the user pertains
   var $time;         //Time user was last active (page loaded)
   var $logged_in;    //True if user is logged in, false otherwise
   var $userinfo = array();  //The array holding all user info
   var $url;          //The page url current being viewed
   var $referrer;
   var $Shown_Name;     //Last recorded site page viewed
   var $logpath;
   var $Csidebar;
   var $moblileno;
   var $empno;
   var $emails;
   var $timeout;
   var $is_suberadmin;
   var $loggedin_time;
   var $userrols=array();      
   /**
    * Note: referrer should really only be considered the actual
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */

   /* Class constructor */
   function __construct(){
      $this->time = time();
      $this->startSession();
   }

   function startSession(){
      $Adatabase = new Applogin_DB;
      session_start();   //Tell PHP to start the session

        $this->timeout=$this->IsLoginSessionExpired();
        if($this->timeout==1)
        {
        $this->logout();   
        }
      /* Determine if user is logged in */
      
      $this->logged_in = $this->checkLogin();
    /**
       * check if user loged in
       */
      if(!$this->logged_in){
        $this->logged_in=false;
         //xxx$Adatabase->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);
      }
      /* Update users last active timestamp */
      else{
         //xxx$Adatabase->addActiveUser($this->username, $this->time);
      }
      
      /* Remove inactive visitors from database */
     //xxx $Adatabase->removeInactiveUsers();
      //xxx$Adatabase->removeInactiveGuests();
        
     
      /* Set referrer page */
      if(isset($_SESSION['lasturl'])){
         $this->referrer = $_SESSION['lasturl'];
      }else{
         $this->referrer = APP_PATH."index.php";
      }

      /* Set current url */
      if ($_SESSION['lasturl']=='') {
         $_SESSION['lasturl']='index.php';
      }
      $this->url = $_SESSION['lasturl'] ;

   }
     /**
    * checkLogin - Checks if the user has already previously
    * logged in, and a session with the user has already been
    * established. Also checks to see if user has been remembered.
    * If so, the database is queried to make sure of the user's 
    * authenticity. Returns true if the user has logged in.
    */
 
function IsLoginSessionExpired() {
    $login_session_duration =0;
    if(COOKIE_EXPIRE=="")
    {
      $login_session_duration =20000;  
    }else{
      $login_session_duration =COOKIE_EXPIRE;  
    }
	 
	 
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["AppUserid"])){
	   $timout=time()-$_SESSION['loggedin_time'];
		if(($timout> $login_session_duration)){ 
			return 1;
		}else{
		  	return 2;
		} 
	}else{
		  	return 2;
		} 
	
}
 
   
   /**
    * checkLogin - Checks if the user has already previously
    * logged in, and a session with the user has already been
    * established. Also checks to see if user has been remembered.
    * If so, the database is queried to make sure of the user's 
    * authenticity. Returns true if the user has logged in.
    */
    
   function checkLogin(){
      $Adatabase = new Applogin_DB;
      /* Check if user has been remembered */
      if(isset($_COOKIE['appcookname']) && isset($_COOKIE['appcookid'])){
         $this->username = $_SESSION['AppLoginName'] = $_COOKIE['appcookname'];
         $this->userid   = $_SESSION['AppUserid']   = $_COOKIE['appcookid'];
         
      }

      /* Username and userid have been set and not guest */
      if(isset($_SESSION['AppLoginName']) && isset($_SESSION['AppUserid']) &&
         $_SESSION['AppLoginName'] != "Gust"){
         /* Confirm that username and userid are valid */
         //0 Success! Username and userid confirmed 2 Indicates userid invalid & 1 Indicates username failure
         if($Adatabase->confirmUserID($_SESSION['AppLoginName'], $_SESSION['AppUserid']) != 0){
            /* Variables are incorrect, user not logged in */
            unset($_SESSION['AppLoginName']);
            unset($_SESSION['AppUserid']);
            return false;
         }else{

         /* User is logged in, set class variables */
         $this->userinfo  = $Adatabase->getUserInfo($_SESSION['AppLoginName']);
         $this->username  = $this->userinfo['Username'];
         $this->userid    = $this->userinfo['User_Key'];
         //$this->empno    = $this->userinfo['Emp_no'];
          $this->useridx  =$_SESSION['useridx'] = $this->userinfo['User_id'];
         $this->user_group_id = $this->userinfo['grup_id'];
         $this->Shown_Name =$_SESSION['Shown_Name']= $this->userinfo['Shown_Name'];
       $lopath =$this->userinfo['Logopaht'];
       // $bb=strlen($lopath);
       //     $ccsG=substr($lopath,3,$bb-2); 
        $str=str_replace("../../uploads/","alfath/uploads/", $lopath);
       $this->logpath=$_SESSION['logpath']=$str;
        $this->emails = $this->userinfo['Primary_Email'];
        $this->is_suberadmin = $this->userinfo['Is_suberadmin'];
        $this->moblileno = $this->userinfo['Moblile_No'];
         if(isset($_SESSION['loggedin_time']))
        {
            $this->loggedin_time=$_SESSION['loggedin_time']; 
        }else{
            $_SESSION['loggedin_time']=  $this->loggedin_time;
        }
         return true;
      }
      }
      /* User not logged in */
      else{
         return false;
      }
   }

   /**
    * login - The user has submitted his username and password
    * through the login form, this function checks the authenticity
    * of that information in the database and creates the session.
    * Effectively logging in the user if all goes well.
    */
   function login($Appuser, $Appupass){
      global  $form;  //The database and form object
      $Adatabase = new Applogin_DB;
      /* Checks that username is in database and password is correct */
      $Appuser = stripslashes($Appuser);
      $result1 = $Adatabase->usernameBanned($Appuser);
      //$result2 = $Adatabase->usernameActived($Appuser);
      if($result1 == 2){
         $this->errorarray["errono"]=1;
         $this->num_errors=1;
          return false;
      }
     
      if($form->num_errors > 0){
         return false;
      }
      $result = $Adatabase->confirmUserPass($Appuser, md5($Appupass));

      /* Check error codes */
      if($result == 1){
         $this->errorarray["errono"]=2;
         $this->num_errors=1;
         return false;
      }else if($result == 2){
         $this->errorarray["errono"]=3;
         $this->num_errors=1;
         return false;
    }
      
      /* Return if form errors exist */
      if($form->num_errors > 0){
         return false;
      }

      /* Username and password correct, register session variables */
      $this->userinfo  = $Adatabase->getUserInfo($Appuser);
      $this->username  = $_SESSION["AppLoginName"] = $this->userinfo['Username'];
      $this->userid    = $_SESSION['AppUserid']   = $this->generateRandID();
      $this->user_group_id = $this->userinfo['grup_id'];
      $this->useridx = $this->userinfo['User_id'];
      /* Insert userid into database and update active users table */
      $ipadd=$this->get_client_ip_server();
     $Adatabase->updateUserField3($this->useridx, "Is_sission_active", '0');
    $Adatabase->updateUserField($this->username, "User_Key", $this->userid);
    $Adatabase->updateHistory($this->username, $this->useridx,$this->userid,$ipadd,time(),"1");
    $Adatabase->addActiveUser($this->useridx, $this->time);
//      $Adatabase->removeActiveGuest($_SERVER['REMOTE_ADDR']);
//
      /**
       * This is the cool part: the user has requested that we remember that
       * he's logged in, so we set two cookies. One to hold his username,
       * and one to hold his random value userid. It expires by the time
       * specified in constants.php. Now, next time he comes to our site, we will
       * log him in automatically, but only if he didn't log out before he left.
       */
        $this->num_errors=0;
       $this->logged_in = true;
       $subremember=true;
       $this->errorarray["errono"]=4;
     if($subremember){
        setcookie("appcookname", $this->username, time()+COOKIE_EXPIRE,COOKIE_PATH);
        setcookie("appcookid",   $this->userid,   time()+COOKIE_EXPIRE,COOKIE_PATH);
        $_SESSION['loggedin_time']= time();                        
     }
    $this->loggedin_time= time();
        
      /* Login completed successfully */
       $this->num_errors=0;
      return true;
   }
    /**
    * get_client_ip_server - Gets called when the user wants to be logged out of the
     */
function get_client_ip_server() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}
//------------------------------------------Get_user_role funcation-----------------------
  function check_user_roles($userid,$pagefilename){
      $Adatabase = new Applogin_DB;
      $rolearray=$Adatabase->Get_UserPage_Roles($userid,$pagefilename);
      return $rolearray;
      }
    /**
    * logout - Gets called when the user wants to be logged out of the
    * website. It deletes any cookies that were stored on the users
    * computer as a result of him wanting to be remembered, and also
    * unsets session variables and demotes his user level to guest.
    */
   function logout(){
      $Adatabase = new Applogin_DB;
      $this->logged_in = false;
        $Adatabase->removeActiveUser($this->useridx);
      /**
       * Delete cookies - the time must be in the past,
       * so just negate what you added when creating the
       * cookie.
       */
       
        unset($_SESSION['loggedin_time']);
         unset($_SESSION['AppLoginName']);
      unset($_SESSION['AppUserid']);
    if(isset($_COOKIE['appcookname']) && isset($_COOKIE['appcookid'])){
        setcookie("appcookname", " ", time()-COOKIE_EXPIRE, COOKIE_PATH);
       setcookie("appcookid",   " ", time()-COOKIE_EXPIRE, COOKIE_PATH);
      
      }
        setcookie("appcookname", " ", time()-COOKIE_EXPIRE, COOKIE_PATH);
       setcookie("appcookid",   " ", time()-COOKIE_EXPIRE, COOKIE_PATH);
 
        unset($_COOKIE['appcookid']);
      unset($_COOKIE['appcookname']);
      /* Unset PHP session variables */
     
     
      /* Reflect fact that user has logged out */
      
      
      /**
       * Remove from active users table and add to
       * active guests tables.
       */
     // $Adatabase->removeActiveUser($this->username);
     // $Adatabase->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);
      
      /* Set user level to guest */
      $this->username  ="Gust";
     // $this->user_group_id = GUEST_LEVEL;
   }

  /**
  * block_user funcation be accessed unless the session has started.
 */
   
function block_user($Appuser)
{
   $Adatabase = new Applogin_DB;  
    //$Adatabase->updateUserField($Appuser, "Is_Blocked", 1);
}



   /**
    * generateRandID - Generates a string made up of randomized
    * letters (lower and upper case) and digits and returns
    * the md5 hash of it to be used as a userid.
    */
   function generateRandID(){
      return md5($this->generateRandStr(16));
   }
   
   /**
    * generateRandStr - Generates a string made up of randomized
    * letters (lower and upper case) and digits, the length
    * is a specified parameter.
    */
   function generateRandStr($length){
      $randstr = "";
      for($i=0; $i<$length; $i++){
         $randnum = mt_rand(0,61);
         if($randnum < 10){
            $randstr .= chr($randnum+48);
         }else if($randnum < 36){
            $randstr .= chr($randnum+55);
         }else{
            $randstr .= chr($randnum+61);
         }
      }
      return $randstr;
   }
};
$Adatabase = new Applogin_DB;
$Applogins_cls = new Applogins;
 

/* Initialize form object */
//echo $Applogins_cls->login("mmm","engassa");
?>
