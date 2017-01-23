
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">

<div class="row">



<div class="col-xs-12">

<div class="box">

<div class="box-header">

    <h3 class="box-title"><?=$this->lang->line('lawyers')?>:</h3>
</div><!-- /.box-header -->
<div class="box-body">
    <div style="">
    <!--<select class="form-control input-sm" style="" name="category_ddl" id="category_ddl">
        <option value="0" <?php /*if(isset($type) && $type==0){ echo "selected='selected'"; } */?>>Parent Categories</option>
        <option value="1" <?php /*if(isset($type) && $type==1){ echo "selected='selected'"; } */?>>Sub Categories</option>
    </select>-->
        <p style="text-align: center;font-size: 20px;color: red"><?php if($this->session->userdata('message')){ echo $this->session->userdata('message'); $this->session->unset_userdata('message'); } ?></p>
    </div>
    <div style="width: 150px;text-align: right;float: right;">
        <input type="button" class="btn" value="Excel Download" onclick="getExcelDownload('lawyers')">
    </div>
<table id="table" class="table table-bordered table-hover">
<thead>
<tr>

    <th><?=$this->lang->line('first_name')?></th>
    <th><?=$this->lang->line('last_name')?> </th>
    <th><?=$this->lang->line('father_name')?> </th>
    <th><?=$this->lang->line('email')?></th>
    <th><?=$this->lang->line('username')?></th>
    <th><?=$this->lang->line('gender')?></th>
    <th><?=$this->lang->line('mobile_number')?></th>
    <th><?=$this->lang->line('country')?></th>
    <th><?=$this->lang->line('status')?></th>
    <th><?=$this->lang->line('action')?></th>
</tr>
</thead>
<tbody>



</tbody>

</table>
</div><!-- /.box-body -->
</div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=$this->lang->line('edit_lawyer')?></h4>
            </div>
            <form id="lawyer_form" method="post" action="<?=ADMIN_BASE_URL?>index.php?welcome/updateLawyer/" enctype="multipart/form-data">
            <div class="modal-body nav-tabs-custom" id="model-body">

                <div class="form-group" id="">
                    <label><?=$this->lang->line('first_name')?> </label>
                    <input type="text" class="form-control" name="first_name" id="first_name" >
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('last_name')?> </label>
                    <input type="text" class="form-control" name="last_name" id="last_name" >
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('father_name')?> </label>
                    <input type="text" class="form-control" name="father_name" id="father_name" >
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('email')?></label>
                    <input type="text" class="form-control" name="email" id="email" >
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('password')?></label>
                    <input type="text" class="form-control" name="password" id="password" >
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('username')?> </label>
                    <input type="text" class="form-control" name="username" id="username" >
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('gender')?></label>
                    <select  class="form-control" name="gender" id="gender" >
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('mobile_number')?> </label>
                    <input type="text" class="form-control" name="mobile_number" id="mobile_number" >
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('country')?></label>
                    <select class="form-control" name="country_id" id="country_id" >
                        <option value="0">Select Country</option>
                    </select>
                </div>
                <div class="form-group" id="user_image_div" style="display:none">
                    <img id="user_image_tag" src="" width="100px" height="100px">
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('user_image')?> </label>
                    <input type="file" class="form-control" name="user_image" id="user_image" >
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('experience')?></label>
                    <select class="form-control" name="experience" id="experience" >
                        <?php for($s=1;$s<=12;$s++){ ?>
                            <option value="<?=$s?>"><?=$s?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('speciality')?></label>
                    <select class="form-control" name="speciality_id" id="speciality_id" >
                        <option value="0">Select speciality</option>
                    </select>
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('status')?></label>
                    <select class="form-control" name="user_status" id="user_status" >
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="form-group" id="">
                    <label><?=$this->lang->line('rating')?></label>
                    <label><span id="rating"></span></label>
                </div>
            </div>
                <input type="hidden" name="user_id" id="user_id">
            </form>
            <div class="modal-footer">
                <button type="submit" onclick="validateLawyer()" class="btn btn-primary"><?=$this->lang->line('save')?> </button>
            </div>

        </div>

    </div>
</div>

<script type="text/javascript">
$(function () {

    getUsers(2);

    getSpecialityListDrp();
    getCountryList();
});
</script>