
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div style="float: right; height: 35px; margin: 0px 30px 11px 0px; width: 150px;">

            </div>

            <div class="col-xs-12">

                <div class="box">

                    <div class="box-header">

                        <h3 class="box-title"><?=$this->lang->line('change_password')?>:</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div style="width: 500px;text-align: center;font-size: 18px;color: green;">
                        <?php
                            if($this->session->userdata('message')){ echo $this->session->userdata('message'); $this->session->unset_userdata('message'); }
                        ?>
                        </div>

                        <form method="post" action="<?=ADMIN_BASE_URL?>index.php?welcome/makeChangePassword" enctype="multipart/form-data" onsubmit="return changePassword(this);" >

                                <div class="modal-body nav-tabs-custom" id="model-body">

                                    <div class="form-group" id="">
                                        <label><?=$this->lang->line('password')?> : </label>
                                        <input class="form-control" type="password" name="password" id="password" required>
                                        <span class="error" style="color:red" id="password_err"></span>
                                    </div>
                                    <div class="form-group" id="">
                                        <label><?=$this->lang->line('change_password')?> : </label>
                                        <input class="form-control" type="password" name="confirm_password" id="confirm_password" required>
                                        <span class="error" style="color:red" id="confirm_password_err"></span>
                                    </div>

                                <div class="modal-footer" id="s-btn">
                                    <button type="submit" class="btn btn-primary"><?=$this->lang->line('save')?></button>
                                </div>
                            </div>
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