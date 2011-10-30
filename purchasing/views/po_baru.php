<div class="inner">
  <h3>Buat Purchase Order baru</h3>
  <div class="form-container">
    <?php echo form_open('purchase/po_baru');?>
      <div class="roller">
        <div class="grid_2"><label for="purhead_no">Purchase Number</label></div>
        <div class="grid_2"><?php echo form_input('purhead_no', '');?></div>
        <div class="grid_2"><label for="purhead_date">Purchase Date</label></div>
        <div class="grid_2">
          <input type="text" name="purhead_date" class="date-control" id="purhead_date" />
        </div>
        <div class="clear"></div>
      </div><!-- .roller -->
      <div class="roller">
        <div class="grid_2"><label for="purhead_total">Total</label></div>
        <div class="grid_2"><?php echo form_input('purhead_total', '');?></div>
        <div class="grid_2"><label for="purhead_totaldisc">Total Disc</label></div>
        <div class="grid_2"><?php echo form_input('purhead_totaldisc', '');?></div>
        <div class="clear"></div>
      </div><!-- .roller -->
      <div class="roller">
        <div class="grid_2"><label for="purhead_isppn">Is PPN?</label></div>
        <div class="grid_2"><?php echo form_dropdown('purhead_isppn', array('Yes', 'No'), 'Yes');?></div>
        <div class="grid_2"><label for="purhead_grandtotal">Grand Total</label></div>
        <div class="grid_2"><?php echo form_input('purhead_grandtotal', '');?></div>
        <div class="clear"></div>
      </div><!-- .roller -->
      <?php form_hidden('created_user', 'dummy');?>
      <div class="roller">
        <div class="grid_2">
          <?php echo form_submit('Submit', 'Submit');?>
        </div>
        <div class="clear"></div>
      </div>
    <?php echo form_close();?>
  </div>
</div><!-- .inner -->