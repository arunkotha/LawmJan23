
<?php 

$lawyer_list = $this->Mwelcome->getUsersList(array('user_type_id' => 2)); 

$consultation_type = $this->Mwelcome->getConsultationType();

?>
<!--=== Breadcrumbs ===-->

<div class="breadcrumbs">

    <div class="container">

        <h1 class="pull-left">Guest Company Establishment </h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>"><?=$this->lang->line('home')?></a></li>

            <li class="active">Company Establishment </li>

        </ul>

    </div><!--/container-->

</div><!--/breadcrumbs-->

<!--=== End Breadcrumbs ===-->



<!--=== Content Part ===-->

<div class="container content">

    <div class="row">

        <div class="<?php if($this->session->userdata('language_id')!=1){ echo 'col-md-12'; }else{ echo 'col-md-6'; } ?> col-sm-6">

            <div class="reg-header">

                <p>Please enter the details below.</p>

            </div>


            <div class="user box" style="display:block;">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-8 col-md-8" style="<?php if($this->session->userdata('language_id')!=1){ echo 'float:right'; }?>">

                            <form id="guest_form" role="form" class="sky-form reg" method="post" action="<?=BASE_URL?>index.php/welcome/authorizeConsult" enctype="multipart/form-data">
                            
                                <input type="hidden" name="user_type_id" class="user_type_id" value="3">
                                
                                <input type="hidden" name="guest_form_type" id="guest_form_type" value="">
                                
                                <input type="hidden" name="guest_service_type" id="guest_service_type" value="company">
                                
                                <fieldset id="one">                                   

                                    <div class="row">
                                       
                                        <section class="col col-6">

                                            <label class="select">

                                                <select id="lawyer" name="lawyer" onchange="changeExperience(this.options[this.selectedIndex].dataset.exp);" required>
                                                    <option value=""><?=$this->lang->line('select_lawyer')?></option>
                                                    <?php for($s=0;$s<count($lawyer_list);$s++){ ?>
                                                        <option data-exp="<?=$lawyer_list[$s]['experience']?>" <?php if(isset($consultation) && $consultation[0]['lawyer_id']==$lawyer_list[$s]['id_user']){ echo "selected='selected'"; } ?> value="<?=$lawyer_list[$s]['id_user']?>"><?=$lawyer_list[$s]['first_name'].' '.$lawyer_list[$s]['last_name']?></option>
                                                        <?php
                                                        if(isset($consultation) && $consultation[0]['lawyer_id']==$lawyer_list[$s]['id_user']){
                                                            $exp = $lawyer_list[$s]['experience'];
                                                        } ?>
                                                    <?php } ?>
                                                </select>

                                                <i></i>

                                            </label>

                                        </section>
                                        
                                        <script>
                                        
                                        function changeExperience(data)
                                        {
                                            var mytag = document.getElementById('experience');
                                            mytag.value=data;                                            
                                        }
                                        
                                        
                                        </script>
                                        
                                        
                                        
                                        
                                        

                                        <section class="col col-6">

                                            <label class="select"><?=$this->lang->line('experience')?> : <span id="l-exp"><?php if(isset($exp)){ echo $exp; }else{ echo '--'; } ?></span></label>
                                            
                                            <input id="experience" name="experience" type="hidden" value="" required/>

                                        </section>

                                    </div>
                                    
                                    <?php if(isset($company)){  for($st=0;$st<count($company);$st++){ ?>
                                        <div>
                                            <section class="col col-6" style="padding-left: 0px;">

                                                <label class="input" for="date">

                                                    <input type="text" value="<?php if(isset($company)){ echo $company[$st]['partner_name']; } ?>" name="partner_name[]" id="partner_name" placeholder="<?=$this->lang->line('partner_name')?>" required/>

                                                </label>

                                            </section>

                                            <section class="col col-5">

                                                <label class="input" for="date">

                                                    <input class="form-control" type="text" value="<?php if(isset($company)){ echo $company[$st]['partner_id']; } ?>" name="partner_id[]" id="partner_id" placeholder="<?=$this->lang->line('partner_id')?>" required/>
                                                </label>

                                            </section>

                                            <section class="col col-1">
                                                <?php if($st==0){ ?>
                                                    <input type="button" name="" class="btn" onclick="addPartner();" value="<?=$this->lang->line('add')?>">
                                                <?php } else { ?>
                                                    <input type="button" onclick="deletePartner(this);" class="btn" name="" value="X">
                                                <?php } ?>
                                            </section>
                                        </div>
                                    <?php } } else { ?>
                                    <div>
                                    <section class="col col-6" style="padding-left: 0px;">
                                        <label class="input" for="date">
                                            <input type="text" value="" name="partner_name[]" id="partner_name" placeholder="<?=$this->lang->line('partner_name')?>" required/>
                                        </label>
                                    </section>
                                    <section class="col col-5">
                                        <label class="input" for="date">
                                            <input class="form-control" type="text" value="" name="partner_id" id="partner_id" placeholder="<?=$this->lang->line('partner_id')?>" required/>
                                        </label>
                                    </section>
                                        <section class="col col-1">
                                                <input type="button" name="" class="btn" onclick="addPartner();" value="<?=$this->lang->line('add')?>">
                                        </section>
                                    </div>
                                    <?php } ?>
                                    <div id="more-partners">

                                    </div>
                                    

                                </fieldset>

                                <fieldset id="two">


                                    <section>

                                        <label class="input" for="subject">

                                            <input type="text" placeholder="<?=$this->lang->line('subject')?>" id="subject" name="subject" required>

                                        </label>

                                    </section>



                                    <section>

                                        <label class="textarea">

                                            <textarea name="description" id="description" placeholder="<?=$this->lang->line('description')?>"rows="3"><?php if(isset($consultation)){ echo $consultation[0]['description']; } ?></textarea>

                                        </label>

                                    </section>
                                    <section>

                                        <label class="">

                                            <input type="file" name="attachment[]" id="attachment"/>

                                        </label>
                                        <input class="btn" type="button" onclick="getAddBrowse();" id="attach-btn" value="<?=$this->lang->line('add')?>" />
                                        
                                        <div id="attach_div">

                                        </div>
                                        
                                    </section>
                                    
                                    <section>
                                    
                                    <div style="">
                                        
                                    <?php if(isset($consultation)){
                                        $attachments = $this->Mwelcome->getAttachment(array('type' => 'consultation', 'reference_id' => $consultation[0]['id_consultation']));
                                        for($r=0;$r<count($attachments);$r++){   ?>
                                            <div style="border: 1px solid red; padding: 8px; width: 108px; float:left; margin-left: 10px;">
                                                <a download="" target="_blank" href="<?=$attachments[$r]['attachment']?>" style="padding-right: 20px;">
                                                    <!--<img class="mCS_img_loaded" src="<?/*=BASE_URL*/?>assets/img/attachment.png" alt="">-->
                                                    <?php attachment_icon($attachments[$r]['attachment']); ?>
                                                </a>
                                                <input type="button" value="X" id="attach-btn" onclick="deleteAttachments(this,<?=$attachments[$r]['id_attachment']?>);" class="btn">
                                            </div>
                                        <?php } }?>
                                        </div>
                                    </section>

                                    <div id="deleted_attachments">

                                    </div>

                                    <input type="hidden" name="id_consultation" id="id_consultation" value="<?php if(isset($consultation)){ echo $consultation[0]['id_consultation']; } ?>"/>
                                </fieldset>
                                
                                
                                <fieldset id="three">
                                    
                                    <div class="row">

                                        <div class="guestConsult col-xs-6 col-md-6">
                                        <input type="button" onclick="completeAuthorization();" id="nextButton" value="Next" class="btn btn-primary btn-lg"  />
                                        </div>

                                    </div>
                                
                                </fieldset>
                                
                                
                                
                                <fieldset id="four">

                                <div class="row ">

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="email" tabindex="4" name="email" id="user_email" class="form-control input-lg" placeholder="<?=$this->lang->line('email_address')?>" tabindex="4" required>
                                            <span class="err" id="user_email_err"></span>
                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="text" tabindex="5" name="mobile" id="user_mobile" class="form-control input-lg" placeholder="<?=$this->lang->line('mobile_no')?>" tabindex="4" value="+966">

                                        </div>

                                    </div>

                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                           <input type="password" tabindex="9" name="password" id="user_password" class="form-control input-lg" placeholder="<?=$this->lang->line('password')?>" tabindex="5" required>
                                            <span class="err" id="user_password_err"></span>
                                            
                                        </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">

                                            <input type="password" tabindex="10" name="password_confirmation" id="user_password_confirmation" class="form-control input-lg" placeholder="<?=$this->lang->line('confirm_password')?>" tabindex="6" required>
                                            <span class="err" id="user_password_confirmation_err"></span>
                                        </div>

                                    </div>


                                </div>

                                </fieldset>
                                

                                <fieldset id="five">
                                 
                                    <div class="row">

                                        <div class="termsconditions col-xs-9 col-sm-9 col-md-9">
                                        
                                            <input type="checkbox" id="user_checkbox" tabindex="12" value="1"/>
                                            <span><?=$this->lang->line('by_click_agree')?> <a href="#" data-toggle="modal" data-target="#t_and_c_m"><?=$this->lang->line('terms_and_Conditions')?></a></span>

                                        </div>

                                    </div>
                                    
                                    <hr class="colorgraph">

                                    <div class="row">

                                        <div class="guestConsult col-xs-6 col-md-6">
                                        <input type="button" onclick="authorizeConsultation();" value="Submit" class="btn btn-primary btn-lg" tabindex="13" />
                                        </div>

                                    </div>
                                    
                                </fieldset>
                                

                            </form>

                        </div>

                    </div>



                </div>




            </div>

            
        </div>

    </div>

</div><!--/container-->

<!--=== End Content Part ===-->
