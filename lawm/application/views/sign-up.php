

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

                            <form id="user_frm" role="form" class="reg" method="post" action="<?=BASE_URL?>index.php/welcome/registerUser" enctype="multipart/form-data">
                                <input type="hidden" name="user_type_id" class="user_type_id" value="3">
                                <hr class="colorgraph">

                                <div class="row">

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="text" tabindex="3" name="user_last_name" id="user_last_name" class="form-control input-lg" placeholder="<?=$this->lang->line('last_name')?>" tabindex="3" required>

                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="text" tabindex="1" name="user_first_name" id="user_first_name" class="form-control input-lg" placeholder="<?=$this->lang->line('first_name')?>" tabindex="1" required>

                                        </div>

                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="text" tabindex="2" name="user_father_name" id="user_father_name" class="form-control input-lg" placeholder="<?=$this->lang->line('father_name')?>" tabindex="2" required>

                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="email" tabindex="4" name="user_email" id="user_email" class="form-control input-lg" placeholder="<?=$this->lang->line('email_address')?>" tabindex="4" required>
                                            <span class="err" id="user_email_err"></span>
                                        </div>

                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="text" tabindex="5" name="user_mobile" id="user_mobile" class="form-control input-lg" placeholder="<?=$this->lang->line('mobile_no')?>" tabindex="4" value="+966" required>

                                        </div>

                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <select tabindex="6" class="form-control input-lg" name="user_gender" id="user_gender" required>

                                                <option value=""><?=$this->lang->line('select_gender')?></option>

                                                <option value="male"><?=$this->lang->line('male')?></option>

                                                <option value="female"><?=$this->lang->line('female')?></option>

                                            </select>

                                        </div>

                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <select tabindex="7" class="form-control input-lg" name="user_country" id="user_country" required>

                                                <option value=""><?=$this->lang->line('select_country')?></option>

                                                <?php if(isset($country)){ for($s=0;$s<count(country);$s++){ ?>
                                                    <option value="<?=$country[$s]['id_country']?>"><?=$country[$s]['country_name']?></option>
                                                <?php } } ?>

                                            </select>

                                        </div>

                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="text" tabindex="8" name="user_username" id="user_username" class="form-control input-lg" placeholder="<?=$this->lang->line('user_name')?>" tabindex="5" required>
                                            <span class="err" id="user_username_err"></span>
                                        </div>

                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="password" tabindex="9" name="user_password" id="user_password" class="form-control input-lg" placeholder="<?=$this->lang->line('password')?>" tabindex="5" required>
                                            <span class="err" id="user_password_err"></span>
                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="password" tabindex="10" name="user_password_confirmation" id="user_password_confirmation" class="form-control input-lg" placeholder="<?=$this->lang->line('confirm_password')?>" tabindex="6" required>
                                            <span class="err" id="user_password_confirmation_err"></span>
                                        </div>

                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <?=$this->lang->line('attached_profile_ic')?> <input tabindex="11" type="file" name="user_attachment" id="user_attachment"  placeholder="Attached Profile pic" tabindex="5" required>
                                            <span class="err" id="user_attachment_err"></span>
                                        </div>

                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-xs-9 col-sm-9 col-md-9">
                                        <input type="checkbox" id="user_checkbox" tabindex="12" value="1" required>
                                        <?=$this->lang->line('by_click_agree')?> <a href="#" data-toggle="modal" data-target="#t_and_c_m"><?=$this->lang->line('terms_and_Conditions')?></a>.

                                    </div>

                                </div>



                                <hr class="colorgraph">

                                <div class="row">

                                    <div class="col-xs-6 col-md-6"><input type="submit" onclick="validUserRegistration();" value="<?=$this->lang->line('register')?>" class="btn btn-primary btn-lg" tabindex="13" ></div>

                                    <div class="col-xs-6 col-md-6"><a href="<?=BASE_URL?>index.php/Welcome/login" class="btn btn-success btn-lg"><?=$this->lang->line('sign_in')?></a></div>

                                </div>

                            </form>

                        </div>

                    </div>



                </div>







            </div>

            <div class="lawyer box">

                <div class="container">



                    <div class="row">

                        <div class="col-xs-12 col-sm-8 col-md-8" style="<?php if($this->session->userdata('language_id')!=1){ echo 'float:right'; }?>">

                            <form id="lawyer_frm" role="form" class="reg" method="post" action="<?=BASE_URL?>index.php/Welcome/registerUser" enctype="multipart/form-data">
                                <input type="hidden" name="user_type_id" class="user_type_id" value="2">
                                <hr class="colorgraph">

                                <div class="row">

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="text" tabindex="2" name="lawyer_last_name" id="lawyer_last_name" class="form-control input-lg" placeholder="<?=$this->lang->line('last_name')?>" tabindex="3" required>

                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="text" tabindex="1" name="lawyer_first_name" id="lawyer_first_name" class="form-control input-lg" placeholder="<?=$this->lang->line('first_name')?>" tabindex="1" required>

                                        </div>

                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="text" tabindex="3" name="lawyer_father_name" id="lawyer_father_name" class="form-control input-lg" placeholder="<?=$this->lang->line('father_name')?>" tabindex="2">

                                        </div>

                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="email" tabindex="4" name="lawyer_email" id="lawyer_email" class="form-control input-lg" placeholder="<?=$this->lang->line('email_address')?>" tabindex="4" required>
                                            <span class="err" id="lawyer_email_err"></span>
                                        </div>

                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="text" tabindex="5" name="lawyer_mobile" id="lawyer_mobile" class="form-control input-lg" placeholder="<?=$this->lang->line('mobile_no')?>" tabindex="4" value="+966" required>

                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <select tabindex="6" class="form-control input-lg" name="lawyer_gender" id="lawyer_gender" required>

                                                <option value=""><?=$this->lang->line('select_gender')?></option>

                                                <option value="male"><?=$this->lang->line('male')?></option>

                                                <option value="female"><?=$this->lang->line('female')?></option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <select tabindex="7" name="lawyer_country" id="lawyer_country" class="form-control input-lg" required>

                                                <option value=""><?=$this->lang->line('select_country')?></option>

                                                <?php if(isset($country)){ for($s=0;$s<count(country);$s++){ ?>
                                                    <option value="<?=$country[$s]['id_country']?>"><?=$country[$s]['country_name']?></option>
                                                <?php } } ?>

                                            </select>

                                        </div>

                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input tabindex="8" type="text" name="lawyer_username" id="lawyer_username" class="form-control input-lg" placeholder="<?=$this->lang->line('user_name')?>" tabindex="5" required>
                                            <span id="lawyer_username_err" class="err"></span>
                                        </div>

                                    </div>





                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input tabindex="9" type="password" name="lawyer_password" id="lawyer_password" class="form-control input-lg" placeholder="<?=$this->lang->line('password')?>" tabindex="5" required>
                                            <span class="err" id="lawyer_password_err"></span>
                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input tabindex="10" type="password" name="lawyer_password_confirmation" id="lawyer_password_confirmation" class="form-control input-lg" placeholder="<?=$this->lang->line('confirm_password')?>" tabindex="6" required>
                                            <span class="err" id="lawyer_password_confirmation_err"></span>
                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <!--<input type="text" name="experience" id="experience" class="form-control input-lg" placeholder="Experience" tabindex="6">-->
                                            <select tabindex="11" name="experience" id="experience" class="form-control input-lg" required>

                                                <option value=""><?=$this->lang->line('select_experience')?></option>

                                                <?php for($s=1;$s<=20;$s++){ ?>
                                                    <option value="<?=$s?>"><?=$s?></option>
                                                <?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <select tabindex="12" name="lawyer_speciality" id="lawyer_speciality" class="form-control input-lg" required>

                                                <option value=""><?=$this->lang->line('select_speciality')?></option>

                                                <?php if(isset($speciality)){ for($s=0;$s<count($speciality);$s++){ ?>
                                                    <option value="<?=$speciality[$s]['id_speciality']?>"><?=$speciality[$s]['speciality']?></option>
                                                <?php } } ?>
                                            </select>

                                        </div>

                                    </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">

                                    <div class="form-group">

                                        <label><input tabindex="13" type="checkbox" onclick="getCertifiedDiv()" id="certified" name="certified" value="1"> <strong><?=$this->lang->line('is_certified')?></strong></label>

                                    </div>

                                </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <?=$this->lang->line('attached_profile')?>  <input type="file" tabindex="14" name="lawyer_attachment" id="lawyer_attachment"  placeholder="<?=$this->lang->line('attached_profile_pic')?>" tabindex="5" required>
                                            <span class="err" id="lawyer_attachment_err"></span>
                                        </div>

                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6" id="certified_div" style="display: none;">

                                        <div class="form-group">

                                            <?=$this->lang->line('certification_attached_profile')?>   <input type="file" name="lawyer_profile_pic" id="lawyer_profile_pic"  placeholder="<?=$this->lang->line('attached_profile_pic')?>" tabindex="5">

                                        </div>

                                    </div>



                                </div>









                                <div class="row">



                                    <div class="col-xs-9 col-sm-9 col-md-9">
                                        <input type="checkbox" id="lawyer_checkbox" value="1" tabindex="15" required>
                                        <?=$this->lang->line('by_click_agree')?> <a href="#" data-toggle="modal" data-target="#t_and_c_m"><?=$this->lang->line('terms_and_Conditions')?></a>.

                                    </div>

                                </div>



                                <hr class="colorgraph">

                                <div class="row">

                                    <div class="col-xs-6 col-md-6"><input type="submit" tabindex="16" onclick="validLawyerRegistration();" value="<?=$this->lang->line('register')?>" class="btn btn-primary btn-lg" tabindex="7"></div>

                                    <div class="col-xs-6 col-md-6"><a href="<?=BASE_URL?>index.php/Welcome/login" class="btn btn-success btn-lg"><?=$this->lang->line('sign_in')?></a></div>

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
