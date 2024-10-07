<div class="p-sp-menu-background"></div>
    <aside class="l-sidebar">
      <div class="c-sidebar-contents">
        <h3>Menu</h3>
        <div class="p-menu-close"></div>
        <?php
        if ( is_active_sidebar( 'sidebar_widget' ) ) :
            dynamic_sidebar( 'sidebar_widget' );
        else:
        ?>
        <div class="widget">
          <h2>No Widget</h2>
          <p>ウィジットは設定されていません。</p>
        </div>
        <?php endif; ?>
      </div>
    </aside>