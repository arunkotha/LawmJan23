
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">

<div class="row">

    <div style="float: right; height: 35px; margin: 0px 30px 11px 0px; width: 150px;">
        <button onclick="getAddMenu();" class="btn btn-primary" data-toggle="modal" data-target="#myModal" ><?=$this->lang->line('add_menu')?></button>
    </div>

<div class="col-xs-12">

<div class="box">

<div class="box-header">

    <h3 class="box-title"><?=$this->lang->line('menu')?>:</h3>
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
    <th><?=$this->lang->line('menu')?></th>
    <th><?=$this->lang->line('parent_menu')?> </th>
    <th><?=$this->lang->line('language')?></th>
    <th><?=$this->lang->line('order')?></th>
    <th><?=$this->lang->line('status')?></th>
    <th><?=$this->lang->line('action')?></th>
</tr>
</thead>
<tbody>
<?php for($s=0;$s<count($menu_data);$s++){ ?>
    <tr>
        <td><?=$menu_data[$s]['menu_title']?></td>
        <td><?=$menu_data[$s]['parent_menu']?></td>
        <td><?=$menu_data[$s]['language']?></td>
        <td><?=$menu_data[$s]['order']?></td>
        <td><?php if($menu_data[$s]['menu_status']==1){ echo "Active"; }else{ echo "Inactive"; } ?></td>
        <td><div class="mod-more tooltipsample actions">
                <a id="edit" onclick="editMenu(<?=$menu_data[$s]['id_menu']?>)" title="edit" data-toggle="modal" data-target="#myModal" class="edit" href="javascript:;"><span class="circle"><i class="fa fa-pencil"></i></span></a></a>
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
        <form method="post" action="<?=ADMIN_BASE_URL?>index.php?welcome/menuOperations" enctype="multipart/form-data" onsubmit="return validMenu(this);" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body nav-tabs-custom" id="model-body">
                    <div class="form-group" id="">
                        <label><?=$this->lang->line('parent_menu')?> </label>
                        <select class="form-control" name="parent_id" id="parent_id" required>
                            <option value="">Select Parent</option>
                        <?php for($s=0;$s<count($parent_menu);$s++){ ?>
                            <option value="<?=$parent_menu[$s]['id_menu']?>"><?=$parent_menu[$s]['menu_title']?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div id="model-body-c" class="nav-tabs-custom">

                    </div>
                    <div class="form-group" id="">
                        <label><?=$this->lang->line('order')?></label>
                        <input type="text" class="form-control" name="order" id="order" required>
                    </div>
                    <div class="form-group" id="menu_status_div">
                        <label><?=$this->lang->line('status')?></label>
                        <select class="form-control" name="menu_status" id="menu_status" required>
                            <option value="" >Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="<?=$this->lang->line('save')?>"/>
                </div>
            </div>
            <input type="hidden" name="action" id="action" value="">
            <input type="hidden" name="menu_id" id="menu_id" value="">
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