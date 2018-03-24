<?php get_header(); ?>
<main class="ui container two column stackable grid">
  <?php get_sidebar(); ?>
  <div class="apc-main twelve wide column">
    <div class="ui site-index-hot-articles">
      <div class="site-index-hot-articles-header">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAYAAACXtf2DAAAB8klEQVQ4jZXVPWhUQRAH8N87LzGFYqFo/EBBBVELBcE8LYUUaRQtrISYa20sxMYmiIiiYKMpLE4hBkQQKz/QVrkX04lCOhVjjIoWIpoYubPYFzwee5fcNDs7/7fznzezM5vUa0MWkS408DcGJmm17eFSG2w7pvAHvzBYwPdjspFV5htZZbSRVZZ3SnAVG3O9Czeb9qvwEDtQxgkMd0rQX9h340iuH8aaAn6yU4LuiG1tvm6NYL2dEryM2N7m6+cI9rEdwSBGcRYLxbpQ+HYa93P9gVD4ZrkdIyjjDK402Q7gKB4LOT+FHziHn01/cBy3hFrcwXloZJXdOIQsSasTSb02NI31BeI9eBWLqCAJepK0+jt3fgz3sEzonYFSxDnsLDgZEFLwBhmuCX3QaHJewvXc+cK5SyVMRAg+5Os2PMcjoU670IfTGMeTRlbZkH+7KRLs3qReG+rH0ybjOA5iC2pYFwmgWd4jzfVPBWymhGdC44zhopCOOkaW4FweyOUkrc7gRQEbSVoMu95INO1kFiuEFN0QUnkXw+UWBzZ34Bx6sDpJq1P+jxO07uQvHRLM4nsMaEXwTijwUmUsSavR96LdLKrg6xKcvxZGTFTaEUxinzAG5iL4N+HW9SVpNZoeaHWLilLGSqH95zAvf0IXezL/AehJeQFpkZ+QAAAAAElFTkSuQmCC">
        <span><?php single_tag_title("标签："); ?></span>
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
                  <a class="meta" href="<?php get_the_author_posts_link_href() ?>"><?php the_author(); ?></a>
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
         <?php get_template_part("util_paginator"); ?>
    </div>
  </div>
</main><!-- main end -->
<?php get_footer(); ?>
