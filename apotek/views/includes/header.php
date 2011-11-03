<?php
/**
 * header.php
 * Common page header
 */
?>
<?php echo doctype('xhtml1-trans');?>
<html>
<head>
  <meta content="text/html; charset=utf-8" equiv="Content-Type" />
  <?php load_css('reset');?>
  <?php load_css('text');?>
  <?php load_css('960_12_col');?>
  <?php load_css('ss-ijo/jquery-ui-1.8.16.custom');?>
  <?php load_css('flexigrid');?>
	<?php load_css('style');?>  
  <?php load_javascript('jquery-1.6.4');?>
  <?php load_javascript('jquery-ui-1.8.16.custom.min');?>
  <?php load_javascript('jquery.validate');?>
  <?php load_javascript('flexigrid.pack');?>  
  <?php load_javascript('general');?>  
	<?php if (isset($extraHeadContent)){ load_javascript($extraHeadContent);}?>
	<title><?php echo $page_title;?></title>
</head>
<body class="<?php echo $page_title;?>" <?php if(isset($extraBodyLoad)){echo $extraBodyLoad ;}?>>
<div id="wrap" class="container_12">
  <div id="header">
    <?php $this->load->view('menus/default');?>

    <div class="clear"></div>
  </div><!-- #header -->
