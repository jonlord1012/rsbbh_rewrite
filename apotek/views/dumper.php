<div class="form-container" id="frmdash_apt">
	<div class="roller" id="master">
<?php
	$this->load->model(array('aptmodel'));
	$loadme = $this->aptmodel->get_list_inventory();
	$i =1;
	foreach ($loadme->result()as $newarr) {
		print "<div class='grid_3' id='head'><b> " . $i;						
		foreach($newarr as $key => $value){
			print "</b><div class='grid_4' id='detail'>" .$key . "          =  " . $value . "</div>";
		}
		print "</div> <div class='clear'></div>";
		$i++;
	}		
?> 
	</div>
</div>