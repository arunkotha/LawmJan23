<?php if($header!="")$this->load->view($header); ?>
	
<!--   **************** INCLUDE MIDDLE CONTENT HERE **************  -->

<?php
if(isset($left_menu) && $left_menu!="")$this->load->view($left_menu);
if(isset($middle_content) && $middle_content!="")$this->load->view($middle_content);
 //$this->load->view($middle_content);
?>
	<!--   **************** INCLUDE FOOTER HERE **************  -->

<?php if($footer!="")$this->load->view($footer);?>	
