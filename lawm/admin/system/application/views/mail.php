
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <div class="box">

                    <div class="box-header">

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div id="msg" style="display: none;font-size: 20px; color: red; text-align: center"><span style="text-align: center">Sending mails take some time, please wait...</span></div>
                        <form method="post" action="<?=BASE_URL?>index.php?welcome/makeMails" enctype="multipart/form-data" onsubmit="return validSendMail(this);" >
                            <div id="checkboxes">
                                <p><label><input type="checkbox" name="type" id="user_type" value="0" onclick="getUserMails(0)" class="minimal" />&nbsp;&nbsp;To All Users</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="type" id="user_type" value="1" onclick="getUserMails(1)" class="minimal" />&nbsp;&nbsp;To All Subscribers</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="type" id="user_type" value="2" onclick="getUserMails(2)" class="minimal" />&nbsp;&nbsp;To All Sellers</label>&nbsp;&nbsp;&nbsp;</p>

                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <textarea name="user_mail" id="user_mail" placeholder="Enter Email" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" placeholder="Enter Subject" name="subject" id="subject" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="mail_content" id="mail_content" placeholder="Enter Content" rows="3" class="form-control"></textarea>
                            </div>

                            <br><br>

                            <button type="submit" class="btn btn-primary">Send Mails</button>

                        </form>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->


            </div><!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->



<script type="text/javascript">
    $(function () {

    });
</script>