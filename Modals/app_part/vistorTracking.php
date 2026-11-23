<?php  
 
$browser=$_SERVER['HTTP_USER_AGENT'];
 // get the browser name

$curr_page=$pagename;
//$curr_page=$_SERVER['PHP_SELF'];// get page name
$ip=$_SERVER['REMOTE_ADDR'];   // get the IP address
$from_page ="";//  page from which visitor

$arraypageTitle= array();
 $arraypageTitle['index.php']="الرئيسية";
  $arraypageTitle['about-us.php']="من نحن";

   $arraypageTitle['atm.php']="شبكة الصرافات الالية";
  
 
      $arraypageTitle['blog.php']="اخر الاخبار";
       $arraypageTitle['board-directors.php']="أعضاء مجلس الإدارة";
        $arraypageTitle['branch-atm-locator.php']="فروع وأجهزة الصراف الآلي";
         $arraypageTitle['branches.php']="خارطة الفروع";
          $arraypageTitle['career.php']="وظائف";
           $arraypageTitle['contact-us.php']="تواصل معنا";
            $arraypageTitle['creditcards-item.php']="بطاقات الإئتمان";
             $arraypageTitle['financial-reports.php']="القوائم المالية";
              $arraypageTitle['maintenance.php']="تحت الصيانة";
               $arraypageTitle['media-center.php']=" المركز الاعلامي";
                $arraypageTitle['Photo-Gallery.php']="البوم الصور";
                 $arraypageTitle['search.php']="بحث";
                  $arraypageTitle['service-comp-item.php']="خدمات الشركات";
                   $arraypageTitle['service-pro-item.php']="خدمات الافراد";
                    $arraypageTitle['team.php']="ادارة المصرف ";
                     $arraypageTitle['view-photo-gellary.php']="صفحة   عرض الصور ";
                     
                         
if(isset($_SERVER['HTTP_REFERER'])) {
    
    $from_page =$_SERVER['HTTP_REFERER'];
} 
//$page=$_SERVER['PHP_SELF'];//get current page
 $page=$pagename;

 if ($page!="view-photo-gellary.php" || $page!="blog-item.php"  || $page!="acountstatment.php") {
   
if (array_key_exists($pagename, $arraypageTitle)) {
    
   $outtrackink=$app_func->stattracker($browser,$ip,$arraypageTitle[$page],$from_page);
}
   
 }
 


 
 

?>