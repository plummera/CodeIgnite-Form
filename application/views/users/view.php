<?php
  echo '<h2>'.$title.'</h2>';
  echo 'test';
  foreach ($user in $UserInfo_item):
    echo $user['first_name'];
  end foreach
