<div class="form-container" id="frmdash_apt">
	<div class="roller" id="master">
<?php
	//$this->load->model(array('aptmodel'));
	//$loadme = $this->aptmodel->get_inventory();
/*	$i =1;
	foreach ($loadme->result()as $newarr) {
		print "<div class='grid_3' id='head'><b> " . $i;						
		foreach($newarr as $key => $value){
			print "</b><div class='grid_4' id='detail'>" .$key . "          =  " . $value . "</div>";
		}
		print "</div> <div class='clear'></div>";
		$i++;
	}		

		$this->aptmodel->getfordet();
		if ($this->flexigrid->init_json_build($detail['record_count'])){						
				//Add records
	    foreach ($detail['records']->result() as $detail) {
				$records_items = array(
	  				$detail->id,
	  				$detail->invetory_code,
	  				$detail->invetory_name,
	  				$detail->invetory_qty,
	  				$detail->invetory_baseprice,
	  				$detail->invetory_total );					 
				$this->flexigrid->json_add_item($records_item);
			}
			$this->flexigrid->json_add_item();
		}
		$this->output->set_header($this->config->item('json_header'));
		$this->output->set_output($this->flexigrid->json_build); 
*/	?>
		<?echo $js_grid;?>
	<table id="grid" style="display:none"></table>	
	</div>
</div>