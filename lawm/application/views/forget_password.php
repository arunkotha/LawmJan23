<!--=== Breadcrumbs ===-->

<div class="breadcrumbs">

    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('forget_password')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>"><?=$this->lang->line('home')?></a></li>

            <li class="active"><?=$this->lang->line('forget_password')?></li>

        </ul>

    </div><!--/container-->

</div><!--/breadcrumbs-->

<!--=== End Breadcrumbs ===-->



<!--=== Content Part ===-->

<div class="container content">

    <div class="row">

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

            <form class="reg-page" method="post" action="<?=BASE_URL?>index.php/Welcome/getForgetPassword" onsubmit="return validForgetPassword(this);">
                <p id="error" class="err"><?php if($this->session->userdata('message')){ echo $this->session->userdata('message'); $this->session->unset_userdata('message');  } ?></p>
                <div class="reg-header">

                    <h2>Reset Password</h2>

                </div>



                <div class="input-group margin-bottom-20">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" placeholder="<?=$this->lang->line('email')?>" name="email" id="email" class="form-control" value="" required>

                </div>

                <div class="input-group margin-bottom-20">

                    <input type="radio" name="user_type_id" checked value="3"> <?=$this->lang->line('user')?>
                    &nbsp;&nbsp;&nbsp;<input type="radio" name="user_type_id" value="2"> <?=$this->lang->line('lawyer')?>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <input class="btn-u pull-right" type="submit" value="<?=$this->lang->line('get_password')?>" />

                    </div>

                </div>
                <hr>

                <!--<a href="dashboard.html">Lawyer Demo</a> | <a href="user_dashboard.html">User Demo</a>-->



                <h4><?=$this->lang->line('remember_your_password')?> ?</h4>

                <p><a class="color-green" href="<?=BASE_URL?>index.php/Welcome/login"><?=$this->lang->line('click_here')?></a> <?=$this->lang->line('to_login_your_account')?>.</p>



            </form>

        </div>

    </div><!--/row-->

</div><!--/container-->

<!--=== End Content Part ===-->
