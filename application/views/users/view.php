<?php echo '<h2>Whats in here? Take a look...</h2>'; ?>

<table class="table table-inverse">
  <thead>
    <tr>
      <th>#</th>
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
      <th>File Uploaded</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($UserInfo_item as $user) { ?>
    <tr>
      <th scope="row"></th>
      <?php echo '<td>'.$user['first_name'].'</td>'; ?>
    </tr>
    <?php  }; ?>
  </tbody>
</table>
