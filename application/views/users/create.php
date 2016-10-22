<div>
  <br />

  <?php echo $error; ?>
  <!-- <?php echo validation_errors(); ?> -->
  <?php echo form_open_multipart(site_url('users/create')); ?>

  <div class="form-group">
    <label for="first_name">First Name</label>
    <?php echo form_error('first_name'); ?>
    <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="last_name">Last Name</label>
    <?php echo form_error('last_name'); ?>
    <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="address1">Address</label>
    <?php echo form_error('address1'); ?>
    <input type="text" name="address1" value="<?php echo set_value('address1'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="address2">BLDG No.</label>
    <?php echo form_error('address2'); ?>
    <input type="text" name="address2" value="<?php echo set_value('address2'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="city">City</label>
    <?php echo form_error('city'); ?>
    <input type="text" name="city" value="<?php echo set_value('city'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="state">State</label>
    <?php echo form_error('state'); ?>
    <input type="text" name="state" value="<?php echo set_value('state'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="zipcode">Zipcode</label>
    <?php echo form_error('zipcode'); ?>
    <input type="text" name="zipcode" value="<?php echo set_value('zipcode'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="phone">Phone Number</label>
    <?php echo form_error('phone'); ?>
    <input type="tel" name="phone" value="<?php echo set_value('phone'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="email">E-mail</label>
    <?php echo form_error('email'); ?>
    <input type="email" name="email" value="<?php echo set_value('email'); ?>"/><br />
  </div>

  <div class="form-group">
    <label for="company_name">Company Name</label>
    <?php echo form_error('company_name'); ?>
    <input type="text" name="company_name" value="<?php echo set_value('company_name'); ?>"/><br />
  </div>

  <div class="form-group">
    <label for="company_address">Company Address</label>
    <?php echo form_error('company_address'); ?>
    <input type="text" name="company_address" value="<?php echo set_value('company_address'); ?>"/><br />
  </div>

  <div class="form-group">
    <label for="company_city">Company City</label>
    <?php echo form_error('company_city'); ?>
    <input type="text" name="company_city" value="<?php echo set_value('company_city'); ?>"/><br />
  </div>

  <div class="form-group">
    <label for="company_state">Company State</label>
    <?php echo form_error('company_state'); ?>
    <input type="text" name="company_state" value="<?php echo set_value('company_state'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="company_zipcode">Company Zipcode</label>
    <?php echo form_error('company_zipcode'); ?>
    <input type="text" name="company_zipcode" value="<?php echo set_value('company_zipcode'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="company_phone">Company Phone No.</label>
    <?php echo form_error('company_phone'); ?>
    <input type="tel" name="company_phone" value="<?php echo set_value('company_phone'); ?>" /><br />
  </div>

  <div class="form-group">
    <label for="file">Upload File:</label>
    <form action = "" method = "">
    <?php echo form_error('userfile'); ?>
    <input type="file" name="userfile" required="true"><br /><br />
  </div>

  <input type="submit" name="submit" value="Create a new entry" />

  </form>
</div>
