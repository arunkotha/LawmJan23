<div class="col-md-3 md-margin-bottom-40" <?php if($this->session->userdata('language_id')!=1){ echo "style='float:right;'"; } else{ echo "style='float:left;'"; } ?>>

    <a href="#" data-target="#Changeprofilepic" data-toggle="modal">
        <img class="img-responsive profile-img margin-bottom-20" src="<?php if($this->session->userdata('user_image')!=''){ echo $this->session->userdata('user_image'); } else { echo BASE_URL.'assets/img/user.jpg'; } ?>" alt="">
    </a>



    <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">

    <!--<li class="list-group-item <?php /*if(isset($menu) && $menu=='overall'){ echo 'active'; } */?> ">

        <a href="<?/*=BASE_URL*/?>index.php/Welcome/dashboard"><i class="fa fa-bar-chart-o"></i>Overall</a>

    </li>-->

    <li class="list-group-item <?php if(isset($menu) && $menu=='profile'){ echo 'active'; } ?> ">

        <a href="<?=BASE_URL?>index.php/Welcome/profile"><i class="fa fa-user"></i><?=$this->lang->line('profile')?></a>

    </li>
<?php if($this->session->userdata('user_type_id')==3){ ?>
    <li class="list-group-item <?php if(isset($menu) && $menu=='consultation'){ echo 'active'; } ?> ">

        <a href="<?=BASE_URL?>index.php/Welcome/consultation"><i class="fa fa-balance-scale" aria-hidden="true"></i><?=$this->lang->line('consultation')?></a>

    </li>

    <li class="list-group-item <?php if(isset($menu) && $menu=='contract_writing'){ echo 'active'; } ?> ">

        <a href="<?=BASE_URL?>index.php/Welcome/contractWriting"><i class="fa fa-pencil-square-o "></i><?=$this->lang->line('contract_writing')?> </a>

    </li>

    <li class="list-group-item <?php if(isset($menu) && $menu=='establish_company'){ echo 'active'; } ?>" >

        <a href="<?=BASE_URL?>index.php/Welcome/establishCompany"><i class="fa fa-registered"></i><?=$this->lang->line('establish_a_company')?></a>

    </li>

    <li class="list-group-item <?php if(isset($menu) && $menu=='appeal'){ echo 'active'; } ?>" >

        <a href="<?=BASE_URL?>index.php/Welcome/appeal"><i class="fa fa-gavel"></i><?=$this->lang->line('appeal')?></a>

    </li>

    <li class="list-group-item <?php if(isset($menu) && $menu=='follow'){ echo 'active'; } ?>">

        <a href="<?=BASE_URL?>index.php/Welcome/follow"><i class="fa fa-twitter" aria-hidden="true"></i><?=$this->lang->line('follow')?></a>

    </li>
<?php } else if($this->session->userdata('user_type_id')==2){ ?>
    <li class="list-group-item <?php if(isset($menu) && $menu=='overall'){ echo 'active'; } ?>">

        <a href="<?=BASE_URL?>index.php/Welcome/dashboard"><i class="fa fa-balance-scale" aria-hidden="true"></i><?=$this->lang->line('consultation')?></a>

    </li>
    <li class="list-group-item <?php if(isset($menu) && $menu=='contract_writing'){ echo 'active'; } ?> ">

        <a href="<?=BASE_URL?>index.php/Welcome/contractWriting"><i class="fa fa-pencil-square-o "></i><?=$this->lang->line('contract_writing')?> </a>

    </li>

    <li class="list-group-item <?php if(isset($menu) && $menu=='establish_company'){ echo 'active'; } ?>" >

        <a href="<?=BASE_URL?>index.php/Welcome/establishCompany"><i class="fa fa-registered"></i><?=$this->lang->line('establish_a_company')?></a>

    </li>

    <li class="list-group-item <?php if(isset($menu) && $menu=='appeal'){ echo 'active'; } ?>" >

        <a href="<?=BASE_URL?>index.php/Welcome/appeal"><i class="fa fa-gavel"></i><?=$this->lang->line('appeal')?></a>

    </li>
    <!--<li class="list-group-item">

        <a href="Statement.html"><i class="fa fa-list-alt "></i>Statement </a>

    </li>-->

    <li class="list-group-item <?php if(isset($menu) && $menu=='lawyer_list'){ echo 'active'; } ?>">

        <a href="<?=BASE_URL?>index.php/Welcome/lawyers"><i class="fa fa-users"></i><?=$this->lang->line('lawyers')?></a>

    </li>

    <!--<li class="list-group-item">

        <a href="followlawyerwithcomment.html"><i class="fa fa-comments"></i>Coments</a>

    </li>-->



    <li class="list-group-item <?php if(isset($menu) && $menu=='forum'){ echo 'active'; } ?>">

        <a href="<?=BASE_URL?>index.php/Welcome/forum"><i class="fa fa-comments" aria-hidden="true"></i><?=$this->lang->line('forum')?></a>

    </li>

<?php } ?>


    </ul>
</div>