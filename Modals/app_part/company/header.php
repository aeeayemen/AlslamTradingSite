<?php require_once 'Modals/app_part/getdatainitial.php';
// print_r($DetailCompany);
// exit;

?>
<!DOCTYPE html>
<html lang="<?php echo $langt; ?>">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 , shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 , shrink-to-fit=no">


    <title><?php echo $ThisTitlePage; ?>  </title>
    <meta charset="utf-8">
    <link rel="canonical" href="<?php echo $base_url; ?>">
    <meta content="<?php echo $ThisSeoDescribtion; ?>" name="description"/>
    <meta content="<?php echo $ThisKeywordDescribtion; ?>" name="keywords"/>
    <meta property="og:site_name" content="<?php echo $DetailCompany['cname']; ?>"/>
    <meta property="og:title" content="<?php echo $DetailCompany['cname']; ?>"/>
    <meta property="og:description"
          content="<?php echo $DetailCompany['Address'] . $DetailCompany['Mobile'] . $DetailCompany['Phone'] . $DetailCompany['Fax']; ?>">
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="<?php echo $ThisSeoImage; ?>"/>
    <meta property="og:url" content="<?php echo $base_url; ?>"/>
    <meta name="twitter:card" content="<?php echo $ThisSeoImage; ?>">
    <meta name="twitter:title" content="<?php echo $ThisTitlePage; ?> ">
    <meta name="twitter:description" content="<?php echo $ThisSeoDescribtion; ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo $DetailCompany['logo']; ?>">
    <link rel="apple-touch-icon" href="<?php echo $DetailCompany['logo']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $DetailCompany['logo']; ?>">


    <!-- favicon icon -->
    <link rel="shortcut icon" href="uploads/favicon.png" />

    <!-- Bootstrap.Min.CSS  -->
    <link rel="stylesheet" href="plugins/css/bootstrap.min.css">
    <!-- Owl.Carousel.Min.CSS -->
    <link rel="stylesheet" href="plugins/css/owl.carousel.min.css">
    <!-- Owl.Theme.Default.Min.CSS -->
    <link rel="stylesheet" href="plugins/css/owl.theme.default.min.css">
    <!-- Animate.CSS -->
    <link rel="stylesheet" href="plugins/css/animate.css">
    <!-- Font-Awesome.Min.CSS -->
    <link rel="stylesheet" href="plugins/css/font-awesome.min.css">
    <!-- Flaticon.CSS -->
    <link rel="stylesheet" href="plugins/fonts/flaticon.css">
    <!-- Magnific-Popup.CSS -->
    <link rel="stylesheet" href="plugins/css/magnific-popup.css">
    <!-- Style.CSS -->
    <link rel="stylesheet" href="plugins/css/style-<?php echo $style; ?>.css">
    <!-- Responsive.CSS -->
    <link rel="stylesheet" href="plugins/css/responsive.css">

    <!-- Rtl.CSS -->
    <?php
    if($lang_id ==1){
        ?>
        }
        <link rel="stylesheet" href="plugins/css/rtl.css">
    <?php }
    ?>
</head>

<body class="<?php  echo  $langDir; ?> "  lang="<?php  echo  $langt; ?>" dir="<?php  echo  $langDir; ?>">

<!-- page wrapper start -->

<div class="page-wrapper">

    <!-- Start Preloader Section -->
        <div class="preloader">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    <!-- End Preloader Section -->

