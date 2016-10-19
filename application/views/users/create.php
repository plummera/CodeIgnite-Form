<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('users/create'); ?>

<label for="first_name">First Name</label>
<input type="input" name="first_name" /><br />

<label for="last_name">Last Name</label>
<input type="input" name="last_name" /><br />

<label for="address1">Address</label>
<input type="input" name="address1" /><br />

<label for="address2">BLDG No.</label>
<input type="input" name="address2" /><br />

<label for="city">City</label>
<input type="input" name="city" /><br />

<label for="state">State</label>
<input type="input" name="state" /><br />

<label for="zipcode">Zipcode</label>
<input type="input" name="zipcode" /><br />

<label for="phone">Phone Number</label>
<input type="input" name="phone" /><br />

<label for="email">E-mail</label>
<input type="input" name="email" /><br />

<label for="company_name">Company Name</label>
<input type="input" name="company_name" /><br />

<label for="company_address">Company Address</label>
<input type="input" name="company_address" /><br />

<label for="company_city">Company City</label>
<input type="input" name="company_city" /><br />

<label for="company_state">Company State</label>
<input type="input" name="company_state" /><br />

<label for="company_zipcode">Company Zipcode</label>
<input type="input" name="company_zipcode" /><br />

<label for="company_phone">Company Phone No.</label>
<input type="input" name="company_phone" /><br />

<label for="userfile">Upload File:</label>
<input type="file" name="userfile" /><br />

<input type="submit" name="submit" value="Create a new user" />

</form>
