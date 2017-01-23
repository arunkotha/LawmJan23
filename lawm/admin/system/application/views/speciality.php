
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">

<div class="row">

    <div style="float: right; height: 35px; margin: 0px 30px 11px 0px; width: 150px;">
        <button onclick="" class="btn btn-primary" data-toggle="modal" data-target="#myModal" ><?=$this->lang->line('add_speciality')?> </button>
    </div>

<div class="col-xs-12">

<div class="box">

<div class="box-header">

    <h3 class="box-title"><?=$this->lang->line('speciality')?>:</h3>
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

    <th><?=$this->lang->line('speciality')?></th>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="<?=ADMIN_BASE_URL?>index.php?welcome/addSpeciality" enctype="multipart/form-data" onsubmit="return validSpeciality(this);" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?=$this->lang->line('edit_speciality')?></h4>
                    </div>
                    <div class="modal-body nav-tabs-custom" id="model-body">

                        <div class="form-group" id="">
                            <label><?=$this->lang->line('title')?></label>
                            <input type="text" class="form-control" name="speciality" id="speciality" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?=$this->lang->line('save')?> </button>
                    </div>
                    <input type="hidden" name="id_speciality" id="id_speciality">
                </div>
            </form>
        </div>
    </div>


</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script type="text/javascript">
$(function () {

    getSpecialityList();

});
</script>