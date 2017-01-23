

<!--=== Breadcrumbs ===-->

<div class="breadcrumbs">

    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('register_account')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>"><?=$this->lang->line('home')?></a></li>

            <li class="active"><?=$this->lang->line('register')?></li>

        </ul>

    </div><!--/container-->

</div><!--/breadcrumbs-->

<!--=== End Breadcrumbs ===-->



<!--=== Content Part ===-->

<div class="container content">

    <div class="row">

        <div class="<?php if($this->session->userdata('language_id')!=1){ echo 'col-md-12'; }else{ echo 'col-md-6'; } ?> col-sm-6">

            <div class="reg-header">

                <p><?=$this->lang->line('already_sign')?>? <?=$this->lang->line('click')?> <a href="<?=BASE_URL?>index.php/welcome/login" class="color-green"><?=$this->lang->line('sign_in')?></a> <?=$this->lang->line('to_login_your_account')?>.</p>

            </div>

            <label><input type="radio" name="colorRadio" value="3" checked="checked" ><strong> <?=$this->lang->line('user_reg')?></strong></label> &nbsp; &nbsp; &nbsp;

            <label><input type="radio" name="colorRadio" value="2" > <strong><?=$this->lang->line('law_reg')?></strong></label>



            <div class="user box" style="display:block;">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-8 col-md-8" style="<?php if($this->session->userdata('language_id')!=1){ echo 'float:right'; }?>">

                            <form id="user_frm" role="form" class="reg" method="post" action="http://localhost/lawm/rest_api/index.php/user/profileImage" enctype="multipart/form-data">
                                
                                <hr class="colorgraph">

                                <div class="row">


                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="email" tabindex="4" name="user_email" id="user_email" class="form-control input-lg" placeholder="<?=$this->lang->line('email_address')?>" tabindex="4" required>
                                            <span class="err" id="user_email_err"></span>
                                        </div>

                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <?=$this->lang->line('attached_profile_ic')?> <input tabindex="11" type="file" name="user_attachment" id="user_attachment"  placeholder="Attached Profile pic" tabindex="5" required>
                                            <span class="err" id="user_attachment_err"></span>
                                        </div>

                                    </div>

                                </div>


                                



                                <hr class="colorgraph">

                                <div class="row">

                                    <div class="col-xs-6 col-md-6"><input type="submit" onclick="validImageUpload();" value="<?=$this->lang->line('register')?>" class="btn btn-primary btn-lg" tabindex="13" ></div>

                                </div>

                            </form>

                        </div>

                    </div>



                </div>







            </div>

            


        </div>

    </div>

</div><!--/container-->

<!--=== End Content Part ===-->
