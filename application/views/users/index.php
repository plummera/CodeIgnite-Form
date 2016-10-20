
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
    <?php for ($a=0;$a<count($UserInfo_item);$a++) { ?>
    <tr>
      <th scope="row"></th>
      <?php foreach ($UserInfo_item[$a] as $user) {
              for ($b=0;$b<count($user);$b++) {
                echo '<td>'.$user.'</td>';
              };
            }; ?>
    </tr>
    <?php  }; ?>
  </tbody>
</table>
