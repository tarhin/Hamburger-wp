<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="container">
    <header class="l-header">
      <h1><a href="<?php echo home_url('') ?>"><?php bloginfo('name'); ?></a></h1>
      <?php get_search_form() ?>
      <div class="p-header-menu">
        <p>Menu</p>
      </div>
    </header>