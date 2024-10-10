<?php get_header(); ?>
    <main class="l-main">
      <div class="p-main-title archive search">
        <div class="p-main-title-bg">
          <h2>Search:</h2>
          <p><?php echo esc_html(get_search_query()); ?></p>
        </div>
      </div>
      <article class="p-burger-information">
        <div class="p-burger-information-text">
          <h3>小見出しが入ります</h3>
          <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
        </div>
        <div class="p-burger-information-contents">
          <?php if(have_posts()) :
            while(have_posts()) :
              the_post();?>
          <div class="p-box--information-burger">
            <?php the_post_thumbnail(); ?>
            <div class="p-box-text-burger">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php the_excerpt(); ?></p>
              <a href="<?php the_permalink(); ?>" class="button">詳しく見る</a>
            </div>
          </div>
          <?php endwhile; ?>
          <?php else: ?>
          <p>表示する記事がありません</p>
          <?php endif; ?>
        </div>
        <?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
      </article>
    </main>
    <?php get_sidebar(); ?>
  </div>
  <?php get_footer(); ?>