<!--=== Breadcrumbs ===-->

<div class="breadcrumbs">

    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('signin')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>"><?=$this->lang->line('home')?></a></li>

            <li class="active"><?=$this->lang->line('signin')?></li>

        </ul>

    </div><!--/container-->

</div><!--/breadcrumbs-->

<!--=== End Breadcrumbs ===-->



<!--=== Content Part ===-->

<div class="container content">

    <div class="row">

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

            <form  class="reg-page" method="post" action="<?=BASE_URL?>index.php/Welcome/makeLogin" onsubmit="return validLogin(this);">
                <p class="err"><?php if($this->session->userdata('message')){ echo $this->session->userdata('message'); $this->session->unset_userdata('message');  } ?></p>
                <div class="reg-header">

                    <h2><?=$this->lang->line('signin_your_acc')?></h2>

                </div>




                <div class="row">

                    

                    <div class="col-md-6">

                    <a href="<?=BASE_URL?>index.php/Welcome/userLogin" class="btn-u pull-left" type="submit" value="Login as User">User</a>
                    <a href="<?=BASE_URL?>index.php/Welcome/lawyerLogin" class="btn-u pull-right" type="submit" value="Login as Lawyer">Lawyer</a>


                    </div>

                </div>








            </form>

        </div>

    </div><!--/row-->

</div><!--/container-->

<!--=== End Content Part ===-->
