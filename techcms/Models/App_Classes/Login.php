<?php
/**
 *كلاس تسجيل الدخول 
 * يحتوي على عدة دوال 
 * كل دالة واضحه من اسمها   
 */
error_reporting(E_ERROR|E_PARSE);

include("App_constant.php");
include("DB.php");
include("Forms.php");

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
   var $errorarray = array();
   var $num_errors;
   var $emails;
   var $timeout;
   var $loggedin_time;      
   /**
    * Note: referrer should really only be considered the actual
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */

   /* Class constructor */
   function Applogins(){
      $this->time = time();
      $this->startSession();
   }

   function startSession(){
      global $Adatabase;  //The database connection
      session_start();   //Tell PHP to start the session

        $this->timeout=$this->IsLoginSessionExpired();
        if($this->timeout==1)
        {
        $_SESSION['lasturl']=$this->url;               
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
      
      
      if(isset($_SESSION['lasturl'])){
         $this->referrer = $_SESSION['url'];
      }else{
         $this->referrer = APP_PATH."index.php";
      }

      /* Set current url */
    

      /* Set current url */
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
	$login_session_duration =COOKIE_EXPIRE; 
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
      global $Adatabase;  //The database connection
      /* Check if user has been remembered */
      if(isset($_COOKIE['appcookname']) && isset($_COOKIE['appcookid'])){
         $this->username = $_SESSION['AppLoginName'] = $_COOKIE['appcookname'];
         $this->userid   = $_SESSION['AppUserid']   = $_COOKIE['appcookid'];
         //$_SESSION['url']= $this->referrer;
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
         $this->useridx    = $this->userinfo['User_id'];
         $this->user_group_id = $this->userinfo['grup_id'];
         $this->Shown_Name = $this->userinfo['Shown_Name'];
       $this->logpath = $this->userinfo['Logopaht'];
        $this->emails = $this->userinfo['Primary_Email'];
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
      global $Adatabase;  //The database and form object
      /* Checks that username is in database and password is correct */
      $Appuser = stripslashes($Appuser);
      $result1 = $Adatabase->usernameBanned($Appuser);
      //$result2 = $Adatabase->usernameActived($Appuser);
      if($result1 == 2){
         $this->errorarray["errono"]=1;
         $this->num_errors=1;
      }
     
      if($this->num_errors > 0){
         return false;
      }
      $result = $Adatabase->confirmUserPass($Appuser, md5($Appupass));

      /* Check error codes */
      if($result == 1){
         $this->errorarray["errono"]=2;
         $this->num_errors=1;
      }
      else if($result == 2){
      $this->errorarray["errono"]=3;
         $this->num_errors=1;
      }
      
      /* Return if form errors exist */
      if($this->num_errors > 0){
         return false;
      }

      /* Username and password correct, register session variables */
      $this->userinfo  = $Adatabase->getUserInfo($Appuser);
      $this->username  = $_SESSION["AppLoginName"] = $this->userinfo['Username'];
      $this->userid    = $_SESSION['AppUserid']   = $this->generateRandID();
      $this->user_group_id = $this->userinfo['Auser_group_id'];
      /* Insert userid into database and update active users table */
    $Adatabase->updateUserField($this->username, "User_Key", $this->userid);
    $Adatabase->updateHistory($this->username, $this->userid);
//      $Adatabase->addActiveUser($this->username, $this->time);
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


function block_user($Appuser)
{
   global $Adatabase;  //The database connection  
    $Adatabase->updateUserField($Appuser, "Is_Blocked", 1);
}


   /**
    * logout - Gets called when the user wants to be logged out of the
    * website. It deletes any cookies that were stored on the users
    * computer as a result of him wanting to be remembered, and also
    * unsets session variables and demotes his user level to guest.
    */
   function logout(){
      global $Adatabase;  //The database connection
      $this->logged_in = false;
   
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


/**
 * Initialize session object - This must be initialized before
 * the form object because the form uses session variables,
 * which cannot be accessed unless the session has started.
 */
$Applogins_cls = new Applogins;


?>
