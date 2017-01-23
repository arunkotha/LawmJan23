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

        <h1 class="pull-left"><?=$this->lang->line('consultation')?></h1>

        <ul class="pull-right breadcrumb">

            <li class=""><a href="<?=BASE_URL?>index.php/welcome/consultation"><?=$this->lang->line('dashboard')?></a></li>

            <li class="active"> <?=$this->lang->line('consultation')?></li>

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

            <div class="profile-body ">

                <div class="panel panel-profile">

                    <div class="panel-heading overflow-h">

                        <h2 class="panel-title heading-sm pull-left "><i class="fa fa-pencil"></i><?=$this->lang->line('open')?></h2>

                        <a href="<?=BASE_URL?>index.php/Welcome/newConsultation"  class="btn-u btn pull-right"><?=$this->lang->line('new')?></a>

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

                                                <th class="head1" style=""><?=$this->lang->line('lawyer')?></th>

                                                <th class="head0"><?=$this->lang->line('subject')?></th>

                                                <th class="head1 attachement" style=""><?=$this->lang->line('attachment')?></th>

                                                <th class="head0" ><?=$this->lang->line('date_time')?></th>
                                                <th class="head0" ><?=$this->lang->line('status')?></th>

                                                <th class="head1" > <?=$this->lang->line('action')?> </th>

                                            </tr>

                                            </thead>

                                            <tbody>
                                            <?php
                                            //echo "<pre>";print_r($my_consultations); exit;
                                            for($s=0;$s<count($my_consultations);$s++){ ?>
                                                <tr class="" id="consul_<?=$my_consultations[$s]['id_consultation']?>">

                                                    <!--<td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>-->

                                                    <td><a href="#" data-toggle="modal" data-target="#view"><?=$my_consultations[$s]['lawyer_name']?></a> </td>

                                                    <td><a href="" class="title" data-toggle="modal" data-target="#view"><?=$my_consultations[$s]['subject']?></a></td>

                                                    <td class="attachment">
                                                        <?php if(!empty($my_consultations[$s]['attachment'])){
                                                            for($r=0;$r<count($my_consultations[$s]['attachment']);$r++){
                                                            ?>
                                                        <a target="_blank" href="<?=$my_consultations[$s]['attachment'][$r]['attachment']?>">
                                                            
                                                            <?php getThumbnail($my_consultations[$s]['attachment'][$r]['attachment']); ?>
                                                        </a>
                                                        <?php } } else { ?>
                                                            <a href="javascript:;">---</a>
                                                        <?php } ?>

                                                    </td>


                                                    <td class="date"><?=$my_consultations[$s]['created_date_time']?></td>
                                                    <td class="date"><?=$my_consultations[$s]['status']?></td>

                                                    <td>

                                                        <a  class="btn-u btn btn-u-xs" style="color: white" href="<?=BASE_URL?>index.php/Welcome/comments/consultation/<?=$this->Mwelcome->encode($my_consultations[$s]['id_consultation'])?>" ><?=$this->lang->line('view')?></a>
                                                        <?php if($my_consultations[$s]['status']=='pending'){ ?>
                                                        <a  class="btn-u btn btn-u-xs" style="color: white" href="javascript:;" onclick="updateConsultation('<?=$my_consultations[0]['id_consultation']?>','deleted')" ><?=$this->lang->line('delete')?></a>
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


                                                <th class="head1" ><?=$this->lang->line('lawyer')?></th>

                                                <th class="head0"><?=$this->lang->line('subject')?></th>

                                                <th class="head1 attachement" style=""><?=$this->lang->line('attachment')?></th>

                                                <th class="head0" style=""><?=$this->lang->line('date_time')?></th>


                                            </tr>

                                            </thead>

                                            <tbody>
                                            <?php $closed_cases = $this->Mwelcome->consultation(array('user_id' => $this->session->userdata('user_id'),'status' => 'closed'));
                                            if(!empty($closed_cases)){
                                            for($s=0;$s<count($closed_cases);$s++){
                                                $closed_cases[$s]['attachment'] = $this->Mwelcome->getAttachment(array('type' => 'consultation','reference_id' => $closed_cases[$s]['id_consultation']));
                                            ?>
                                                <tr>
                                                <td class="head1" style=""><?=$closed_cases[$s]['lawyer_name']?></td>

                                                <td class="head0"><?=$closed_cases[$s]['subject']?></td>

                                                <td class="head1 attachement" style="text-align:center;">
                                                    <?php if(!empty($closed_cases[$s]['attachment'])){ for($r=0;$r<count($closed_cases[$s]['attachment']);$r++){ ?>
                                                        <a target="_blank" href="<?=$closed_cases[$s]['attachment'][$r]['attachment']?>">
                                                            <?php getThumbnail($closed_cases[$s]['attachment'][$r]['attachment']); ?>
                                                        </a>
                                                    <?php } } else { ?>
                                                        <a href="javascript:;">---</a>
                                                    <?php } ?>
                                                </td>

                                                <td class="head0" style=""><?=$closed_cases[$s]['created_date_time']?></td>
                                                </tr>
                                            <?php } }else{ ?>
                                                <tr><td colspan="4" style=""><?=$this->lang->line('no_closed_cases')?></td></tr>
                                            <?php } ?>
                                            </tbody>

                                        </table>

                                    </div>







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

        <!-- End Profile Content -->

    </div>

</div><!--/container-->

<!--=== End Profile ===-->

