<div class="inner">
  <h3>Input Resep</h3>
  <div class="form-container">    
    <?php if ($err = validation_errors()): ?>
      <div class="error_message">
        <?php echo $err;?>
      </div>
    <?php elseif ($form_validate): ?>
      <div class="success_message">
        <p>Resep Tersimpan</p>
      </div>
    <?php endif;?>
    <?php echo form_open('apotek/add_new' ,array('id' => 'add-resephead'));?>
    <div class="roller">
        <div class="grid_2">
        	<label for="rcphead_no">No Resep </label>
        </div>
        <div class="grid_2">
        	<?php echo form_input("rcphead_no") ;?>
        </div>
        <div class="grid_2">
        	<label for="rcphead_date">Tanggal Resep </label>
        </div>
        <div class="grid_2">
        	<input type="text" name="rcphead_date" class="date-control" id="rcphead_date" />  
        </div>
       	<div class="clear"></div>        
    </div>        
    <div class="roller">
    		<div class="grid_2">
    			<label for="rcphead_flag">Jenis Transaksi</label> 
    		</div>
    		<div class="grid_2">
    			<?php echo form_dropdown('rcphead_flag', array('Rawat Inap', 'Rawat Jalan', 'Luar', 'NonResep' ), 'Rawat Jalan');?>
    		</div>
        <div class="grid_2">
        	<label for="rcphead_status">Status </label>
        </div>
        <div class="grid_2">
        	<input type= 'text' id='rcphead_status' value="<?php echo (!empty($rcphead_status))? $rcphead_status:'' ;?>" disabled /> 
        </div>
        <div class="clear"></div>    	
    </div>    
    <div class="roller">
    	<div class="grid_2">
    		<label for="rcphead_pasienid">RM No</label>    		
    	</div>
    	<div class="grid_2">
    		<input type="text" id="rcphead_pasienid" value="<?php echo (!empty($rcphead_pasienid))? $rcphead_pasienid:'';?>" />
    		<input class="willbehidden" type="text" id="rcphead_psname" value="<?php echo (!empty($rcphead_psname))? $rcphead_psname: '' ;?> "
    	</div>
    	<div class="grid_2">
    		<label for="rcphead_paytype">Cara Bayar</label>
    	</div>
    	<div class="grid_2">
    		<?php echo form_dropdown('rcphead_paytype', array('Umum', 'Asuransi', 'Karyawan', 'Lain-Lain' ), 'Umum');?>
    	</div>
    	<div class="clear"></div>    	
    </div>    
    <div class="roller">
    	<div class="grid_2">    		
    		<input class="willbehidden" type="text" id="rcphead_roomid" value="<?php echo (!empty($rcphead_roomid))? $rcphead_roomid:'' ; ?>" />
    	</div>
    	<div class="clear"></div>
    </div>    
    <div class="container_12" id="rcpdet">
    	<div class="detail_obat">
    			<div class="detail_obat">
    			<label for="rcpdet_invcode" class="label">Kode Barang</label>
    			<!--<input type="text" class="txt_big" id="rcpdet_invcode" value="<?php echo (!empty($rcpdet_invcode))? $rcpdet_invcode : '' ;?>" />
-->				<?php
						$propertyid= array(
							'id'=>'invid',
							'name'=>'invid',							
							'maxlength'=>'11',							
							'size'=> '10'							
							 );
						echo form_input($propertyid);
					?>					
    			<input type="hidden" class="willbehidden" id="rcpdet_invid" />
    			<input type="hidden" class="willbehidden" id="rcpdet_baseprice" />    			
    			<label for="rcpdet_qty" class="label">Quantity</label>
    			<input type="text" class="txt_small" id="rcpdet_qty" value="<?php echo (!empty($rcpdet_qty))? $rcpdet_qty: '0' ;?>"/>
    			<label for="rcpdet_dosis" class="label">Dosis </label>
    			<input type="text" class="txt_small" id="rcpdet_dosis" value="<?php echo(!empty($rcpdet_dosis))? $rcpdet_dosis: '1x1' ;?>" />
    			<label for="rcpdet_ket" class="label">Keterangan Minum</label>
    			<input type="text" class="txt_big" id="rcpdet_ket" value="<?php echo (!empty($rcpdet_ket))? $rcpdet_ket: '';?>" />    		
<!--    		<input type="text" id="rcpdet_baseprice" value="<?php echo (!empty($rcpdet_baseprice))? $rcpdet_baseprice : '0' ;?>" />
-->			<?php echo form_submit('Submit', 'Tambah');?>
				<div class="clear"></div>
        <div id="result"></div>
    	</div>
    </div>
    
		<div class="container_12" id="grid_detail">
			<?php echo $js_grid ;?>			
			<table id="grid" style="display:none"></table>
			<div class="clear"></div>
		</div>
    <div class="roller">
    	<?php echo form_submit('Submit', 'Submit');?>
    </div>
    <?php echo form_close();?>
    <script type="text/javascript">
    $('#add-resephead').validate();
    </script>    
  </div>
</div>
