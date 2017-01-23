<div class="breadcrumbs" xmlns="http://www.w3.org/1999/html">

    <div class="container">

        <h1 class="pull-left"><?=$this->lang->line('dashboard')?></h1>

        <ul class="pull-right breadcrumb">

            <li><a href="<?=BASE_URL?>index.php/Welcome/dashboard/<?php echo $type ;?>"><?=$this->lang->line('dashboard')?></a></li>

            <li class="active"> <?=$this->lang->line('comments')?></li>

        </ul>

    </div><!--/container-->

</div>


<?php 



switch($type)
{
    case "consultation":
    if($this->session->userdata('user_type_id')==3)
    {
        $backURL = "index.php/Welcome/Consultation";
    }
    elseif($this->session->userdata('user_type_id')==2)
    {        
        $backURL = "index.php/Welcome/dashboard";
    }
    break;
        
    case "company":
    $backURL ="index.php/Welcome/establishCompany";
    break;
    
    case "contract-writing":
    $backURL ="index.php/Welcome/contractWriting";
    break;
    
    case "appeal":
    $backURL ="index.php/Welcome/appeal";
    break;
    
    default:
    $backURL ="index.php/Welcome/profile";
    break;
    
}



?>
<!--=== Profile ===-->

<div class="container content profile">

    <div class="row">

        <!--Left Sidebar-->


        <?php $this->load->view('user_menu'); ?>


        <!--End Left Sidebar-->
        <div class="col-md-9">
        <a href="<?=BASE_URL?><?=$backURL?>" class="btn-u pull-left" >Back</a>
        <br/><br/>
        </div>
        <!-- Profile Content -->

        <div class="col-md-9">
            <div class="profile-body <?php if($this->session->userdata('language_id')!=1){ echo "rtl"; } ?>">
                
                <h4>The item is either deleted or does not exist!!</h4>


            </div>


        </div>

        <!-- End Profile Content -->

    </div>

</div><!--/container-->




<!--=== End Profile ===-->
