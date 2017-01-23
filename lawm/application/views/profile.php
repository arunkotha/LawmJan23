
<div class="breadcrumbs">

    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('dashboard')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>index.php/welcome/profile"><?=$this->lang->line('dashboard')?></a></li>

            <li class="active"> <?=$this->lang->line('Profile')?></li>

        </ul>

    </div><!--/container-->

</div>

<!--=== Profile ===-->

<div class="container content profile">

    <div class="row">

        <!--Left Sidebar-->




            <?php $this->load->view('user_menu'); ?>



        <!--End Left Sidebar-->



        <!-- Profile Content -->

        <div class="col-md-9">

            <div class="profile-body margin-bottom-20">

                <div class="tab-v1">

                    <ul class="nav nav-justified nav-tabs">

                        <li class="active"><a data-toggle="tab" href="#profile"><?=$this->lang->line('view_profile')?></a></li>

                        <!--<li><a data-toggle="tab" href="#passwordTab"><?/*=$this->lang->line('change_password')*/?></a></li>-->

                        <!--<li><a data-toggle="tab" href="#PaymentOptionsTab"><?/*=$this->lang->line('Payments')*/?></a></li>-->
                        <?php if($this->session->userdata('user_type_id')==2){ ?>
                        <li><a data-toggle="tab" href="#transactions"><?=$this->lang->line('transactions')?></a></li>
                        <?php } ?>


                    </ul>

                    <div class="tab-content">

                        <div id="profile" class="profile-edit tab-pane fade in active">

                            <p><?=$this->lang->line('profile_details')?>.</p>
                            <p id="profile_update_msg" class="err"></p>
                            <br>

                            <dl class="dl-horizontal">

                                <dt><strong><?=$this->lang->line('first_name')?></strong></dt>

                                <dd>

                                    <?/*=$user[0]['first_name']*/?>

                                    <input type="text" name="first_name" id="first_name" value="<?=$user[0]['first_name']?>" class="form-control input-sm">

                                </dd>



                                <hr>

                                <dt><strong><?=$this->lang->line('last_name')?></strong></dt>

                                <dd>

                                    <?/*=$user[0]['last_name']*/?>
                                    <input type="text" name="last_name" id="last_name" value="<?=$user[0]['last_name']?>" class="form-control input-sm">


                                </dd>

                                <hr>

                                <dt><strong><?=$this->lang->line('father_name')?></strong></dt>

                                <dd>

                                    <?/*=$user[0]['father_name']*/?>
                                    <input type="text" name="father_name" id="father_name" value="<?=$user[0]['father_name']?>" class="form-control input-sm">


                                </dd>

                                <hr>

                                <dt><strong><?=$this->lang->line('gender')?></strong></dt>

                                <dd>

                                    <?/*=$user[0]['gender']*/?>
                                    <select class="form-control input-sm" name="gender" id="gender">

                                        <option value=""><?=$this->lang->line('select_gender')?></option>

                                        <option <?php if($user[0]['gender']=='male'){ echo "selected='selected'"; } ?> value="male"><?=$this->lang->line('male')?></option>

                                        <option <?php if($user[0]['gender']=='female'){ echo "selected='selected'"; } ?> value="female"><?=$this->lang->line('female')?></option>

                                    </select>


                                </dd>

                                <hr>


                                <dt><strong><?=$this->lang->line('user_name')?> </strong></dt>

                                <dd>

                                    <?=$user[0]['username']?>



                                </dd>

                                <hr>


                                <dt><strong><?=$this->lang->line('email')?> </strong></dt>

                                <dd>

                                    <?=$user[0]['email']?>



                                </dd>

                                <hr>

                                <dt><strong><?=$this->lang->line('password')?></strong></dt>

                                <dd>

                                    <?/*=$user[0]['last_name']*/?>
                                    <input type="password" name="password" id="password" value="" class="form-control input-sm">
                                    <span id="password_err" class="err"></span>

                                </dd>

                                <hr>

                                <dt><strong><?=$this->lang->line('country')?> </strong></dt>

                                <dd>

                                    <?/*=$user[0]['country_name']*/?>

                                    <select name="country" id="country" class="form-control input-sm">

                                        <option><?=$this->lang->line('select_country')?></option>

                                        <?php if(isset($country)){ for($s=0;$s<count(country);$s++){ ?>
                                            <option <?php if($user[0]['country_id']==$country[$s]['id_country']){ echo "selected='selected'"; } ?> value="<?=$country[$s]['id_country']?>"><?=$country[$s]['country_name']?></option>
                                        <?php } } ?>

                                    </select>


                                </dd>

                                <?php if($this->session->userdata('user_type_id')==2){ ?>
                                    <hr>

                                    <dt><strong><?=$this->lang->line('speciality')?> </strong></dt>

                                    <dd>

                                        <?/*=$user[0]['speciality']*/?>
                                        <select name="speciality" id="speciality" class="form-control input-sm">

                                            <option value=""><?=$this->lang->line('select_speciality')?></option>

                                            <?php if(isset($speciality)){ for($s=0;$s<count($speciality);$s++){ ?>
                                                <option <?php if($user[0]['speciality_id']==$speciality[$s]['id_speciality']){ echo "selected='selected'"; } ?> value="<?=$speciality[$s]['id_speciality']?>"><?=$speciality[$s]['speciality']?></option>
                                            <?php } } ?>
                                        </select>


                                    </dd>
                                <?php } ?>
                            </dl>

                            <!--<button type="button" class="btn-u">Edit Profile</button>-->
                            <button type="button" onclick="updateProfile()" class="btn-u"><?=$this->lang->line('update')?></button>

                        </div>



                        <!--<div id="passwordTab" class="profile-edit tab-pane fade">



                            <p><?/*=$this->lang->line('change_password')*/?>.</p>
                            <p class="err" id="change_password_msg"></p>
                            <br>

                            <form class="sky-form" id="sky-form4" action="<?/*=BASE_URL*/?>index.php/Welcome/changePassword"  method="post">
                                <dl class="dl-horizontal">


                                    <dt><?/*=$this->lang->line('old_password')*/?></dt>

                                    <dd>

                                        <section>

                                            <label class="input">

                                                <i class="icon-append fa fa-lock"></i>

                                                <input type="password" id="old_password" name="old_password" placeholder="<?/*=$this->lang->line('old_password')*/?>">
                                                <span class="err" id="old_password_err"></span>
                                                <b class="tooltip tooltip-bottom-right"><?/*=$this->lang->line("don_forget_password")*/?></b>

                                            </label>

                                        </section>

                                    </dd>

                                    <dt><?/*=$this->lang->line('enter_password')*/?></dt>

                                    <dd>

                                        <section>

                                            <label class="input">

                                                <i class="icon-append fa fa-lock"></i>

                                                <input type="password" id="password" name="password" placeholder="<?/*=$this->lang->line('password')*/?>">
                                                <span class="err" id="password_err"></span>
                                                <b class="tooltip tooltip-bottom-right"><?/*=$this->lang->line("don_forget_password")*/?></b>

                                            </label>

                                        </section>

                                    </dd>

                                    <dt><?/*=$this->lang->line('confirm_password')*/?></dt>

                                    <dd>

                                        <section>

                                            <label class="input">

                                                <i class="icon-append fa fa-lock"></i>

                                                <input type="password" name="confirm_password" id="confirm_password" placeholder="<?/*=$this->lang->line('confirm_password')*/?>">
                                                <span class="err" id="confirm_password_err"></span>
                                                <b class="tooltip tooltip-bottom-right"><?/*=$this->lang->line('don_forget_password')*/?></b>

                                            </label>

                                        </section>

                                    </dd>

                                </dl>





                                <button type="button" onclick="clearChangePassword()" class="btn-u btn-u-default"><?/*=$this->lang->line('cancel')*/?></button>

                                <button class="btn-u" type="button" onclick="changePassword()"><?/*=$this->lang->line('save_changes')*/?></button>

                            </form>

                        </div>-->



                        <!--<div class="profile-edit tab-pane fadein" id="PaymentOptionsTab">



                            <br>

                            <form action="#" id="sky-form" class="sky-form" novalidate>

                                <section>

                                    <label class="input">

                                        <input type="text" placeholder="Name on card" name="name">

                                    </label>

                                </section>



                                <div class="row">

                                    <section class="col col-10">

                                        <label class="input">

                                            <input type="text" placeholder="Card number" id="card" name="card">

                                        </label>

                                    </section>

                                    <section class="col col-2">

                                        <label class="input">

                                            <input type="text" placeholder="CVV2" id="cvv" name="cvv">

                                        </label>

                                    </section>

                                </div>



                                <div class="row">

                                    <label class="label col col-4">Expiration date</label>

                                    <section class="col col-5">

                                        <label class="select">

                                            <select name="month">

                                                <option value="0" selected="" disabled="">Month</option>

                                                <option value="1">January</option>

                                                <option value="1">February</option>

                                                <option value="3">March</option>

                                                <option value="4">April</option>

                                                <option value="5">May</option>

                                                <option value="6">June</option>

                                                <option value="7">July</option>

                                                <option value="8">August</option>

                                                <option value="9">September</option>

                                                <option value="10">October</option>

                                                <option value="11">November</option>

                                                <option value="12">December</option>

                                            </select>

                                            <i></i>

                                        </label>

                                    </section>

                                    <section class="col col-3">

                                        <label class="input">

                                            <input type="text" name="year" id="year" placeholder="Year">

                                        </label>

                                    </section>

                                </div>

                                <button class="btn-u btn-u-default" type="button">Cancel</button>

                                <button type="submit" class="btn-u">Save Changes</button>



                            </form>

                        </div>-->

                        <?php if($this->session->userdata('user_type_id')==2){ ?>
                        <div class="profile-edit tab-pane fadein" id="transactions" style="height: 500px;overflow: scroll;">
                            <table class="table table-hover table-bordered table-striped <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>" style="border-collapse:collapse; margin-top:0px; width:100%;" border="0" cellpadding="5" cellspacing="3">



                                <thead>

                                <tr >
                                    <th class="head1" style=""><?=$this->lang->line('user')?></th>
                                    <th class="head0"><?=$this->lang->line('subject')?></th>
                                    <th class="head0"><?=$this->lang->line('type')?></th>
                                    <th class="head0" ><?=$this->lang->line('amount')?></th>
                                    <th class="head0" ><?=$this->lang->line('date_time')?></th>
                                    <th class="head0" ><?=$this->lang->line('status')?></th>

                                </tr>

                                </thead>

                                <tbody>
                                <?php
                                    $transaction = $this->Mwelcome->getUserTransactions(array('lawyer_id' => $this->session->userdata('user_id')));
                                for($s=0;$s<count($transaction);$s++){
                                ?>
                                <tr>
                                    <td><?=$transaction[$s]['user_name']?></td>
                                    <td><?=$transaction[$s]['subject']?></td>
                                    <td><?=$transaction[$s]['reference_type']?></td>
                                    <td><?=$transaction[$s]['amount']?></td>
                                    <td><?=$transaction[$s]['created_date_time']?></td>
                                    <td><?=$transaction[$s]['case_status']?></td>
                                </tr>
                                <?php } ?>
                                </tbody>

                            </table>
                        </div>
                        <?php } ?>


                    </div>

                </div>

            </div>

        </div>

        <!-- End Profile Content -->

    </div><!--/end row-->

</div>

<!--=== End Profile ===-->
