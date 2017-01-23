<!--=== Footer Version 1 ===-->

<div class="footer-v1">

    <!--<div class="footer">

        <div class="container">

            <div class="row">



                <div class="col-md-3 md-margin-bottom-40">

                    <a href="<?/*=BASE_URL*/?>"><img id="logo-footer" class="footer-logo" src="<?/*=BASE_URL*/?>assets/img/logo2-default.png" alt=""></a>

                    <p>Almurafaat The largest and most dynamic non-affiliated law firm in the Middle East with 16 offices across 9 countries and comprising 330 Fee Earners. </p>

                </div>

                <div class="col-md-3 md-margin-bottom-40">

                    <div class="posts">

                        <div class="headline"><h2>Latest Updates</h2></div>

                        <ul class="list-unstyled latest-list">

                            <li>

                                <a href="#">Legal implications In technology and cyber stalking</a>

                                <small>April 13, 2016</small>

                            </li>

                            <li>

                                <a href="#">Israel Supreme Court Rules Against Offshore-Gas Deal </a>

                                <small>April 13, 2016</small>

                            </li>

                            <li>

                                <a href="#">Corporate Law Firm Billing Rates Rise Despite Weak Demand </a>

                                <small>April 13, 2016</small>

                            </li>

                        </ul>

                    </div>

                </div>


                <div class="col-md-3 md-margin-bottom-40">

                    <div class="headline"><h2>QUICK LINKS</h2></div>

                    <ul class="list-unstyled link-list">



                        <li><a href="#">Home</a><i class="fa fa-angle-right"></i></li>

                        <li><a href="#">The Firm</a><i class="fa fa-angle-right"></i></li>

                        <li><a href="#">Our Practice</a><i class="fa fa-angle-right"></i></li>

                        <li><a href="#">Our Team</a><i class="fa fa-angle-right"></i></li>

                        <li><a href="#">Articles</a><i class="fa fa-angle-right"></i></li>

                        <li><a href="#">Documents</a><i class="fa fa-angle-right"></i></li>

                        <li><a href="#">Contact Us</a><i class="fa fa-angle-right"></i></li>

                    </ul>

                </div>







                <div class="col-md-3 map-img md-margin-bottom-40">

                    <div class="headline"><h2>Contact Us</h2></div>

                    <address class="md-margin-bottom-40">

                        Riyadh ZIP code 11573 , PO Box 52977 King Abdulaziz district of Salah al - Din road against the field Mosque (Qasr al - Hariri) <br />

                        California, US <br />

                        Phone: 01/4550844, 01/4944018 <br />

                        Fax:  01/4503187 <br />

                        Email: <a href="mailto:info@almurafaat.com" class="">info@almurafaat.com</a>

                    </address>

                </div>

            </div>

        </div>

    </div>--><!--/footer-->



    <div class="copyright">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <p>

                        2016 &copy; www.lawm.sa. All Rights Reserved.

                    </p>

                </div>



                <!-- Social Links -->

                <div class="col-md-6">

                    <!--<ul class="footer-socials list-inline">

                        <li>

                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">

                                <i class="fa fa-facebook"></i>

                            </a>

                        </li>

                        <li>

                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">

                                <i class="fa fa-skype"></i>

                            </a>

                        </li>

                        <li>

                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">

                                <i class="fa fa-google-plus"></i>

                            </a>

                        </li>

                        <li>

                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">

                                <i class="fa fa-linkedin"></i>

                            </a>

                        </li>

                        <li>

                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">

                                <i class="fa fa-pinterest"></i>

                            </a>

                        </li>

                        <li>

                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">

                                <i class="fa fa-twitter"></i>

                            </a>

                        </li>

                        <li>

                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">

                                <i class="fa fa-dribbble"></i>

                            </a>

                        </li>

                    </ul>-->

                </div>

                <!-- End Social Links -->

            </div>

        </div>

    </div><!--/copyright-->

</div>

<!--=== End Footer Version 1 ===-->

</div><!--/End Wrapepr-->

<div class="modal fade" id="Changeprofilepic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabel4">Change Profile Pic</h4>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">



                        <div class="table-search-v1">

                            <div class="table-responsive">
                                <form id="change_profile_pic" method="post" action="<?=BASE_URL?>index.php/Welcome/changeProfilePic" enctype="multipart/form-data">
                                    <table class="table table-hover table-bordered table-striped">

                                        <tbody>

                                        <tr>

                                            <td>

                                                Select Profile Pic:

                                            </td>

                                            <td class="td-width"> <input class="" name="profile_pic" id="profile_pic" type="file" />
                                                <br>
                                                <span class="err" id="profile_pic_err"></span>
                                            </td>



                                        </tr>







                                        </tbody>

                                    </table>
                                </form>
                            </div>

                        </div>
                        
                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>

                <button type="button" onclick="uploadProfilePic()" class="btn-u btn-u-primary">Upload</button>

            </div>

        </div>

    </div>

</div>

<div class="modal " id="close-con" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">
        
        <form id="close-consult" method="POST" action="<?=BASE_URL?>index.php/Welcome/closeConsult" enctype="multipart/form-data">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabel4"></h4>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-search-v1">

                            <div class="table-responsive">
                                
                                    <div>
                                        <table class="table table-bordered ">
                                            <tbody>
                                            <tr>
                                                <td align="right">
                                                    Lawyer Rating:
                                                </td>
                                                <td align="left">
                                                    <div class="basic" data-average="0" data-id="1" style="float: left;margin-top: 0px;"></div><span style="padding-left: 10px;" id="rating_response"></span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="ref_type" id="ref_type" value="">
                                        <input type="hidden" name="ref_id" id="ref_id" value="">
                                        <input type="hidden" name="cur_rating"  id="cur_rating" value="">
                                        <input type="hidden" name="uri"  id="uri" value="<?=$_SERVER['REQUEST_URI']?>">
                                    </div>
                                
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Cancel</button>

                <input type="submit" class="btn-u btn-u-primary" value="Close Case" />

            </div>

        </form>
            
        </div>

    </div>

</div>

<div class="modal fade" id="view_module" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabel4"></h4>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-search-v1">

                            <div class="table-responsive">
                                <div class="" style="width: 550px;margin: 0 auto;" id="content">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- JS Global Compulsory -->

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/jquery/jquery-migrate.min.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/back-to-top.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/smoothScroll.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/layer-slider/layerslider/js/greensock.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/layer-slider/layerslider/js/layerslider.transitions.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/layer-slider/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/counter/waypoints.min.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/counter/jquery.counterup.min.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>


<!-- JS Customization -->

<script type="text/javascript" src="<?=BASE_URL?>assets/js/custom.js"></script>

<!-- Flex Carousel JS -->

<script type="text/javascript" src="<?=BASE_URL?>assets/js/plugins/js/jquery.flashblue-plugins.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/js/plugins/js/jquery.flex-carousel.js"></script>

<!-- JS Page Level -->

<script type="text/javascript" src="<?=BASE_URL?>assets/js/app.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/js/plugins/datepicker.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/js/plugins/layer-slider.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/js/plugins/style-switcher.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/js/plugins/owl-carousel.js"></script>

<script type="text/javascript" src="<?=BASE_URL?>assets/js/plugins/owl-recent-works.js"></script>
<script type="text/javascript" src="<?=BASE_URL?>assets/js/jRating.jquery.js"></script>

<script type="text/javascript">

    jQuery(document).ready(function() {

        App.init();

        LayerSlider.initLayerSlider();

        StyleSwitcher.initStyleSwitcher();

        OwlCarousel.initOwlCarousel();

        OwlRecentWorks.initOwlRecentWorksV2();

    });



    $(".team-showcase-carousel").flexCarousel({

        responsiveMode:"itemWidthRange",

        itemWidthRange:[180, 180]

    });



    $(".logo-showcase-gray").flexCarousel({

        showItems:5,

        responsiveMode:"itemWidthRange",

        itemWidthRange:[200, 210],

        interval:3000,

        autoPlay:true,

        pagination:false

    });

</script>

<!--[if lt IE 9]>

<script src="<?=BASE_URL?>assets/plugins/respond.js"></script>

<script src="<?=BASE_URL?>assets/plugins/html5shiv.js"></script>

<script src="<?=BASE_URL?>assets/plugins/placeholder-IE-fixes.js"></script>

<![endif]-->
<script type="text/javascript">

    $(document).ready(function(){

        $('input[type="radio"]').click(function(){

            if($(this).attr("value")=="3"){

                $(".box").not(".user").hide();

                $(".user").show();

                $('.user_type_id').val($(this).attr("value"));
            }

            if($(this).attr("value")=="2"){

                $(".box").not(".lawyer").hide();

                $(".lawyer").show();

                $('.user_type_id').val($(this).attr("value"));
            }

            if($(this).attr("value")=="blue"){

                $(".box").not(".blue").hide();

                $(".blue").show();

            }



        });

    });

    $('#date').datepicker({
        dateFormat: 'dd-mm-yy',
        prevText: '<i class="fa fa-angle-left"></i>',
        nextText: '<i class="fa fa-angle-right"></i>'
    });

    //rating js initialization
    $('.basic').jRating({
        step:true,
        length : 5
    });

    $('.basic1').jRating({
        step:true,
        length : 5,
        isDisabled:true
    });

    <?php
        if($menu=='home'){
                //$menu = $this->Mwelcome->getMenu(array('language_id' => $this->session->userdata('language_id')));
                if(!empty($menu)){ ?>
        //getContent('<?=$menu[0]['id_menu']?>');
    <?php  } } else if(isset($menu_id)){ ?>
        $('.navbar-nav li').removeClass('active');
        $('.'+'<?=$this->Mwelcome->decode($menu_id)?>').parent().addClass('active');
        //getContent('<?=$this->Mwelcome->decode($menu_id)?>');
    <?php } ?>

</script>

</body>

</html>