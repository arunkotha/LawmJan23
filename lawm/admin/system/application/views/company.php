
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

    <h3 class="box-title"><?=$this->lang->line('establish_company')?>:</h3>
</div><!-- /.box-header -->
<div class="box-body">
    <div style="width: 150px;text-align: right;float: right;">
        <input type="button" class="btn" value="Excel Download" onclick="getExcelDownload('company')">
    </div>
<table id="table" class="table table-bordered table-hover">
<thead>
<tr>
    <th><?=$this->lang->line('case_id')?></th>
    <th><?=$this->lang->line('user')?></th>
    <th><?=$this->lang->line('lawyer')?></th>
    <th><?=$this->lang->line('user')?></th>
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
        <td><?=$consultation_data[$s]['lawyer_experience']?></td>
        <td><?=date('d-m-Y',strtotime($consultation_data[$s]['created_date_time']))?></td>
        <td><?=$consultation_data[$s]['status']?></td>
        <td><div class="mod-more tooltipsample actions">
                <a id="edit" onclick="getServiceData(<?=$consultation_data[$s]['id_company']?>,'company')" title="edit" data-toggle="modal" data-target="#myModal1" class="edit" href="javascript:;"><span class="circle"><i class="fa fa-pencil"></i></span></a></a>
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
                    <h4 class="modal-title" id="myModalLabel"><?=$this->lang->line('edit_establish_company')?></h4>
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
                        <label><?=$this->lang->line('lawyer')?></label>
                        <label id="lawyer_id_label">: <span id="c-lawyer" name="c-lawyer"></span></label>
                        <select class="form-control" name="lawyer_id" id="lawyer_id" required>

                        </select>

                    </div>

                    <div class="form-group" id="">
                        <label><?=$this->lang->line('experience')?></label>
                        <label>: <span id="c-exp"></span></label>
                    </div>
                    <div class="form-group" id="">
                        <label><?=$this->lang->line('partners')?></label>
                        <label>: <span id="c-partner"></span></label>
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
            <input type="hidden" name="type" id="type" value="company">
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




</script>