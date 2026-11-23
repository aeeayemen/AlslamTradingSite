<?php

 
 
 
 require_once 'App_constant.php';
$conect=mysqli_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS,PHPGRID_DBNAME)or die("cannot connect"); 
 

$checkaccess=$_POST['checktype'];

if ($checkaccess=="ADDAccessPage") {
	 
$Page_id=$_POST['Page_id'];
$activeate=$_POST['activeate'];
	$Privilege_id =$_POST['Privilege_id']; 
$N = count($Privilege_id);

          $output='';  
                             
	
	if ($activeate==1) {

				for($i=0; $i < $N; $i++)
				{
				  $id=$Privilege_id[$i];

				  	   
				    $queryselect="SELECT * from page_privilegs_config where Privilege_id='$id' and Page_id='$Page_id' ";     
				      
				    $outputsselect=mysqli_query($conect,$queryselect) or die (mysqli_error() );
				     $num=mysqli_num_rows($outputsselect);
				     if ($num==0) {
				     	 
				    
				  
				    $query="INSERT INTO page_privilegs_config (Privilege_id,Page_id,is_granted) VALUES  ('$id','$Page_id',1) ";     
				      
				    $outputs=mysqli_query($conect,$query) or die (mysqli_error() );
                    
				     if ($outputs) {
				     	 $output="تم العملية بنجاح";
				     }else{
				     	 $output="عذرا العملية لم تنجح";
				     }


				     }
				 
				}
		 
	}
	elseif ($activeate==0) {
		 
				for($i=0; $i<$N; $i++)
				{
				  $id=$Privilege_id[$i];
 
				    $queryselect="SELECT * from page_privilegs_config where Privilege_id='$id' and Page_id='$Page_id' ";     
				      
				    $outputsselect=mysqli_query($conect,$queryselect) or die (mysqli_error() );
				     $num=mysqli_num_rows($outputsselect);
				     if ($num!=0) {

				    $query="Delete from  page_privilegs_config where Privilege_id='$id' and Page_id='$Page_id' ";     
				      
				    $outputs=mysqli_query($conect,$query) or die (mysqli_error() );
				     if ($outputs) {
				     	 $output="تم العملية بنجاح";
				     }else{
				     	 $output="عذرا العملية لم تنجح";
				     }

				    }
				 
				}
	}
 echo $output;   
}
elseif ($checkaccess=="ADDGroupAcess") {
	 
	 
$Page_id=$_POST['Page_id'];
$activeate=$_POST['activeate'];
$grup_id=$_POST['grup_id'];
	$Privilege_id =$_POST['Privilege_id']; 
$N = count($Privilege_id);
$npage=count($Page_id);
          $output='';  
                             
	
	if ($activeate==1) {

				for($i=0; $i < $N; $i++)
				{
				  $id=$Privilege_id[$i];
                       
				  	   
				    for ($j=0; $j <$npage ; $j++) { 
				    	  $pageid=$Page_id[$j];

				    $queryselect="SELECT * from users_group_privilegs_config where Privilege_id='$id' and Page_id='$pageid' and grup_id='$grup_id' ";     
				      
				    $outputsselect=mysqli_query($conect,$queryselect) or die (mysqli_error() );
				     $num=mysqli_num_rows($outputsselect);
				     if ($num==0) {
				     	 

				    $query="INSERT INTO users_group_privilegs_config (grup_id,Page_id,Privilege_id,is_granted) VALUES  ('$grup_id','$pageid','$id',1) ";     
				      
				    $outputs=mysqli_query($conect,$query) or die (mysqli_error() );
                    
				     if ($outputs) {
				     	 $output="تم العملية بنجاح";
				     }
				     else{
				     	 $output="عذرا العملية لم تنجح";
				     }
				 }


				    }
				    
				 
				}
		 
	}
	elseif ($activeate==0) {
		 
				for($i=0; $i<$N; $i++)
				{
				  $id=$Privilege_id[$i];
                
				    for ($j=0; $j <$npage ; $j++) { 
				    	  $pageid=$Page_id[$j];

				    $queryselect="SELECT * from users_group_privilegs_config where Privilege_id='$id' and Page_id='$pageid' and grup_id='$grup_id' ";     
				      
				    $outputsselect=mysqli_query($conect,$queryselect) or die (mysqli_error() );
				     $num=mysqli_num_rows($outputsselect);
				     if ($num!=0) {

				    $query="Delete from  users_group_privilegs_config where Privilege_id='$id' and Page_id='$pageid' and grup_id='$grup_id'  ";     
				      
				    $outputs=mysqli_query($conect,$query) or die (mysqli_error() );
				     if ($outputs) {
				     	 $output="تم العملية بنجاح";
				     }
				     else{
				     	 $output="عذرا العملية لم تنجح";
				     }
				 }


                    }
				    
				 
				}
	}
 echo $output;   
}
   
?>