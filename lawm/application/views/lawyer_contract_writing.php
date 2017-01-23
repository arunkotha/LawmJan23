
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

        <h1 class="pull-left"><?=$this->lang->line('dashboard')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>index.php/Welcome/contractWriting"><?=$this->lang->line('dashboard')?></a></li>

            <li class="active"> <?=$this->lang->line('contract_writing')?></li>

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

                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i><?=$this->lang->line('directed_contract_writing')?></h2>

                        <!--<a href="Consultationlist.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right"><?/*=$this->lang->line('view_all')*/?></a>-->

                    </div>

                    <div class="panel-body padding-t-b-1">

                        <div class="row">

                            <div class="table-search-v1">

                                <div class="table-responsive">

                                    <table class="table table-hover table-bordered table-striped <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>">

                                        <thead>

                                        <tr>

                                            <th><?=$this->lang->line('name')?></th>

                                            <th class="hidden-sm"><?=$this->lang->line('date')?> & <?=$this->lang->line('time')?></th>

                                            <th><?=$this->lang->line('status')?></th>
                                            <th><?=$this->lang->line('subject')?></th>
                                            <th><?=$this->lang->line('attachment')?></th>
                                            <th><?=$this->lang->line('action')?></th>

                                        </tr>

                                        </thead>

                                        <tbody>
                                        <?php for($s=0;$s<count($lawyer_consultation);$s++){ ?>
                                            <tr>

                                                <td>

                                                    <a href="#"><?=$lawyer_consultation[$s]['user_name']?></a>

                                                </td>

                                                <td class="td-width"><?=$lawyer_consultation[$s]['created_date_time']?></td>


                                                <?php if($lawyer_consultation[$s]['status']=='pending'){ ?>
                                                <td>
                                                    <!--<button  class="btn-u btn btn-u-xs" onclick="updateContractWriting('<?/*=$lawyer_consultation[$s]['id_contract_writing']*/?>','rejected')"> Decline</button>-->
                                                    <button class="btn-u btn btn-u-xs" data-toggle="modal" data-target="#view_module" onclick="getReject('<?=$lawyer_consultation[$s]['id_contract_writing']?>','contract-writing')"> <?=$this->lang->line('decline')?></button>

                                                    <button onclick="updateContractWriting('<?=$lawyer_consultation[$s]['id_contract_writing']?>','accepted')" class="btn-u btn btn-u-xs"> <?=$this->lang->line('accept')?></button>
                                                </td>
                                                <?php } else {?>
                                                    <td><?=$lawyer_consultation[$s]['status']?></td>
                                                <?php } ?>
                                                <td><?=$lawyer_consultation[$s]['subject']?></td>

                                                <td class="head1 attachement" style="text-align:center;">

                                                    <?php
                                                    $attachment = $this->Mwelcome->getAttachment(array('type' => 'contract-writing','reference_id' => $lawyer_consultation[$s]['id_contract_writing']));
                                                    if(!empty($attachment)){
                                                        for($r=0;$r<count($attachment);$r++){
                                                            ?>
                                                            <a download="" target="_blank" href="<?=$attachment[$r]['attachment']?>">
                                                                <!--<img src="<?/*=BASE_URL*/?>assets/img/attachment.png" alt="" />-->
                                                                <?php getThumbnail($attachment[$r]['attachment']); ?>
                                                            </a>
                                                        <?php } } else { ?>
                                                        <a href="javascript:;">---</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php /*if($lawyer_consultation[$s]['status']=='accepted'){ */?><!--
                                                        <a href="<?/*=BASE_URL*/?>index.php/Welcome/comments/contract-writing/<?/*=$this->Mwelcome->encode($lawyer_consultation[$s]['id_contract_writing'])*/?>" ><i class="expand-list rounded-x fa fa-reply"></i></a>
                                                    <?php /*} */?>
                                                    <a data-target="#view_module" onclick="getModule('contract','<?/*=$this->Mwelcome->encode($lawyer_consultation[$s]['id_contract_writing'])*/?>');" data-toggle="modal" href="javascript:;"  ><i class="expand-list rounded-x fa fa-eye"></i></a>-->

                                                    <a  class="btn-u btn btn-u-xs" style="color: white" href="<?=BASE_URL?>index.php/Welcome/comments/contract-writing/<?=$this->Mwelcome->encode($lawyer_consultation[$s]['id_contract_writing'])?>" ><?=$this->lang->line('view')?></a>
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

                <!--End Profile Blog-->



                <hr>
                <div class="row">

                    <!--Alert-->

                    <div class="col-sm-12 sm-margin-bottom-30">

                        <div class="panel panel-profile">

                            <div class="panel-heading overflow-h">

                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-server"></i> <?=$this->lang->line('contract_writing_all')?></h2>



                            </div>

                            <div id="scrollbar3" class="panel-body no-padding mCustomScrollbar" data-mcs-theme="minimal-dark">

                                <div class="table-search-v1">

                                    <div class="table-responsive">

                                        <table class="table table-hover table-bordered table-striped <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>">

                                            <thead>

                                            <tr>


                                                <th><?=$this->lang->line('name')?></th>
                                                <th><?=$this->lang->line('subject')?></th>
                                                <th class="hidden-sm"><?=$this->lang->line('date')?> & <?=$this->lang->line('time')?></th>
                                                <th><?=$this->lang->line('pick')?></th>


                                            </tr>

                                            </thead>

                                            <tbody>
                                            <?php for($s=0;$s<count($other_consultation);$s++){ ?>
                                                <tr>
                                                    <td><a style="color:blue;" href="javascript:;" data-target="#view_module" data-toggle="modal" onclick="getModule('contract','<?=$this->Mwelcome->encode($other_consultation[$s]['id_contract_writing'])?>');" href="javascript:;"> <?=$other_consultation[$s]['user_name']?></a></td>
                                                    <td><a style="color:blue;" href="javascript:;" data-target="#view_module" data-toggle="modal" onclick="getModule('contract','<?=$this->Mwelcome->encode($other_consultation[$s]['id_contract_writing'])?>');" href="javascript:;"> <?=$other_consultation[$s]['subject']?></a></td>
                                                    <td class="td-width"><?=$other_consultation[$s]['created_date_time']?></td>
                                                    <td><button onclick="getPick('<?=$other_consultation[$s]['id_contract_writing']?>','contract')" class="btn-u btn-u-blue btn-u-xs"> <?=$this->lang->line('pick')?></button>  </td>

                                                </tr>
                                            <?php } ?>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!--End Alert-->



                    <!--<div class="col-sm-5">

                        <div class="panel panel-profile">

                            <div class="panel-heading overflow-h">

                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-comments-o"></i> Discussions</h2>

                                <a href="page_profile_comments.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>

                            </div>

                            <div id="scrollbar4" class="panel-body no-padding mCustomScrollbar" data-mcs-theme="minimal-dark">

                                <div class="comment">

                                    <img src="<?/*=BASE_URL*/?>assets/img/testimonials/img6.jpg" alt="">

                                    <div class="overflow-h">

                                        <strong>Taylor Lee<small class="pull-right"> 25m</small></strong>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>



                                    </div>

                                </div>

                                <div class="comment">

                                    <img src="<?/*=BASE_URL*/?>assets/img/testimonials/img2.jpg" alt="">

                                    <div class="overflow-h">

                                        <strong>Miranda Clarsson<small class="pull-right"> 44m</small></strong>

                                        <p>Donec cursus, orci non posuere luctus, risus massa luctus nisi, sit amet cursus leo massa id arcu. Nunc tincidunt magna sit amet sapien congue.</p>



                                    </div>

                                </div>

                                <div class="comment">

                                    <img src="<?/*=BASE_URL*/?>assets/img/testimonials/img4.jpg" alt="">

                                    <div class="overflow-h">

                                        <strong>Natasha Kolnikova<small class="pull-right"> 7h</small></strong>

                                        <p>Suspendisse est est, sollicitudin eget auctor et, pharetra eu sapien. Mauris mollis libero ac auctor iaculis.</p>



                                    </div>

                                </div>

                                <div class="comment">

                                    <img src="<?/*=BASE_URL*/?>assets/img/testimonials/img1.jpg" alt="">

                                    <div class="overflow-h">

                                        <strong>Mikel Andrews<small class="pull-right"> 15h</small></strong>

                                        <p>Nam ut dolor cursus nibh aliquet bibendum in eget risus.</p>



                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>-->

                </div><!--/end row-->
                <hr>
                <div class="panel panel-profile">

                    <div class="panel-heading overflow-h">

                        <h2 class="panel-title heading-sm pull-left closed"><i class="fa fa-tasks"></i><?=$this->lang->line('closed')?></h2>



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

                                                <th class="head1 attachement" style="text-align:center;"><?=$this->lang->line('attachments')?></th>

                                                <th class="head0" style="text-align:left;"><?=$this->lang->line('date_time')?></th>
                                                <th class="head0" style="text-align:left;"><?=$this->lang->line('rating')?></th>


                                            </tr>

                                            </thead>

                                            <tbody>
                                            <?php $closed_cases = $this->Mwelcome->getContractWriting(array('lawyer_id' => $this->session->userdata('user_id'),'status' => 'closed'));
                                            if(!empty($closed_cases)){
                                                for($s=0;$s<count($closed_cases);$s++){
                                                    $attachment = $this->Mwelcome->getAttachment(array('type' => 'contract-writing','reference_id' => $closed_cases[$s]['id_contract_writing']));
                                                    ?>
                                                    <tr>
                                                        <td class="head1" style="text-align:left;"><?=$closed_cases[$s]['lawyer_name']?></td>

                                                        <td class="head0"><?=$closed_cases[$s]['subject']?></td>

                                                        <td class="head1 attachement" style="text-align:center;">
                                                            <?php if(!empty($attachment)){ for($r=0;$r<count($attachment);$r++){?>
                                                                <a download="" target="_blank" href="<?=$attachment[$r]['attachment']?>">
                                                                    <!--<img src="<?/*=BASE_URL*/?>assets/img/attachment.png" alt="" />-->
                                                                    <?php attachment_icon($attachment[$r]['attachment']); ?>
                                                                </a>
                                                            <?php } } else { ?>
                                                                <a href="javascript:;">---</a>
                                                            <?php } ?>
                                                        </td>

                                                        <td class="head0" style="text-align:left;"><?=$closed_cases[$s]['created_date_time']?></td>
                                                        <td class="head0" style="text-align:left;">
                                                            <?php $rating = $this->Mwelcome->getRating(array('reference_type' => 'contract','reference_id' => $closed_cases[$s]['id_contract_writing']));
                                                            if(!empty($rating)){
                                                                ?>
                                                                <div class="basic1"  data-average="<?=$rating[0]['rating']?>" data-id="1" style="float: left;margin-top: 0px;"></div>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php } }else{ ?>
                                                <tr><td colspan="5" style="text-align: center"><?=$this->lang->line('no_closed_cases')?></td></tr>
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
