<!--=== Breadcrumbs ===-->

<div class="breadcrumbs">

    <div class="container">

        <h1 class="pull-left">User <?=$this->lang->line('signin')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>"><?=$this->lang->line('home')?></a></li>

            <li class="active"><?=$this->lang->line('signin')?></li>

        </ul>

    </div><!--/container-->

</div><!--/breadcrumbs-->

<!--=== End Breadcrumbs ===-->



<!--=== Content Part ===-->

<div class="container content">

    <div class="row">

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

            <form  class="reg-page" method="post" action="<?=BASE_URL?>index.php/Welcome/makeLogin" onsubmit="return validLogin(this);">
                <p class="err"><?php if($this->session->userdata('message')){ echo $this->session->userdata('message'); $this->session->unset_userdata('message');  } ?></p>
                <div class="reg-header">

                    <h2><?=$this->lang->line('signin_your_acc')?></h2>

                </div>



                <div class="input-group margin-bottom-20">

                    <span class="input-group-addon" style="<?php if($this->session->userdata('language_id')!=1){ echo 'border-left:0 none;border-right: 1px solid #ccc';} ?>"><i class="fa fa-user"></i></span>

                    <input type="text" placeholder="<?=$this->lang->line('email')?>" name="email" id=username class="form-control" value="" required>

                </div>

                <div class="input-group margin-bottom-20">

                    <span class="input-group-addon" style="<?php if($this->session->userdata('language_id')!=1){ echo 'border-left:0 none;border-right: 1px solid #ccc';} ?>"><i class="fa fa-lock"></i></span>

                    <input type="password" name="password" id="password" placeholder="<?=$this->lang->line('password')?>" class="form-control" value="" required>

                </div>

                <div class="input-group margin-bottom-20">

                    <input type="hidden" name="user_type_id" value="3">

                </div>



                <div class="row">

                    <div class="col-md-6 checkbox">

                        <label><input type="checkbox"> <?=$this->lang->line('stay_sign_in')?></label>

                    </div>

                    <div class="col-md-6">

                    <button class="btn-u pull-right" type="submit" value="Login"><?=$this->lang->line('login')?></button>

                    </div>

                </div>



                <hr>




                <h4><?=$this->lang->line('forget_password')?></h4>

                <p><?=$this->lang->line('no_worries')?>, <a class="color-green" href="<?=BASE_URL?>index.php/Welcome/forgetPassword"><?=$this->lang->line('click_here')?></a> <?=$this->lang->line('to_reset_password')?></p>



            </form>

        </div>

    </div><!--/row-->

</div><!--/container-->

<!--=== End Content Part ===-->
