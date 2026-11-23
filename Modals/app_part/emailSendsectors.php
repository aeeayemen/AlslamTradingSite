<?php 

include '../../techcms/Models/App_Classes/Authentication.php';  
$sectorEmail=Auth::CleanXss($_POST['emailsectors']);
$name=Auth::CleanXss($_POST['name']);
$email=Auth::CleanXss($_POST['email']);
$phone=Auth::CleanXss($_POST['phone']); 
$subject=Auth::CleanXss($_POST['subject']); 
$message=Auth::CleanXss($_POST['message']); 
$message='

<table width="500" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style=" border-collapse: collapse !important;">
  <tr>
    <td style="border: 1px solid cyan;">
        <table width="500" border="0" cellspacing="0" cellpadding="8">
      <tr>
        <td colspan="2" bgcolor="#CDD9F5" style="border: 1px solid cyan;"><strong>تواصل  معنا   </strong></td>
      </tr>
      <tr>
        <td width="168" bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>الاسم</strong></td>
        <td width="290" bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$name.'</td>
      </tr>
    
      <tr>
        <td bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>بريد الكتروني: </strong></td>
        <td bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$email.'</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;"><strong> الهاتف  </strong></td>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;">'.$phone.'</td>
      </tr> 
      <tr>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;"><strong>المووضوع </strong></td>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;">'.$subject.'</td>
      </tr> 
      <tr>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;"><strong>نص الرسالة .</strong></td>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;">'.$message.'</td>
      </tr>
     
 
       
       
   
    </table>

</td>
  </tr>
</table> 
';
  
 
require_once '../../techcms/App/App_constant.php'; 
require('../../techcms/mail/class.phpmailer.php');
require_once '../../techcms/mail/class.smtp.php';
date_default_timezone_set('Asia/Kuwait');


       
       
      $DetailCompany = array(); 
      $output= array(); 
      
      $to=$sectorEmail;
      //$to="sd@techsoft-ye.com"; 
        $subject=EMAIL_FROM_NAME;

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

      $mail->SetFrom($email,$name);

      $mail->AddReplyTo($email,$name);
      $mail->AddAddress($to,EMAIL_FROM_NAME);
      $mail->Subject = $subject;
       
      $mail->MsgHTML($content);
      //$mail->IsHTML(true);

      if(!$mail->Send()) 
         {

          echo 'الرسالة  لم يهم ارسالة.';
          echo 'Mailer error: ' . $mail->ErrorInfo;

         }
         
        else
        {
                echo "تم الارسال بنجاح";
        }
 
?>