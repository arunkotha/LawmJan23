
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">

<div class="row">

    <div style="float: right; height: 35px; margin: 0px 30px 11px 0px; width: 150px;">
        <button onclick="" class="btn btn-primary" data-toggle="modal" data-target="#myModal" ><?=$this->lang->line('add_lawyer_amount')?></button>
    </div>

<div class="col-xs-12">

<div class="box">

<div class="box-header">

    <h3 class="box-title"><?=$this->lang->line('lawyer_amount')?> :</h3>
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

    <th><?=$this->lang->line('experience')?></th>
    <th><?=$this->lang->line('amount')?></th>
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
            <form method="post" action="<?=ADMIN_BASE_URL?>index.php?welcome/addLawyerAmount" enctype="multipart/form-data" onsubmit="return validLawyerAmount(this);" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body nav-tabs-custom" id="model-body">

                        <div class="form-group" id="">
                            <label><?=$this->lang->line('experience')?></label>
                            <select class="form-control" name="experience" id="experience" required>
                                <option value="">Select Experience</option>
                                <?php for($s=1;$s<=20;$s++){ ?>
                                    <option value="<?=$s?>"><?=$s?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group" id="">
                            <label><?=$this->lang->line('amount')?></label>
                            <input type="text" class="form-control" name="lawyer_amount" id="lawyer_amount" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="<?=$this->lang->line('save')?>" />
                    </div>
                    <input type="hidden" name="id_lawyer_amount" id="id_lawyer_amount">
                </div>
            </form>
        </div>
    </div>


</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script type="text/javascript">
$(function () {

    getLawyerAmountList();
    //getLawyerList();

});

function getLawyerList()
{
    var html = '';
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php/welcome/getLawyerList',
        data: {},
        dataType: 'json',
        success:function(res){
            var html = '';
            //res = eval(res);
            var res = res.data;
            for(var s=0;s<res.length;s++)
            {
                html+='<option value="'+res[s].id_user+'">'+res[s].experience+'</option>'
            }
            $('#lawyer_id').html(html)
        }
    });
}
</script>