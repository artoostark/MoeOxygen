<?php get_header(); ?>
<main class="ui container two column stackable grid">
  <?php get_sidebar(); ?>
  <div class="apc-main twelve wide column">
    <div class="ui site-slider banner" id="thumbnail">
      <?php
      wp_nav_menu(
          array(
              'theme_location' => "top_slider_images",
              'container' => 'ul',
              'menu_class' => '',
          )
      );
      ?>
    </div>
    <div class="ui site-index-hot-articles">
      <div class="site-index-hot-articles-header">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAYAAACXtf2DAAAB8klEQVQ4jZXVPWhUQRAH8N87LzGFYqFo/EBBBVELBcE8LYUUaRQtrISYa20sxMYmiIiiYKMpLE4hBkQQKz/QVrkX04lCOhVjjIoWIpoYubPYFzwee5fcNDs7/7fznzezM5vUa0MWkS408DcGJmm17eFSG2w7pvAHvzBYwPdjspFV5htZZbSRVZZ3SnAVG3O9Czeb9qvwEDtQxgkMd0rQX9h340iuH8aaAn6yU4LuiG1tvm6NYL2dEryM2N7m6+cI9rEdwSBGcRYLxbpQ+HYa93P9gVD4ZrkdIyjjDK402Q7gKB4LOT+FHziHn01/cBy3hFrcwXloZJXdOIQsSasTSb02NI31BeI9eBWLqCAJepK0+jt3fgz3sEzonYFSxDnsLDgZEFLwBhmuCX3QaHJewvXc+cK5SyVMRAg+5Os2PMcjoU670IfTGMeTRlbZkH+7KRLs3qReG+rH0ybjOA5iC2pYFwmgWd4jzfVPBWymhGdC44zhopCOOkaW4FweyOUkrc7gRQEbSVoMu95INO1kFiuEFN0QUnkXw+UWBzZ34Bx6sDpJq1P+jxO07uQvHRLM4nsMaEXwTijwUmUsSavR96LdLKrg6xKcvxZGTFTaEUxinzAG5iL4N+HW9SVpNZoeaHWLilLGSqH95zAvf0IXezL/AehJeQFpkZ+QAAAAAElFTkSuQmCC">
        <span>最新文章</span>
      </div>

        <?php if ( have_posts() ) : ?>
            <ul class="site-index-hot-articles-info-list">
            <?php while ( have_posts() ) : the_post(); ?>
                <li class="site-index-hot-articles-info">
                  <h2>
                      <a class="h2" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                          <?php the_title(); ?>
                      </a>
                  </h2>
                  <a class="meta" href="<?php the_permalink(); ?>"><?php the_time("Y-m-d"); ?></a>
                  <a class="meta cut">|</a>
                  <a class="meta" href="<?php the_author_link() ?>"><?php the_author(); ?></a>
                  <?php if(has_post_thumbnail()){ ?>
                      <div class="post-img">
                          <a href="<?php the_permalink(); ?>">
                              <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
                          </a>
                      </div>
                  <?php } ?>
                  <div class="post-abstract">
                    <p><?php the_excerpt(); ?></p>
                  </div>
                </li>
            <?php endwhile; ?>
            </ul>
        <?php endif; ?>
        <div class="ui buttons site-page-number">
            <?php the_apc_paginate_links(array(
                "next_text" => "下一页",
                "prev_text" => "上一页"
            )); ?>
        </div>
      <div class="browse-more-btn hide">
        <a href="more.html">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/browse-more-btn.png">
          <button class="ui button">浏览更多</button>
        </a>
      </div>
      <!-- <div class="ui buttons site-page-number">
        <button class="ui button">1</button>
        <button class="ui button">2</button>
        <button class="ui button">3</button>
        <button class="ui button">4</button>
        <button class="ui button">5</button>
        <button class="ui button disabled">...</button>
        <button class="ui button">99</button>
        <button class="ui button">下一页</button>
      </div> -->
      <div class="ui buttons site-page-nav-mobile">
        <button class="ui button disabled prev">&lt; 上一页</button>
        <button class="ui button disabled nav">第1/100页</button>
        <button class="ui button next">下一页 &gt;</button>
      </div>
    </div>
    <div class="ui site-more-articles hide">
      <div class="site-more-articles-header">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAYAAACXtf2DAAAB8klEQVQ4jZXVPWhUQRAH8N87LzGFYqFo/EBBBVELBcE8LYUUaRQtrISYa20sxMYmiIiiYKMpLE4hBkQQKz/QVrkX04lCOhVjjIoWIpoYubPYFzwee5fcNDs7/7fznzezM5vUa0MWkS408DcGJmm17eFSG2w7pvAHvzBYwPdjspFV5htZZbSRVZZ3SnAVG3O9Czeb9qvwEDtQxgkMd0rQX9h340iuH8aaAn6yU4LuiG1tvm6NYL2dEryM2N7m6+cI9rEdwSBGcRYLxbpQ+HYa93P9gVD4ZrkdIyjjDK402Q7gKB4LOT+FHziHn01/cBy3hFrcwXloZJXdOIQsSasTSb02NI31BeI9eBWLqCAJepK0+jt3fgz3sEzonYFSxDnsLDgZEFLwBhmuCX3QaHJewvXc+cK5SyVMRAg+5Os2PMcjoU670IfTGMeTRlbZkH+7KRLs3qReG+rH0ybjOA5iC2pYFwmgWd4jzfVPBWymhGdC44zhopCOOkaW4FweyOUkrc7gRQEbSVoMu95INO1kFiuEFN0QUnkXw+UWBzZ34Bx6sDpJq1P+jxO07uQvHRLM4nsMaEXwTijwUmUsSavR96LdLKrg6xKcvxZGTFTaEUxinzAG5iL4N+HW9SVpNZoeaHWLilLGSqH95zAvf0IXezL/AehJeQFpkZ+QAAAAAElFTkSuQmCC">
        <span>更多推荐</span>
      </div>
      <div class="ui site-more-articles-list">
        <ul class="wide column">
          <li>
            <h2>【Gadio Music VOL.3 开播！】青春！</h2>
            <a>2017-04-02</a> <a class="cut">/</a> <a>by</a> <a href="#">老王经销商</a> <a class="cut">/</a> <a>in</a> <a href="#">音乐</a>
          </li>
          <li>
            <h2>【Gadio Music VOL.3 开播！】青春！</h2>
            <a>2017-04-02</a> <a class="cut">/</a> <a>by</a> <a href="#">老王经销商</a> <a class="cut">/</a> <a>in</a> <a href="#">音乐</a>
          </li>
          <li>
            <h2>【Gadio Music VOL.3 开播！】青春！</h2>
            <a>2017-04-02</a> <a class="cut">/</a> <a>by</a> <a href="#">老王经销商</a> <a class="cut">/</a> <a>in</a> <a href="#">音乐</a>
          </li>
          <li>
            <h2>【Gadio Music VOL.3 开播！】青春！</h2>
            <a>2017-04-02</a> <a class="cut">/</a> <a>by</a> <a href="#">老王经销商</a> <a class="cut">/</a> <a>in</a> <a href="#">音乐</a>
          </li>
          <li>
            <h2>【Gadio Music VOL.3 开播！】青春！</h2>
            <a>2017-04-02</a> <a class="cut">/</a> <a>by</a> <a href="#">老王经销商</a> <a class="cut">/</a> <a>in</a> <a href="#">音乐</a>
          </li>
          <li>
            <h2>【GADIOPRO VOL.10 开播！】我来看看我来看看我来看看我来看看我来看看我来看看我来看看我来看看我来看看我来看看</h2>
            <a>2017-04-02</a> <a class="cut">/</a> <a>by</a> <a href="#">老王经销商</a> <a class="cut">/</a> <a>in</a> <a href="#">音乐</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</main><!-- main end -->
<?php get_footer(); ?>
