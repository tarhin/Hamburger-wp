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
            if ( is_active_sidebar( 'textbox1_widget' ) ) :
                dynamic_sidebar( 'textbox1_widget' );
            else:
            ?>
            <div class="widget">
              <h2>No Widget</h2>
              <p>ウィジットは設定されていません。</p>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="p-box--information">
          <div class="p-box-title">
            <h3>Eat In</h3>
            <p class="p-title-line"></p>
          </div>
          <div class="p-box-contents">
            <?php
            if ( is_active_sidebar( 'textbox2_widget' ) ) :
                dynamic_sidebar( 'textbox2_widget' );
            else:
            ?>
            <div class="widget">
              <h2>No Widget</h2>
              <p>ウィジットは設定されていません。</p>
            </div>
            <?php endif; ?>
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