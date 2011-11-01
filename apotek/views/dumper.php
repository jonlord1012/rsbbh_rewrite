<div class="form-container" id="frmdash_apt">
	<div class="roller" id="master">
<?php
	$this->load->model(array('aptmodel'));
	$loadme = $this->aptmodel->get_unit();
	foreach ($loadme->result()as $newarr) {
		foreach($newarr as $key => $value){
			print $key . "          =  " . $value . "<br />";
		}
	}		
?> 
	</div>
</div>