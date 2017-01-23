<div class="breadcrumbs" xmlns="http://www.w3.org/1999/html">

    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('dashboard')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>index.php/welcome/follow"><?=$this->lang->line('dashboard')?></a></li>

            <li class="active"> <?=$this->lang->line('follow')?></li>

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

                    <table class="table">

                        <?php
                        foreach ($tweets as $result) {
                            echo "<tr><td><img src='".$result->user->profile_image_url."'></td><td>".$result->user->screen_name . ":</td><td> " . $result->text . "</td></tr>";
                        }
                        ?>
                    </table>

                </div>

                <!--End Profile Blog-->



                <hr>







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
                    <form method="post" id="new_appeal" action="<?=BASE_URL?>index.php/Welcome/addAppeal" enctype="multipart/form-data">
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
                                <select class="form-control"  name="appeal_type" id="appeal_type">

                                    <option value="0">Select appeal_type </option>
                                    <?php for($s=0;$s<count($appeal_type);$s++){ ?>
                                        <option value="<?=$appeal_type[$s]['id_appeal_type']?>"><?=$appeal_type[$s]['appeal_type']?></option>
                                    <?php } ?>
                                </select>
                            </p>
                            <p>
                                <select class="form-control"  name="experience" id="experience">

                                    <option value="0">Select experience </option>

                                    <option  value="0-5">0-5</option>

                                    <option  value="5-10">5-10</option>

                                    <option value="10-15">10-15</option>

                                </select>
                            </p>

                            <p><input class="form-control" type="text" value="" name="subject" id="subject" placeholder="Sub:-" /></p>

                            <p><textarea class="form-control" name="description" id="description" placeholder="Description"></textarea></p>

                            <p><input class="" name="attachment" id="attachment" type="file" /></p>

                            <input type="hidden" name="id_appeal" id="id_appeal" value="">

                        </div>
                    </form>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>

                <button type="button" onclick="validAppeal();" class="btn-u btn-u-primary">Send</button>

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
