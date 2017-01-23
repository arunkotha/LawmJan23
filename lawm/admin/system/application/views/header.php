<?php
header("cache-Control: no-store, no-cache, must-revalidate");
header("cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=$this->lang->line('lawm')?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="google" content="notranslate" />
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=ADMIN_BASE_URL?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?=ADMIN_BASE_URL?>plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?=ADMIN_BASE_URL?>plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?=ADMIN_BASE_URL?>plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=ADMIN_BASE_URL?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=ADMIN_BASE_URL?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <link href="<?=ADMIN_BASE_URL?>dist/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- iCheck -->
    <link href="<?=ADMIN_BASE_URL?>plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?=ADMIN_BASE_URL?>plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?=ADMIN_BASE_URL?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <link href="<?=ADMIN_BASE_URL?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=ADMIN_BASE_URL?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!--<link href="<?/*=ADMIN_BASE_URL*/?>plugins/ckeditor/contents.css" rel="stylesheet" type="text/css" />-->


    <!-- jQuery 2.1.3 -->
    <script src="<?=ADMIN_BASE_URL?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?=ADMIN_BASE_URL?>plugins/jQuery/html5shiv-3.7.0.js"></script>
    <script src="<?=ADMIN_BASE_URL?>plugins/jQuery/respond-1.3.0.min.js"></script>
    <script>
        var JSON = '';

    </script>
    <![endif]-->
    
    
    <script>
    
    function toggleDisplay(item)
    {
        item = document.querySelector(item);
        
        if(item.style.display=='block')
        {
            item.style.display = 'none';
        }
        else
        {
            item.style.display = 'block';
        }
    }
    
    </script>
    
</head>
<body class="skin-blue">
<div class="wrapper">

<header class="main-header">
<!-- Logo -->
<a href="<?=ADMIN_BASE_URL?>" class="logo"><b><?=$this->lang->line('lawm')?></b></a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">

    <li>
    <?php 
    
        $language = $this->mwelcome->getLanguage();
        for($s=0;$s<count($language);$s++)
        { 
            if($language[$s]['id_language']!=$this->session->userdata('language_id'))
            {
                ?>
                
                <a style="cursor: pointer;" href="<?=ADMIN_BASE_URL?>index.php/Welcome/Language/<?=$language[$s]['id_language']?>" ><?=$language[$s]['language']?></a>

                <?php   
            } 
        }
    ?>
    </li>               
                    
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="toggleDisplay('ul.dropdown-menu')">
        <!--<img src="<?/*=ADMIN_BASE_URL*/?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>-->
        <span class="hidden-xs"><?php echo $this->session->userdata('user_name'); ?></span>
    </a>
    
    
    <ul class="dropdown-menu">
        <!-- User image -->
        <!--<li class="user-header">
            <img src="<?/*=ADMIN_BASE_URL*/?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            <p>
                Alexander Pierce - Web Developer
                <small>Member since Nov. 2012</small>
            </p>
        </li>-->
        <!-- Menu Body -->
        <!--<li class="user-body">
            <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
            </div>
        </li>-->
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/changePassword" class="btn btn-default btn-flat"><?=$this->lang->line('change_password')?></a>
            </div>
            <div class="pull-right">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/logout" class="btn btn-default btn-flat"><?=$this->lang->line('sign_out')?></a>
            </div>
        </li>
    </ul>
</li>
</ul>
</div>
</nav>
</header>
