
<div class="fluid-container">
  <div id="signatureHeadline" class="col-md-12">
    <?php echo '<h2>Current Uploads</h2>'; ?>
  </div>

  <table class="table table-bordered table-striped table-hover table-condensed table-responsive table-inverse">
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
      <?php foreach ($UserInfo_item as $UserInfo) { ?>
      <tr>
        <?php
          foreach ($UserInfo as $user) {
            // echo "<pre>";var_dump($UserInfo); die;
            if ($user == $UserInfo["file"]) {
              echo '<td>
                      <a href="'.site_url("../upload/$user").'">
                      <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-icon-level-up" aria-hidden="true"></span>
                      </a>
                    </td>';
            } else {
              echo '<td>'.$user.'</td>';
            }
          };
        ?>
      </tr>
      <?php  }; ?>
    </tbody>
  </table>
</div>
