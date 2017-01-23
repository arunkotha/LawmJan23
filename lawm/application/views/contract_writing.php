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

<div class="breadcrumbs" xmlns="http://www.w3.org/1999/html">

    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('dashboard')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>index.php/welcome/contractWriting"><?=$this->lang->line('dashboard')?></a></li>

            <li class="active"> <?=$this->lang->line('overall')?></li>

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

                <!--Profile Blog-->

                <div class="panel panel-profile">

                    <div class="panel-heading overflow-h">

                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i><?=$this->lang->line('contract_writing')?></h2>

                        <!--<a href="#"  data-toggle="modal" data-target="#new" onclick="addContractWriting();" class="btn-u btn-brd btn-brd-hover bttn red btn-u-xs pull-right">New</a>-->
                        <a href="<?=BASE_URL?>index.php/Welcome/newContractWriting"  class="btn-u btn pull-right"><?=$this->lang->line('new')?></a>

                    </div>

                    <div class="panel-body padding-t-b-1">

                        <div class="row">

                            <div class="table-search-v1">

                                <div class="table-responsive">



                                    <div id="mail">



                                        <table class="table table-hover table-bordered table-striped <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>" style="border-collapse:collapse; margin-top:0px; width:100%;" border="0" cellpadding="5" cellspacing="3">



                                            <thead>

                                            <tr >

                                                <!--<th class="head1" style="text-align:left; padding-left:6px;"><input type="checkbox" class="checkall" /></th>-->

                                                <th class="head1" style="text-align:left;"><?=$this->lang->line('lawyer')?></th>

                                                <th class="head0"><?=$this->lang->line('subject')?></th>

                                                <th class="head1 attachement" style="text-align:center;"><?=$this->lang->line('attachment')?></th>

                                                <th class="head0" style="text-align:left;"><?=$this->lang->line('date_time')?></th>
                                                <th class="head0" style="text-align:left;"><?=$this->lang->line('status')?></th>

                                                <th class="head1 " style="text-align:center;"> <?=$this->lang->line('action')?> </th>

                                            </tr>

                                            </thead>

                                            <tbody>

                                            <?php for($s=0;$s<count($contract_writing);$s++){ ?>
                                            <tr class="unread">

                                                <!--<td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>-->

                                                <td><a href="#" data-toggle="modal" data-target="#view"><?=$contract_writing[$s]['lawyer_name']?></a> </td>

                                                <td><a href="" class="title" data-toggle="modal" data-target="#view"><?=$contract_writing[$s]['subject']?></a></td>

                                                <td class="attachment">
                                                    <?php if(!empty($contract_writing[$s]['attachment'])){
                                                        for($r=0;$r<count($contract_writing[$s]['attachment']);$r++){
                                                            ?>
                                                            <a target="_blank" href="<?=$contract_writing[$s]['attachment'][$r]['attachment']?>">
                                                                <!--<img src="<?/*=BASE_URL*/?>assets/img/attachment.png" alt="" />-->
                                                                <?php getThumbnail($contract_writing[$s]['attachment'][$r]['attachment']); ?>
                                                            </a>
                                                        <?php } } else { ?>
                                                        <a href="javascript:;"></a>
                                                    <?php } ?>

                                                </td>

                                                <td class="date"><?=$contract_writing[$s]['created_date_time']?></td>
                                                <td class="date"><?=$contract_writing[$s]['status']?></td>

                                                <td>

                                                    <?php /*if($contract_writing[$s]['status']=='pending'){ */?><!--
                                                        <a  href="<?/*=BASE_URL*/?>index.php/Welcome/newContractWriting?contract_writing_id=<?/*=$this->Mwelcome->encode($contract_writing[$s]['id_contract_writing'])*/?>" ><i class="expand-list rounded-x fa fa-minus"></i></a>
                                                        <a href="javascript:;" onclick="updateContractWriting('<?/*=$contract_writing[$s]['id_contract_writing']*/?>','deleted')" ><i class="expand-list rounded-x fa fa-trash"></i></a>
                                                    <?php /*} else if($contract_writing[$s]['status']=='accepted'){ */?>
                                                        <a href="<?/*=BASE_URL*/?>index.php/Welcome/comments/contract-writing/<?/*=$this->Mwelcome->encode($contract_writing[$s]['id_contract_writing'])*/?>" ><i class="expand-list rounded-x fa fa-reply"></i></a>
                                                        <a data-target="#close-con" onclick="getCloseConPopup('Close Contract Writing','contract','<?/*=$this->Mwelcome->encode($contract_writing[$s]['id_contract_writing'])*/?>');" data-toggle="modal" href="javascript:;"  ><i class="expand-list rounded-x fa fa-close"></i></a>
                                                        <a data-target="#view_module" onclick="getModule('contract','<?/*=$this->Mwelcome->encode($contract_writing[$s]['id_contract_writing'])*/?>');" data-toggle="modal" href="javascript:;"  ><i class="expand-list rounded-x fa fa-eye"></i></a>
                                                    <?php /*} else if($contract_writing[$s]['status']=='closed'){  */?>
                                                        <a href="<?/*=BASE_URL*/?>index.php/Welcome/comments/contract-writing/<?/*=$this->Mwelcome->encode($contract_writing[$s]['id_contract_writing'])*/?>" ><i class="expand-list rounded-x fa fa-reply"></i></a>
                                                        <a data-target="#view_module" onclick="getModule('contract','<?/*=$this->Mwelcome->encode($contract_writing[$s]['id_contract_writing'])*/?>');" data-toggle="modal" href="javascript:;"  ><i class="expand-list rounded-x fa fa-eye"></i></a>
                                                    --><?php /*} */?>
                                                    <a class="btn-u btn btn-u-xs" style="color: white" href="<?=BASE_URL?>index.php/Welcome/comments/contract-writing/<?=$this->Mwelcome->encode($contract_writing[$s]['id_contract_writing'])?>" ><?=$this->lang->line('view')?></a>
                                                    <?php if($contract_writing[$s]['status']=='pending'){ ?>
                                                        <a  class="btn-u btn btn-u-xs" style="color: white" href="javascript:;" onclick="updateContractWriting('<?=$contract_writing[$s]['id_contract_writing']?>','deleted')" ><?=$this->lang->line('delete')?></a>
                                                    <?php } ?>
                                                </td>

                                            </tr>
                                            <?php } ?>


                                            </tbody>

                                        </table>

                                    </div>







                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!--End Profile Blog-->



                <hr>



                <div class="panel panel-profile">

                    <div class="panel-heading overflow-h">

                        <h2 class="panel-title heading-sm pull-left closed"><i class="fa fa-lock"></i><?=$this->lang->line('closed')?></h2>

                    </div>

                    <div class="panel-body padding-t-b-1">

                        <div class="row">

                            <div class="table-search-v1">

                                <div class="table-responsive">



                                    <div id="mail">



                                        <table class="table table-hover table-bordered table-striped open <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>" style="border-collapse:collapse; margin-top:0px; width:100%;" border="0" cellpadding="5" cellspacing="3">



                                            <thead>

                                            <tr >


                                                <th class="head1" style="text-align:left;"><?=$this->lang->line('lawyer')?></th>

                                                <th class="head0"><?=$this->lang->line('subject')?></th>

                                                <th class="head1 attachement" style="text-align:center;"><?=$this->lang->line('attachment')?></th>

                                                <th class="head0" style="text-align:left;"><?=$this->lang->line('date_time')?></th>


                                            </tr>

                                            </thead>

                                            <tbody>
                                            <?php $closed_cases = $this->Mwelcome->getContractWriting(array('user_id' => $this->session->userdata('user_id'),'status' => 'closed'));
                                            if(!empty($closed_cases)){
                                            for($s=0;$s<count($closed_cases);$s++){
                                                $closed_cases[$s]['attachment'] = $attachment = $this->Mwelcome->getAttachment(array('type' => 'contract-writing','reference_id' => $closed_cases[$s]['id_contract_writing']));
                                                ?>
                                                <tr>
                                                    <td class="head1" style="text-align:left;"><?=$closed_cases[$s]['lawyer_name']?></td>

                                                    <td class="head0"><?=$closed_cases[$s]['subject']?></td>

                                                    <td class="head1 attachement" style="text-align:center;">
                                                        <?php if(!empty($closed_cases[$s]['attachment'])){ for($r=0;$r<count($closed_cases[$s]['attachment']);$r++){  ?>
                                                            <a target="_blank" href="<?=$closed_cases[$s]['attachment'][$r]['attachment']?>">
                                                                <!--<img src="<?/*=BASE_URL*/?>assets/img/attachment.png" alt="" />-->
                                                                <?php getThumbnail($closed_cases[$s]['attachment'][$r]['attachment']); ?>
                                                            </a>
                                                        <?php } } else { ?>
                                                            <a href="javascript:;">---</a>
                                                        <?php } ?>
                                                    </td>

                                                    <td class="head0" style="text-align:left;"><?=$closed_cases[$s]['created_date_time']?></td>
                                                </tr>
                                            <?php } }else{ ?>
                                                <tr><td colspan="4" style="text-align: center"><?=$this->lang->line('no_closed_cases')?></td></tr>
                                            <?php } ?>
                                            </tbody>

                                        </table>

                                    </div>







                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <hr>
                <?php $this->load->view('lawyers_list'); ?>
                <hr>





            </div>

        </div>

        <!-- End Profile Content -->

    </div>

</div><!--/container-->


<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabel4">Mohammed Saleh :- New</h4>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">

                        <h4 class="modal-title" >Business consulting</h4>



                        <p>

                            Business consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consultingBusiness consulting

                        </p>



                        <p><input class="" type="file" /></p>



                    </div>



                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>

                <button type="button" class="btn-u btn-u-primary">Send</button>

            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabel4">Contract Writing</h4>

            </div>

            <div class="modal-body">

                <div class="row">
                    <form method="post" id="new_contract_writing" action="<?=BASE_URL?>index.php/Welcome/addContractWriting" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <p>
                                <select class="form-control" id="lawyer" name="lawyer">
                                    <option value="0">Select Lawyer</option>
                                    <?php for($s=0;$s<count($lawyer_list);$s++){ ?>
                                        <option value="<?=$lawyer_list[$s]['id_user']?>"><?=$lawyer_list[$s]['username']?></option>
                                    <?php } ?>
                                </select>
                            </p>
                            <p>
                                <select class="form-control"  name="experience" id="experience">

                                    <option value="0">Select experience </option>

                                    <option <?php if(isset($consultation) && $consultation[0]['experience']=='0-5'){ echo "selected='selected'"; } ?> value="0-5">0-5</option>

                                    <option <?php if(isset($consultation) && $consultation[0]['experience']=='5-10'){ echo "selected='selected'"; } ?> value="5-10">5-10</option>

                                    <option <?php if(isset($consultation) && $consultation[0]['experience']=='10-15'){ echo "selected='selected'"; } ?> value="10-15">10-15</option>

                                </select>
                            </p>

                            <p><input class="form-control" type="text" value="" name="subject" id="subject" placeholder="Sub:-" /></p>

                            <p><textarea class="form-control" name="description" id="description" placeholder="Description"></textarea></p>

                            <p id="attachment_div"><input class="" name="attachment" id="attachment" type="file" /></p>

                            <input type="hidden" name="id_contract_writing" id="id_contract_writing" value="">

                        </div>
                    </form>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>

                <button type="button" onclick="validContractWriting();" class="btn-u btn-u-primary">Send</button>

            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabel4">Mohammed Saleh :- Reply</h4>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">

                        <p><input class="form-control" type="test" value="e-mail" /></p>

                        <p><input class="form-control" type="test" value="Sub:-" /></p>

                        <p><textarea class="form-control"></textarea></p>

                        <p><input class="" type="file" /></p>



                    </div>



                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>

                <button type="button" class="btn-u btn-u-primary">Send</button>

            </div>

        </div>

    </div>

</div>



<!--=== End Profile ===-->
