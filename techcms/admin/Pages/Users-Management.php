<?php 
$gridUser = new jqgrid($db_conf);
$opt["caption"] = "إدارة المستخدمين";
$opt["resizable"] = true;
$opt["autowidth"] = true;
$opt["autoresize"] = false;
$opt["loadtext"] = $langs['GRID_LOADING_TXT'];
$datesxd=date("Y-d");
$reportnamex="Employees-Reports-".$datesxd;
$opt["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بقائمة الموظفين", "orientation"=>"portrait", "paper"=>"a4");
//$opt["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بقائمة المُدن", "orientation"=>"landscape", "paper"=>"a4");
$opt["export"]["sheetname"] = $reportnamex;
$opt["export"]["range"] = "filtered"; // or "all"
//$opt["export"]["paged"] = "1";
$opt["toolbar"] = "bottom";
$opt["sortorder"] = "ASC"; // ASC or DESC
$opt["rowList"] = array(30,50,100,200,250,'ALL');
$opt["rowNum"] = 20;
$opt["height"] = 250;
$opt["view_options"]["width"] = "500";  // show form navigation
$opt["add_options"]["width"] = "500";  // show form navigation
$opt["edit_options"]["width"] = "500";  // show form navigation
$opt["multiselect"] = false; // allow you to multi-select through checkboxes 
$opt["direction"] = "$lngdir";
$datesxd=date("Y-d");
$opt["form"]["position"] = "center";
//$opt["add_options"]["jqModal"] = true;
//$opt["edit_options"]["jqModal"] = true;
//$opt["rownumbers"] = true;
//$opt["rownumWidth"] = 30;
$opt["add_options"]["success_msg"] = "تم اضافة البيانات بنجاح";
$opt["edit_options"]["success_msg"] = "تم تعديل البيانات بنجاح";
$opt["delete_options"]["success_msg"] = "تم حذف البيانات بنجاح";
$gridUser->set_options($opt);




   
$colU = array();
$colU["title"] = "الرقم"; // caption of column
$colU["name"] = "User_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["editable"] = false;
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["align"] = "center";
$colU["editoptions"] = array("readonly"=>"readonly");  
$colU["width"] = "40";
$colU["show"]["edit"] = false;
$colU["show"] = array("list"=>true,"edit"=>false,"add"=>true); // only show in listing
$colUs[] = $colU;
 
        

      
$colU = array(); 
$colU["title"] = "عرض بأسم"; 
$colU["name"] = "Shown_Name";    
$colU["editable"] = true;
$colU["editrules"] = array("required"=>true,"alphanumeric"=>true,"lettersonly"=>true,"minlength"=>3,"maxlength"=>64);
$colU["required"] = true;
$colU["width"] = "100";
$colU["align"] = "center";  
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role; 
$colU["show"]["edit"] = false;
$colU["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$colUs[] = $colU;
     
$colU = array(); 
$colU["title"] = "المجموعة"; 
$colU["name"] = "grup_id";    
$colU["editable"] = true; 
$colU["width"] = "100"; 
$colU["stype"] = "select";
$colU["align"] = "center";  

$colU["edittype"] = "select"; // render as select 
$str = $gridUser->get_dropdown_values("select distinct privilege_groups.grup_id as k, privilege_groups.grup_title_ar as v from privilege_groups where Is_Actieved='1'  ");
$colU["editoptions"] = array( "value"=>$str); 
$colU["searchoptions"] = array("value" =>$str);           
$colU["editrules"] = array("required"=>true);
$colU["formatter"] = "select"; // display label, not value
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role; 
$colU["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$colUs[] = $colU;
         

     
$colU = array(); 
$colU["title"] = "المجموعة"; 
$colU["name"] = "grup_title_ar";    
$colU["editable"] = false;
$colU["isnull"] = true; 
$colU["width"] = "100";
$client_lookup = $gridUser->get_dropdown_values("select distinct privilege_groups.grup_id as k, privilege_groups.grup_title_ar as v from privilege_groups where Is_Actieved='1' and Is_configrated='1' ");  
$colU["stype"] = "select";
$colU["align"] = "center";  
$colU["searchoptions"] = array("value" => ":;".$client_lookup); 
 $colU["search"] = false;
$colU["export"] = $Export_role;
$colU["sortable"] = false; 
$colU["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$colUs[] = $colU;



$colU = array();
$colU["title"] = "اسم المستخدم"; // caption of column
$colU["name"] = "Username"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["width"] = "100";
$colU["align"] = "center";
$colU["editable"] = true;
$colU["editrules"] = array("required"=>true,"alphanumeric"=>true,"lettersonly"=>true,"minlength"=>3,"maxlength"=>64);
$colU["required"] = true;
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["required"] = true;
$colU["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$colUs[] = $colU;



$colU = array();
$colU["title"] = "تغيير كلمة المرور"; // caption of column
$colU["name"] = "changepass"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["editable"] = true;
$colU["width"] = "60";
$colU["edittype"] = "checkbox"; // render as checkbox
$colU["editoptions"] = array("value"=>"0:1"); // with these values "checked_value:unchecked_value"
$colU["formatter"] = "checkbox";
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["align"] = "center";
$colU["viewable"] = false;
 $colU["show"] = array("list"=>false,"edit"=>true,"add"=>false); // only show in listing
$colUs[] = $colU;

$colU = array();
$colU["title"] = "كلمة المرور"; // caption of column
$colU["name"] = "APassword"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["width"] = "110";
$colU["align"] = "center";
$colU["editable"] = true;
$colU["editrules"] = array("required"=>false,"minlength"=>3,"maxlength"=>64);
$colU["required"] = false;
$colU["search"] = false;
$colU["export"] = false;
$colU["sortable"] = false;
$colU["formatter"] = "password";
$colU["edittype"] = "password"; // format as date 
$colU["required"] = true;
$colU["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$colUs[] = $colU;


 

$colU = array();
$colU["title"] = "تأكيد كلمة المرور"; // caption of column
$colU["name"] = "APassword1"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["width"] = "110";
$colU["align"] = "center";
$colU["editable"] = true;
$colU["editrules"] = array("required"=>false,"minlength"=>3,"maxlength"=>64);
$colU["isnull"] = true;
$colU["search"] = false;
$colU["export"] = false;
$colU["sortable"] = false;
$colU["required"] = false;
$colU["viewable"] = false;
$colU["edittype"] = "password"; // format as date
  $colU["hidedlg"] = true;
$colU["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$colUs[] = $colU;

$colU = array();
$colU["title"] = "رقم الجوال" ;// caption of column
$colU["name"] = "Moblile_No"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["width"] = "80";
$colU["align"] = "center";
$colU["editable"] = true;
$colU["required"] = true;
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["required"] = true;
$colU["editrules"] = array("number"=>true,"maxlength"=>12,"minlength"=>9); 
$colU["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$colUs[] = $colU;


$colU = array();
$colU["title"] = "Primary  E-mail" ;// caption of column
$colU["name"] = "Primary_Email"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["width"] = "100";
$colU["align"] = "center";
$colU["editable"] = true;
$colU["required"] = true;
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["required"] = true;
$colU["editrules"] = array("email"=>true); 
$colU["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$colUs[] = $colU;



$colU = array();  
$colU["name"] ="getimage"; // grid colxxumn name, must be exactly same as returned colxxumn-name from sql (tablefield or field-alias)
$colU["width"] = "50";
$colU["editable"] = true;
$colU["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$colU["editoptions"]["dataInit"] = "function(o){edit_as_custom(o);}";
$colUs[] = $colU;  


$colU = array();
$colU["title"] = "صوره رمزية"; 
$colU["name"] = "Logopaht"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["width"] = "30";
$colU["editable"] = true;
$colU["edittype"] = "text"; // render as file
$colU["required"] = true;
$colU["search"] = false;
$colU["export"] = false;
$colU["sortable"] = false;
$colU["hidedlg"] = true;
$colU["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$colUs[] = $colU;



$colU = array();
$colU["title"] = "صورة الموظف";
$colU["name"] = "type_icon_path2";
$colU["width"] = "70";
$colU["align"] = "center";
$colU["isnull"] = true;
$colU["editable"] = false;
$colU["export"] = false; 
$colU["search"] = false;
$colU["sortable"] = false;
$colU["show"] = array("list"=>true,"edit"=>false,"add"=>false); // only show in listing
$colUs[] = $colU;

 
$colU = array();
$colU["title"] = "الرقمم  المميز"; 
$colU["name"] = "RelatedKey"; 
$colU["width"] = "110";
$colU["align"] = "center";
$colU["editable"] = true; 
$colU["required"] = true;
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["show"] = array("list"=>false,"edit"=>false,"add"=>false);
$colUs[] = $colU;


$colU = array();
$colU["title"] =  "حظر المستخدم"; // caption of column
$colU["name"] = "Is_Blocked"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["editable"] = true;
$colU["width"] = "60";
$colU["edittype"] = "checkbox"; // render as checkbox
$colU["editoptions"] = array("value"=>"1:0"); // with these values "checked_value:unchecked_value"
$colU["formatter"] = "checkbox";
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["align"] = "center";
$colU["viewable"] = false;
$colU["required"] = true;
$colU["hidedlg"] = true;
$colU["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$colUs[] = $colU;

$colU = array();
$colU["title"] ="موظف  "; // caption of column
$colU["name"] = "Is_suberadmin"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["editable"] = true;
$colU["width"] = "60";
$colU["edittype"] = "checkbox"; // render as checkbox
$colU["editoptions"] = array("value"=>"1:0"); // with these values "checked_value:unchecked_value"
$colU["formatter"] = "checkbox";
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["align"] = "center";
$colU["viewable"] = false;
$colU["required"] = true;
$colU["hidedlg"] = true;
$colU["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$colUs[] = $colU;


$colU = array();
$colU["title"] = "حالة التفعيل"; // caption of column
$colU["name"] = "Is_Actived"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colU["editable"] = true;
$colU["width"] = "40";
$colU["edittype"] = "select";
$colU["stype"] = "select";   
$colU["editoptions"] = array("value"=>"Yes:Yes;No:No");
$colU["searchoptions"]["skipEmpty"]=true ;
$colU["editoptions"]["skipEmpty"]=true ;  
$colU["searchoptions"] =array("value"=>"Yes:Yes;No:No");
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["align"] = "center";
$colU["viewable"] = true; 
 $colU["show"] = array("list"=>true,"edit"=>true,"add"=>false); // only show in listing
$colUs[] = $colU;
 



$colU = array();
$colU["title"] = $langs['ZONE_PAGE_ADDATE']; //  
$colU["name"] = "adding_date"; 
$colU["align"] = "center";
$colU["width"] = "50";
$colU["editable"] = false; // this column is editable
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in add/edit dialog
$colU["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'Y-m-d');
$colU["formatter"] = "date"; // format as date
$colU["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$colUs[] = $colU;

$colU = array();
$colU["title"] = "تفاصيل اضافية"; // caption of column
$colU["name"] = "User_Note"; //
$colU["editable"] = true;
$colU["align"] = "center";
$colU["edittype"] = "textarea";
$colU["editoptions"] = array("defaultValue" => "لايوجد تفاصيل");
$colU["search"] = $Search_role;
$colU["export"] = $Export_role;
$colU["sortable"] = $Sortable_role;
$colU["align"] = "center";
$colU["width"] = "70";
$colU["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$colUs[] = $colU;




$gridUser->set_actions(array(
    "add"=>$Add_role, // allow/disallow add
  "edit"=>$Edit_role, // allow/disallow edit
    "delete"=>$Delet_role, // allow/disallow delete
    "rowactions"=>false, // show/hide row wise edit/del/save option
    "search" => "advance", // show single/multi field search condition (e.g. simple or advance)
         "inlineadd" => false,
          "autofilter" => true,
        "showhidecolumns" => $Showhidecolumns,  
          "view"=>true,
           //"export_excel"=>$Export_role, // export excel button 
                        "export_pdf"=>$Export_role, // export pdf button 
                        //"export_csv"=>$Export_role, // export csv button 
          "export"=>$Export_role        
)
);

// params are array(<function-name>,<class-object> or <null-if-global-func>,<continue-default-operation>)
// if you pass last argument as true, functions will act as a data filter, and insert/update will be performed by grid
$eU["on_data_display"] = array("filter_displayUser", null, true); 
$eU["on_insert"] = array("add_dataUser", null, false);
$eU["on_update"] = array("update_dataUser", null, false);
$eU["on_delete"] = array("delete_dataUser", null, false);
$gridUser->set_events($eU);


function add_dataUser($data)
{


  global $Applogins_cls,$app_func;
 
      $User_id=$app_func->GetOrderTable('User_id','employees_users');
$grup_id=$data["params"]["grup_id"];  
$APassword=$data["params"]["APassword"];
$APassword1=$data["params"]["APassword1"];;
$Usernames=$data["params"]["Username"];
$User_Note=$data["params"]["User_Note"];
$Emp_Name_ar=$data["params"]["Shown_Name"];
$Is_Actived=$data["params"]["Is_Actived"];
$User_nam=$_SESSION['AppLoginName'];
$Emp_Email=$data["params"]["Primary_Email"];
$imagepath=$data["params"]["Logopaht"];
$Moblile_No=$data["params"]["Moblile_No"];
if($APassword!=$APassword1)
{
 phpgrid_error("كلمات المرور التي ادخلتها غير متطابقة تاكد من البيانات");
 exit;   
}
 // if(!eregi("^([a-z])*$", $Usernames))
 // {
 //  phpgrid_error("يجب ان يكون اسم المستخدم مكوناً من الاحرف الانجليزيه فقط".$APassword1);
 // exit; 
 // }

 

$mss=date('Y-m-d');
$add_dates=$mss;
$RelatedKey=$app_func->random(10,'1234567890');
$Password_Salts=$app_func->generateRandID();
$Actived_Keys=$app_func->generateRandID2();
$userids=$app_func->generateRandID2();
$encrpypass=md5($APassword);
        
 
$newquerys="insert into   employees_users (grup_id,User_id,Username,Shown_Name, User_Key,APassword,Password_Salt,Primary_Email, Moblile_No, Is_Actived,RelatedKey,Is_Privilages_cofiged, Is_Privilages_customized,Actived_Key,User_Note, Logopaht,adding_date,Added_by,AUser_name) values 
($grup_id,'$User_id','$Usernames','$Emp_Name_ar','$userids','$encrpypass','$Password_Salts','$Emp_Email','$Moblile_No','$Is_Actived','$RelatedKey','0','0','$Actived_Keys','$User_Note','$imagepath','$add_dates','$User_nam','$User_nam')";

$result = $app_func->query($newquerys);
if (!$result) {
    $errs=$app_func->error();
    
   
    
   $k1="Duplicate entry";
   $chkrslt=$app_func->check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("موجود   مسبقاً");
   }
 
   $k1="FOREIGN KEY";
   $chkrslt=$app_func->check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("يجب عليك    تعبة   الحقول   الفارغة");
   }

   $msg="Invalid query: " .$errs;
     phpgrid_error($msg);   
    
}


}
//-------------------------------
 
//---------------------Edit funcation start here----------------
 
 
 

//-------------------------------------------------------
function update_fromdelete($w)
{
    $s=" UPDATE employees_users set  Is_Blocked='1',Is_Actived='0' WHERE $w";    
$result = $app_func->query("$s");
    
    }
  
//-------------------------------------------------
function update_dataUser($data)
{

  global $Applogins_cls,$app_func;
    $User_names=$_SESSION['AppLoginName'];
   $mss=date('Y-m-d');
   
   
   $grup_id=$data["params"]["grup_id"]; 
    $User_id=$data["User_id"];
     $Username=$data["params"]["Username"];
    $User_Note=$data["params"]["User_Note"];
    $Is_Actived=$data["params"]["Is_Actived"];
    $Is_Blocked=$data["params"]["Is_Blocked"];
    $Is_suberadmin=$data["params"]["Is_suberadmin"];
    $APassword=$data["params"]["APassword"];
    $APassword1=$data["params"]["APassword1"];
    $adp="";
    $changepass=$data["params"]["changepass"];
$Emp_Name_ar=$data["params"]["Shown_Name"];
$Is_Actived=$data["params"]["Is_Actived"];
$User_nam=$_SESSION['AppLoginName'];
$Emp_Email=$data["params"]["Primary_Email"];
$imagepath=$data["params"]["Logopaht"];
$Moblile_No=$data["params"]["Moblile_No"];
// $RelatedKey=$data["params"]["RelatedKey"];
// ,RelatedKey='$RelatedKey',
    $encrpypass=md5($APassword);
     if ($changepass==0) {
       
   
    if($APassword=="null" && $APassword1=="null")
    {
   $adp=" ";  
    }else{
     if($APassword!=$APassword1)
        {
    phpgrid_error("كلمات المرور التي ادخلتها غير متطابقة تاكد من البيانات".$APassword." ".$APassword1);
    exit;   
        }else{
           $adp=" APassword='$encrpypass',"; 
        }   
    }
     }
     
    $currentuser="null";
     $result=$app_func->select("SELECT  Username FROM  employees_users where User_id=$User_id");
     $currentuser=$result[0]["Username"];
 
    if($Is_Blocked==1 && ($User_names==$currentuser))
    {
    phpgrid_error("لايمكنك حظر نفسك لن تتمكن من تسجيل الدخول");
    exit;
   }

  $w = " User_id =$User_id ";
$s=" UPDATE employees_users set  $adp grup_id='$grup_id',Shown_Name='$Emp_Name_ar',Primary_Email='$Emp_Email',Moblile_No='$Moblile_No',Username='$Username',Logopaht='$imagepath', Is_Blocked='$Is_Blocked',Is_suberadmin='$Is_suberadmin',Is_Actived='$Is_Actived',Blocked_Date='$mss',User_Note='$User_Note',Modify_by='$User_names',Modify_date='$mss',AUser_name='$User_names' WHERE $w";  

$result = $app_func->query("$s");
if (!$result) {
    $errs=$app_func->error();
  
   
  
   $k1="Duplicate entry";
   $chkrslt=$app_func->check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("موجود   مسبقاً");
   }
 
   $k1="FOREIGN KEY";
   $chkrslt=$app_func->check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("يجب عليك    تعبة   الحقول   الفارغة");
   }

   $msg="Invalid query: " .$errs;
     phpgrid_error($msg);   
    
}else{


  if ($Is_Actived=="No") {
      $message="تم الغاء تفعيل حسابك يرجى مراجعة خدمة العملاء  ";
      $subject="Go Application";
      $app_func->SendEmail($Emp_Email,$message,$subject); 
  }

}

}

//---------------------filter_display funcation start here----------------
function filter_displayUser($data) 
{ 
      global $Applogins_cls,$app_func;
    foreach($data["params"] as &$d) 
    { 
        
          //$email= $d["Emp_Email"];
           //$d["Emp_Email"] ='<a style="color:blue;" herf="mailto:'.$email.'" title="انقر لارسال رساله الى الموظف">'.$email.'</a>';
          
        //   $isactivs= $d["Is_Actived"];
        // if ($isactivs)
        // {
        //    $d["Is_Locked"] ='فغال';
           
        // }else{
        //     $d["Is_Locked"] ='معطل';
        // }
          $isactivs= $d["Is_Blocked"];
        if ($isactivs)
        {
           $d["Is_Locked2"] ='محظور';
           
        }else{
            $d["Is_Locked2"] ='جاري';
        } 
         $d["type_icon_path2"] = techcms_render_grid_image($d["Logopaht"] ?? "", 30);
           
       
        $grup_id=$d["grup_id"];
         $result=$app_func->select("select  grup_title_ar as grpname from privilege_groups where grup_id=$grup_id ");
          $grpnamear=$result[0]["grpname"];         
    $d["grup_title_ar"] ="$grpnamear";    
        
    } 
} 


//---------------------delete_data funcation start here----------------

function delete_dataUser($data)
{
    global $Applogins_cls,$app_func;

   $User_names=$_SESSION['AppLoginName'];
    $currentuser="null";
       $userid=$data["User_id"];
     $result=$app_func->select("SELECT  Username FROM  employees_users where User_id=$userid");
     $currentuser=$result[0]["Username"]; 
 
     
   
       if($User_names==$currentuser)
    {
         phpgrid_error(" لايمكنك حذف نفسك ");
         exit;
        
    }else{

         $cityids=$app_func->GetOrderTable('User_id','employees_users');
   
 
    if($cityids<2)
     {
     
  phpgrid_error(" لايمكن حذف كافة المستخدمين يجب ان يبقى مستخدم واحد على الاقل ");
     }else{
        delete_user($data);
        }
    }  
  
   
    


}

function delete_user($data)
{
    global $Applogins_cls,$app_func;
      $empno = $data["User_id"];
  $w = "User_id = $empno and Is_suberadmin<>1";
  $res=$app_func->query("DELETE from employees_users WHERE $w");
  
    if (!$res) {
  $errs=$app_func->error();
    if ($errnos==1451){
        //update_fromdelete($w); to block user when we can't delete it '
    $msg="لايمكن حذف هذا السجل نظراً لوجود بيانات مرتبطة  به في جداول اخرى";
     phpgrid_error($msg); 
   }else{
    $msg="حدث خطاء غير متوقع رقم الخطاء:".$errnos."  msg".$errs;
   }
   
        }
}
 

 
$suberadmin=$Applogins_cls->is_suberadmin;
if ($suberadmin!='1') {
   $gridUser->select_command = "SELECT * from employees_users   where Is_suberadmin<>1   ";
}
 
 
 
  $gridUser->table = "employees_users";
$gridUser->set_columns($colUs);
$out = $gridUser->render("employees_users");
 


 
?>
