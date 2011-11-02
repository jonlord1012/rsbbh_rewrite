<?php // view for add new factory?>
<div class="inner">
  <h3>Add new supplier</h3>
  <div class="form-container">
    <?php if ($err = validation_errors()): ?>
      <div class="error_message">
        <?php echo $err;?>
      </div>
    <?php elseif ($form_validate): ?>
      <div class="success_message">
        <p>New factory added successfully.</p>
      </div>
    <?php endif;?>
    <?php echo form_open('supplier/add_new', array('id' => 'add-supplier'));?>
    <div class="roller">
      <div class="grid_2"><label for="factory_id">Factory Code</label></div>
      <div class="grid_2"><input type="text" class="required" name="factory_code" value="<?php if(!$db_status) echo set_value('factory_code');?>"/></div>
      <div class="grid_2"><label for="factory_name">Factory Name</label></div>
      <div class="grid_2"><input type="text" name="factory_name" class="required" name="factory_name" value="<?php if (!$db_status) echo set_value('factory_name');?>"/></div>
      <div class="clear"></div>
    </div>
    <div class="roller">
      <div class="grid_2"><label for="factory_address">Address</label></div>
      <div class="grid_10"><textarea name="factory_address" class="required"><?php if (!$db_status) echo set_value('factory_address');?></textarea></div>
      <div class="clear"></div>
    </div>
    <div class="roller">
      <div class="grid_2"><label for="factory_phone">Phone</label></div>
      <div class="grid_2"><input type="text" name="factory_phone" class="required" value="<?php if (!$db_status) echo set_value('factory_phone');?>"/></div>
      <div class="grid_2"><label for="factory_isactive">Active?</label></div>
      <div class="grid_2">
        <select name="factory_isactive">
          <option value="Yes" selected="selected">Yes</option>
          <option value="No">No</option>
        </select>
      </div>
      <div class="clear"></div>
    </div><!-- .roller -->
    <div class="roller">
      <div class="grid_2"><?php echo form_submit('Submit', 'Submit');?></div>
      <div class="clear"></div>
    </div>
    <?php echo form_close();?>
    <script type="text/javascript">
    $('#add-supplier').validate();
    </script>
  </div><!-- .form-container -->
</div><!-- .inner -->