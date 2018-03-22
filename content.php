<div class="ui site-index-hot-articles">
  <?php
    if(function_exists('apc_breadcrumbs')){
        apc_breadcrumbs(
            $show_title="正文"
        );
    }

  ?>

  <article class="article">
    <h2><?php the_title() ?></h2>
    <div class="article-info"><a><?php the_time("Y-m-d") ?></a> <a class="cut">|</a> <a href="#"><?php the_author() ?></a></div>
    <div class="ui leaderboard ad mobile hide">
      <a href="#" target="_blank" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/site-header-mobile-ad.png"></a>
    </div>
    <div class="post-img">
      <img class="full" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
    </div>
    <div class="row">
      <?php the_content(); ?>
    </div>
  </article>

  <div class="article-footer">
    <div class="single-link">
      本文原文链接 <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
    </div>
    <div class="single-footer-ad hide">
      <div class="ui leaderboard ad">
        <a href="#" target="_blank" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/site-single-footer-ad.png"></a>
      </div>
    </div>
    <ul class="recommend hide">
      <li><a href="#">[限时免费正版] 质量效应2 (Mass Effect 2) - 超经典科幻 ARPG 游戏大作 (0.879)</a></li>
      <li><a href="#">吐槽墙 (0.357)</a></li>
    </ul>
    <?php the_tags( '<div class="article-label">标签： ', '', '</div>' ); ?>
  </div>
</div>
