<?php get_header(); ?>
    <main class="l-main">
      <div class="p-main-title">
        <h2>ダミーサイト</h2>
      </div>
      <div class="p-box--information--wrapper">
        <div class="p-box--information">
          <div class="p-box-title">
            <h3>Take Out</h3>
            <p class="p-title-line"></p>
          </div>
          <div class="p-box-contents">
            <?php
            // カスタム投稿タイプserviceを取得
            $args = array(
              'post_type' => 'service', // カスタム投稿タイプの指定
              'tag' => 'takeout', // このタグの投稿を表示
              'post_per_page' => '1' // 表示する投稿数
            );
            $custom_query = new WP_query($args); ?>

            <?php if($custom_query->have_posts()) :?>
              <?php while($custom_query->have_posts()): $custom_query->the_post(); ?>
              <a href="<?php the_permalink(); ?>" class="p-box-contents-link"></a>
              <div class="p-box-contents-text">
                <h4><?php the_title(); ?></h4>
                <?php the_excerpt(); ?>
              </div>
              <div class="p-box-contents-text">
                <h4><?php the_title(); ?></h4>
                <?php the_excerpt(); ?>
              </div>
              <?php endwhile; ?>
            <?php else : ?>
              <p>何も表示されませんでした。</p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

          </div>
        </div>
        <div class="p-box--information">
          <div class="p-box-title">
            <h3>Eat In</h3>
            <p class="p-title-line"></p>
          </div>
          <div class="p-box-contents">
            <?php
            $args = array(
              'post_type' => 'service', // カスタム投稿タイプの指定
              'tag' => 'eatin', // このタグの投稿を表示
              'post_per_page' => '1' // 表示する投稿数
            );
            $custom_query = new WP_query($args); ?>

            <?php if($custom_query->have_posts()) :?>
              <?php while($custom_query->have_posts()): $custom_query->the_post(); ?>
              <a href="<?php the_permalink(); ?>" class="p-box-contents-link"></a>
              <div class="p-box-contents-text">
                <h4><?php the_title(); ?></h4>
                <?php the_excerpt(); ?>
              </div>
              <div class="p-box-contents-text">
                <h4><?php the_title(); ?></h4>
                <?php the_excerpt(); ?>
              </div>
              <?php endwhile; ?>
            <?php else : ?>
              <p>何も表示されませんでした。</p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
      <div class="p-map-wrapper">
        <div class="p-map-layer1">
          <div class="p-map-layer2">
            <?php
            if ( is_active_sidebar( 'mapbox_widget' ) ) :
              dynamic_sidebar( 'mapbox_widget' );
            else:
            ?>
            <h2>No Widget</h2>
            <p>表示するウィジェットがありません。</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </main>
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>