<?php
/**
 * كود خاص بدوال الشريط الجانبي   
 */
date_default_timezone_set('America/Los_Angeles');

$checkwhat = $_REQUEST["checkidx"];
switch($checkwhat){
    case 'chatlist':
       Get_chatlist_list();
        break;
    case "probosals":
        Get_proposalno();
        break;
    case "contracts":
        Get_contractno();
        break;
  case "projects":
        Get_projectno();
        break;
         case "Propsal_printed":
    $Proposal_id=$_REQUEST['Proposal_idx'];
        update_propsal_printfild($Proposal_id);
        break;
     case "Contract_printed":
    $Contract_id=$_REQUEST['Contract_idx'];
        update_Contract_printfild($Contract_id);
        break;
    case "clientcontract":
       $cityavals=$_REQUEST['clientid'];
        Get_clients_contracts($cityavals);
        break;
     case "contractproposal":
       $cityavals2=$_REQUEST['proposalid'];
        Get_contract_proposal($cityavals2);
        break;
     case "roles":
       $cityavals2=$_REQUEST['pageidx'];
       $grpidx=$_REQUEST['groupid'];
        Get_role_list($cityavals2,$grpidx);
        break;
       case "pageprivlages":
       $cityavals2=$_REQUEST['pageidx'];
        Get_page_role_list($cityavals2);
        break;
     case "zonelist":
       $cityid=$_REQUEST['cityid'];
       Get_Zone_list($cityid);
        break;
       default :
      
}
//-------------------------------Get Proposal No-------------------------

function Get_clients_contracts($clients_idx){
$sql = "SELECT Contract_id,Proposal_id,Contracts_Title FROM  contracts WHERE ClientID='$clients_idx' ";  

echo "<option  value=''>اختر من القائمة</option>";
$result3 =  db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    while($row = $result3->fetch_assoc()) {
      echo "<option  value=$row[Contract_id] propidx=$row[Proposal_id]>$row[Contracts_Title]</option>";   
    }
    
   } else {
echo "<option  value='rassam'>لايوجد بيانات</option>";
}

}

//-------------------------------Get Proposal No-------------------------

function Get_Zone_list($clients_idx){

$sql = "select * from zones  where CityID='$clients_idx' and Is_active=1 and Show_on_Map=1";  
$yearresult = db_query($sql);
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"
    $neuconst1=array();
    $i=0;
    // >$row[Contactname]</option>";
      echo "<option value='' >اختر منطقة</option>";  
    while($row = $yearresult->fetch_assoc()) {

  echo "<option  value='".$row['ZoneID']."'>".$row['ZoneName_ar']."</option>";  
    }
   } else {
    echo "<option value='nooptzone'>لايوجد مناطق </option>";
   
   }
  }


//-------------------------------Get Proposal No-------------------------

function Get_contract_proposal($clients_idx){
$sql = "SELECT Proposal_id,Probosal_Title FROM  probosals WHERE Proposal_id='$clients_idx' ";  

echo "<option  value=''>اختر من القائمة</option>";
$result3 =  db_query($sql);
if ($result3->num_rows > 0) {
    // output data of each row name="select"
    while($row = $result3->fetch_assoc()) {
      echo "<option  value=$row[Proposal_id] >$row[Probosal_Title]</option>";   
    }
    
   } else {
echo "<option  value='rassam'>لايوجد بيانات</option>";
}

}

//-------------------------------Get Proposal No-------------------------

function Get_chatlist_list(){
$sql = "SELECT Emp_no,User_id, Username, Shown_Name, Primary_Email, Moblile_No, User_Note, Is_Blocked, Logopaht FROM employees_users where  Is_Actived=1 ";  

$chatlist=" ";
$result3 =  db_query($sql);
if ($result3->num_rows > 0) {
    $chatlist.='<h3 class="list-heading">قائمة الموظفين</h3>';
    $chatlist.='<ul class="media-list list-items" id="chatlist">';
    
    while($row = $result3->fetch_assoc()) {
        $chatlist.='<li class="media">';
        $chatlist.='<div class="media-status">';
        $chatlist.='<span class="badge badge-success">8</span>';
        $chatlist.='</div>';
        $chatlist.='<img class="media-object" src="'.$row["Logopaht"].'" alt="'.$row["Shown_Name"].'">';
        $chatlist.='<div class="media-body">';
        $chatlist.='<h4 class="media-heading">'.$row["Shown_Name"].'</h4>';
        $chatlist.='<div class="media-heading-sub">';
        $chatlist.=$row["Moblile_No"];// here you can show job titles 
        $chatlist.='</div>';
        $chatlist.='</div>';
        $chatlist.='</li>';
    }
    $chatlist.='</ul> ';
    echo $chatlist;
   } else {
echo " ";
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
function Get_proposalno(){
$sql = "SELECT max(Proposal_id)+1 as mc FROM  probosals  ";  
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
         $resultx=array('locstatus' => 'OK','templtcontent'=>"$Templt_contents_html");
        echo json_encode($resultx);
        
    
       }
           
    }
    else {
      $resultx=array('locstatus' => 'OK','templtcontent'=>"1");
        echo json_encode($resultx);
   }


}
//-------------------------------Get Proposal No-------------------------
function Get_contractno(){
$sql = "SELECT max(Contract_id)+1 as mc FROM  contracts  ";  
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
         $resultx=array('locstatus' => 'OK','templtcontent'=>"$Templt_contents_html");
        echo json_encode($resultx);
        
    
       }
           
    }
    else {
      $resultx=array('locstatus' => 'OK','templtcontent'=>"1");
        echo json_encode($resultx);
   }


}
//-------------------------------Get Proposal No-------------------------
function Get_projectno(){
$sql = "SELECT max(project_id)+1 as mc FROM   projects  ";  
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
         $resultx=array('locstatus' => 'OK','templtcontent'=>"$Templt_contents_html");
        echo json_encode($resultx);
        
    
       }
           
    }
    else {
      $resultx=array('locstatus' => 'OK','templtcontent'=>"1");
        echo json_encode($resultx);
   }


}
//-------------------------------Get Proposal No-------------------------
function   update_propsal_printfild($Proposal_id){
$sql = "SELECT No_of_printing,No_of_view  FROM  probosals where Proposal_id=$Proposal_id ";  
$yearresult = db_query($sql);
$No_of_printing=0;
$No_of_view=0;
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"

    while($row = $yearresult->fetch_assoc()) {
    $No_of_printing=  $row['No_of_printing']+1;
    $No_of_view=  $row['No_of_view']+1;
    
        
       }
      update_propsal_printed($Proposal_id,$No_of_printing,$No_of_view);     
    }
    else {
      update_propsal_printed($Proposal_id,$No_of_printing,$No_of_view);     
   }


}

//-------------------------------Get Proposal No-------------------------
function   update_Contract_printfild($Proposal_id){
$sql = "SELECT No_of_printing,No_of_view  FROM  contracts where Contract_id=$Proposal_id ";  
$yearresult = db_query($sql);
$No_of_printing=0;
$No_of_view=0;
if ($yearresult->num_rows > 0) {
    // output data of each row name="select"

    while($row = $yearresult->fetch_assoc()) {
    $No_of_printing=  $row['No_of_printing']+1;
    $No_of_view=  $row['No_of_view']+1;
    
        
       }
      update_Contract_printed($Proposal_id,$No_of_printing,$No_of_view);     
    }
    else {
      update_Contract_printed($Proposal_id,$No_of_printing,$No_of_view);     
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
function   update_propsal_printed($Proposal_id,$No_of_printing,$No_of_view){
$sql = "update probosals set No_of_printing=$No_of_printing,No_of_view=$No_of_view,Is_printed=1  where Proposal_id=$Proposal_id ";  
$yearresult = db_query($sql);

}

//-------------------------------Get Proposal No-------------------------
function   update_Contract_printed($Proposal_id,$No_of_printing,$No_of_view){
$sql = "update contracts set No_of_printing=$No_of_printing,No_of_view=$No_of_view,Is_printed=1  where Contract_id=$Proposal_id ";  
$yearresult = db_query($sql);

}
 function db_connect() {
   include_once("../../App/App_constant.php"); 
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
    return $result;
}


?>