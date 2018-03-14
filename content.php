<div class="ui site-index-hot-articles">
  <div class="ui breadcrumb">
    <a href="#" class="section">首页</a>
    <div class="divider"> /</div>
    <a href="#" class="section">福利</a>
    <div class="divider"> /</div>
    <a href="#" class="section">礼物</a>
    <div class="divider"> /</div>
    <div class="active section">正文</div>
  </div>

  <article class="article">
    <h2><?php the_title() ?></h2>
    <div class="article-info"><a><?php the_time("Y-m-d") ?></a> <a class="cut">|</a> <a href="#"><?php the_author() ?></a></div>
    <div class="ui leaderboard ad mobile">
      <a href="#" target="_blank" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/site-header-mobile-ad.png"></a>
    </div>
    <div class="post-img">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/site-article.png">
    </div>
    <div class="row">
      <?php the_content(); ?>
    </div>
  </article>

  <div class="article-footer">
    <div class="single-link">
      本文原文链接 <a href="#">http://www.iplaysoft.com/free/syberia2</a>
    </div>
    <div class="single-footer-ad">
      <div class="ui leaderboard ad">
        <a href="#" target="_blank" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/site-single-footer-ad.png"></a>
      </div>
    </div>
    <ul class="recommend">
      <li><a href="#">[限时免费正版] 质量效应2 (Mass Effect 2) - 超经典科幻 ARPG 游戏大作 (0.879)</a></li>
      <li><a href="#">吐槽墙 (0.357)</a></li>
    </ul>
    <div class="article-label">
      标签：<a href="#" class="ui label">iBeatX</a>
      <a href="#" class="ui label">免费</a>
      <a href="#" class="ui label">福利</a>
    </div>
  </div>
</div>
