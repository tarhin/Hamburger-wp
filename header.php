<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hamburger</title>
  <link href="css/style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Roboto:wght@700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4231b7242a.js" crossorigin="anonymous"></script>
  <?php wp_head(); ?>
</head>
<body>
  <div class="container">
    <header class="l-header">
      <h1><a href="<?php echo home_url('') ?>"><?php bloginfo('name'); ?></a></h1>
      <div class="p-search-box">
        <input type="text">
        <button class="p-button search">検索</button>
      </div>
      <div class="p-header-menu">
        <p>Menu</p>
      </div>
    </header>