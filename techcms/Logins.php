<?php 
/**
 *شاشة تسجيل الدخول  
 */
require_once("App/App_constant.php");
require_once("Models/App_Classes/Logins.php");
require_once("Models/App_Classes/App_Funcations.php");

  require_once(MODEL_DIR."/App_Classes/Langauge.php");
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);//Detecting Default Browser language
 $language = New Language("ar");
 $langs = array();
  $langs =  $language->userLanguage();
  $lngdir= $language->userLangDir();
//session array to genrate session key for user

  

if($Applogins_cls->logged_in){
  $userid=$Applogins_cls->user_group_id;
  $group_key=$Adatabase->GetGroupUserType($userid);

    header("Location:admin/index.php");
 

}



$Fun_cls=new App_Funcation();

require_once("Models/App_Parts/HeaderLogin.php");

?>
 

<!-- END HEAD -->
<body class="login" style="background-color: #ffffff !important;" dir="rtl">
<!-- BEGIN LOGO -->
<div class="logo">
  <a href="index.php">
  <img src="<?php echo $app["SLogo_Path"];?>"  alt="<?php echo $app["App_name_ar"]?>" style="width:300px "/>
  </a>
</div>

<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content" style="background-color: #00477f !important;"> <!-- BEGIN LOGIN FORM -->
       <div id="div-forms" >
  <form  id="form_sample_1" class="login-form" method="post">
        <h3 class="form-title"><?php  echo $langs["LOGIN_WMSG"]; ?></h3>
  
  <div class="alert alert-danger display-hide" style="text-align: center;" id="erroxsmsg">
                    
            <strong><?php  echo $langs["LOGIN_Err1"]; ?></strong>
                      
                    </div>
                    <div class="alert alert-success display-hide" id="successmsg">
                    
                    <strong><?php  echo $langs["LOGIN_SUCSMSG"]; ?></strong>
                    </div>
                  
                  
    <div class="form-group">
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9"><?php  echo $langs["LOGIN_UNMTITL"]; ?></label>
      <div class="input-icon">
        <i class="fa fa-user"></i>
               <input  type="text"   class="form-control placeholder-no-fix"  name="AppUser_name"  id="AppUser_name" placeholder="<?php  echo $langs["LOGIN_UNMTITL"]; ?>" />
            </div>
    </div>
       
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9"><?php  echo $langs["LOGIN_PASSTITL"]; ?></label>
      <div class="input-icon">
        <i class="fa fa-lock"></i>
        <input class="form-control placeholder-no-fix" value=""  
                type="password" autocomplete="off" placeholder="<?php  echo $langs["LOGIN_PASSTITL"]; ?>" id="AppPassword" name="AppPassword"/>
      </div>
    </div>
    
    
    <div class="form-actions">
      <label class="checkbox">
      <input type="checkbox" name="remember" id="remember" /> <strong><?php  echo $langs["LOGIN_REMCHKBOXTITL"]; ?></strong> </label>
      <input type="button" class="btn blue pull-right" name="lgoinbtn" id="lgoinbtn" value="<?php  echo $langs["LOGIN_BTNTITL"]; ?>"/>
            <input  type="hidden" name="sublogin" id="sublogin" value="1"/>
    </div>
       <div class="form-actions">
                                <button id="login_lost_btn" type="button" class="btn btn-link">نسيت  كلمة  المرور   ؟</button>
                              <!--   <button id="login_register_btn" type="button" class="btn btn-link">إنشــاء حساب جديد</button> -->
                            </div>
  
  </form>

               <form id="lost-form" style="display:none;">
                  <div class="modal-body">
                            <input    name="checkopration"  class="form-control" type="hidden" placeholder="Password" value="ForgetPassord">
                <div id="div-lost-msg">
                                <div id="icon-lost-msg" class="fa  fa-chevron-left  control-label"></div>
                                <span id="text-lost-msg " class="control-label">اكتب بريدك الالكتروني.</span>
                            </div>
                                <div class="form-group">

                                    <label for="username" class="dinblock"> البريد  الاكتروني  </label>
                                      <input id="Email" class="form-control" type="text" name="Email" placeholder="E-Mail" required>
                                </div>

                       <!--     <div class="form-group"> 
                                 <label for="Moblile_No" class="dinblock">رقم  التلفون  </label>
                                  <input id="Moblile_No" class="form-control " name="Moblile_No" type="text" placeholder="" >
                                </div>   -->
                       

                           
                  </div>
                <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">إرسال</button>
                            </div>
                         <div class="form-actions">
                                <button id="lost_login_btn" type="button" class="btn btn-link">دخول  </button>
                              <!--   <button id="lost_register_btn" type="button" class="btn btn-link">إنشــاء حساب جديد</button> -->
                            </div>

                </div>
                    </form>
  
</div>
    
  <!-- END FORGOT PASSWORD FORM -->
  <!-- END REGISTRATION FORM -->
<div class="copyright">
   

          <p>© <?php  echo date('Y'); ?>&nbsp; جميع الحقوق محفوظة  .لدى      <?php echo APP_NAME;?> &nbsp; تصميم وبرمجة  <a href="http://techsoft-ye.com/" style="color:red"><?php echo $app["CopRight"]; ?></a></p>
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo PLUGINS_DIR_login; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR_login; ?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR_login; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR_login; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR_login; ?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR_login; ?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->


<script type="text/javascript" src="<?php echo PLUGINS_DIR_login; ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo PLUGINS_DIR_login; ?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
 <script type="text/javascript"  src="<?php echo PLUGINS_DIR_login; ?>/js/ModalLogininneer.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
 
<!-- END PAGE LEVEL SCRIPTS -->
 
 
<script>
 
var form1 = $( "#form_sample_1" );

  
$("#lgoinbtn").click(function() {
    form1.validate();
      var issuccess= form1.valid();
      if  (issuccess==true){      
     var EmployeeNo=document.getElementById("AppUser_name").value;
     var upass=document.getElementById("AppPassword").value;
       $("#erroxsmsg").hide();
     var lang="<?php echo $lngdir?>";
     var isremeber=false;
      if ($("#remember").is(":checked")==true)
          {
            isremeber=true;
            }else{
                isremeber=false;
            }
             
            $.post( 
             "Models/App_Classes/Logincheck.php",
             {  EmployeeNos:EmployeeNo,
                   APasswords:upass,
                   remeber:  isremeber,
                 checkid:'logins' },
            function(resultadmin) {
               
                if(resultadmin=="")
                {
                    
              alert("Error try again");
                }else{
                    
                
               var xcount =resultadmin.status;
                var urls =resultadmin.url;
                ///var res = str.replace("Microsoft", "W3Schools");
             // alert("username"+xcount+"pass"+lang+"vali");
            
               check_msgs(xcount,urls);
               
               }
               
             },'json');     
                          
         
                        
          
          }
     //document.getElementById("form_sample_1").submit();

});
//-------------------end-----------------------------------
    function check_msgs(xcount,urls){
     
         
             var valmsg;
                 var success=$('#successmsg');
        var error=$('#erroxsmsg');
         if(xcount==1){
             $('#erroxsmsg').text('');
            $("#successmsg").hide();
             valmsg="<strong><?php echo $langs["LOGIN_Blocked"]; ?></strong>"
            $('#erroxsmsg').append(valmsg);
            success.hide();
             error.show();
            }else  if(xcount==2){
             $('#erroxsmsg').text('');
            $("#successmsg").hide();
             valmsg="<strong><?php echo $langs["LOGIN_UKNOWNUSR"]; ?></strong>"
            $('#erroxsmsg').append(valmsg);

            success.hide();
             error.show();
            }else  if(xcount==3){
             $('#erroxsmsg').text('');
            $("#successmsg").hide();
             valmsg="<strong><?php echo $langs["LOGIN_WRONGPASS"]; ?></strong>"
            $('#erroxsmsg').append(valmsg);
            success.hide();
             error.show();
            }else  if(xcount==4){
             $('#erroxsmsg').text('');
           
             valmsg="<strong><?php echo $langs["LOGIN_Sucess"]; ?></strong>"
          $('#successmsg').text('');
        $('#successmsg').append(valmsg);
          $("#erroxsmsg").hide();
          $("#successmsg").show();
         //window.location("TLogin4.php");
         //alert(urls);
          window.location.assign(urls+"?redirect");
            }
        else  if(xcount==5){
             $('#erroxsmsg').text('');
            $("#successmsg").hide();
             valmsg="<strong><?php echo $langs["LOGIN_MAXATEMPT"]; ?></strong>"
            $('#erroxsmsg').append(valmsg);

            success.hide();
             error.show();
            }
    }
    function setmssg()
    {
           var success=$('#successmsg');
        var error=$('#erroxsmsg');
       $("#successmsg").hide();
        $("#erroxsmsg").hide();
        return false;    
    }
    
var message="Function Disabled!";

///////////////////////////////////
// function clickIE4(){
// if (event.button==2){

// return false;
// }
// }

// function clickNS4(e){
// if (document.layers||document.getElementById&&!document.all){
// if (e.which==2||e.which==3){

// return false;
// }
// }
// }

// if (document.layers){
// document.captureEvents(Event.MOUSEDOWN);
// document.onmousedown=clickNS4;
// }
// else if (document.all&&!document.getElementById){
// document.onmousedown=clickIE4;
// }
// document.oncontextmenu=new Function("return false");
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>