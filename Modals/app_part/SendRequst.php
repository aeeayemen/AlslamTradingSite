<?php 
$TypeReqest=$_REQUEST['TypeReqest']; 
$TradeName=$_REQUEST['TradeName'];
$email=$_REQUEST['email']; 
$applicantname=$_REQUEST['applicantname']; 
$CartonForm="";
$ContentRequest="";
$TitleType="";
if ($TypeReqest=="DishesForm") {
  $TitleType="منتج اطباق البيض";
  $color=$_REQUEST['color'];
$TypeDishes=$_REQUEST['TypeDishes']; 
$ContentRequest='
<tr>
      

       <tr>
        <td width="168" bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>النوع *

        </strong></td>
        <td width="290" bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$TypeDishes.'</td>
      </tr> 
      <tr>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;"><strong> اللون : *

 </strong></td>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;">'.$color.'</td>
      </tr>  


 ';


}else{

  $TitleType="منتج الكرتون المضلع";
$Length=$_REQUEST['Length'];
$width=$_REQUEST['width'];
$Height=$_REQUEST['Height'];
$colorpeage=$_REQUEST['colorpeage'];

$ContentRequest='
<tr>
        <td width="168" bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>الطول : *
      </strong></td>
        <td width="290" bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$Length.'</td>
      </tr>
      <tr>
        <td width="168" bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>العرض : * </strong></td>
        <td width="290" bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$width.'</td>
      </tr>

       <tr>
        <td width="168" bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>الأرتفاع : *
        </strong></td>
        <td width="290" bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$Height.'</td>
      </tr> 
      <tr>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;"><strong>لون الورقة الخارجية :*
 </strong></td>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;">'.$colorpeage.'</td>
      </tr>  


 ';
}

$quantity=$_REQUEST['quantity'];
$mobile=$_REQUEST['mobile']; 
$message=$_REQUEST['Notes']; 
$content='

<table width="500" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style=" border-collapse: collapse !important;">
  <tr>
    <td style="border: 1px solid cyan;">
        <table width="500" border="0" cellspacing="0" cellpadding="8">
      <tr>
        <td colspan="2" bgcolor="#CDD9F5" style="border: 1px solid cyan;"><strong>طلب منتج  :- '.$TitleType.'</strong></td>
      </tr>
      <tr>
        <td width="168" bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>الاسم التجاري :* </strong></td>
        <td width="290" bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$TradeName.'</td>
      </tr>
      <tr>
        <td width="168" bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>اسم مقدم الطلب : *</strong></td>
        <td width="290" bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$applicantname.'</td>
      </tr>
      <tr>
        <td width="168" bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>رقم الجوال *</strong></td>
        <td width="290" bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$mobile.'</td>
      </tr>
       <tr>
        <td bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>بريد الكتروني: </strong></td>
        <td bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$email.'</td>
      </tr>
      
       '.$ContentRequest.'


       <tr>
        <td width="168" bgcolor="#FFFFEC" style="border: 1px solid cyan;"><strong>الكمية المطلوبة : *</strong></td>
        <td width="290" bgcolor="#FFFFEC" style="border: 1px solid cyan;">'.$quantity.'</td>
      </tr>



      <tr>
        <td bgcolor="#FFFFDD" style="border: 1px solid cyan;"><strong>ملاحضات.</strong></td>
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


 require_once "../../techcms/Models/App_Classes/App_Funcations.php";
 $app_func=new App_Funcation();
 $comp_id=$this->Comp_ID;
  $lang_id=$this->lang; 
$DetailCompany = array(); 
$DetailCompany=$app_func->getDetailscampany($comp_id,$lang_id); 
$to=$DetailCompany['EmailRC'];

$subject=EMAIL_FROM_NAME;
$to = "sd@techsoft-ye.com";

 

$mail = new PHPMailer();
//$subject = "this is password";
// $content =$message;
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