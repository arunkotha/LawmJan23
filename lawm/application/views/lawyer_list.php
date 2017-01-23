<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>

<div class="breadcrumbs">

    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('dashboard')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>index.php/Welcome/lawyers"><?=$this->lang->line('dashboard')?></a></li>

            <li class="active"> <?=$this->lang->line('lawyers')?></li>

        </ul>

    </div><!--/container-->

</div>

<!--=== Profile ===-->

<div class="container content profile s-results">

    <div class="row">

        <!--Left Sidebar-->

        <?php $this->load->view('user_menu'); ?>

        <!--End Left Sidebar-->



        <!-- Profile Content -->

        <div class="col-md-9">

            <div class="col-md-8">

                <h2><?=$this->lang->line('search_again')?></h2>

                <div class="input-group">

                    <input type="text" id="search_lawyer" value="<?=$search_key?>" placeholder="<?=$this->lang->line('search_lawyers')?>" class="form-control">

                    <span class="input-group-btn">

                        <button type="button" onclick="getSearch()" class="btn-u"><i class="fa fa-search"></i></button>

                    </span>

                </div>

            </div>


        <div class="margin-bottom-10"></div>

       <div class="margin-bottom-30"></div>

        <hr>


        <?php for($s=0;$s<count($lawyer_list);$s++){ ?>
            <div class="inner-results newresults">

                <h3><a href="#"><?=$lawyer_list[$s]['username']?></a></h3>

                <img <?php if($this->session->userdata('language_id')!=1){ echo "style='float:right'"; } ?> style="float:middle;" align="middle" class="circleimg" alt="" src="<?php if($lawyer_list[$s]['user_image']!=''){ echo $lawyer_list[$s]['user_image']; } else{ echo BASE_URL.'assets/img/user.jpg'; }?>">

                <span><?=$lawyer_list[$s]['email']?></span>
                <span class="basic1"  data-average="<?=$lawyer_list[$s]['rating']?>" data-id="1"></span>
                    
            </div>
        <?php } ?>
        <div class="margin-bottom-30"></div>

        <hr>

        <div class="text-left">

            <ul class="pagination">

                <?=$pages?>

            </ul>

        </div>



    </div>

    <!-- End Profile Content -->

</div>

</div><!--/container-->

<!--=== End Profile ===-->

<script>
    function getSearch()
    {
        var search_key = $('#search_lawyer').val();
        //search_key = search_key.replace(/[^a-z0-9\s/]/gi, '').replace(/[_\s]/g, '-');
        window.location = BASE_URL+'index.php/Welcome/lawyers/0/'+search_key
    }
</script>