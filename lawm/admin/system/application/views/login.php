<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=$this->lang->line('lawm')?> | <?=$this->lang->line('login')?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="google" content="notranslate" />
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=ADMIN_BASE_URL?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=ADMIN_BASE_URL?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?=ADMIN_BASE_URL?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <link href="<?=ADMIN_BASE_URL?>bootstrap/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">

<div class="topbar">
    <ul class="loginbar pull-left">
        <li class="hoverSelector">
            <i class="fa fa-language"></i>
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
    </ul>
</div>
            
            
<div class="login-box">
    <div class="login-logo">
        <a href=""><b><?=$this->lang->line('lawm')?></b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p style="text-align: center; color: red;"><?php if($this->session->userdata('message')){ echo $this->session->userdata('message'); $this->session->unset_userdata('message'); } ?></p>
        <p class="login-box-msg"><?=$this->lang->line('sign_in')?></p>
        <form action="<?=ADMIN_BASE_URL?>index.php?welcome/makeLogin" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!--<div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>--><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-flat"><?=$this->lang->line('sign_in')?></button>
                </div><!-- /.col -->
            </div>
        </form>

        <!--<div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>--><!-- /.social-auth-links -->

        <a href="<?=ADMIN_BASE_URL?>index.php?welcome/forgetPassword"><?=$this->lang->line('i_forgot_my_password')?></a><br>
        <!--<a href="" class="text-center">Register a new membership</a>-->

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="<?=ADMIN_BASE_URL?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?=ADMIN_BASE_URL?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?=ADMIN_BASE_URL?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>