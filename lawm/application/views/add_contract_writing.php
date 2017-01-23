<?php 


function getThumbnail($filename)
{

    $extension = $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if($extension=="jpeg" OR $extension=="jpg" OR $extension=="png")
    {

        echo "<img src='".$filename."' height='100' /> ";
        
    }
    elseif($extension=="pdf")
    {

        echo "<embed height='100' name='plugin' src='".$filename."' type='application/pdf' /> ";

    }else
    {

        echo "<img src='http://localhost/lawm/assets/img/attachment.png' height='20' /> ";

    }
    
}


?>


<div class="breadcrumbs">


    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('new_Contract_writing')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>index.php/Welcome/contractWriting"><?=$this->lang->line('dashboard')?></a></li>

            <li class=""><a href="<?=BASE_URL?>index.php/Welcome/contractWriting"><?=$this->lang->line('contract_writing')?></a></li>

            <li class="active"> <?=$this->lang->line('new_Contract_writing')?></li>

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

            <div class="profile-body">

                <div class="panel panel-profile">

                    <div class="panel-heading overflow-h">

                        <h2 class="panel-title heading-sm pull-left "><i class="fa fa-pencil"></i><?=$this->lang->line('new_Contract_writing')?></h2>



                    </div>


                    <div class="panel-body">

                        <div class="row">

                            <form class="sky-form <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>" name="new_contract_writing" id="new_contract_writing" method="post" action="<?=BASE_URL?>index.php/Welcome/addContractWriting" enctype="multipart/form-data" onsubmit="return validContractWriting();" >



                                <fieldset>

                                    <div class="row">

                                        <section class="col col-6">

                                            <label class="select">

                                                <select id="lawyer" name="lawyer" onchange="changeExperience(this.options[this.selectedIndex].dataset.exp);" required>
                                                    <option value=""><?=$this->lang->line('select_lawyer')?></option>
                                                    <?php
                                                    //echo "<pre>";print_r($lawyer_list); exit;
                                                    for($s=0;$s<count($lawyer_list);$s++){ ?>
                                                        <option data-exp="<?=$lawyer_list[$s]['experience']?>" <?php if(isset($contract_writing) && $contract_writing[0]['lawyer_id']==$lawyer_list[$s]['id_user']){ echo "selected=''selected"; } ?> value="<?=$lawyer_list[$s]['id_user']?>"><?=$lawyer_list[$s]['first_name'].' '.$lawyer_list[$s]['last_name']?></option>
                                                        <?php
                                                            if(isset($contract_writing) && $contract_writing[0]['lawyer_id']==$lawyer_list[$s]['id_user']){
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
                                            
                                            <input id="experience" name="experience" type="hidden" value="" />

                                        </section>

                                    </div>




                                    <section>

                                        <label class="input" for="date">

                                            <input type="text" value="<?php if(isset($contract_writing)){ echo $contract_writing[0]['subject']; } ?>" name="subject" id="subject" placeholder="<?=$this->lang->line('subject')?>" required/>
                                            
                                        </label>

                                    </section>




                                    <section>

                                        <label class="textarea">

                                            <textarea name="description" id="description" placeholder="<?=$this->lang->line('description')?>" rows="3" required><?php if(isset($contract_writing)){ echo $contract_writing[0]['description']; } ?></textarea>
                                        </label>

                                    </section>



                                    <section>

                                        <label class="">

                                            <input type="file" name="attachment[]" id="attachment">

                                        </label>
                                        <input class="btn" type="button" onclick="getAddBrowse();" id="attach-btn" value="<?=$this->lang->line('add')?>">
                                        <br>
                                        <div id="attach_div">

                                        </div>
                                    </section>
                                    <section>
                                        <div style="">
                                            <?php if(isset($contract_writing)){
                                                $attachments = $this->Mwelcome->getAttachment(array('type' => 'contract-writing', 'reference_id' => $contract_writing[0]['id_contract_writing']));
                                                for($r=0;$r<count($attachments);$r++){   ?>
                                                    <div style="border: 1px solid red; padding: 8px; width: auto; float:left; margin-left: 10px;">
                                                        <a download="" target="_blank" href="<?=$attachments[$r]['attachment']?>" style="padding-right: 20px;">
                                                            <!--<img class="mCS_img_loaded" src="<?/*=BASE_URL*/?>assets/img/attachment.png" alt="">-->
                                                            <?php getThumbnail($attachments[$r]['attachment']); ?>
                                                        </a>
                                                        <input type="button" value="X" id="attach-btn" onclick="deleteAttachments(this,<?=$attachments[$r]['id_attachment']?>);" class="btn">
                                                    </div>
                                                <?php } }?>
                                        </div>
                                    </section>

                                    <div id="deleted_attachments">

                                    </div>
                                    <input type="hidden" name="id_contract_writing" id="id_contract_writing" value="<?php if(isset($contract_writing)){ echo $contract_writing[0]['id_contract_writing']; } ?>">
                                </fieldset>


                                <footer style="float:right;">

                                    <input type="button" onclick="window.history.back();" class="btn btn-u" value="Cancel" />
                                    <input type="submit" class="btn-u" name="submit" value="<?=$this->lang->line('send')?>" />

                                </footer>

                            </form>

                        </div>

                    </div>

                </div>



                <hr>











            </div>







            <hr>



            <div class="headline"><h2>  <?=$this->lang->line('lawyer_list')?>



                </h2></div>





            <div class="team-showcase-carousel">


                <?php for($s=0;$s<count($lawyer_list);$s++){ ?>
                    <div class="item">

                        <a href="#">

                            <div class="media-holder">

                                <img src="<?=$lawyer_list[$s]['user_image']?>" alt="" />

                            </div>

                        </a>

                        <div class="detail-container">

                            <div class="detail-title">

                                <?=$lawyer_list[$s]['username']?>

                            </div>

                            <div class="detail-subtitle">

                                <?=$this->lang->line('lawyer')?>

                            </div>

                            <!--<p>

                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum <a href="#" title="Readmore">...</a>

                            </p>-->

                        </div>

                    </div>
                <?php } ?>


            </div>





            <hr>

        </div>

        <!-- End Profile Content -->

    </div>

</div><!--/container-->

<!--=== End Profile ===-->

<script>

</script>