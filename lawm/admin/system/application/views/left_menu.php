
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <!--<img src="<?/*=BASE_URL*/?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />-->
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('user_name'); ?></p>

                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>

        <ul class="sidebar-menu">

            <li class="<?php if($menu=='users'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/users">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('users')?></span>
                </a>
            </li>

            <li class="<?php if($menu=='Lawyers'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/lawyers">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('lawyers')?></span>
                </a>
            </li>

            <li class="<?php if($menu=='menu'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/menu">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('menu')?></span>
                </a>
            </li>

            <!--<li class="<?php /*if($menu=='category'){ echo 'active'; } */?>">
                <a href="<?/*=ADMIN_BASE_URL*/?>index.php?welcome/category">
                    <i class="fa fa-th"></i> <span>Category</span>
                </a>
            </li>-->

            <li class="<?php if($menu=='article'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/article">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('article')?></span>
                </a>
            </li>

            <li class="<?php if($menu=='consultation'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/consultation">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('consultation')?></span>
                </a>
            </li>
            <li class="<?php if($menu=='contentWriting'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/contractWriting ">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('contract_writing')?></span>
                </a>
            </li>
            <li class="<?php if($menu=='company'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/establishCompany">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('establish_a_company')?></span>
                </a>
            </li>
            <li class="<?php if($menu=='appeal'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/appeal">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('appeal')?></span>
                </a>
            </li>
            <li class="<?php if($menu=='forum'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/forum">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('forum')?></span>
                </a>
            </li>
            <li class="<?php if($menu=='speciality'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/speciality">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('speciality')?></span>
                </a>
            </li>
            <li class="<?php if($menu=='consultation_type'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/consultationType">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('consultation_type')?></span>
                </a>
            </li>
            <li class="<?php if($menu=='appeal_type'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/appealType">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('appeal_type')?></span>
                </a>
            </li>
            <li class="<?php if($menu=='lawyer_amount'){ echo 'active'; } ?>">
                <a href="<?=ADMIN_BASE_URL?>index.php?welcome/lawyerAmount">
                    <i class="fa fa-th"></i> <span><?=$this->lang->line('lawyer_amount')?></span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


