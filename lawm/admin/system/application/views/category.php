
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">

<div class="row">

    <div style="float: right; height: 35px; margin: 0px 30px 11px 0px; width: 150px;">
        <button onclick="getAddCategory();" class="btn btn-primary" data-toggle="modal" data-target="#myModal" ><?=$this->lang->line('add_category')?></button>
    </div>

<div class="col-xs-12">

<div class="box">

<div class="box-header">

    <h3 class="box-title"><?=$this->lang->line('category')?>:</h3>
</div><!-- /.box-header -->
<div class="box-body">
    <div style="width: 150px;text-align: right;float: right;">
    <!--<select class="form-control input-sm" style="" name="category_ddl" id="category_ddl">
        <option value="0" <?php /*if(isset($type) && $type==0){ echo "selected='selected'"; } */?>>Parent Categories</option>
        <option value="1" <?php /*if(isset($type) && $type==1){ echo "selected='selected'"; } */?>>Sub Categories</option>
    </select>-->
    </div>
<table id="table" class="table table-bordered table-hover">
<thead>
<tr>
    <th><?=$this->lang->line('language')?></th>
    <th><?=$this->lang->line('menu')?></th>
    <th><?=$this->lang->line('category')?></th>
    <th><?=$this->lang->line('status')?></th>
    <th><?=$this->lang->line('action')?></th>
</tr>
</thead>
<tbody>
<?php for($s=0;$s<count($category_data);$s++){ ?>
    <tr>
        <td><?=$category_data[$s]['language']?></td>
        <td><?=$category_data[$s]['menu_title']?></td>
        <td><?=$category_data[$s]['category_title']?></td>
        <td><?php if($category_data[$s]['status']==1){ echo "Active"; }else{ echo "Inactive"; } ?></td>
        <td><div class="mod-more tooltipsample actions">
                <a id="edit" onclick="editCategory(<?=$category_data[$s]['category_flag']?>)" title="edit" data-toggle="modal" data-target="#myModal" class="edit" href="javascript:;"><span class="circle"><i class="fa fa-pencil"></i></span></a></a>
                </div>
        </td>
    </tr>
<?php } ?>
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
        <form method="post" action="<?=ADMIN_BASE_URL?>index.php?welcome/categoryOperations" enctype="multipart/form-data" onsubmit="return validCategory(this);" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body" id="model-body">

                    <div class="form-group" id="">
                        <label><?=$this->lang->line('menu')?></label>
                        <select class="form-control" name="menu_flag_id" id="menu_flag_id">
                            <?php for($s=0;$s<count($menu_drp);$s++){ ?>
                                <option value="<?=$menu_drp[$s]['menu_flag']?>"><?=$menu_drp[$s]['menu_title']?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div id="model-body-c"></div>
<!--                    <div class="form-group" id="">-->
<!--                        <label>Title</label>-->
<!--                        <input type="text" placeholder="Enter Title" name="banner_title" id="banner_title" class="form-control">-->
<!--                        <span style="color: green;font-size: 12px;">Ex: Title will appear on home slide</span>-->
<!--                    </div>-->
<!--                    <div class="form-group" id="">-->
<!--                        <label>Banner Image</label>-->
<!--                        <input type="file" name="image" id="image" class="">-->
<!--                        <span class="err_msg" id="err_img"></span>-->
<!--                    </div>-->
<!--                    <div class="form-group" id="">-->
<!--                        <label>Banner Location</label>-->
<!--                        <select class="form-control" name="banner_type" id="banner_type">-->
<!--                            --><?php //if($this->session->userdata('user_type_id')==1){ ?>
<!--                            <option value="slides">Home Slides</option>-->
<!--                            --><?php //} ?>
<!--                            <option value="578X360">578x360 Banner</option>-->
<!--                            <option value="380X500">380x500 Banner</option>-->
<!--                            <option value="side">side bar</option>-->
<!--                        </select>-->
<!--                        <span>(260x120 side banner dimensions.)</span>-->
<!--                        --><?php //if($this->session->userdata('user_type_id')==1){ ?>
<!--                            <span>(900x500 Home banner dimensions.)</span>-->
<!--                        --><?php //} ?>
<!--                    </div>-->
<!--                    <div class="form-group" id="">-->
<!--                        <label>Banner Link</label>-->
<!--                        <input type="text" placeholder="Enter Link" name="banner_link" id="banner_link" class="form-control">-->
<!--                    </div>-->

                    <div class="form-group" id="category_status_div">
                        <label><?=$this->lang->line('category_status')?></label>
                        <select class="form-control" name="status" id="status">

                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?=$this->lang->line('save')?></button>
                </div>
            </div>
            <input type="hidden" name="action" id="action" value="">
            <input type="hidden" name="category_flag" id="category_flag" value="">
        </form>
    </div>
</div>

<script type="text/javascript">
$(function () {
    $('#table').dataTable();
    getLanguage();
});


</script>