<footer class="main-footer">
    <strong><?=$this->lang->line('website')?>. <?=$this->lang->line('copyright')?>
</footer>
<form method="post" id="excel_form" action="<?=ADMIN_BASE_URL?>index.php?welcome/excelDownload">
    <div id="excel_download_params">

    </div>
</form>
</div><!-- ./wrapper -->

<script>
    var ADMIN_BASE_URL = '<?=ADMIN_BASE_URL?>';
</script>

<!-- jQuery UI 1.11.2 -->
<script src="<?=ADMIN_BASE_URL?>plugins/jQueryUI/jquery-ui-1.11.2.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?=ADMIN_BASE_URL?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="<?=ADMIN_BASE_URL?>plugins/jQuery/raphael-2.1.0.min.js"></script>
<script src="<?=ADMIN_BASE_URL?>plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?=ADMIN_BASE_URL?>plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?=ADMIN_BASE_URL?>dist/js/app.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?=ADMIN_BASE_URL?>plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?=ADMIN_BASE_URL?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="<?=ADMIN_BASE_URL?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?=ADMIN_BASE_URL?>plugins/knob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?=ADMIN_BASE_URL?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?=ADMIN_BASE_URL?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=ADMIN_BASE_URL?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- InputMask -->
<script src="<?=ADMIN_BASE_URL?>plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?=ADMIN_BASE_URL?>plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?=ADMIN_BASE_URL?>plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?=ADMIN_BASE_URL?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?=ADMIN_BASE_URL?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?=ADMIN_BASE_URL?>plugins/chartjs/Chart.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?=ADMIN_BASE_URL?>plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?=ADMIN_BASE_URL?>dist/js/app.min.js" type="text/javascript"></script>
<script src="<?=ADMIN_BASE_URL?>dist/js/app.js" type="text/javascript"></script>

<!--<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>-->
<script src="<?=ADMIN_BASE_URL?>plugins/ckeditor/ckeditor.js" type="text/javascript"></script>


<!--<script src="<?/*=ADMIN_BASE_URL*/?>plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?/*=ADMIN_BASE_URL*/?>plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>-->

<script type="text/javascript" src="<?=ADMIN_BASE_URL?>plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=ADMIN_BASE_URL?>plugins/datatables/dataTables.tableTools.js"></script>
<script src="<?=ADMIN_BASE_URL?>plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>


<script src="<?=ADMIN_BASE_URL?>dist/js/jquery.form.js" type="text/javascript"></script>
<script src='<?=ADMIN_BASE_URL?>plugins/custom/app.js'></script>


<script type="text/javascript">
    $(function () {

        CKEDITOR.replace('editor1');

        $(document).ready(function(){

            jQuery('#multiple_upload_form').ajaxForm(function(data){
                var res=JSON.parse(data);
                $('.uploading_none').css('display','block');
                if(res.response==1)
                {
                    $('#upload_img_err').html('');
                    if(res.img!=''){
                        jQuery('#images_preview').append('<span style="float: left;padding-left: 2px;"><a onclick="deleteUploadImage(\''+res.img+'\',this);" href="javascript:;">Delete</a><br><img src="'+res.img+'" style="border:1px solid gray;margin:5px;" width="100px" height="100px"></span>');
                        jQuery('#added_files').append('<input type="hidden" name="added_product_files[]" value="'+res.img+'">');
                        jQuery('#hdn_prev_images').val(1);
                    }
                    $('.uploading_none').css('display','none');
                }
                else
                {
                    $('#upload_img_err').html(res.img);
                    $('.uploading_none').css('display','none');
                }
            });

            function showLoader()
            {
                $('.uploading_none').css('display','block');
            }

        });
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });



    });
</script>

</body>
</html>