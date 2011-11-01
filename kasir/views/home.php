	<div class="form-container" id="frmdash_acc">
		<div class="roller" id="master">
			<div class="grid_3"> &nbsp; </div>
			<div class="grid_3"> 
				<a href="<?php echo site_url('kasir/view_coa');?>">
					<img src= "resources/images/write.png" alt="COA">
				</a>
			</div>
			<div class="grid_3"> 
				<a href="<?php echo site_url('kasir/view_ledger');?>">
					 <img src= "resources/images/number.png" alt="Ledger">
				</a>
			</div>			
			<div class="grid_3" >
				<a href="<?php echo site_url('kasir/view_balance');?>">
					<img src= "resources/images/chart.png" alt="Balance">
				</a>	
			</div>
			<div class="clear"></div>			
		</div>
			<br />
		<div class="roller" id="generate">
			<div class="grid_3"> &nbsp; </div>
			<div class="grid_3"> 
				<a href="<?php echo site_url('kasir/gen_pl');?>">
					<img src= "resources/images/board.png" alt="Profit/Loss">
				</a>
			</div>
			<div class="grid_3"> 
				<a href="<?php echo site_url('kasir/gen_post');?>">
					<img src= "resources/images/spread.png" alt="Posting">
				</a>
			</div>
			<div class="grid_3"> 
				<a href="<?php echo site_url('kasir/gen_closed');?>">
					<img src= "resources/images/report.png" alt="Closing">
				</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>