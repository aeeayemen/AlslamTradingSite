<?php
/**
 * كود انشاء السيضن او الجلسة 
 * خاص بعمليات تسجيل الدخول 
 * كل داله واضحه من اسمها   
 */
include("database.php");
include("form.php");

class Adlogins
{
   var $username;     //Username given on sign-up
   var $userid;       //Random value generated on current login
   var $userlevel;    //The level to which the user pertains
   var $time;         //Time user was last active (page loaded)
   var $logged_in;    //True if user is logged in, false otherwise
   var $userinfo = array();  //The array holding all user info
   var $url;          //The page url current being viewed
   var $referrer;
   var $fallname;     //Last recorded site page viewed
   var $logpath;
   var $Csidebar;
      var $moblileno;
        var $address;
   var $emails;
      var $userlevelz;   
   /**
    * Note: referrer should really only be considered the actual
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */

   /* Class constructor */
   function Adlogins(){
      $this->time = time();
      $this->startSession();
   }

   function startSession(){
      global $Adatabase;  //The database connection
      session_start();   //Tell PHP to start the session

      /* Determine if user is logged in */
      $this->logged_in = $this->checkLogin();

      if(!$this->logged_in){
        $this->logged_in=false;
         $Adatabase->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);
      }
      /* Update users last active timestamp */
      else{
         $Adatabase->addActiveUser($this->username, $this->time);
      }
      
      /* Remove inactive visitors from database */
      $Adatabase->removeInactiveUsers();
      $Adatabase->removeInactiveGuests();
      
      /* Set referrer page */
      if(isset($_SESSION['url'])){
         $this->referrer = $_SESSION['url'];
      }else{
         $this->referrer = "/";
      }

      /* Set current url */
      $this->url = $_SESSION['url'] = $_SERVER['PHP_SELF'];
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
      if(isset($_COOKIE['adcookname']) && isset($_COOKIE['advcookid'])){
         $this->username = $_SESSION['Aduser_name'] = $_COOKIE['adcookname'];
         $this->userid   = $_SESSION['Auserid']   = $_COOKIE['advcookid'];
         
      }

      /* Username and userid have been set and not guest */
      if(isset($_SESSION['Aduser_name']) && isset($_SESSION['Auserid']) &&
         $_SESSION['Aduser_name'] != GUEST_NAME){
         /* Confirm that username and userid are valid */
         if($Adatabase->confirmUserID($_SESSION['Aduser_name'], $_SESSION['Auserid']) != 0){
            /* Variables are incorrect, user not logged in */
            unset($_SESSION['Aduser_name']);
            unset($_SESSION['Auserid']);
         
               
            return false;
         }

         /* User is logged in, set class variables */
         $this->userinfo  = $Adatabase->getUserInfo($_SESSION['Aduser_name']);
         $this->username  = $this->userinfo['Aduser_name'];
         $this->userid    = $this->userinfo['Auserid'];
         $this->userlevel = $this->userinfo['Auserlevel'];
         $this->fallname = $this->userinfo['Full_name'];
       $this->logpath = $this->userinfo['Admin_Logo_Path'];
        $this->userlevelz = $this->userinfo['Auserlevel'];
        $this->emails = $this->userinfo['Admin_Emails'];
        $this->moblileno = $this->userinfo['Moblile_No'];
        $this->address = $this->userinfo['address'];
         return true;
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
   function login($subuser, $subpass, $subremember){
      global $Adatabase, $form;  //The database and form object

      /* Username error checking */
      $field = "user";  //Use field name for username
      if(!$subuser || strlen($subuser = trim($subuser)) == 0){
         $form->setError($field, "* يجب ادخال اسم المستخدم");
      }
      else{
         /* Check if username is not alphanumeric */
         if(!eregi("^([0-9a-z])*$", $subuser)){
            $form->setError($field, "* يجب ان يكون اسم المستخدم  حروف انجليزيه");
         }
      }

      /* Password error checking */
      $field = "pass";  //Use field name for password
      if(!$subpass){
         $form->setError($field, "* يجب ادخال كلمة المرور");
      }
      
      /* Return if form errors exist */
      if($form->num_errors > 0){
         return false;
      }

      /* Checks that username is in database and password is correct */
      $subuser = stripslashes($subuser);
      $result1 = $Adatabase->usernameBanned($subuser);
      if($result1 == 2){
         $field = "user";
         $form->setError($field, "<strong>لاتستطيع الدخول لقد  تم حظر المستخدم من قبل مدير النظام</strong>");
      }
      if($form->num_errors > 0){
         return false;
      }
      $result = $Adatabase->confirmUserPass($subuser, md5($subpass));

      /* Check error codes */
      if($result == 1){
         $field = "user";
         $form->setError($field, "<strong>هذا المستخدم غير موجود</strong>");
      }
      else if($result == 2){
         $field = "pass";
         $form->setError($field, "<strong>* كلمة المرور غير صحيحة</strong>");
      }
      
      /* Return if form errors exist */
      if($form->num_errors > 0){
         return false;
      }

      /* Username and password correct, register session variables */
      $this->userinfo  = $Adatabase->getUserInfo($subuser);
      $this->username  = $_SESSION['Aduser_name'] = $this->userinfo['Aduser_name'];
      $this->userid    = $_SESSION['Auserid']   = $this->generateRandID();
      $this->userlevel = $this->userinfo['Auserlevel'];
      /* Insert userid into database and update active users table */
      $Adatabase->updateUserField($this->username, "Auserid", $this->userid);
      $Adatabase->addActiveUser($this->username, $this->time);
      $Adatabase->removeActiveGuest($_SERVER['REMOTE_ADDR']);

      /**
       * This is the cool part: the user has requested that we remember that
       * he's logged in, so we set two cookies. One to hold his username,
       * and one to hold his random value userid. It expires by the time
       * specified in constants.php. Now, next time he comes to our site, we will
       * log him in automatically, but only if he didn't log out before he left.
       */
      if($subremember){
         setcookie("adcookname", $this->username, time()+COOKIE_EXPIRE, COOKIE_PATH);
         setcookie("advcookid",   $this->userid,   time()+COOKIE_EXPIRE, COOKIE_PATH);
      }

      /* Login completed successfully */
      return true;
   }

   /**
    * logout - Gets called when the user wants to be logged out of the
    * website. It deletes any cookies that were stored on the users
    * computer as a result of him wanting to be remembered, and also
    * unsets session variables and demotes his user level to guest.
    */
   function logout(){
      global $Adatabase;  //The database connection
      /**
       * Delete cookies - the time must be in the past,
       * so just negate what you added when creating the
       * cookie.
       */
      if(isset($_COOKIE['adcookname']) && isset($_COOKIE['advcookid'])){
         setcookie("adcookname", "", time()-COOKIE_EXPIRE, COOKIE_PATH);
         setcookie("advcookid",   "", time()-COOKIE_EXPIRE, COOKIE_PATH);
      }

      /* Unset PHP session variables */
      unset($_SESSION['Aduser_name']);
      unset($_SESSION['Auserid']);
     
      /* Reflect fact that user has logged out */
      $this->logged_in = false;
      
      /**
       * Remove from active users table and add to
       * active guests tables.
       */
      $Adatabase->removeActiveUser($this->username);
      $Adatabase->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);
      
      /* Set user level to guest */
      $this->username  = GUEST_NAME;
      $this->userlevel = GUEST_LEVEL;
   }

  
   
   
   /**
    * editAccount - Attempts to edit the user's account information
    * including the password, which it first makes sure is correct
    * if entered, if so and the new password is in the right
    * format, the change is made. All other fields are changed
    * automatically.
    */
   function editAccount($subcurpass, $subnewpass, $subemail){
      global $Adatabase, $form;  //The database and form object
      /* New password entered */
      if($subnewpass){
         /* Current Password error checking */
         $field = "curpass";  //Use field name for current password
         if(!$subcurpass){
            $form->setError($field, "* يجب ادخال كلمة المرور");
         }
         else{
            /* Check if password too short or is not alphanumeric */
            $subcurpass = stripslashes($subcurpass);
            if(strlen($subcurpass) < 4 ||
               !eregi("^([0-9a-z])+$", ($subcurpass = trim($subcurpass)))){
               $form->setError($field, "* كلمة المرور غير صحيحه");
            }
            /* Password entered is incorrect */
            if($Adatabase->confirmUserPass($this->username,md5($subcurpass)) != 0){
               $form->setError($field, "* Current Password incorrect");
            }
         }
         
         /* New Password error checking */
         $field = "newpass";  //Use field name for new password
         /* Spruce up password and check length*/
         $subpass = stripslashes($subnewpass);
         if(strlen($subnewpass) < 4){
            $form->setError($field, "* New Password too short");
         }
         /* Check if password is not alphanumeric */
         else if(!eregi("^([0-9a-z])+$", ($subnewpass = trim($subnewpass)))){
            $form->setError($field, "* New Password not alphanumeric");
         }
      }
      /* Change password attempted */
      else if($subcurpass){
         /* New Password error reporting */
         $field = "newpass";  //Use field name for new password
         $form->setError($field, "* New Password not entered");
      }
      
      /* Email error checking */
      $field = "email";  //Use field name for email
      if($subemail && strlen($subemail = trim($subemail)) > 0){
         /* Check if valid email address */
         $regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
                 ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
                 ."\.([a-z]{2,}){1}$";
         if(!eregi($regex,$subemail)){
            $form->setError($field, "*بريد الكتروني غير موجود او خاطئ");
         }
         $subemail = stripslashes($subemail);
      }
      
      /* Errors exist, have user correct them */
      if($form->num_errors > 0){
         return false;  //Errors with form
      }
      
      /* Update password since there were no errors */
      if($subcurpass && $subnewpass){
         $Adatabase->updateUserField($this->username,"password",md5($subnewpass));
      }
      
      /* Change Email */
      if($subemail){
         $Adatabase->updateUserField($this->username,"email",$subemail);
      }
      
      /* Success! */
      return true;
   }
   
   /**
    * isAdmin - Returns true if currently logged in user is
    * an administrator, false otherwise.
    */
   function isAdmin(){
      return ($this->userlevel == ADMIN_LEVEL ||
              $this->username  == ADMIN_NAME);
   }
   
    function isMaster(){
      return ($this->userlevel == MASTER_LEVEL);
 }
   
    function isAgent(){
      return ($this->userlevel == AGENT_LEVEL);
	}
   
    function isMember(){
      return ($this->userlevel == AGENT_MEMBER_LEVEL);
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
$adlogins = new Adlogins;

/* Initialize form object */
$form = new Form;

?>
