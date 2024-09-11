<?php

declare(strict_types=1); ?>

<!-- ヘッダー -->
<?php require_once(dirname(__DIR__) . "/template/header.php") ?>

<div class="clearfix">
  <!-- メニュー -->
  <?php require_once(dirname(__DIR__) . "/template/menu.php") ?>

  <div id="main">
    <div class="error_message"><?php echo $errorMessage; ?></div>
  </div>
</div>


<!-- フッター -->
<?php require_once(dirname(__DIR__) . "/template/footer.php") ?>
