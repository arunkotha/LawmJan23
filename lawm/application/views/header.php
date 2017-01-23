<?php
header("cache-Control: no-store, no-cache, must-revalidate");
header("cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>


<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>

    <title><?=$this->lang->line('page_title')?></title>



    <!-- Meta -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">
    
    <meta name="google" content="notranslate" />



    <!-- Favicon -->

    <link rel="shortcut icon" href="<?=BASE_URL?>assets/img/favicon.ico">



    <!-- Web Fonts -->

    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>



    <!-- CSS Global Compulsory -->

    <link rel="stylesheet" href="<?=BASE_URL?>assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css">



    <!-- CSS Header and Footer -->

    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/header-default.css">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/footer-v1.css">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/gmail-style.css">

    <!-- CSS Implementing Plugins -->

    <link rel="stylesheet" href="<?=BASE_URL?>assets/plugins/animate.css">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/profile.css">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/plugins/line-icons/line-icons.css">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/plugins/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/plugins/sky-forms-pro/sky-forms.css">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/plugins/sky-forms-pro/custom-sky-forms.css">

    <!--[if lt IE 9]><link rel="stylesheet" href="<?=BASE_URL?>assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/plugins/flex-carousel/flex-carousel.css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/plugins/flex-carousel/flex-carousel-animate.css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/plugins/flex-carousel/flex-carousel-skins.css" />

    <!-- CSS Page Style -->

    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/page_search.css">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/custom.css">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/jRating.jquery.css">


    <!-- CSS Theme -->

    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/dark-red.css" id="style_color">

    <script>
        var BASE_URL = '<?php echo BASE_URL ?>';

        var PARTNER_NAME = '<?=$this->lang->line('partner_name')?>';
        var PARTNER_ID = '<?=$this->lang->line('partner_id')?>';
        var DELETE = '<?=$this->lang->line('delete')?>';
    </script>

</head>



<body>

<div class="wrapper <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?> ">

    <!--=== Header ===-->

    <div class="header" style="padding-bottom: 20px;">

        <div class="container">

            <!-- Logo -->

            <a class="logo" href="<?=BASE_URL?>">

                <img src="<?=BASE_URL?>assets/img/logo.png" style="height: 100px;" alt="Logo">

            </a>

            <!-- End Logo -->



            <!-- Topbar -->

            <div class="topbar">

                <ul class="loginbar <?php if($this->session->userdata('language_id')!=1){ echo "pull-left"; } else{ echo "pull-right"; } ?>" >

                    <li class="hoverSelector">

                        <i class="fa fa-language"></i>
                        <?php $language = $this->Mwelcome->getLanguage();
                                for($s=0;$s<count($language);$s++){ if($language[$s]['id_language']!=$this->session->userdata('language_id')){
                            ?>
                        <a style="cursor: pointer;" href="<?=BASE_URL?>index.php/Welcome/Language/<?=$language[$s]['id_language']?>" ><?=$language[$s]['language']?></a>

                    <?php } } ?>


                        <!--<ul class="languages hoverSelectorBlock">

                            <?php /*$language = $this->Mwelcome->getLanguage();
                                for($s=0;$s<count($language);$s++){
                            */?>
                               <li onclick="getSelectLanguage('<?/*=$language[$s]['id_language']*/?>',this)" class="<?php /*if($this->session->userdata('language_id')==$language[$s]['id_language']){ */?>active<?php /*} */?>"><a href="javascript:;"><?/*=$language[$s]['language']*/?> <i class="fa fa-check"></i></a></li>
                            <?php /*} */?>




                        </ul>-->

                    </li>

                    <li class="topbar-devider"></li>
                    <?php if($this->session->userdata('user_id')){ ?>
                        <li><?=$this->lang->line('welcome_to')?> <a style="color: green;" href="<?=BASE_URL?>index.php/Welcome/profile"><?=$this->session->userdata('user_name')?></a></li>
                        <li class="topbar-devider"></li>
                        <li><a href="<?=BASE_URL?>index.php/Welcome/logout"><?=$this->lang->line('logout')?></a></li>
                    <?php } else { ?>
                    <li><a href="<?=BASE_URL?>index.php/Welcome/loginGateway"><?=$this->lang->line('signin')?></a></li>
                    <li class="topbar-devider"></li>
                    <li><a href="<?=BASE_URL?>index.php/Welcome/register"><?=$this->lang->line('signup')?></a></li>
                    <?php } ?>


                </ul>

            </div>

            <!-- End Topbar -->



            <!-- Toggle get grouped for better mobile display -->

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">

                <span class="sr-only">Toggle navigation</span>

                <span class="fa fa-bars"></span>

            </button>

            <!-- End Toggle -->

        </div><!--/end container-->



        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">

            <div class="container">

                <ul class="nav navbar-nav" <?php if($this->session->userdata('language_id')!=1){ echo "style='float:left'"; } ?>>

                    <?php
                    $menu = $this->Mwelcome->getMenu(array('language_id' => $this->session->userdata('language_id'),'parent_id' => 0));
                    //echo "<pre>";print_r($menu); exit;
                    ?>

                    <!--<li class="dropdown active">-->
                    <?php for($s=0;$s<count($menu);$s++){
                        $sub_menu = $this->Mwelcome->getMenu(array('language_id' => $this->session->userdata('language_id'),'parent_id' => $menu[$s]['id_menu']));

                        ?>

                        <li class="<?php if(!empty($sub_menu)){ echo "dropdown"; } ?> <?php if($s==0){ ?>active<?php } ?>">
                            <?php if(trim($menu[$s]['menu_link'])==''){ ?>
                                <a class="<?=$menu[$s]['id_menu']?>" href="<?=BASE_URL?><?=$menu[$s]['menu_link']?>"  >
                            <?php } else { ?>
                                <a href="<?=BASE_URL?><?=$menu[$s]['menu_link']?>" >
                            <?php } ?>
                               <?=$menu[$s]['menu_title']?>
                            </a>

                                    <?php if(!empty($sub_menu)){ ?>
                                    <ul class="dropdown-menu">
                                    <?php for($r=0;$r<count($sub_menu);$r++){ ?>
                                        <li>
                                        <?php if(trim($sub_menu[$r]['menu_link'])==''){ ?>
                                        <a class="<?=$sub_menu[$r]['id_menu']?>" href="<?=BASE_URL?>index.php/welcome/article/<?=$this->Mwelcome->encode($menu[$s]['id_menu'])?>"  >
                                            <?php } else { ?>
                                            <a href="<?=BASE_URL?><?=$sub_menu[$r]['menu_link']?>" >
                                                <?php } ?>
                                                <?=$sub_menu[$r]['menu_title']?>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    </ul>
                                    <?php } ?>

                        </li>
                    <?php } ?>

                    <?php if($this->session->userdata('user_id')){ ?>
                    <!--<li>
                        <i class="search fa search-btn fa-search"></i>
                        <div class="search-open" style="display: none;">
                            <div class="input-group animated fadeInDown">
                                <input type="text" placeholder="Search Lawyer" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn-u">Go</button>
                                </span>
                            </div>
                        </div>
                    </li>-->
                    <?php } ?>
                </ul>

            </div><!--/end container-->

        </div><!--/navbar-collapse-->

    </div>

    <!--=== End Header ===-->
    <?php if(isset($content)){ ?>
    <div style="padding-top: 20px;" id="dynamic_content" <?php if($this->session->userdata('language_id')!=1){ echo "class='rtl'"; } ?>>
        <?=$content?>
    </div>
    <?php } ?>