<?php get_header(); ?>
    <main class="l-main">
      <div class="page-404-wrapper">
        <h2>404</h2>
        <h3>page not found</h3>
        <p>お探しのページが見つかりませんでした。<br>URLが間違っているか、ページが存在しません。</p>
        <a href="<?php echo home_url('') ?>" class="p-button page-404">トップページに戻る</a>
      </div>
    </main>
    <?php get_sidebar(); ?>
  </div>
  <?php get_footer(); ?>