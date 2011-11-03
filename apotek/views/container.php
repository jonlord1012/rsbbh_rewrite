<? $this->load->view('includes/header'); ?>
<div class="main-content">
<!--	<div class="inner"> -->
  		<?php  $this->load->view($content);?>
  		<?php /*print_r($fill); */?>
<!--  	</div> -->
	<br />
</div><!-- .main-content -->
<?php $this->load->view('includes/footer');?>