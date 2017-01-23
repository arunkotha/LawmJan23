<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$this->lang->line('dashboard')?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('home')?></a></li>
            <li class="active"><?=$this->lang->line('dashboard')?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-balance-scale"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?=$this->lang->line('consultation')?></span>
                        <span class="info-box-number"><?=$service_count[0]['consultation_count']?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-pencil-square-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?=$this->lang->line('contract_writing')?> </span>
                        <span class="info-box-number"><?=$service_count[0]['contract_writing_count']?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-building-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?=$this->lang->line('establish_a_company')?></span>
                        <span class="info-box-number"><?=$service_count[0]['company_count']?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-gavel"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?=$this->lang->line('appeal')?></span>
                        <span class="info-box-number"><?=$service_count[0]['appeal_count']?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?=$this->lang->line('monthly_recap_report')?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">
                                    <strong>Jan, <?=date('Y')?> - Dec, <?=date('Y')?></strong>
                                </p>
                                <div class="chart-responsive">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" height="180"></canvas>
                                </div><!-- /.chart-responsive -->
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- ./box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header" id="consultation_c"></h5>
                                    <span style="color:#EC7063" class="description-text"><b><?=$this->lang->line('consultation')?></b></span>
                                </div><!-- /.description-block -->
                            </div><!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header" id="contract_writing_c"></h5>
                                    <span style="color:#AF7AC5" class="description-text"><b><?=$this->lang->line('contract_writing')?> </b></span>
                                </div><!-- /.description-block -->
                            </div><!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header" id="company_c"></h5>
                                    <span style="color:#48C9B0" class="description-text"><b><?=$this->lang->line('establish_a_company')?> </b></span>
                                </div><!-- /.description-block -->
                            </div><!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block">
                                    <h5 class="description-header" id="appeal_c"></h5>
                                    <span style="color:#F0B27A" class="description-text"><b><?=$this->lang->line('appeal')?></b></span>
                                </div><!-- /.description-block -->
                            </div>
                        </div><!-- /.row -->
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-balance-scale"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?=$this->lang->line('consultation')?></span>
                        <span class="info-box-number"><small><i class="fa fa-inr"></i></small> <?=$service_amount[0]['consultation_amount']?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-pencil-square-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?=$this->lang->line('contract_writing')?> </span>
                        <span class="info-box-number"><small><i class="fa fa-inr"></i></small> <?=$service_amount[0]['contract_writing_amount']?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-building-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?=$this->lang->line('establish_a_company')?></span>
                        <span class="info-box-number"><small><i class="fa fa-inr"></i></small> <?=$service_amount[0]['company_amount']?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-gavel"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?=$this->lang->line('appeal')?></span>
                        <span class="info-box-number"><small><i class="fa fa-inr"></i></small> <?=$service_amount[0]['appeal_amount']?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- jQuery 2.1.3 -->
<script src="<?=ADMIN_BASE_URL?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?=ADMIN_BASE_URL?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?=ADMIN_BASE_URL?>plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?=ADMIN_BASE_URL?>dist/js/app.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?=ADMIN_BASE_URL?>plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?=ADMIN_BASE_URL?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="<?=ADMIN_BASE_URL?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?=ADMIN_BASE_URL?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?=ADMIN_BASE_URL?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?=ADMIN_BASE_URL?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?=ADMIN_BASE_URL?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?=ADMIN_BASE_URL?>plugins/chartjs/Chart.min.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?/*=ADMIN_BASE_URL*/?>dist/js/pages/dashboard2.js" type="text/javascript"></script>-->

<!-- AdminLTE for demo purposes -->
<!--<script src="<?/*=ADMIN_BASE_URL*/?>dist/js/demo.js" type="text/javascript"></script>-->

<script>
    var ADMIN_BASE_URL = '<?=ADMIN_BASE_URL?>';
    $(function () {
        $.ajax({
            async: true,
            type: 'POST',
            url: ADMIN_BASE_URL + 'index.php?welcome/getServiceCountMonthlyReport/',
            data: {},
            dataType: 'json',
            success: function (res) {
               if(res.responce==1){
                   var data = res.data;
                   $('#consultation_c').text(arraySum(data.consultation));
                   $('#contract_writing_c').text(arraySum(data.contract_writing));
                   $('#company_c').text(arraySum(data.company));
                   $('#appeal_c').text(arraySum(data.appeal));
                   var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
                   var salesChart = new Chart(salesChartCanvas);

                   var salesChartData = {
                       labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                       datasets: [
                           {
                               label: "Consultation",
                               fillColor: "rgba(236, 112, 99,0.9)",
                               strokeColor: "rgba(236, 112, 99,0.8)",
                               pointColor: "rgba(236, 112, 99, 1)",
                               pointStrokeColor: "#EC7063",
                               pointHighlightFill: "#fff",
                               pointHighlightStroke: "rgba(236, 112, 99, 1)",
                               data: data.consultation
                           },
                           {
                               label: "Contract writing",
                               fillColor: "rgba(175, 122, 197,0.9)",
                               strokeColor: "rgba(175, 122, 197,0.8)",
                               pointColor: "#AF7AC5",
                               pointStrokeColor: "rgba(175, 122, 197,1)",
                               pointHighlightFill: "#fff",
                               pointHighlightStroke: "rgba(175, 122, 197,1)",
                               data: data.contract_writing
                           },
                           {
                               label: "Establish a company",
                               fillColor: "rgba(72, 201, 176,0.9)",
                               strokeColor: "rgba(72, 201, 176,0.8)",
                               pointColor: "#48C9B0",
                               pointStrokeColor: "rgba(72, 201, 176,1)",
                               pointHighlightFill: "#fff",
                               pointHighlightStroke: "rgba(72, 201, 176,1)",
                               data: data.company
                           },
                           {
                               label: "Appeal",
                               fillColor: "rgba(240, 178, 122,0.9)",
                               strokeColor: "rgba(240, 178, 122,0.8)",
                               pointColor: "#F0B27A",
                               pointStrokeColor: "rgba(240, 178, 122,1)",
                               pointHighlightFill: "#fff",
                               pointHighlightStroke: "rgba(240, 178, 122,1)",
                               data: data.appeal
                           }
                       ]
                   };

                   var salesChartOptions = {
                       //Boolean - If we should show the scale at all
                       showScale: true,
                       //Boolean - Whether grid lines are shown across the chart
                       scaleShowGridLines: false,
                       //String - Colour of the grid lines
                       scaleGridLineColor: "rgba(0,0,0,.05)",
                       //Number - Width of the grid lines
                       scaleGridLineWidth: 1,
                       //Boolean - Whether to show horizontal lines (except X axis)
                       scaleShowHorizontalLines: true,
                       //Boolean - Whether to show vertical lines (except Y axis)
                       scaleShowVerticalLines: true,
                       //Boolean - Whether the line is curved between points
                       bezierCurve: true,
                       //Number - Tension of the bezier curve between points
                       bezierCurveTension: 0.3,
                       //Boolean - Whether to show a dot for each point
                       pointDot: false,
                       //Number - Radius of each point dot in pixels
                       pointDotRadius: 4,
                       //Number - Pixel width of point dot stroke
                       pointDotStrokeWidth: 1,
                       //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                       pointHitDetectionRadius: 20,
                       //Boolean - Whether to show a stroke for datasets
                       datasetStroke: true,
                       //Number - Pixel width of dataset stroke
                       datasetStrokeWidth: 2,
                       //Boolean - Whether to fill the dataset with a color
                       datasetFill: true,
                       //String - A legend template
                       legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
                       //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                       maintainAspectRatio: false,
                       //Boolean - whether to make the chart responsive to window resizing
                       responsive: true
                   };

                   //Create the line chart
                   salesChart.Line(salesChartData, salesChartOptions);

               }
            }
        });
    }(jQuery));

    function arraySum(someArray)
    {
        var someArray = $.map(someArray, function(value, index) {
            return [value];
        });

        var total = 0;
        for (var i = 1; i < someArray.length; i++) {
            total = parseInt(parseInt(total)+parseInt(someArray[i]));
        }
        return total;
    }
</script>