<div class="breadcrumbs" xmlns="http://www.w3.org/1999/html">

    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('dashboard')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>index.php/Welcome/dashboard"><?=$this->lang->line('dashboard')?></a></li>

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

                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i><?=$this->lang->line('directed_consultation')?></h2>

                        <a href="#"  data-toggle="modal" data-target="#new" class="btn-u btn-brd btn-brd-hover bttn red btn-u-xs pull-right"><?=$this->lang->line('new')?></a>

                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="table-search-v1">

                                <div class="table-responsive">



                                    <div id="mail">



                                        <table class="table-bordered mailinbox" style="border-collapse:collapse; margin-top:0px; width:100%;" border="0" cellpadding="5" cellspacing="3">



                                            <thead>

                                            <tr >

                                                <th class="head1" style="text-align:left; padding-left:6px;"><input type="checkbox" class="checkall" /></th>

                                                <th class="head1" style="text-align:left;"><?=$this->lang->line('sender')?></th>

                                                <th class="head0"><?=$this->lang->line('subject')?></th>

                                                <th class="head1 attachement" style="text-align:center;">&nbsp;</th>

                                                <th class="head0" style="text-align:left;"><?=$this->lang->line('date')?> & <?=$this->lang->line('time')?></th>

                                                <th class="head1 " style="text-align:center;"> <?=$this->lang->line('reply')?> </th>

                                            </tr>

                                            </thead>

                                            <tbody>

                                            <tr class="unread">

                                                <td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>

                                                <td><a href="#" data-toggle="modal" data-target="#view">Mohammed!</a> </td>

                                                <td><a href="" class="title" data-toggle="modal" data-target="#view">Business consulting</a></td>

                                                <td class="attachment"><img src="<?=BASE_URL?>assets/img/attachment.png" alt="" /></td>

                                                <td class="date">16:05 16/12/1436</td>

                                                <td><a data-toggle="modal" data-target="#reply" href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></td>

                                            </tr>

                                            <tr class="unread">

                                                <td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>

                                                <td>Mohammed! </td>

                                                <td><a href="" class="title">Business consulting</a></td>

                                                <td class="attachment"></td>

                                                <td class="date">16:05 16/12/1436</td>

                                                <td><a data-toggle="modal" data-target="#reply" href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></td>

                                            </tr>

                                            <tr>

                                                <td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>

                                                <td>Mohammed! </td>

                                                <td><a href="" class="title">Business consulting</a></td>

                                                <td class="attachment"></td>

                                                <td class="date">16:05 16/12/1436</td>

                                                <td><a data-toggle="modal" data-target="#reply" href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></td>

                                            </tr>

                                            <tr>

                                                <td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>

                                                <td>Mohammed! </td>

                                                <td><a href="" class="title">Business consulting</a></td>

                                                <td class="attachment"><img src="<?=BASE_URL?>assets/img/attachment.png" alt="" /></td>

                                                <td class="date">16:05 16/12/1436</td>

                                                <td><a data-toggle="modal" data-target="#reply" href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></td>

                                            </tr>

                                            <tr>

                                                <td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>

                                                <td>Mohammed! </td>

                                                <td><a href="" class="title">Business consulting</a></td>

                                                <td class="attachment"></td>

                                                <td class="date">16:05 16/12/1436</td>

                                                <td><a data-toggle="modal" data-target="#reply" href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></td>

                                            </tr>

                                            <tr class="unread">

                                                <td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>

                                                <td>Mohammed! </td>

                                                <td><a href="" class="title">Business consulting</a></td>

                                                <td class="attachment"><img src="assets/img/attachment.png" alt="" /></td>

                                                <td class="date">16:05 16/12/1436</td>

                                                <td><a data-toggle="modal" data-target="#reply" href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></td>

                                            </tr>

                                            <tr class="unread">

                                                <td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>

                                                <td>Mohammed! </td>

                                                <td><a href="" class="title">Business consulting</a></td>

                                                <td class="attachment"></td>

                                                <td class="date">16:05 16/12/1436</td>

                                                <td><a data-toggle="modal" data-target="#reply" href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></td>

                                            </tr>

                                            <tr>

                                                <td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>

                                                <td>Mohammed! </td>

                                                <td><a href="" class="title">Business consulting</a></td>

                                                <td class="attachment"></td>

                                                <td class="date">16:05 16/12/1436</td>

                                                <td><a data-toggle="modal" data-target="#reply" href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></td>

                                            </tr>

                                            <tr>

                                                <td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>

                                                <td>Mohammed! </td>

                                                <td><a href="" class="title">Business consulting</a></td>

                                                <td class="attachment"><img src="assets/img/attachment.png" alt="" /></td>

                                                <td class="date">16:05 16/12/1436</td>

                                                <td><a data-toggle="modal" data-target="#reply" href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></td>

                                            </tr>

                                            <tr>

                                                <td class="aligncenter"><input type="checkbox" class="checkbox" name="" /></td>

                                                <td>Mohammed! </td>

                                                <td><a href="" class="title">Business consulting</a></td>

                                                <td class="attachment"></td>

                                                <td class="date">16:05 16/12/1436</td>

                                                <td><a data-toggle="modal" data-target="#reply" href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></td>



                                            </tr>



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



                <div class="row">

                    <!--Alert-->

                    <div class="col-sm-7 sm-margin-bottom-30">

                        <div class="panel panel-profile">

                            <div class="panel-heading overflow-h">

                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-send"></i> Consultation for all</h2>



                            </div>

                            <div id="scrollbar3" class="panel-body no-padding mCustomScrollbar" data-mcs-theme="minimal-dark">

                                <div class="table-search-v1">

                                    <div class="table-responsive">

                                        <table class="table table-hover table-bordered table-striped">

                                            <thead>

                                            <tr>

                                                <th>Pick</th>

                                                <th class="hidden-sm">Date & Time</th>

                                                <th></th>

                                            </tr>

                                            </thead>

                                            <tbody>

                                            <tr>

                                                <td><button class="btn-u btn-u-blue btn-u-xs"> Pick</button>  </td>

                                                <td class="td-width">16:05 16/12/1436</td>

                                                <td>Distribution of inheritance</td>

                                            </tr>

                                            <tr>

                                                <td><button class="btn-u btn-u-blue btn-u-xs"> Pick</button>  </td>

                                                <td class="td-width">16:05 16/12/1436</td>

                                                <td>Divorce case</td>

                                            </tr>

                                            <tr>

                                                <td><button class="btn-u btn-u-blue btn-u-xs"> Pick</button>  </td>

                                                <td class="td-width">16:05 16/12/1436</td>

                                                <td>Business consulting</td>

                                            </tr>

                                            <tr>

                                                <td><button class="btn-u btn-u-blue btn-u-xs"> Pick</button>  </td>

                                                <td class="td-width">16:05 16/12/1436</td>

                                                <td>Business consulting</td>

                                            </tr>

                                            <tr>

                                                <td><button class="btn-u btn-u-blue btn-u-xs"> Pick</button>  </td>

                                                <td class="td-width">16:05 16/12/1436</td>

                                                <td>Business consulting</td>

                                            </tr>

                                            <tr>

                                                <td><button class="btn-u btn-u-blue btn-u-xs"> Pick</button>  </td>

                                                <td class="td-width">16:05 16/12/1436</td>

                                                <td>Business consulting</td>

                                            </tr>

                                            <tr>

                                                <td><button class="btn-u btn-u-blue btn-u-xs"> Pick</button>  </td>

                                                <td class="td-width">16:05 16/12/1436</td>

                                                <td>Business consulting</td>

                                            </tr>









                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!--End Alert-->



                    <div class="col-sm-5">

                        <div class="panel panel-profile">

                            <div class="panel-heading overflow-h">

                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-comments-o"></i> Discussions</h2>

                                <a href="page_profile_comments.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>

                            </div>

                            <div id="scrollbar4" class="panel-body no-padding mCustomScrollbar" data-mcs-theme="minimal-dark">

                                <div class="comment">

                                    <img src="assets/img/testimonials/img6.jpg" alt="">

                                    <div class="overflow-h">

                                        <strong>Taylor Lee<small class="pull-right"> 25m</small></strong>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>



                                    </div>

                                </div>

                                <div class="comment">

                                    <img src="assets/img/testimonials/img2.jpg" alt="">

                                    <div class="overflow-h">

                                        <strong>Miranda Clarsson<small class="pull-right"> 44m</small></strong>

                                        <p>Donec cursus, orci non posuere luctus, risus massa luctus nisi, sit amet cursus leo massa id arcu. Nunc tincidunt magna sit amet sapien congue.</p>



                                    </div>

                                </div>

                                <div class="comment">

                                    <img src="assets/img/testimonials/img4.jpg" alt="">

                                    <div class="overflow-h">

                                        <strong>Natasha Kolnikova<small class="pull-right"> 7h</small></strong>

                                        <p>Suspendisse est est, sollicitudin eget auctor et, pharetra eu sapien. Mauris mollis libero ac auctor iaculis.</p>



                                    </div>

                                </div>

                                <div class="comment">

                                    <img src="assets/img/testimonials/img1.jpg" alt="">

                                    <div class="overflow-h">

                                        <strong>Mikel Andrews<small class="pull-right"> 15h</small></strong>

                                        <p>Nam ut dolor cursus nibh aliquet bibendum in eget risus.</p>



                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>

                </div><!--/end row-->



                <hr>



                <div class="headline"><h2>  Lawyer's List



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

                                Lawyer

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

                <h4 class="modal-title" id="myModalLabel4">New Consultation</h4>

            </div>

            <div class="modal-body">

                <div class="row">
                    <form method="post" id="new_consult" action="<?=BASE_URL?>index.php/Welcome/addConsultation" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <p>
                            <select class="form-control" id="lawyer" name="lawyer">
                                <option value="0">Select Lawyer</option>
                                <?php for($s=0;$s<count($lawyer_list);$s++){ ?>
                                    <option value="<?=$lawyer_list[$s]['id_user']?>"><?=$lawyer_list[$s]['username']?></option>
                                <?php } ?>
                            </select>
                        </p>
                        <p><input class="form-control" type="test" value="" name="email" id="email" placeholder="e-mail" /><br>
                            <span class="err" id="email_err"></span>
                        </p>

                        <p><input class="form-control" type="test" value="" name="subject" id="subject" placeholder="Sub:-" /></p>

                        <p><textarea class="form-control" name="description" id="description" placeholder="Description"></textarea></p>

                        <p><input class="" name="attachment" id="attachment" type="file" /></p>



                    </div>
                    </form>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>

                <button type="button" class="btn-u btn-u-primary">Send</button>

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

<div class="modal fade" id="Changeprofilepic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabel4">Change Profile Pic</h4>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">



                        <div class="table-search-v1">

                            <div class="table-responsive">
                                <form id="change_profile_pic" method="post" action="<?=BASE_URL?>index.php/Welcome/changeProfilePic" enctype="multipart/form-data">
                                    <table class="table table-hover table-bordered table-striped">

                                        <tbody>

                                        <tr>

                                            <td>

                                                Select Profile Pic:

                                            </td>

                                            <td class="td-width"> <input class="" name="profile_pic" id="profile_pic" type="file" />
                                                <br>
                                                <span class="err" id="profile_pic_err"></span>
                                            </td>



                                        </tr>







                                        </tbody>

                                    </table>
                                </form>
                            </div>

                        </div>









                    </div>



                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>

                <button type="button" onclick="uploadProfilePic()" class="btn-u btn-u-primary">Upload</button>

            </div>

        </div>

    </div>

</div>

<!--=== End Profile ===-->
