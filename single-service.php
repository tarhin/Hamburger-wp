<?php get_header(); ?>
    <main class="l-main">
      <?php if (has_post_thumbnail()) :?>
        <div class="p-main-title single page" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
          <h1><?php the_title(); ?></h1>
        </div>
      <?php else: ?>
        <div class="p-main-title single page" style="background-image: url('<?php get_stylesheet_directory_uri(); ?>/img/No-image.jpg')">
          <h1><?php the_title(); ?></h1>
        </div>
      <?php endif; ?>
      <div class="p-single-main-contents-wrapper">
        <?php the_content(); ?>
      </div>
    </main>
    <?php get_sidebar(); ?>
  </div>
  <?php get_footer(); ?>