<?php


  
 require_once 'App_constant.php';
$conect=mysqli_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS,PHPGRID_DBNAME)or die("cannot connect"); 
 
   mysqli_set_charset($conect, "utf8");

 
require('../../mail/class.phpmailer.php');
require_once '../../mail/class.smtp.php';
date_default_timezone_set('Asia/Kuwait');
 
  $email = $_POST['email'];
  $check ="SELECT * FROM subscribusers WHERE email='$email'";
   $outputs=mysqli_query($conect,$check) or die (mysqli_error() );
  $check = mysqli_fetch_array($outputs);
  $emailcheck = $check['email'];
  $hash = md5($email);
  $mss=date('Y-m-d');
  if($emailcheck == $email){
    echo "انت مشترك   من قبل!";
  }else{

  $query = mysqli_query($conect,"INSERT INTO subscribusers(email,hash,subscribDate) VALUES('$email','$hash','$mss')");
  if ($query) {
    echo "<h1>أنت مشترك بنجاح في قائمتنا البريدية. تحقق من بريدك الالكتروني!</h1>";
         $link = 'https://amaninsco.com/techcms/Models/App_Classes/unsubscribe.php?key='.$hash; //change your domain here.
         $link="";
$to="$email"; //change to ur mail address
      $strSubject=" اشتراك البريد الإلكتروني";
        $message = '<p>شكرا للاشتراك <br>Email: '.$email.'.</p>' ;
        $message .= '<p>انقر هنا لإلغاء الاشتراك في بريدك الإلكتروني: <a href="'.$link.'">
        إلغاء الاشتراك</a></p>' ;
        $form="amaninsco@amaninsco.com";
        $formName="";

$mail = new PHPMailer();
//$subject = "this is password";
$content =$message;
$mail->CharSet = 'UTF-8'; 
  $mail->SMTPDebug  = 0; 
$mail->IsSMTP(); 
$mail->Host= SMTPHOST;
$mail->SMTPAuth = true;
                 
$mail->Port = SMTP_PORT;              //set smtp port for the gmail
$mail->Username   = SMTP_USERNAME;    //yourname@yourdomain
$mail->Password   = SMTP_PASSWORD;      //password

$mail->SetFrom($form,EMAIL_FROM_NAME);

$mail->AddReplyTo($email,$strSubject);
$mail->AddAddress($to,$strSubject);
$mail->Subject = $strSubject;
 
$mail->MsgHTML($content);
//$mail->IsHTML(true);

if(!$mail->Send()) 
   {

     echo 'الرسالة  لم يهم ارسالة.';
      echo  'Mailer error: ' . $mail->ErrorInfo;

   }
   
  else
  {
           echo "تم الارسال بنجاح";
  }
        
       
  }	else{
			 echo mysqli_error();
		 }
  }
 

 
 








?>