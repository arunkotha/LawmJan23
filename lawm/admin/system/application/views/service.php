
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">

<div class="row">

    <div style="float: right; height: 35px; margin: 0px 30px 11px 0px; width: 150px;">
        <button onclick="getAddService();" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add Service</button>
    </div>

<div class="col-xs-12">

<div class="box">

<div class="box-header">

    <h3 class="box-title">Service:</h3>
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
    <th>Service</th>
    <th>Language</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php for($s=0;$s<count($service_data);$s++){ ?>
    <tr>
        <td><?=$service_data[$s]['service_title']?></td>
        <td><?=$service_data[$s]['language']?></td>
        <td><?php if($service_data[$s]['service_status']==1){ echo "Active"; }else{ echo "Inactive"; } ?></td>
        <td><div class="mod-more tooltipsample actions">
                <a id="edit" onclick="editService(<?=$service_data[$s]['service_flag']?>)" title="edit" data-toggle="modal" data-target="#myModal" class="edit" href="javascript:;"><span class="circle"><i class="fa fa-pencil"></i></span></a></a>
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
        <form method="post" action="<?=ADMIN_BASE_URL?>index.php?welcome/ServiceOperations" enctype="multipart/form-data" onsubmit="return validService(this);" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body nav-tabs-custom" id="model-body">
                    <div id="model-body-c" class="nav-tabs-custom">

                    </div>
<!--                    <div class="form-group" id="">-->
<!--                        <label>Language</label>-->
<!--                        <select class="form-control" name="banner_type" id="banner_type">-->
<!--                            --><?php //if($this->session->userdata('user_type_id')==1){ ?>
<!--                                <option value="slides">Home Slides</option>-->
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

                    <div class="form-group" id="menu_status_div">
                        <label>Status</label>
                        <select class="form-control" name="service_status" id="service_status" required>
                            <option value="" >Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <input type="hidden" name="action" id="action" value="">
            <input type="hidden" name="service_flag" id="service_flag" value="">
        </form>
    </div>
</div>

<script type="text/javascript">
$(function () {

    //getMenuDataTable();
    $('#table').dataTable();

    getLanguage();
});

/*
function getMenuDataTable()
{
    $('#table').dataTable({
        "processing": true,
        "bProcessing": true,
        "serverSide": true,
        "bPaginate":true,
        "aaSorting": [],
        "ajax": {
            "url": ADMIN_BASE_URL+'index.php?welcome/menuDataTable',
            "type": "POST",
            "data": function ( d ) {
                d.acolumns="id_menu";
                d.my_order = "id_menu";
                d.sort="desc";
            }
        },
        "aoColumnDefs": [
            {
                "aTargets": [2],
                "mData": null,
                "mRender": function (data, type, full) {
                    if(full[2]==1){ return 'active'; }
                    else{ return 'Inactive'; }
                }
            },
            {
                "aTargets": [3],
                "mData": null,
                "mRender": function (data, type, full) {

                    return '<div class="mod-more tooltipsample actions">'+
                        '<a id="edit" onclick="editMenu('+full[3]+')" title="edit" data-toggle="modal" data-target="#myModal" class="edit" href="javascript:;"><span class="circle"><i class="fa fa-pencil"></i></span></a></a>' +
                            /!*'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="delete" title="delete" class="delete" onclick="deleteMenu('+full[1]+');" href="javascript:;"><span class="circle"><i class="fa fa-trash-o"></i></span></a>'+*!/
                        '</div>';
                }
            }
        ]
    });
}
*/



</script>