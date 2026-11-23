<?php
/**
 * ملف دوال التحقق والفحص 
 * كل داله لها عمل موضع من اسمها ويتم استدعائها بطريقة الاجاكس من الملفات الاخرى  
 */

date_default_timezone_set('Asia/Kuwait');
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
//include("Load_grid.php");
 //include_once("../App/App_constant.php"); 

$checkwhat = $_REQUEST["checkidx"];
switch($checkwhat){
    case 'Templt':
    $Templt_idx= $_POST["Templt_id"];
       Get_Templt($Templt_idx);
        break;
        case 'citylists':
    $countryid= $_REQUEST["countryid"];
       Get_city_llist($countryid);
        break;
     case 'Templtlist':
    $Templt_idx= $_REQUEST["Templt_id"];
       Get_Templtlist($Templt_idx);
        break;
        case 'clientlistx':
       Get_Client_llist();
        break;
 case 'subCatDependCat':
          $catid= $_REQUEST["Cat_id"];
          get_SubCatagory_select($catid);
          break;
         case "pageprivlages":
       $cityavals2=$_REQUEST['pageidx'];
        Get_page_role_list($cityavals2);
        break;
 case 'delete_4rom_cart':
    $cookeval= $_REQUEST["cookval"];
    $productid= $_REQUEST["productid"];
    $amount= $_REQUEST["samount"];
       delete_4rom_cart($cookeval,$productid,$amount);
        break;   
 case 'edit_4rom_cart':
    $cookeval= $_REQUEST["cookval"];
    $productid= $_REQUEST["productid"];
     $newamount= $_REQUEST["newamount"];
     $oldamount= $_REQUEST["oldamount"];
  edit_4rom_cart($cookeval,$productid,$newamount,$oldamount);
        break;
        case 'SectionDoctors':
         $section=""; 
        if(isset($_REQUEST["section"]))
        {
          $section=$_REQUEST["section"];  
        }
      
          get_All_SectionDoctors($section);
         break;

        case 'Getprojectsselect':
         $project_id=0;
        
        if(isset($_REQUEST["project_id"]))
        {
          $project_id=$_REQUEST["project_id"]; 
            
        }
      
          get_reloadprojectsselect($project_id);
         break;
        case 'Getsubcatagorylibrary':
         $cata_id=""; 
        if(isset($_REQUEST["cata_id"]))
        {
          $cata_id=$_REQUEST["cata_id"];  
        }
      
          get_All_Sub_catalibrary($cata_id);
         break;

        case 'GetsubcatagoryServise':
         $Product_Id=0;
         $lang_id=0; 
        if(isset($_REQUEST["cate_id"]))
        {
          $Product_Id=$_REQUEST["cate_id"]; 
           $lang_id= $_REQUEST["lang_id"];
        }
      
          get_reloadDoctorsSection($lang_id,$Product_Id);
         break;

        case 'loadlibrarybookSearch':
         $searchTerm=""; 
        if(isset($_REQUEST["searchTerm"]))
        {
          $searchTerm=$_REQUEST["searchTerm"];  
        }
      
          get_library_Searching($searchTerm);
         break;
        case "roles":
       $cityavals2=$_REQUEST['pageidx'];
       $grpidx=$_REQUEST['groupid'];
        Get_role_list($cityavals2,$grpidx);
        break;
        case 'listing_Searching':
         get_listing_Searching($_REQUEST["SubCat"],$_REQUEST["searchw"]);
         break;
     default :
      
}
 
 //------------------------Get users-----------------------------------
    function check_login(){
        include("Load_grid.php.php");
 if($Applogins_cls->logged_in){
 ///$newphrase = str_replace($healthy, $yummy, $phrase);

 //$rolearray=$Applogins_cls->Get_UserRoles($pagename);
}else{ 
      $_SESSION["loginattemps"]=0;
       print ("<meta http-equiv='refresh'  content='.001; URL=../Logins.php'>");
       exit;
}

}
//-------------------------------Get Proposal No-------------------------

function Get_Templtlist($clients_idx){
$sql = "SELECT Templt_id,Templt_title_ar FROM system_tempaltes WHERE Templt_typ_id='$clients_idx' and Is_Actived=1  ;";

$result3 =db_query($sql);
echo "<option  value=''>اختر من القائمة</option>";
if ($result3->num_rows > 0) {
       
    while($row = $result3->fetch_assoc()) {
      echo "<option  value=$row[Templt_id]  >$row[Templt_title_ar]</option>";   
    }
    
   } else {
echo "<option  value='rassam'>لايوجد نماذج</option>";
}
}


//-------------------------------Get Proposal No-------------------------

function Get_Zone_llist($clients_idx){
$sql = "SELECT ZoneID,ZoneName_ar FROM  Zones where  CityID=$clients_idx ;";

$result3 =db_query($sql);
echo "<option  value=''>اختر من القائمة</option>";
if ($result3->num_rows > 0) { 
    while($row = $result3->fetch_assoc()) {
      echo "<option  value=$row[ZoneID]  >$row[ZoneName_ar]</option>";   
    }
    
   } else {
echo "<option  value=''>لايوجد مناطق</option>";
}
}

//----------------- get zone List--------------------
function Get_city_llist($cityid){
$sql = "select distinct Sub_Categories.SCat_ID,Sub_Categories.SCat_Name_ar  from Sub_Categories  where Sub_Categories.Cat_ID='$cityid' and Is_Actived='Yes'";  
$zoneresult = db_query($sql);

if ($zoneresult->num_rows > 0) {
    // output data of each row name="select"
   // echo "<select>";
    echo "<option value=''>اختر تصنيف فرعي</option>";
    while($row = $zoneresult->fetch_assoc()) {
    
 echo "<option id='".$row['City_id']."'  value='".$row['SCat_ID']."' >".$row['SCat_Name_ar']."</option>";
//$('select[name^="salesrep"] option[value="Bruce Jones"]').attr("selected","selected");
    
    }
    // echo "</select>";
   } else {
    echo "<option value=''>لايوجد تصنيفات فرعية</option>";
   
   }
  
   
}



//-------------------------------Get Proposal No-------------------------

function Get_icone_list(){
     $locArray = array();
    $sql = "Select * FROM Location_Types"; 
    $results = db_query($sql);
    while($row = $results->fetch_assoc()){
//echo $row["Type_icon_path_onbusy"];
$onbusyx=$row["Type_icon_path_onbusy"];
 $bb=strlen($row["Type_icon_path_onbusy"]);
 $fixed_onbusyx=substr($onbusyx,3,$bb-2);
$onselectx=$row["Type_icon_path_onselected"];
 $bb=strlen($row["Type_icon_path_onselected"]);
 $fixed_oselectx=substr($onselectx,3,$bb-2);
 $onavilbalex=$row["Type_icon_path"];
 $bb=strlen($row["Type_icon_path"]);
 $fixed_onavilbalex=substr($onavilbalex,3,$bb-2);
  
          
        $locArray[$row["loc_typ_id"]] =array("onbusy"=>$fixed_onbusyx, "onselected"=> $fixed_oselectx, "onavailabel"=>$fixed_onavilbalex); 
       
       // echo $row['type_icon_path']."<br/>";
    }
//print_r($locArray);
    echo json_encode($locArray);
    
}

//-------------------------------Get Proposal No-------------------------

//-------------------------------Get Proposal No-------------------------

function Get_items_list($clients_idx){

$sql = "select * from materials_items  where Raw_mat_code='$clients_idx' and Is_Actieved='Yes'";  
$yearresult = db_query($sql);
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"
    $neuconst1=array();
    $i=0;
    // >$row[Contactname]</option>";
      echo "<option value='' >اختر الصنف</option>";  
    while($row = $yearresult->fetch_assoc()) {

  echo "<option  value='".$row['Raw_mat_item_code']."'>".$row['Raw_mat_item_title_ar']."</option>";  
    }
   } else {
    echo "<option value='nooptzone'>لايوجد اصناف </option>";
   
   }
  }
//-------------------------------Get Proposal No-------------------------

function Get_items_listg($clients_idx){

$sql = "select * from matireals  where Raw_mat_code='$clients_idx' and Is_Actieved='Yes'";  
$yearresult = db_query($sql);
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"
    $neuconst1=array();
    $i=0;
    // >$row[Contactname]</option>";
      echo "<option value='' >اختر الصنف</option>";  
    while($row = $yearresult->fetch_assoc()) {

  echo "<option  value='".$row['id']."'>".$row['mat_title']."</option>";  
    }
   } else {
    echo "<option value='nooptzone'>لايوجد اصناف </option>";
   
   }
  }




//-------------------------------Get Proposal No-------------------------

function Get_role_list($clients_idx,$grpidx){
$selectedin=get_pagerole($clients_idx,$grpidx);
$sql = "select distinct  Privilege_id as k,Privilege_title_ar as v from  privilegs WHERE $selectedin ";  


$result3 =  db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    echo "<option  value=''>اختر من القائمة</option>";
    while($row = $result3->fetch_assoc()) {
      echo "<option  value=$row[k] >$row[v]</option>";   
    }
    
   } else {
echo "<option  value=''>لايوجد بيانات </option>";
}

}

//-------------------------------Get Proposal No-------------------------
 function get_pagerole($Page_idx,$grpidx){
 $completedroles=get_pagerole2($Page_idx,$grpidx);
$sql = "SELECT  Privilege_id from page_privilegs_config where  Page_id='$Page_idx'  $completedroles ";
$result = db_query($sql);
if ($result->num_rows > 0) {
    // output data of each row name="select"
      $inquery=" Privilege_id  in (";
    while($row = $result->fetch_assoc()) {
        $inquery.="$row[Privilege_id]".",";
    }
    $srtlnths=strlen($inquery);
    $newin=substr($inquery,0,$srtlnths-1);
    $newin.=")";
   //echo $inquery."<br>";
    return $newin;
   } else {
    
     $inquery=" ";
 
}
}

 function get_pagerole2($Page_idx,$grpidx){
$sql = "SELECT  Privilege_id from users_group_privilegs_config where grup_id='$grpidx' and Page_id='$Page_idx'  ";
$result = db_query($sql);
if ($result->num_rows > 0) {
    // output data of each row name="select"
      $inquery=" and Privilege_id  not in (";
    while($row = $result->fetch_assoc()) {
        $inquery.="$row[Privilege_id]".",";
    }
    $srtlnths=strlen($inquery);
    $newin=substr($inquery,0,$srtlnths-1);
    $newin.=")";
   //echo $inquery."<br>";
    return $newin;
   } else {
    
     $inquery=" ";
 
}
}


//-------------------------------Get Proposal No-------------------------

function Get_page_role_list($grpidx){
$selectedin=get_pagerole23($grpidx);
$sql = "select distinct  Privilege_id as k,Privilege_title_ar as v from  privilegs  $selectedin ";  


$result3 =  db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    echo "<option  value=''>اختر من القائمة</option>";
    while($row = $result3->fetch_assoc()) {
      echo "<option  value=$row[k] >$row[v]</option>";   
    }
    
   } else {
echo "<option  value=''>لايوجد بيانات </option>";
}

}
 function get_pagerole52($grpidx){
 $completedroles=get_pagerole23($grpidx);
$sql = "SELECT  Privilege_id from page_privilegs_config where  Page_id='$grpidx'  $completedroles ";
$result = db_query($sql);
if ($result->num_rows > 0) {
    // output data of each row name="select"
      $inquery=" Privilege_id  in (";
    while($row = $result->fetch_assoc()) {
        $inquery.="$row[Privilege_id]".",";
    }
    $srtlnths=strlen($inquery);
    $newin=substr($inquery,0,$srtlnths-1);
    $newin.=")";
   //echo $inquery."<br>";
    return $newin;
   } else {
    
     $inquery=" ";
 
}
}

 function get_pagerole23($grpidx){
$sql = "SELECT  Privilege_id from page_privilegs_config where  Page_id='$grpidx'  ";
$result = db_query($sql);
if ($result->num_rows > 0) {
    // output data of each row name="select"
      $inquery="WHERE Privilege_id  not in (";
    while($row = $result->fetch_assoc()) {
        $inquery.="$row[Privilege_id]".",";
    }
    $srtlnths=strlen($inquery);
    $newin=substr($inquery,0,$srtlnths-1);
    $newin.=")";
   //echo $inquery."<br>";
    return $newin;
   } else {
    
     $inquery=" ";
 
}
}

//-------------------------------Get Proposal No-------------------------
function Get_Templt($Templt_idx){
$sql = "SELECT Templt_contents_html FROM  system_tempaltes WHERE Templt_id='$Templt_idx' ";  
$yearresult = db_query($sql);
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"

    while($row = $yearresult->fetch_assoc()) {
    $Templt_contents_html=  $row['Templt_contents_html'];
         $resultx=array('locstatus' => 'OK','templtcontent'=>"$Templt_contents_html");
        echo json_encode($resultx);
        
    
       }
           
    }
    else {
      $resultx=array('locstatus' => 'OK','templtcontent'=>"ان القالب الذي قمت باختياره لايحتوي على بيانات");
        echo json_encode($resultx);
   }


}
//-------------------------------Get Proposal No-------------------------
function Get_proposalcontent($Templt_idx){
$sql = "SELECT proposal_contents_html FROM  probosals WHERE Proposal_id='$Templt_idx' ";  
$yearresult = db_query($sql);
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"

    while($row = $yearresult->fetch_assoc()) {
    $Templt_contents_html=  $row['proposal_contents_html'];
         $resultx=array('templtcontent'=>"$Templt_contents_html");
        echo json_encode($resultx);
        
    
       }
           
    }
    else {
        $resultx=array('templtcontent'=>"لايوجد اي بيانات في هذا العرض");
        echo json_encode($resultx);
      
   }


}
//-------------------------------Get Proposal No-------------------------

//------------------------Get users-----------------------------------
    function check_count_by_paramters2($tablename,$column,$where){
 $sql = "SELECT count($column) AS countresult FROM $tablename $where";

$result3 =    db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    while($row = $result3->fetch_assoc()) {
      return $row["countresult"]; 
    }
    
   } else {
 return 0; 
}
}    

//-------------------------------Get Proposal No-------------------------
function   update_propsal_printfild($Proposal_id,$requestedby,$createdby,$yearno,$senderidx,$senderlogopathx,$sendernamex){
$sql = "SELECT *  FROM  probosals where Proposal_id=$Proposal_id ";  
        $yearresult = db_query($sql);
        $No_of_printing=1;
        $No_of_view=1;
        $senderid=$senderidx;
        $recipient=$createdby;
        $senderlogopath=$senderlogopathx;
        $sendername=$sendernamex;
        $notification_Title="تم طباعة عرض السعر الذي طلبته يرجى الحضور للسكرتارية لأستلام النسخة المطبوعة";
        $reference_pages="Proposals-Management";
        $Destination_page="Proposals-Management";
        $notification_type="Alert";
        $actions="Review";
        $nparameters="?Proposal_id=".$Proposal_id."&Year_no=".$yearno;
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"

    while($row = $yearresult->fetch_assoc()) {
    $No_of_printing=  $row['No_of_printing']+1;
     if($requestedby==$senderid&&$row['Is_printedd']=='No')
    {
    add_notification($senderid,$recipient,$notification_Title,$reference_pages,$Destination_page,$notification_type,$actions,$nparameters,$senderlogopath,$sendername);
    }
   
    
    
        
       }
      update_propsal_printed($Proposal_id,$No_of_printing);     
    }
    else {
      update_propsal_printed($Proposal_id,$No_of_printing);     
   }


}

//--------------------------------------------Check_Propsal_count--------------------------

function add_gatenotification($senderid,$notification_Title,$reference_pages,$Destination_page,$notification_type,$actions,$nparameters,$senderlogopath,$sendername,$acreptingrol)
{
$senderid=$senderid;
$senderlogopath=$senderlogopath;
$sendername=$sendername;
       
if($acreptingrol!="none")
   {
   $result3 =db_query($acreptingrol);
if ($result3->num_rows > 0) {
       
    while($row = $result3->fetch_assoc()) {
        add_notification($senderid,$row["User_id"],$notification_Title,$reference_pages,$Destination_page,$notification_type,$actions,$nparameters,$senderlogopath,$sendername);
    }
    
   } else {

}

        }

}


//------------------------Get users-----------------------------------
    function Get_row_infos($sql){
 //$sql = "SELECT *  FROM  Working_orders WHERE order_id=$templtid  ;";

$result3 =    db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    while($row = $result3->fetch_assoc()) {
      return $row; 
    }
    
   } else {
 return "none"; 
}
}


//------------------------Get users-----------------------------------
    function get_privlage_employees($privid){
 $sql = "SELECT distinct grup_id FROM users_group_privilegs_config WHERE Privilege_id=$privid and is_granted=1;";
$accepted_groups=0;
$userlist="";
$result3 =   db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    $accepted_groups=0;
    while($row = $result3->fetch_assoc()) {
if ($result3->num_rows > 0) {
        $accepted_groups.=$row["grup_id"].",";
    }else{
    $accepted_groups=$row["grup_id"].",";        
    }    
    }//end of while
    
           $bb=strlen($accepted_groups);
           $ccsG=substr($accepted_groups,1,$bb-2);
          
$accepted_groups2= " where grup_id in (".$ccsG.")";
$sql3 = "SELECT * FROM employees_users $accepted_groups2";
return $sql3;
    
    
    
   } else {
 return "none";

}
}


//-------------------------------Get Proposal No-------------------------
function  Get_page_id($pagename){
$sql = "( SELECT  Page_id FROM  app_pages  WHERE  Page_filename ='$pagename')";  
$yearresult = db_query($sql);
$pageid=0;
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"

    while($row = $yearresult->fetch_assoc()) {
    $pageid=  $row['Page_id'];
   
        
       }
      return   $pageid;   
    }
    else {
   return  $pageid;   
   }


}


//------------------------GetUser Name ---------------------
 function get_locationinfos($LocationID){
 $sql = "SELECT * from Locations where LocationID=$LocationID ;";
$result1 = db_query($sql);
 $mediaTypenamear=array();
if ($result1->num_rows > 0) {
    // output data of each row name="select"
    while($row = $result1->fetch_assoc()) {
    $mediaTypenamear= $row; 
    }
return $mediaTypenamear;
   } else {
$mediaTypenamear="غير معروف";
return $mediaTypenamear;
}
}




//------------------------------update_rorder_accepted-------------------------
function   send_rcamping_agreement($orderx,$userid,$finiclquerey){
    
$acreptingrol=check_ifhas_thisrole(37,$userid);
$clientinfo=get_client_info($finiclquerey);
$proposalinfo=array();
$proposalinfo=Get_campingrequest_info3($orderx);
$usrsql=" ";
if($acreptingrol=='No')
{
  $resultx=array('issucessdb' => 'No','resultmsg'=>"عفواً ليس لديك صلاحية اعتماد ترحيل المقترح الى حملة ");
echo json_encode($resultx);
exit;    
}

if($proposalinfo["Is_aproved_bymanger"]=="Yes")
{
    $resultx=array('issucessdb' => 'No','resultmsg'=>"عفواً تم اعتماد ترحيل هذا المقترح مسبقاً لايمكن تكرار العملية");
echo json_encode($resultx);
exit;
}

if($clientinfo["has_user"]=='No')
{
  $resultx=array('issucessdb' => 'No','resultmsg'=>"عفواً لايوجد للعميل اي مستخدم ليتم اشعاره قم بانشاء مستخدم خاص بالعميل قبل المتابعة  ");
echo json_encode($resultx);
exit;    
}

$dater=date('Y-m-d H:i:s');
$userinfos=Get_userinfo($userid);
$updateqery="update Real_Campaigns set  Is_aproved_bymanger='Yes',Is_reviwed_bymanager='Yes',Camping_Status='Active',reviwed_by_mngr='$userid',aproved_by='$userid',manger_rivew_date='$dater',accept_request_date='$dater' where Order_No=$orderx";
$location_where=get_real_camp_locations($orderx);
$make_location_busy="update Locations set   status_id=2,Current_clint_id='$finiclquerey',Current_camping_id='$orderx',is_side1_busy='Yes',is_side2_busy='Yes',rent_by_user='$cuserid' where $location_where ";
$result14= db_query($make_location_busy);
    // output data of each row name="select"
    if($result14=='1')
{
    
$result13 = db_query($updateqery);
    
}else{
      $resultx=array('issucessdb' => 'No','resultmsg'=>"عفواً حدث خطاء اثناء محاولة ارسال المقترح الى العميل قم بالمحاوله لاحقاً");
echo json_encode($resultx);
exit;  
}

if($result13=='1')
{
        $senderid=$userid;
        $recipient=$proposalinfo['created_by'];
        $senderlogopath=$userinfos['sendlogpath'];
        $sendername=$userinfos['username'];
        $notification_Title="تم اعتماد ترحيل المقترح الخاص بك رقم  "."[".$orderx."]"." بواسطة [".$sendername."]";
        $reference_pages="Campaign-Managment2";
        $Destination_page="Campaign-Managment";
        $notification_type="Alert";
        $actions="Agree";
        $nparameters="?order_id=".$orderx;

        $senderid=$userid;
        $senderlogopath2="../".$userinfos['sendlogpath'];
        $sendername=$userinfos['username'];
        $notification_Title2="تهانينا تم اعتماد المواقع التي اخترتها ضمن مقترح التوزيع "."[".$orderx."]"." بواسطة [".$sendername."]";
        $Destination_page2="Location-order-Managment";
        $nparameters="?order_id=".$orderx;
        $recipient2=$proposalinfo['locationselected_by'];
        $clientid=$proposalinfo['ClientID'];
add_notification($senderid,$recipient,$notification_Title,$reference_pages,$Destination_page,$notification_type,$actions,$nparameters,$senderlogopath,$sendername);

    
  $resultx=array('issucessdb' => 'Yes','resultmsg'=>"تم اعتماد المتقرح بنجاح");
echo json_encode($resultx);
exit;  
}else{
  $resultx=array('issucessdb' => 'No','resultmsg'=>"عفواً حدث خطاء اثناء محاولة ارسال المقترح الى العميل قم بالمحاوله لاحقاً");
echo json_encode($resultx);
exit;  
}
}


//------------------------Get users-----------------------------------
    function get_client_info($cid){
 $sql = "SELECT * FROM clients WHERE ClientID='$cid';";   
$result3 = db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    while($row = $result3->fetch_assoc()) {
        return $row;
    }
    
   } else {
 return "none";   
}
}
//-------------------------------------------------------------------------------------------
function Get_notifymaxid2(){
$sql = "SELECT max(notificationid)+1 as mc FROM  capp_notification  ";  
$yearresult = db_query($sql);
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"

    while($row = $yearresult->fetch_assoc()) {
    $Templt_contents_html=  $row['mc'];
    if($Templt_contents_html>0)
    {
        
    }else{
        $Templt_contents_html=1;
    }
        
        
    
       }
       return $Templt_contents_html;    
    }
    else {
      return 0;
   }
 }


//------------------------Get users-----------------------------------
    function get_role_users_by_privlageid($privlage){
 $sql = "SELECT distinct grup_id FROM users_group_privilegs_config WHERE  Privilege_id='$privlage' and is_granted=1 GROUP by Privilege_id;";
$accepted_groups=0;
$userlist=$ccsG="";
$result3 = db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    $accepted_groups=$ix=0;
    while($row = $result3->fetch_assoc()) {
        $ix+=1;
if ($result3->num_rows > 1) {
        $accepted_groups.=$row["grup_id"].",";
    }else{
    $accepted_groups=$row["grup_id"];        
    }    
    }//end of while
    if($ix>1){
           $bb=strlen($accepted_groups);
           $ccsG=substr($accepted_groups,1,$bb-2);
    }else{
        $ccsG=$accepted_groups;
    }
$accepted_groups2= " where grup_id in (".$ccsG.")";
$sql3 = "SELECT distinct User_id as  User_ids FROM employees_users $accepted_groups2";
 $countrow=0;
$result4 =db_query($sql3);
if ($result4->num_rows > 0) {
  while($row = $result4->fetch_assoc()) {
    $countrow=$result4->num_rows;
if ($result4->num_rows > 1) {
        $userlist.=$row["User_ids"].",";
    }else{
    $userlist=$row["User_ids"];        
    }
        
    }//end of while
    if($countrow==1)
    {
$userlist2= " where User_id=$userlist";        
    }else{
    $bb2=strlen($userlist);
           $ccsG2=substr($userlist,0,$bb2-1);     
$userlist2= " where User_id in (".$ccsG2.")";        
    
    }
    return $userlist2;



    } else {
return "none";
    }
    
    
    
   } else {
return "none";
}
}
//------------------------Get users-----------------------------------
    function check_ifhas_thisrole($privlage,$userid){
$userinfo=Get_userinfo2($userid);
$groub_id=$userinfo["grup_id"];
 $sql = "SELECT distinct grup_id FROM users_group_privilegs_config WHERE  Privilege_id='$privlage' and is_granted='1' and grup_id='$groub_id' ;";
 $accepted_groups=0;
$userlist=$ccsG="";
$result3 = db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    return "Yes";
            
    }else{
    return "No";
    }
    


    }


//--------------------------------------USER PAGE ROLE -------------------------
 function Get_UserPage_Roles($userid,$pagefilename){
   $pageid=Get_page_id($pagefilename);
     $rolarrayx=array();
   $sqlq="SELECT id as idxe,can_insert ,can_delete ,can_edit ,can_access ,can_print ,
  can_export,can_select ,can_search ,can_show_colums ,can_sort  FROM  Users_Privileges  where User_id ='$userid' AND Page_id ='$pageid'";
     $result  = db_query($sqlq);
      /* Error occurred, return given name by default */
if ($result->num_rows > 0) {
    // output data of each row name="select"

    while($row = $result->fetch_assoc()) {
   $rolarrayx['can_insert']=$row['can_insert'];
      $rolarrayx['can_edit']=$row['can_edit'];
      $rolarrayx['can_delete']=$row['can_delete'];
      $rolarrayx['can_access']=$row['can_access'];
      $rolarrayx['can_print']=$row['can_print'];
      $rolarrayx['can_export']=$row['can_export'];
      $rolarrayx['can_select']=$row['can_select'];
       $rolarrayx['can_search']=$row['can_search'];
      $rolarrayx['can_show_colums']=$row['can_show_colums']; 
      $rolarrayx['can_sort']=$row['can_sort'];  
          
       }
       return $rolarrayx;
    }else{
        $rolarrayx['can_insert']=0;
      $rolarrayx['can_edit']=0;
      $rolarrayx['can_delete']=0;
      $rolarrayx['can_access']=0;
      $rolarrayx['can_print']=0;
      $rolarrayx['can_export']=0;
      $rolarrayx['can_select']=0;
      $rolarrayx['can_search']=0;
      $rolarrayx['can_show_colums']=0;  
      $rolarrayx['can_sort']=0;
      return $rolarrayx;
    }
    
    
  
     
   }
 //----------------------------------Get Use only--------------------------
   
      function get_role_value($rolval){
     
      if($rolval=='1'){
         return true;
      }else{
         return 0;
      }
      /* Return result array */
        }
//-------------------------------Get Proposal No-------------------------
function   update_propsal_printed($Proposal_id,$No_of_printing){
    $dater=date('Y-m-d H:i:s');
$sql = "update probosals set No_of_printing=$No_of_printing,Is_printedd='Yes',printing_date='$dater' where Proposal_id=$Proposal_id ";  
$yearresult = db_query($sql);

}

//----------------------------Get Proposal No-------------------------
function   update_agreement_acceoteting($Proposal_id,$agreementidx){
    $dater=date('Y-m-d H:i:s');
$sql = "update Working_orders_agreements set agrymnt_Status='Accepted' ,Accepting_date='$dater' where order_id=$Proposal_id and agryrmnt_id=$agreementidx";  
$yearresult = db_query($sql);

}

 
 
//--------------------------------Get_userinfo-----------------------------------------------------------
   function Get_userinfo($usid){
 $sql = "SELECT * FROM employees_users WHERE User_id=$usid;";

$result3 =db_query($sql);
$usrinfo=array();
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    
    while($row = $result3->fetch_assoc()) {
     $usrinfo['username']=$row["Shown_Name"];// echo "<option  value=$row[User_id]  ></option>";
     
     $bb=strlen($row["Logopaht"]);
           $ccsG=substr($row["Logopaht"],3,$bb-2); 
     $usrinfo['sendlogpath']=$ccsG;  
        
    }
    return $usrinfo;
   } else {

}
}
//--------------------------------Get_userinfo-----------------------------------------------------------
   function Get_userinfo2($usid){
 $sql = "SELECT * FROM employees_users WHERE User_id=$usid;";

$result3 =db_query($sql);
$usrinfo=array();
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    
    while($row = $result3->fetch_assoc()) {
    return $row;  
        
    }
   
   } else {
 return "None";
}
}
//-------------------------------------------------------------------------------------------
function Get_notifymaxid(){
$sql = "SELECT max(notificationid)+1 as mc FROM  app_notification  ";  
$yearresult = db_query($sql);
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"

    while($row = $yearresult->fetch_assoc()) {
    $Templt_contents_html=  $row['mc'];
    if($Templt_contents_html>0)
    {
        
    }else{
        $Templt_contents_html=1;
    }
        
        
    
       }
       return $Templt_contents_html;    
    }
    else {
      return 0;
   }


}
//-------------------------------------------------------------------------------------------
function get_notifyreciverid($rorderidx,$agreementidx){
    $agreementidx=$agreementidx+1;
$sql = "SELECT * FROM  Working_orders_agreements where order_id=$rorderidx and agryrmnt_id=$agreementidx  ";  
$yearresult = db_query($sql);
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"

    while($row = $yearresult->fetch_assoc()) {
    $Templt_contents_html=  $row['requested_from'];
    
        
        
    
       }
       return $Templt_contents_html;    
    }
    else {
      return 0;
   }


}


//------------------------Get users-----------------------------------
    function Get_max_id($tablename,$fildename,$wherecomand){
 $sql = "SELECT  MAX($fildename)+1 as NB FROM  $tablename  $wherecomand;";
//SELECT  AS NB FROM Working_rorders_details where rorder_id=$rorder_id"
$result3 =    db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    while($row = $result3->fetch_assoc()) {
    if($row["NB"]>0)
    {
   return $row["NB"];     
    }else{
        return 1;
    }
       }
   } else {
 return 1; 
}
}
//-------------------------------------------------------------------------------------------
function get_total_task($order_id){
$sql = "SELECT sum(amount) as mc FROM  Working_rorders_details where rorder_id=$order_id ";  
$yearresult = db_query($sql);
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"

    while($row = $yearresult->fetch_assoc()) {
    $Templt_contents_html=  $row['mc'];
    if($Templt_contents_html>0)
    {
        
    }else{
        $Templt_contents_html=1;
    }
        
        
    
       }
       return $Templt_contents_html;    
    }
    else {
      return 0;
   }


}
 function db_connect() {
   include_once("../App/App_constant.php"); 
    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
         // Load configuration as an array. Use the actual location of your configuration file
         
        $connection = mysqli_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS, PHPGRID_DBNAME);;
    }
    $connection->query('SET character_set_results=utf8');
    $connection->query("SET NAMES utf8mb4");
    $connection->query('SET character_set_client=utf8');
    $connection->query('SET character_set_connection=utf8');
    $connection->query('SET character_set_results=utf8');
    $connection->query('SET collation_connection=utf8_general_ci');
    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error(); 
    }
    return $connection;
}

 function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection,$query);
if (!$result) {
    //$resultx=array('issucessdb' => 'No','resultmsg'=>mysqli_error($connection).$query);
  //echo json_encode($resultx);
return mysqli_error($connection).$query; 
 
 }else{
    return $result;
 }
    
    //$errs=mysql_error();
   //$k1="Client_name_ar_UK";
   //$chkrslt=check_error($errs,$k1);
    
}
function check_error($err,$searchfor)
{
    $mystring = $err;
$findme   = $searchfor;
$pos = strpos($mystring, $findme);
if ($pos !== false) {
return true;
}else{
   return false; 
}

    
}


function get_SubCatagory_select($Cat_id){
if(is_numeric($Cat_id))
{
$sql = "SELECT * from Sub_Categories where Is_Actived='Yes' 
  and Cat_ID='$Cat_id'  ";
$result =db_query($sql);
$Scatylist="";
if ($result->num_rows > 0) {
    // output data of each row name="select"
        $Scatylist.="<option  value='nooptcity' > اختر التصنيف </option>";
    while($row = $result->fetch_assoc()) {
      $Scatylist.= "<option id='".$row['SCat_ID']."' value='".$row['SCat_ID']."'>".$row['SCat_Name_ar']."</option>";   
    }
    echo $Scatylist;
   } else {
    
   $Scatylist.="<option  value='nooptcity' >لايوجد تصنيفات فرعية </option>";
 echo $Scatylist;
}
}else{
    $Scatylist.="<option  value='nooptcity' >لايوجد تصنيفات فرعية </option>";
 echo $Scatylist;
}
}
 
 


  //-----------------get listings  with Search------------
function get_listing_Searching($idScata,$searchW){
$sql = "SELECT * from listings ,cities  where    listings.CityID=cities.CityID   and listings.Is_Actived='Yes' and listings.SCat_ID='$idScata' and (listings.title_ar like '%$searchW%' or 
      listings.Description like '%$searchW%'   or
       listings.tags like '%$searchW%'          or
       listings.Email like '%$searchW%'         or
         listings.Tell_No like '%$searchW%'         or
           listings.Fax_No like '%$searchW%'         or 
            listings.Moblile_No like '%$searchW%'         or
              listings.Address like '%$searchW%'          or
               cities.CityName_ar like '%$searchW%'  )


       ";
$result =db_query($sql);
$listSearch="";
 
if ($result->num_rows > 0) {
    // output data of each row name="select"
    
    while($row = $result->fetch_assoc()) {

       if ($row['Type_ID']==1) {


       $listSearch.='
       <div class="col-md-12 col-xs-12">
         <div class="listingbrd">
       <div class="row"><div class="col-md-7 col-sm-8 col-xs-12">
         <img class="img-responsive"';

    $ccsG2=str_replace("/taleem/uploads/","uploads/",$row["small_image_url"]); 

         $listSearch.='alt="'.$row['title_ar'].'" 
            src="'.$ccsG2 .'"  > </div>
            <div class="col-md-5 col-sm-4 col-xs-12">
             <h3 class="headers">
             <a href="listing-item.php?Listing_ID='.$row['Listing_ID'].'" >
            '.$row['title_ar'].'</a></h3>';

           
      $listSearch.='<ul class="blog-info"><li><i class="fa fa-eye"></i>'
          .$row['Total_views'] .'   </li>
          <li><i class="fa fa-tags"></i>
          '.$row['tags'].' </li>
          </ul>';
          $listSearch.='<address>
                      <ul>';

              $listSearch.=check_value($row['CityName_ar'],'<li>المدينة:','</li>');
          $listSearch.=check_value($row['Address'],'<li>العنوان:','</li>');
          $listSearch.=check_value($row['Tell_No'],'<li><abbr>هاتف:','</abbr></li>');
         $listSearch.=check_value($row['Moblile_No'],'<li><abbr>جوال:','</abbr></li>');
         $listSearch.=check_value($row['Fax_No'],'<li><abbr>فاكس:','</abbr></li>');
         $listSearch.=check_value($row['Email'],'<li><abbr>E-mail:','</abbr></li>');
                       
                   $listSearch.='</ul>
                       </address>

                      <a href= class="more pull-right" "listing-item.php?Listing_ID='.$row['Listing_ID'].'" class="more pull-right"> قراء المزيد<i class="icon-angle-right"></i></a>
                    </div>
                    </div>
                  </div>
                </div>';                    
           
       } elseif ($row['Type_ID']==2) {

    $ccsG2=str_replace("/taleem/uploads/","uploads/",$row["small_image_url"]); 

       $listSearch.='
       <div class="col-md-4 col-sm-6 col-xs-12">
           <div class="listingbrd">
        <img class="img-responsive" alt="'.$row['title_ar'].'" 
            src="'.$ccsG2 .'"  >

             <h2 class="headers">
             <a href="listing-item.php?Listing_ID='.$row['Listing_ID'].'">
            '.$row['title_ar'].'</a></h2>';
           
      $listSearch.='<ul class="blog-info"><li><i class="fa fa-eye"></i>'
          .$row['Total_views'] .'   </li>
          <li><i class="fa fa-tags"></i>
          '.$row['tags'].' </li>
          </ul>';
          $listSearch.='<address>
                      <ul>';

              $listSearch.=check_value($row['CityName_ar'],'<li>المدينة:','</li>');
          $listSearch.=check_value($row['Address'],'<li>العنوان:','</li>');
          $listSearch.=check_value($row['Tell_No'],'<li><abbr>هاتف:','</abbr></li>');
         $listSearch.=check_value($row['Moblile_No'],'<li><abbr>جوال:','</abbr></li>');
         $listSearch.=check_value($row['Fax_No'],'<li><abbr>فاكس:','</abbr></li>');
         $listSearch.=check_value($row['Email'],'<li><abbr>E-mail:','</abbr></li>');
                       
                   $listSearch.='</ul>
                       </address>

                      <a href= class="more pull-right" "listing-item.php?Listing_ID='.$row['Listing_ID'].'" class="more pull-right"> قراء المزيد<i class="icon-angle-right"></i></a>
                      </div>
                    </div>';                    
          
       }elseif ($row['Type_ID']==3) {
       $listSearch.='
       
       <div class="col-md-4 col-sm-6 col-xs-12">
         <div class="listingbrd">
             <h2 class="headers">
             <a href="listing-item.php?Listing_ID='.$row['Listing_ID'].'">
            '.$row['title_ar'].'</a></h2>';
           
      $listSearch.='<ul class="blog-info"><li><i class="fa fa-eye"></i>'
          .$row['Total_views'] .'   </li>
          <li><i class="fa fa-tags"></i>
          '.$row['tags'].' </li>
          </ul>';
          $listSearch.='<address>
                      <ul>';

              $listSearch.=check_value($row['CityName_ar'],'<li>المدينة:','</li>');
          $listSearch.=check_value($row['Address'],'<li>العنوان:','</li>');
          $listSearch.=check_value($row['Tell_No'],'<li><abbr>هاتف:','</abbr></li>');
         $listSearch.=check_value($row['Moblile_No'],'<li><abbr>جوال:','</abbr></li>');
         $listSearch.=check_value($row['Fax_No'],'<li><abbr>فاكس:','</abbr></li>');
         $listSearch.=check_value($row['Email'],'<li><abbr>E-mail:','</abbr></li>');
                       
                   $listSearch.='</ul>
                       </address>
                    

                      <a href= class="more pull-right" "listing-item.php?Listing_ID='.$row['Listing_ID'].'" class="more pull-right"> قراء المزيد<i class="icon-angle-right"></i></a>
                      </div>
                    </div>'; 
                    
                    }                 
                       
          
    }
    echo $listSearch;
   } else {
    $listSearch='<div class="col-md-12" style="text-align: center !important;"><strong>عفواً لايوجد جهات للبحث </strong>';
    $listSearch.='  </div>'; 

echo $listSearch;
}
}
//-----------------get listings  from Same ------------
function check_value($val,$start,$end){
$retval="";
if($val!="")
{
$retval.=$start.$val.$end; 
}else{
  $retval=" ";  
}
    return $retval;
} 
//-------------------------------Get Proposal No-------------------------
function edit_4rom_cart($cookeval,$productid,$newamount,$oldamount)
{
   $product_items=$pyron_usercart=array();
 $cookinfox= base64_decode($_COOKIE['ber_cart']);
 $cooke_cart = json_decode($cookinfox,TRUE);
  $cooke_cart_productinfo=array();               
 $indexr=0;
 $cookie_value="";
$cooke_cart_productinfo=json_decode(base64_decode($cooke_cart["product_info"]),TRUE);;
 foreach($cooke_cart_productinfo as $productarr)
  {
     //print_r($productarr);
   if($productarr["project_id"]==$productid &&$productarr["amount"]==$oldamount)
    {
     $product_items[$indexr]["project_id"]= $productarr["project_id"]; 
$product_items[$indexr]["amount"]= $newamount; 
$product_items[$indexr]["Images"]=  $productarr["Images"];   


   
    }else{
 $product_items[$indexr]["project_id"]= $productarr["project_id"]; 
$product_items[$indexr]["amount"]= $productarr["amount"]; 
$product_items[$indexr]["Images"]=  $productarr["Images"];   



$indexr++;

   }
   }
   //  return $cookie_value;    
$pyron_usercart["product_count"]=$indexr;  
$pyron_usercart["product_info"]=base64_encode(json_encode($product_items));     

$cookie_value =base64_encode(json_encode($pyron_usercart));
 
  $resultx=array('locstatus' => 'OK','cookevals'=>$cookie_value);
      echo json_encode($resultx);



}
//-------------------------------Get Proposal No-------------------------
function delete_4rom_cart($cookeval,$product_id,$amount)
{
   $product_items=$pyron_usercart=array();
 $cookinfox= base64_decode($_COOKIE['ber_cart']);
 $cooke_cart = json_decode($cookinfox,TRUE);
  $cooke_cart_productinfo=array();               
 $indexr=0;
 $cookie_value="";
$cooke_cart_productinfo=json_decode(base64_decode($cooke_cart["product_info"]),TRUE);;
 foreach($cooke_cart_productinfo as $productarr)
  {
     //print_r($productarr);
   if($productarr["project_id"]==$product_id && $productarr["amount"]==$amount)
   {
     
    }else{
 $product_items[$indexr]["project_id"]= $productarr["project_id"]; 
$product_items[$indexr]["amount"]= $productarr["amount"]; 
$product_items[$indexr]["Images"]=  $productarr["Images"];   


$indexr++;

   }
   }
   //  return $cookie_value;    
$pyron_usercart["product_count"]=$indexr;  
$pyron_usercart["product_info"]=base64_encode(json_encode($product_items));          
$cookie_value =base64_encode(json_encode($pyron_usercart));
 
  $resultx=array('locstatus' => 'OK','cookevals'=>$cookie_value);
      echo json_encode($resultx);



}
//-----------------------------------------------------

 
function get_reloadprojectsselect($value){

 
       
 if (is_numeric($value)) {
        
          $project_id=$value;
          
       }
       else{
     
        
        $project_id=0;
       }

 $sqlg= "SELECT * FROM projects where project_id='$project_id' ";
 $resultg=db_query($sqlg);
$row =$resultg->fetch_assoc();
 
$projects= array();
$lat=0;
$lng=0.0;
 $Address="";
 $namebranch="";
 
 
 $Mobile="";
 $Phone="";
 $Email="";
 
     $i=0;
 
   
       $project_packge1=$row['project_packge1'];
    
        
      $project_packge2=$row['project_packge2'];
      $project_packge3=$row['project_packge3'];
  

      $total_donate_amount=$row['total_donate_amount'];
      $total_cost=$row['total_cost'];
         $minau=$row['total_cost']-$row['total_donate_amount'];
        
          $projects[0]=$project_packge1;
          $projects[1]=$project_packge2;
          $projects[2]=$project_packge3;
          
        
          $projects[3]=$total_cost;
          $projects[4]=$total_donate_amount;
          $projects[5]=$minau;
           $projects[6]=$row['short_desc'];
                   
                     

        
         

    echo   json_encode($projects);
 

}

 
 // --------------------------------------------------------------------------------
function get_All_SectionDoctors($value){
  
 
$sql = "SELECT * from doctors where Product_Id=$value ";
$result =db_query($sql);
$doctors="";

if ($result->num_rows > 0) {
    // output data of each row name="select"
          
    while($row = $result->fetch_assoc()) {
      $doctors.= "<option id='".$row['doctor_id']."' value='".$row['doctor_id']."'>
      ".$row['NameDoctor']." &nbsp; - &nbsp; ".$row['Speciality']."</option>";   
     }



   }
   echo $doctors;

 }

function get_All_Sub_catalibrary($value){
  
 
$sql = "SELECT * from librarysubcatagory where cata_id=$value ";
$result =db_query($sql);
$subjects="";

if ($result->num_rows > 0) {
    // output data of each row name="select"
           $subjects.= '
               <option  value="">أختيار التصنيف</option>
            ';
    while($row = $result->fetch_assoc()) {
      $subjects.= "<option id='".$row['subc_id']."' value='".$row['subc_id']."'>".$row['NameSubc']."</option>";   
     }



   }
   echo $subjects;

 }

function get_reloadDoctorsSection($value,$value1){

 
       if (is_numeric($value) && is_numeric($value1)) {
           $Product_Id=$value1;
          $lang_id=$value; 
       }
       else{ 
        $lang_id=0;
        $Product_Id=0;
       }

  
  
  $sqlp= "SELECT * FROM products where lang_id='$lang_id'   and  Is_Actieved='Yes'       order by order_id  ";  
$resultp=db_query($sqlp);
 

$doctors=" "; 
$active="";
$i=0;
 if ($resultp->num_rows > 0) { 
         while ($rowp= $resultp->fetch_assoc()) {
                $Product_Id=$rowp['Product_Id'];
               $doctors.='

            <h2 class="light bordered"> <span>'.$rowp['Name_product'].'</span></h2>
            
       
            <div class="row">

               ';
$sql= "SELECT * FROM doctors  where lang_id='$lang_id'  and Is_Actieved='Yes'  and  Product_Id='$Product_Id'  ";  

$result3=db_query($sql);
      while ($row= $result3->fetch_assoc()) {
           $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row['image']);
           $doctors.='
             <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                <div class="doctors-img">
                <img src="'.$ccsG2.'" width="234" onerror="this.onerror=null; this.src=\'uploads/no-image.png\';" alt="'.$row['NameDoctor'].'" title="'.$row['NameDoctor'].'">
                  <ul class="list-unstyled social2">
                    <li><a href="'.$row['facebook'].'" class="fb"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="'.$row['twitter'].'" class="twitter"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="'.$row['youtube'].'" class="g-plus"><i class="fa fa-youtube"></i></a></li>
                  </ul>
                </div>
                
                <div class="doctors-detail">
                  <h4>'.$row['NameDoctor'].'<span></span></h4>
                  <p><label class="heading">'.$this->langs['Speciality'].'</label><label class="detail">'.$row['Speciality'].'</label></p>
                  <p><label class="heading">'.$this->langs['Degrees'].'</label><label class="detail">'.$row['Degrees'].'</label></p>
                  <p><label class="heading">'.$this->langs['Experience'].'</label><label class="detail">'.$row['Experience'].'</label></p>
                  <p><label class="heading">'.$this->langs['Training'].'</label><label class="detail">'.$row['Training'].'</label></p>
                  <p><label class="heading">'.$this->langs['Workdays'].'</label><label class="detail">'.$row['Workday'].'</label></p>
                </div>
                
              </div> ';
      
       }
       $doctors.='</div>';  


}
   echo $doctors;

 }else{
 echo "not fountd";

 }


}



function get_library_Searching($searchW){

 

$sql = "SELECT * from subjects,librarysatagory,librarysubcatagory,booklibrary  where   
subjects.subj_id=librarysatagory.subj_id   and librarysatagory.cata_id=librarysubcatagory.cata_id and librarysubcatagory.subc_id=booklibrary.subc_id   and (subjects.Namesub like '%$searchW%' or 
      librarysatagory.NameCata like '%$searchW%'   or
       librarysubcatagory.NameSubc like '%$searchW%'          or
       booklibrary.NameBook like '%$searchW%'         or
         booklibrary.short_desc like '%$searchW%'         or
            booklibrary.content like '%$searchW%'         or 
            booklibrary.author like '%$searchW%'    )


       ";
 
$result =db_query($sql);
$library="";
    
if ($result->num_rows > 0) {
    // output data of each row name="select"
           
    while($row = $result->fetch_assoc()) {
     
     
     
  $ccsG2 = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row["Image"]); 
  $pdf = preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", $row["pdf"]); 
         $library.='

                  
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="books_featured_pro">
        <div class="vertical-109">
                    <div class="block_descrip">
                     
                      <div class="block_cover">
                           <img src="'.$ccsG2 .'" onerror="this.onerror=null; this.src=\'uploads/no-image.png\';" alt="'.$row['NameBook'].'" hspace="2" vspace="2" border="0" >
                     </div>
                  <div class="block_title">
                          <a href="'.$pdf.'" target="_blank">'.$row['NameBook'].'</a>
                     </div>
                   <div class="block_authors">
                    المؤلف:'.$row['author'].' 
                   </div>
                   
                              </div>
                  <div class="block_pricehits">
                       <div class="block_price">
                             111 Dounload       

                       </div>
                              <div class="block_hits">
                                    <span>Hits:</span>280       
                              </div>
                   
                 </div>
                   
             </div>

        </div>

        </div> ';                 
                       
          
    }
    echo $library;
   } else {
  //  $listGold='<div class="col-md-12" style="text-align: center !important;"><strong>عفواً لايوجد جهات من الفئة الاولى </strong>';
//    $listGold.='  </div>'; 
    $library.=''; 
  
 echo $library;
}
}
?>