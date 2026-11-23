<?php
/**
 * ملف كود الهيدر بمحتوياته 
 * يتم ربط الملفات الضروريه في هذا الجزء   
 */
 require_once(MODEL_DIR."/App_Settings/App_options.php");  ?>
 <?php require_once(MODEL_DIR."/App_Classes/Langauge.php");
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);//Detecting Default Browser language
 $language = New Language("ar");
 $langs = array();
  $langs =  $language->userLanguage();
  $lngdir= $language->userLangDir();

 ?>

<?php 

?>
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title> <?php echo $langs["Home_PGTITL"]."&nbsp;|&nbsp;".$langs["App_name_ar"];?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta content="<?php echo $langs["App_name_ar"]; ?> " name="description"/>
<meta content="<?php echo $langs["App_name_ar"]; ?> " name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/bootstrap/css/bootstrap<?php echo "-".$lngdir?>.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo PLUGINS_DIR; ?>/assets/admin/pages/css/login-soft<?php echo "-".$lngdir?>.css" rel="stylesheet" type="text/css"/> 
    <link href="../plugins/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->

        <link href="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- BEGIN THEME STYLES -->
<link href="<?php echo PLUGINS_DIR; ?>/assets/global/css/components<?php echo "-".$lngdir?>.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGINS_DIR; ?>/assets/global/css/plugins<?php echo "-".$lngdir?>.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGINS_DIR; ?>/assets/admin/layout/css/layout<?php echo "-".$lngdir?>.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGINS_DIR; ?>/assets/admin/layout/css/themes/darkblue<?php echo "-".$lngdir?>.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo PLUGINS_DIR; ?>/assets/admin/layout/css/custom<?php echo "-".$lngdir?>.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../plugins/assets/admin/layout/css/custom-rtl.css">
<script src="lib/js/jquery.min.js" type="text/javascript"></script>
 <script src="../plugins/assets/global/plugins/jquery.min.js" type="text/javascript"></script> 
</script>


<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo $app["faviconpath"];?>"/>
</head>


<!-- END HEAD -->