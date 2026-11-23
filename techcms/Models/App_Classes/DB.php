<?php
/**
 * كلاس خاص بدوال قاعدة البيانات 
 * يحتوى على عدة دوال
 * يتم استدعائه من الكلاسات الاخرى  
 */
error_reporting(E_ERROR|E_PARSE);

include("App_constant.php");
class Applogin_DB
{
   var $Appconnection;         //The MySQL database Vconnection
   var $num_active_users;   //Number of active users viewing site
   var $num_active_guests;  //Number of active guests viewing site
   var $num_members;        //Number of signed-up users
   /* Note: call getNumMembers() to access $num_members! */

   /* Class constructor */
   function Applogin_DB(){
      /* Make Aconnection to database */
      $this->Appconnection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysql_error());
      mysql_select_db(DB_NAME, $this->Appconnection) or die(mysql_error());
        
      /**
       * Only query database to find out number of members
       * when getNumMembers() is called for the first time,
       * until then, default value set.
       */
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
      $result = mysql_query($q, $this->Appconnection);
      if(!$result || (mysql_numrows($result) < 1)){
         return 1; //Indicates username failure
      }

      /* Retrieve password from result, strip slashes */
      $dbarray = mysql_fetch_array($result);
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
      $result = mysql_query($q, $this->Appconnection);
      if(!$result || (mysql_numrows($result) < 1)){
         return 1; //Indicates username failure
      }

      /* Retrieve userid from result, strip slashes */
      $dbarray = mysql_fetch_array($result);
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
      $result = mysql_query($q, $this->Appconnection);
      return (mysql_numrows($result) > 0);
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
      $result = mysql_query($q, $this->Appconnection);
      if(mysql_numrows($result)>0)
      {
        return 2;
      }else if(mysql_numrows($result)==0)
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
      $result = mysql_query($q, $this->Appconnection);
      if(mysql_numrows($result)>0)
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
      return mysql_query($q, $this->Appconnection);
   }
   /**
    * updateUserField - Updates a field, specified by the field
    * parameter, in the user's row of the database.
    */
   function updateUserField3($username, $field, $value){
      $q = "UPDATE  login_history SET ".$field." = '$value' WHERE User_id  = '$username'";
      return mysql_query($q, $this->Appconnection);
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
      return mysql_query($q, $this->Appconnection);
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
      return mysql_query($q, $this->Appconnection);
   }
   
    /* removeActiveUser */
   function removeActiveUser($useid){
     
      $q = "DELETE FROM Active_user WHERE User_id = '$useid'";
      mysql_query($q, $this->Appconnection);
    
   }
   
    /* getUserInfo */
   function getUserInfo($username){
      $q = "SELECT * FROM ".TBL_USERS." WHERE Username  = '$username'";
      mysql_query("SET SESSION CHARACTER_SET_RESULTS =utf8;",$this->Appconnection);
      $result = mysql_query($q, $this->Appconnection);
      
      /* Error occurred, return given name by default */
      if(!$result || (mysql_numrows($result) < 1)){
         return NULL;
      }
      /* Return result array */
      $dbarray = mysql_fetch_array($result);
      return $dbarray;
   }
   //-----------------------------get use page role ----------------------------------------
   
   /* getUserInfo */
   function Get_UserPage_Roles($grupid,$pagefilename){
//    echo $grupid;
   $sqlq="SELECT Privilege_id  FROM  users_group_privilegs_config where grup_id =$grupid  AND is_granted='1' AND Page_id= ( SELECT  `Page_id` FROM  `app_pages`  WHERE  `Page_filename` ='$pagefilename')";
    $rolarrayx=array();
  mysql_query("SET SESSION CHARACTER_SET_RESULTS =utf8;",$this->Appconnection);
     $result = mysql_query($sqlq, $this->Appconnection);
      /* Error occurred, return given name by default */
       
      if(!$result || (mysql_numrows($result) < 1)){
        
     $rolarx2=$this->fix_role_list($rolarrayx);
  return $rolarx2;
      }
      
         while ($row = mysql_fetch_assoc($result)) {
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
      $result = mysql_query($q, $this->Appconnection);
      /* Error occurred, return given name by default */
      if(!$result || (mysql_numrows($result) < 1)){
         return NULL;
      }
      /* Return result array */
      $dbarray = mysql_fetch_array($result);
      return $dbarray;
   }
   //----------------------Get Login Id
   function getlogin_id($userid){
      $q = "SELECT max(Login_id)+1 as maxusrid FROM  login_history WHERE User_id  = '$userid'";
      $result = mysql_query($q, $this->Appconnection);
      /* Error occurred, return given name by default */
      if(!$result || (mysql_numrows($result) < 1)){
         return 1;
      }
      /* Return result array */
      $dbarray = mysql_fetch_array($result);
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
         $result = mysql_query($q, $this->Appconnection);
         $this->num_members = mysql_numrows($result);
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
      return mysql_query($query, $this->Appconnection);
   }
};

/* Create database Appconnection */
$Adatabase = new Applogin_DB;
//$aa=$Adatabase->Get_UserPage_Roles(3,"Jobs-Managment");
//print_r($aa);

//$Adatabase->updateHistory("mrssam",1,"fsm4gsxgwrs","192.169.199.1","234244","Yes");
//$aa= $Adatabase->getlogin_id(1);
//echo $aa;
?>
