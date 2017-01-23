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

            <li><a href="<?=BASE_URL?>index.php/Welcome/forum"><?=$this->lang->line('dashboard')?></a></li>

            <li class="active"> <?=$this->lang->line('forum')?></li>

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

                <div class="panel panel-profile ">
                    <div class="panel-heading overflow-h">
                        <h4 style="pull-left"><p  style="font-size: 16px;text-align: center;color: red;"><?php if($this->session->userdata('message')){ echo $this->session->userdata('message'); $this->session->unset_userdata('message'); } ?></p></h4>
                        <h2 class="panel-title heading-sm pull-right">
                            <a data-target="#reply" data-toggle="modal" class="btn-u btn pull-right" href="javascript:;"><?=$this->lang->line('add')?></a>
                        </h2>

                    </div>
                    <div id="scrollbar3" class="panel-body no-padding mCustomScrollbar <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>" data-mcs-theme="minimal-dark">
                        <?php
                        //echo "<pre>";print_r($forum); exit;
                        for($s=0;$s<count($forum);$s++){ ?>
                            <div class="media media-v2" style="margin: 0px 10px;">
                                <?php if($forum[$s]['user_type_id']!=1){ ?>
                                    <a data-target="#view_module" onclick="getUser('<?=$forum[$s]['user_id']?>');" data-toggle="modal" href="javascript:;"  class="<?php if($this->session->userdata('language_id')!=1){ echo "pull-right"; } else { echo "pull-left"; }?>">
                                <?php } else { ?>
                                    <a class="<?php if($this->session->userdata('language_id')!=1){ echo "pull-right"; } else { echo "pull-left"; }?>">
                                <?php } ?>
                                    <img alt="" src="<?php if($forum[$s]['user_image']!=''){ echo $forum[$s]['user_image']; }else { echo BASE_URL.'assets/img/user.jpg'; }?>" class="media-object rounded-x">
                                    <?=$forum[$s]['username']?>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">

                                        <strong><a href="javascript:;"><?=$forum[$s]['title']?></a></strong>
                                        <?php if($this->session->userdata('language_id')!=1){ ?>
                                            <small11 style="float: left;"><?=date('d-m-Y',strtotime($forum[$s]['forum_date']))?></small11>
                                        <?php } ?>
                                    </h4>
                                    <p><?=$forum[$s]['description']?></p>
                                    <section>
                                        <div style="" class="<?php if($this->session->userdata('language_id')!=1){ echo "pull-left"; } else { echo "pull-right"; }?>">
                                            <?php
                                            if(isset($forum)){
                                                $attachments = $this->Mwelcome->getAttachment(array('type' => 'forum', 'reference_id' => $forum[$s]['id_forum']));
                                                for($r=0;$r<count($attachments);$r++){   ?>
                                                    <div style="float: right">
                                                        <a target="_blank" href="<?=$attachments[$r]['attachment']?>" style="padding-right: 20px;">
                                                            <?php getThumbnail($attachments[$r]['attachment']); ?>
                                                        </a>
                                                    </div>
                                                <?php } }?>
                                        </div>
                                    </section>
                                </div>

                            </div>

                        <?php } if(empty($forum)){ ?>
                        <div class="media media-v2" style="margin: 0px 10px;"><?=$this->lang->line('no_messages')?></div>
                        <?php } ?>


                        <div class="text-right">
                            <ul class="pagination">
                                <?=$pages?>
                            </ul>
                        </div>
                    </div>


                </div>



            </div>


        </div>

        <!-- End Profile Content -->

    </div>

</div><!--/container-->



<div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">
            <form class="sky-form" method="post" action="<?=BASE_URL?>index.php/Welcome/addForum" enctype="multipart/form-data" id="reply_frm" onsubmit="return validForumForm();">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabel4">Forum</h4>

            </div>

            <div class="modal-body">

                <div class="row">



                                <fieldset>
                            <section>

                                <label for="date" class="input">

                                    <input type="text" name="title" id="title" placeholder="Title" value="" class="" required>

                                </label>

                            </section>

                            <section>

                                <label class="textarea">

                                    <textarea rows="3" placeholder="Description" id="description" name="description" required></textarea>

                                </label>

                            </section>
                            <section>
                                <p>
                                    <label class="">

                                        <input type="file" name="attachment[]" id="attachment">

                                    </label>
                                    <input class="btn" type="button" onclick="getAddBrowse();" id="attach-btn" value="Add">
                                    <br>
                                <div id="attach_div">

                                </div>
                                </p>
                            </section>

                        </fieldset>

                        <input type="hidden" name="forum_id" value="">

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
