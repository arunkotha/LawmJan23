
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

    <h3 class="box-title"><?=$this->lang->line('consultation')?>:</h3>
</div><!-- /.box-header -->
<div class="box-body">
    <div style="width: 150px;text-align: right;float: right;">
    <!--<select class="form-control input-sm" style="" name="category_ddl" id="category_ddl">
        <option value="0" <?php /*if(isset($type) && $type==0){ echo "selected='selected'"; } */?>>Parent Categories</option>
        <option value="1" <?php /*if(isset($type) && $type==1){ echo "selected='selected'"; } */?>>Sub Categories</option>
    </select>-->
        <input type="button" class="btn" value="Excel Download" onclick="getExcelDownload('consultation')">
    </div>
<table id="table" class="table table-bordered table-hover">
<thead>
<tr>
    <th><?=$this->lang->line('case_id')?></th>
    <th><?=$this->lang->line('user')?></th>
    <th><?=$this->lang->line('lawyer')?></th>
    <th><?=$this->lang->line('subject')?></th>
    <th><?=$this->lang->line('consultation_type')?></th>
    <th><?=$this->lang->line('experience')?></th>
    <th style="width: 10%"><?=$this->lang->line('date')?></th>
    <th><?=$this->lang->line('status')?></th>
    <th><?=$this->lang->line('action')?></th>
</tr>
</thead>
<tbody>
<?php for($s=0;$s<count($consultation_data);$s++){ ?>
    <tr>
        <td><?=$consultation_data[$s]['case_id']?></td>
        <td><?=$consultation_data[$s]['user_name']?></td>
        <td><?=$consultation_data[$s]['lawyer_name']?></td>
        <td><?=$consultation_data[$s]['subject']?></td>
        <td><?=$consultation_data[$s]['con_type']?></td>
        <td><?=$consultation_data[$s]['lawyer_experience']?></td>
        <td><?=date('d-m-Y',strtotime($consultation_data[$s]['con_date']))?></td>
        <td><?=$consultation_data[$s]['status']?></td>
        <td><div class="mod-more tooltipsample actions">
                <a id="edit" onclick="getServiceData(<?=$consultation_data[$s]['id_consultation']?>,'consultation')" title="edit" data-toggle="modal" data-target="#myModal1" class="edit" href="javascript:;"><span class="circle"><i class="fa fa-pencil"></i></span></a></a>
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
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="<?=ADMIN_BASE_URL?>index.php?welcome/ServiceDataUpdate" enctype="multipart/form-data" onsubmit="return validService(this);" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?=$this->lang->line('edit_consultation')?></h4>
                </div>
                <div class="modal-body nav-tabs-custom" id="model-body">

                    <div class="form-group" id="">
                        <label><?=$this->lang->line('case_id')?></label>
                        <label>: <span id="c-case_id"></span></label>
                    </div>
                    <div class="form-group" id="">
                        <label><?=$this->lang->line('user')?></label>
                        <label>: <span id="c-user"></span></label>
                    </div>
                    <div class="form-group" id="lawyer_name">
                        <label><?=$this->lang->line('lawyer')?> </label>
                        <label id="lawyer_id_label">: <span id="c-lawyer" name="c-lawyer"></span></label>
                        <select class="form-control" name="lawyer_id" id="lawyer_id">

                        </select>

                    </div>
                    <div class="form-group" id="">
                        <label><?=$this->lang->line('consultation_type')?> </label>
                        <label>: <span id="c-type"></span></label>
                    </div>
                    <div class="form-group" id="">
                        <label><?=$this->lang->line('experience')?></label>
                        <label>: <span id="c-exp"></span></label>
                    </div>
                    <div class="form-group" id="">
                        <label><?=$this->lang->line('complain')?></label>
                        <label>: <span id="c-complain"></span></label>
                    </div>
                    <div class="form-group" id="">
                        <label><?=$this->lang->line('date')?></label>
                        <label>: <span id="c-date"></span></label>
                    </div>
                    <div class="form-group" id="">
                        <label><?=$this->lang->line('subject')?></label>
                        <label>: <span id="c-subject"></span></label>
                    </div>
                    <div class="form-group" id="">
                        <label><?=$this->lang->line('description')?></label>
                        <label>: <span id="c-des"></span></label>
                    </div>
                    <div>
                        <label><?=$this->lang->line('attachment')?></label>
                        <label>: <span id="c-attachment"></span></label>
                    </div>
                </div>
                <div class="modal-footer" id="s-btn">
                    <button type="submit" class="btn btn-primary"><?=$this->lang->line('save')?> </button>
                </div>
            </div>
            <input type="hidden" name="type" id="type" value="consultation">
            <input type="hidden" name="id" id="id" value="">
        </form>
    </div>
</div>

<script type="text/javascript">
$(function () {

    //getMenuDataTable();
    $('#table').dataTable();

    getLanguage();

    getLawyerList();
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