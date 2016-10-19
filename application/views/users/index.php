<h2><?php echo $title ?></h2>

<?php foreach ($UserInfo as $UserInfo_item): ?>

  <h3><?php echo $UserInfo_item['title']; ?></h3>

  <div class="main">
    <?php echo $UserInfo_item['text']; ?>
  </div>
  
  <p><a href="<?php echo site_url('/UserInfo'.$UserInfo_item['slug']); ?>">View User</a></p>

<?php end foreach; ?>
