<div class="breadcrumbs" xmlns="http://www.w3.org/1999/html">

    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('dashboard')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>index.php/Welcome/dashboard/<?php echo $type ;?>"><?=$this->lang->line('dashboard')?></a></li>

            <li class="active"> <?=$this->lang->line('comments')?></li>

        </ul>

    </div><!--/container-->

</div>


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

switch($type)
{
    case "consultation":
    if($this->session->userdata('user_type_id')==3)
    {
        $backURL = "index.php/Welcome/Consultation";
    }
    elseif($this->session->userdata('user_type_id')==2)
    {        
        $backURL = "index.php/Welcome/dashboard";
    }
    break;
        
    case "company":
    $backURL ="index.php/Welcome/establishCompany";
    break;
    
    case "contract-writing":
    $backURL ="index.php/Welcome/contractWriting";
    break;
    
    case "appeal":
    $backURL ="index.php/Welcome/appeal";
    break;
    
    default:
    $backURL ="index.php/Welcome/profile";
    break;
    
}



?>
<!--=== Profile ===-->

<div class="container content profile">

    <div class="row">

        <!--Left Sidebar-->


        <?php $this->load->view('user_menu'); ?>


        <!--End Left Sidebar-->
        <div class="col-md-9">
        <a href="<?=BASE_URL?><?=$backURL?>" class="btn-u pull-left" >Back</a>
        <br/><br/>
        </div>
        <!-- Profile Content -->

        <div class="col-md-9">
            <div class="profile-body <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>">
                
                <div class="panel panel-profile">
                    <div class="panel-heading overflow-h">
                        <?php if($type=='consultation'){ ?>
                        <?php
                            if($this->session->userdata('user_type_id')==3){
                                if($case_details[0]['payment_status']=='pending' && $case_details[0]['status']=='accepted' && $case_details[0]['lawyer_amount'] > 0){ ?>
                                    <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs" href="<?=BASE_URL?>index.php/Welcome/payment/<?php echo $type; ?>/<?=$this->Mwelcome->encode($case_details[0]['id_consultation'])?>/<?=$case_details[0]['lawyer_amount']?>">Payment</a>
                                    <a data-target="#close-con" data-toggle="modal" class="btn-u btn pull-right" onclick="getCloseConPopup('Close Consultation','consultation','<?=$this->Mwelcome->encode($case_details[0]['id_consultation'])?>');" href="javascript:;">Close Case</a>
                                    <?php }
                            else if($case_details[0]['status']=='pending'){ ?>
                            <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn btn-u  btn-u-xs" href="<?=BASE_URL?>index.php/Welcome/newConsultation?consultation_id=<?=$this->Mwelcome->encode($case_details[0]['id_consultation'])?>"><?=$this->lang->line('edit_case')?></a>

                        <?php } else if($case_details[0]['status']=='accepted'){ ?>
                            <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs" data-target="#close-con" onclick="getCloseConPopup('Close Consultation','consultation','<?=$this->Mwelcome->encode($case_details[0]['id_consultation'])?>');" data-toggle="modal" href="javascript:;"  ><?=$this->lang->line('close_case')?></a>

                        <?php } } } ?>

                        <?php if($type=='company'){ ?>

                            <?php
                            if($this->session->userdata('user_type_id')==3){
                                if($case_details[0]['payment_status']=='pending' && $case_details[0]['status']=='accepted' && $case_details[0]['lawyer_amount'] > 0){ ?>
                                    <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs" href="<?=BASE_URL?>index.php/Welcome/payment/<?php echo $type; ?>/<?=$this->Mwelcome->encode($case_details[0]['id_company'])?>/<?=$case_details[0]['lawyer_amount']?>">Payment</a>
                                <?php }
                            else if($case_details[0]['status']=='pending'){ ?>
                                <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs" href="<?=BASE_URL?>index.php/Welcome/newCompanyEstablishment?id=<?=$this->Mwelcome->encode($case_details[0]['id_company'])?>"><?=$this->lang->line('edit_case')?></a>

                            <?php } else if($case_details[0]['status']=='accepted'){ ?>
                                <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs" data-target="#close-con" onclick="getCloseConPopup('Close Company','company','<?=$this->Mwelcome->encode($case_details[0]['id_company'])?>');" data-toggle="modal" href="javascript:;"  ><?=$this->lang->line('close_case')?></a>

                        <?php } } } ?>

                        <?php if($type=='contract-writing'){ ?>
                            <?php
                            if($this->session->userdata('user_type_id')==3){
                                if($case_details[0]['payment_status']=='pending' && $case_details[0]['status']=='accepted' && $case_details[0]['lawyer_amount'] > 0){ ?>
                                    <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs" href="<?=BASE_URL?>index.php/Welcome/payment/<?php echo $type; ?>/<?=$this->Mwelcome->encode($case_details[0]['id_contract_writing'])?>/<?=$case_details[0]['lawyer_amount']?>">Payment</a>
                                <?php }
                            else if($case_details[0]['status']=='pending'){ ?>
                                <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs" href="<?=BASE_URL?>index.php/Welcome/newContractWriting?contract_writing_id=<?=$this->Mwelcome->encode($case_details[0]['id_contract_writing'])?>"><?=$this->lang->line('edit_case')?></a>

                            <?php } else if($case_details[0]['status']=='accepted'){ ?>
                                <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs"data-target="#close-con" onclick="getCloseConPopup('Close Contract Writing','contract','<?=$this->Mwelcome->encode($case_details[0]['id_contract_writing'])?>');" data-toggle="modal" href="javascript:;"  ><?=$this->lang->line('close_case')?></a>
                            <?php } } } ?>

                        <?php if($type=='appeal'){ ?>
                            <?php
                            if($this->session->userdata('user_type_id')==3){
                                if($case_details[0]['payment_status']=='pending' && $case_details[0]['status']=='accepted' && $case_details[0]['lawyer_amount'] > 0){ ?>
                                    <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs" href="<?=BASE_URL?>index.php/Welcome/payment/<?php echo $type; ?>/<?=$this->Mwelcome->encode($case_details[0]['id_appeal'])?>/<?=$case_details[0]['lawyer_amount']?>">Payment</a>
                                <?php }
                            else if($case_details[0]['status']=='pending'){ ?>
                                <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs" href="<?=BASE_URL?>index.php/Welcome/newAppeal/?id_appeal=<?=$this->Mwelcome->encode($case_details[0]['id_appeal'])?>"><?=$this->lang->line('edit_case')?></a>

                            <?php } else if($case_details[0]['status']=='accepted'){ ?>
                                <a style="cursor:pointer;padding: 5px;border: 1px solid;font-size: 15px;font-weight: bold" class="btn-u btn btn-u-xs" data-target="#close-con" onclick="getCloseConPopup('Close Appeal','appeal','<?=$this->Mwelcome->encode($case_details[0]['id_appeal'])?>');" data-toggle="modal" href="javascript:;"  ><?=$this->lang->line('close_case')?></a>
                            <?php } } } ?>
                    </div>

                    <?php if($type=='consultation'){ ?>
                        <div><h4 style="padding: 10px;"><u><?=$this->lang->line('case_details')?> :</u></h4> </div>
                        <table class=" table table-hover table-bordered table-striped ">
                            <tbody>
                        <tr>
                            <td class="right"><?=$this->lang->line('user')?> :</td>
                            <td> <?=$case_details[0]['user_name']?></td>
                        </tr>
                        <tr>
                            <td class="right"><?=$this->lang->line('consultation_type')?> :</td>
                            <td> <?=$case_details[0]['con_type']?></td>
                        </tr>
                        <tr>
                            <td class="right"><?=$this->lang->line('lawyer')?> :</td>
                            <td> <?=$case_details[0]['lawyer_name']?></td>
                        </tr>                        
                        <tr>
                            <td class="right"><?=$this->lang->line('experience')?> :</td>
                            <td> <?=($case_details[0]['experience']!='')?$case_details[0]['experience']:'---'?></td>
                        </tr>
                        <tr>
                            <td class="right"><?=$this->lang->line('Did_you_complain')?> :</td>
                            <td> <?=$case_details[0]['complain']?></td>
                        </tr>
                        <tr>
                            <td class="right"><?=$this->lang->line('subject')?> :</td>
                            <td> <?=$case_details[0]['subject']?></td>
                        </tr>
                        <tr>
                            <td class="right"><?=$this->lang->line('description')?> :</td>
                            <td style="width:400px;text-align: justify"> <?=$case_details[0]['description']?></td>
                        </tr>
                        <tr>
                            <td class="right"><?=$this->lang->line('case_registered_date')?> :</td>
                            <td style="width:400px;text-align: justify"> <?=date('d-m-Y',strtotime($case_details[0]['created_date_time']))?></td>
                        </tr>
                        <tr>
                            <td class="right">Payment :</td>
                            <td style="width:400px;text-align: justify">SAR <?php  echo number_format($case_details[0]['lawyer_amount'],0);?></td>
                        </tr>
                        <tr>
                            <td class="right">Payment Status :</td>
                            <td style="width:400px;text-align: justify"> <?=ucfirst($case_details[0]['payment_status'])?></td>
                        </tr>
                        <?php if(!empty($case_details[0]['attachment'])){ ?>
                            <tr>
                            <td class="right"><?=$this->lang->line('attachment')?> :</td>
                            <td>
                        <?php for($s=0;$s<count($case_details[0]['attachment']);$s++){ ?>
                        <a target="_blank" style="padding: 10px;" href="<?=$case_details[0]['attachment'][$s]['attachment']?>">
                            <?php getThumbnail($case_details[0]['attachment'][$s]['attachment']); ?>
                        </a>

                        <?php } ?>
                            </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <?php } ?>
                    <?php if($type=='company'){ ?>
                        <h4 style="padding: 10px;"><u><?=$this->lang->line('case_details')?> :</u></h4>
                        <table class=" table table-hover table-bordered table-striped ">
                            <tbody>
                            <tr>
                                <td class="right"><?=$this->lang->line('user')?> :</td>
                                <td> <?=$case_details[0]['user_name']?></td>
                            </tr>

                            <tr>
                                <td class="right"><?=$this->lang->line('lawyer')?> :</td>
                                <td> <?=$case_details[0]['lawyer_name']?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('experience')?> :</td>
                                <td> <?=($case_details[0]['experience']!='')?$case_details[0]['experience']:'---'?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('partners')?> :</td>
                                <td>
                                    <?php if($case_details[0]['id_company_partner']!=''){ ?>
                                        <table class="table table-boarded">
                                            <tr><th><?=$this->lang->line('partner_name')?></th><th><?=$this->lang->line('partner_id')?></th></tr>
                                            <?php for($s=0;$s<count($case_details);$s++){ ?>
                                                <tr><td><?=$case_details[$s]['partner_name']?></td><td><?=$case_details[$s]['partner_id']?></td></tr>
                                            <?php } ?>
                                        </table>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('subject')?> :</td>
                                <td> <?=$case_details[0]['subject']?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('description')?> :</td>
                                <td style="width:400px;text-align: justify"> <?=$case_details[0]['description']?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('case_registered_date')?> :</td>
                                <td style="width:400px;text-align: justify"> <?=date('d-m-Y',strtotime($case_details[0]['created_date_time']))?></td>
                            </tr>
                            <tr>
                                <td class="right">Payment :</td>
                                <td style="width:400px;text-align: justify">SAR <?php  echo number_format($case_details[0]['lawyer_amount'],0);?></td>
                            </tr>
                            <tr>
                                <td class="right">Payment Status :</td>
                                <td style="width:400px;text-align: justify"> <?=ucfirst($case_details[0]['payment_status'])?></td>
                            </tr>
                            <?php if(!empty($case_details[0]['attachment'])){ ?>
                                <tr>
                                    <td class="right"><?=$this->lang->line('attachment')?> :</td>
                                    <td>
                                        <?php for($s=0;$s<count($case_details[0]['attachment']);$s++){ ?>
                                            <a target="_blank" style="padding: 10px;" href="<?=$case_details[0]['attachment'][$s]['attachment']?>">
                                            <?php getThumbnail($case_details[0]['attachment'][$s]['attachment']); ?>
                                            </a>

                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    <?php } ?>
                    <?php if($type=='contract-writing'){ ?>
                        <h4 style="padding: 10px;"><u><?=$this->lang->line('case_details')?> :</u></h4>
                        <table class=" table table-hover table-bordered table-striped ">
                            <tbody>
                            <tr>
                                <td class="right"><?=$this->lang->line('user')?> :</td>
                                <td> <?=$case_details[0]['user_name']?></td>
                            </tr>

                            <tr>
                                <td class="right"><?=$this->lang->line('lawyer')?> :</td>
                                <td> <?=$case_details[0]['lawyer_name']?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('experience')?> :</td>
                                <td> <?=($case_details[0]['experience']!='')?$case_details[0]['experience']:'---'?></td>
                            </tr>

                            <tr>
                                <td class="right"><?=$this->lang->line('subject')?> :</td>
                                <td> <?=$case_details[0]['subject']?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('description')?> :</td>
                                <td style="width:400px;text-align: justify"> <?=$case_details[0]['description']?></td>
                            </tr>
                            <tr>
                                <td class="right">Payment :</td>
                                <td style="width:400px;text-align: justify">SAR <?php  echo number_format($case_details[0]['lawyer_amount'],0);?></td>
                            </tr>
                            <tr>
                                <td class="right">Payment Status :</td>
                                <td style="width:400px;text-align: justify"> <?=ucfirst($case_details[0]['payment_status'])?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('case_registered_date')?> :</td>
                                <td style="width:400px;text-align: justify"> <?=date('d-m-Y',strtotime($case_details[0]['created_date_time']))?></td>
                            </tr>
                            <?php if(!empty($case_details[0]['attachment'])){ ?>
                                <tr>
                                    <td class="right"><?=$this->lang->line('attachment')?> :</td>
                                    <td>
                                        <?php for($s=0;$s<count($case_details[0]['attachment']);$s++){ ?>
                                            <a target="_blank" style="padding: 10px;" href="<?=$case_details[0]['attachment'][$s]['attachment']?>">
                                            <?php getThumbnail($case_details[0]['attachment'][$s]['attachment']); ?>
                                            </a>

                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    <?php } ?>
                    <?php if($type=='appeal'){ ?>
                        <h4 style="padding: 10px;"><u><?=$this->lang->line('case_details')?> :</u></h4>
                        <table class=" table table-hover table-bordered table-striped ">
                            <tbody>
                            <tr>
                                <td class="right"><?=$this->lang->line('user')?> :</td>
                                <td> <?=$case_details[0]['user_name']?></td>
                            </tr>

                            <tr>
                                <td class="right"><?=$this->lang->line('lawyer')?> :</td>
                                <td> <?=$case_details[0]['lawyer_name']?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('appeal_type')?> :</td>
                                <td> <?=$case_details[0]['appeal_type']?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('experience')?> :</td>
                                <td> <?=($case_details[0]['experience']!='')?$case_details[0]['experience']:'---'?></td>
                            </tr>

                            <tr>
                                <td class="right"><?=$this->lang->line('subject')?> :</td>
                                <td> <?=$case_details[0]['subject']?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('description')?> :</td>
                                <td style="width:400px;text-align: justify"> <?=$case_details[0]['description']?></td>
                            </tr>
                            <tr>
                                <td class="right">Payment :</td>
                                <td style="width:400px;text-align: justify">SAR <?php  echo number_format($case_details[0]['lawyer_amount'],0);?></td>
                            </tr>
                            <tr>
                                <td class="right">Payment Status :</td>
                                <td style="width:400px;text-align: justify"> <?=ucfirst($case_details[0]['payment_status'])?></td>
                            </tr>
                            <tr>
                                <td class="right"><?=$this->lang->line('case_registered_date')?> :</td>
                                <td style="width:400px;text-align: justify"> <?=date('d-m-Y',strtotime($case_details[0]['created_date_time']))?></td>
                            </tr>
                            <?php if(!empty($case_details[0]['attachment'])){ ?>
                                <tr>
                                    <td class="right"><?=$this->lang->line('attachment')?> :</td>
                                    <td>
                                        <?php for($s=0;$s<count($case_details[0]['attachment']);$s++){ ?>
                                            <a target="_blank" style="padding: 10px;" href="<?=$case_details[0]['attachment'][$s]['attachment']?>">
                                            <?php getThumbnail($case_details[0]['attachment'][$s]['attachment']); ?>
                                            </a>

                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    <?php } ?>

                    <?php if($case_details[0]['status']=='accepted' || $case_details[0]['status']=='closed'){ ?>
                    <div style="height: 280px;">
                    <!--<h2 class="panel-title heading-sm pull-right" style="padding: 10px; width: 100%;">
                        <a data-target="#reply" data-toggle="modal" class="btn-u btn-brd btn-brd-hover bttn red btn-u-xs pull-right" href="javascript:;">
                        <?=$this->lang->line('reply')?>
                        </a>
                    </h2>-->
                    <div class="<?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="<?=BASE_URL?>index.php/Welcome/addComment" enctype="multipart/form-data" id="reply_frm" onsubmit="return validReplyForm();">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel4">Reply</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><textarea name="comment" id="comment" class="form-control" required></textarea></p>
                                            <p>
                                                <label class="">
                                                    <input type="file" name="attachment[]" id="attachment">
                                                </label>
                                                <input class="btn" type="button" onclick="getAddBrowse();" id="attach-btn" value="Add">
                                                <br/>
                                                <div id="attach_div">
                                                </div>
                                            </p>
                                            <input type="hidden" name="reference_type" value="<?=$reference_type?>">
                                            <input type="hidden" name="reference_id" value="<?=$reference_id?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn-u btn-u-primary">Send</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!--end comments-->

                    </div>
                    <br>
                    <div id="scrollbar3" class="panel-body no-padding mCustomScrollbar " data-mcs-theme="minimal-dark">
                        <?php
                        //echo "<pre>";print_r($case_details); exit;
                        for($s=0;$s<count($conversation);$s++){ ?>
                            <div class="media media-v2" style="margin: 0px 10px;">
                                <?php if($conversation[$s]['from_type_id']==2){ ?>
                                    <a href="#" class="<?php if($this->session->userdata('language_id')!=1){ echo "pull-right"; } else { echo "pull-left"; } ?>">
                                        <img alt="" src="<?php if($conversation[$s]['from_image']!=''){ echo $conversation[$s]['from_image']; } else { echo BASE_URL.'assets/img/user.jpg'; }?>" class="media-object rounded-x">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <strong><a href="#"><?=$conversation[$s]['from_name']?></a> (Lawyer)</strong>

                                            <?php if($this->session->userdata('language_id')!=1){ ?>
                                                <small11 style="float: left;"><?=date('d-m-Y',strtotime($conversation[$s]['created_date_time']))?></small11>
                                            <?php } else {  ?>
                                            <small><?=date('d-m-Y',strtotime($conversation[$s]['created_date_time']))?></small>
                                            <?php } ?>
                                        </h4>
                                        <p><?=$conversation[$s]['comment']?></p>
                                        <!--<ul class="list-inline results-list pull-left">
                                            <li><a href="#">25 Likes</a></li>
                                            <li><a href="#">10 Share</a></li>
                                        </ul>-->
                                        <ul class="list-inline <?php if($this->session->userdata('language_id')!=1){ echo "pull-left"; } else { echo "pull-right"; }?>"
                                            <?php if($this->session->userdata('language_id')!=1){ echo "style='padding-left:15px;'"; }?>
                                        >
                                            <?php if($conversation[$s]['attachment']!=''){ ?>
                                                <li><a download="" target="_blank" href="<?=$conversation[$s]['attachment']?>">
                                                        <!--<img src="<?/*=BASE_URL*/?>assets/img/attachment.png" alt="" />-->
                                                        <?php attachment_icon($conversation[$s]['attachment']); ?>
                                                    </a></li>
                                            <?php } ?>
                                            <section>
                                                <div style="">
                                                    <?php
                                                    if(isset($conversation)){
                                                        $attachments = $this->Mwelcome->getAttachment(array('type' => 'reply', 'reference_id' => $conversation[$s]['id_conversation']));
                                                        for($r=0;$r<count($attachments);$r++){   ?>
                                                            <div style="float: left">
                                                                <a target="_blank" href="<?=$attachments[$r]['attachment']?>" style="padding-right: 20px;">
                                                                    <!--<img class="mCS_img_loaded" src="<?/*=BASE_URL*/?>assets/img/attachment.png" alt="">-->
                                                                    <?php getThumbnail($attachments[$r]['attachment']); ?>
                                                                </a>
                                                            </div>
                                                        <?php } }?>
                                                </div>
                                            </section>

                                            <!--<li><a data-target="#edit" data-toggle="modal" href="#"><i aria-hidden="true" class="expand-list rounded-x fa fa-pencil"></i>
                                                </a></li>-->
                                        </ul>
                                    </div>
                                <?php } else { ?>
                                    <a href="#" class="<?php if($this->session->userdata('language_id')!=1){ echo "pull-right"; } else { echo "pull-left"; } ?>" style="<?php if($this->session->userdata('language_id')!=1){ echo 'padding-right: 40px;'; } else { echo 'padding-left: 40px;'; } ?>">
                                        <img alt="" src="<?php if($conversation[$s]['from_image']!=''){ echo $conversation[$s]['from_image']; } else { echo BASE_URL.'assets/img/user.jpg'; }?>" class="media-object rounded-x">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <strong><a href="#"><?=$conversation[$s]['from_name']?></a></strong>
                                            <?php if($this->session->userdata('language_id')!=1){ ?>
                                                <small1 style="float: left;" ><?=date('d-m-Y',strtotime($conversation[$s]['created_date_time']))?></small1>
                                            <?php } else { ?>
                                                <small><?=date('d-m-Y',strtotime($conversation[$s]['created_date_time']))?></small>
                                            <?php } ?>

                                        </h4>
                                        <p><?=$conversation[$s]['comment']?></p>
                                        <!--<ul class="list-inline results-list pull-left">
                                            <li><a href="#">25 Likes</a></li>
                                            <li><a href="#">10 Share</a></li>
                                        </ul>-->
                                        <ul class="list-inline <?php if($this->session->userdata('language_id')!=1){ echo "pull-left"; } else { echo "pull-right"; }?>"
                                        <?php if($this->session->userdata('language_id')!=1){ echo "style='padding-left:15px;'"; }?>
                                        >
                                            <?php if($conversation[$s]['attachment']!=''){ ?>
                                                <li><a download="" target="_blank" href="<?=$conversation[$s]['attachment']?>">
                                                        <!--<img src="<?/*=BASE_URL*/?>assets/img/attachment.png" alt="" />-->
                                                        <?php attachment_icon($conversation[$s]['attachment']); ?>
                                                    </a></li>
                                            <?php } ?>
                                            <section>
                                                <div style="">
                                                    <?php
                                                    if(isset($conversation)){
                                                        $attachments = $this->Mwelcome->getAttachment(array('type' => 'reply', 'reference_id' => $conversation[$s]['id_conversation']));
                                                        for($r=0;$r<count($attachments);$r++){   ?>
                                                            <div style="float: left">
                                                                <a download="" target="_blank" href="<?=$attachments[$r]['attachment']?>" style="padding-right: 20px;">
                                                                    <!--<img class="mCS_img_loaded" src="<?/*=BASE_URL*/?>assets/img/attachment.png" alt="">-->
                                                                    <?php attachment_icon($attachments[$r]['attachment']); ?>
                                                                </a>
                                                            </div>
                                                        <?php } }?>
                                                </div>
                                            </section>

                                            <!--<li><a data-target="#edit" data-toggle="modal" href="#"><i aria-hidden="true" class="expand-list rounded-x fa fa-pencil"></i>
                                                </a></li>-->
                                        </ul>
                                    </div>
                                <?php } ?>

                            </div>

                        <?php } if(empty($conversation)){ ?>
                        <div class="media media-v2" style="margin: 0px 10px;">No messages</div>
                        <?php } ?>


                       
                    </div>
                    <?php } ?>

                </div>



            </div>


        </div>

        <!-- End Profile Content -->

    </div>

</div><!--/container-->



<div class="modal fade <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">
            <form method="post" action="<?=BASE_URL?>index.php/Welcome/addComment" enctype="multipart/form-data" id="reply_frm" onsubmit="return validReplyForm();">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabel4">Reply</h4>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">

                        <p><textarea name="comment" id="comment" class="form-control" required></textarea></p>

                        <p>
                            <label class="">

                                <input type="file" name="attachment[]" id="attachment">

                            </label>
                            <input class="btn" type="button" onclick="getAddBrowse();" id="attach-btn" value="Add">
                            <br>
                            <div id="attach_div">

                            </div>
                        </p>

                        <input type="hidden" name="reference_type" value="<?=$reference_type?>">
                        <input type="hidden" name="reference_id" value="<?=$reference_id?>">

                    </div>



                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn-u btn-u-primary">Send</button>

            </div>
            </form>
        </div>

    </div>

</div>



<!--=== End Profile ===-->
