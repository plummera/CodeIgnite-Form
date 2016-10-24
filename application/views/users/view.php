<br>
<?php echo '<h2>Whats in here? Take a look...</h2>'; ?>

<table class="table table-inverse">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Address</th>
      <th>Address2</th>
      <th>City</th>
      <th>State</th>
      <th>Zipcode</th>
      <th>Phone #</th>
      <th>E-Mail</th>
      <th>Company Name</th>
      <th>Company Address</th>
      <th>Company City</th>
      <th>Company State</th>
      <th>Company Zipcode</th>
      <th>Company Phone Number</th>
      <th>File Uploaded</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($UserInfo_item as $user) { ?>
    <tr>
      <?php foreach ($user as $user_b) { ?>
        <?php if (end($user)) { ?>
          <?php echo '<td>test</td>'; ?>
        <?php } else { ?>
          <?php echo '<td>'.$userb_b.'</td>'; ?>
        <?php };?>
      <?php }; ?>
    </tr>
    <?php  }; ?>
  </tbody>
</table>
