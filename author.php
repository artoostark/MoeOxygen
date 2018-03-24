<?php get_header(); ?>
<?php
    global $author;
    $userdata = get_userdata($author);

?>
<main class="ui container one column stackable grid">
  <div class="apc-main wide column">
    <div class="ui site-author-info">
      <div class="ui site-author-info-image">
        <img class="ui fluid image" src="<?php echo get_avatar_url($userdata, array("size"=>177)); ?>">
      </div>
      <div class="ui site-author-info-more">
        <div class="name"><?php echo $userdata->display_name; ?></div>
        <div class="introduction">个人介绍：<?php echo $userdata->user_description; ?></div>
        <div class="post"><span><?php echo count_user_posts($userdata->ID, "post", true); ?></span><br/>文章总数</div>
        <div class="likes hide"><span>4168</span><br/>点赞数</div>
        <button class="ui button attention hide">+ 关注</button>
      </div>
    </div>
    <div class="ui site-author-articles">
      <div class="ui site-more-articles">
        <div class="site-more-articles-header">
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAYAAACXtf2DAAAB8klEQVQ4jZXVPWhUQRAH8N87LzGFYqFo/EBBBVELBcE8LYUUaRQtrISYa20sxMYmiIiiYKMpLE4hBkQQKz/QVrkX04lCOhVjjIoWIpoYubPYFzwee5fcNDs7/7fznzezM5vUa0MWkS408DcGJmm17eFSG2w7pvAHvzBYwPdjspFV5htZZbSRVZZ3SnAVG3O9Czeb9qvwEDtQxgkMd0rQX9h340iuH8aaAn6yU4LuiG1tvm6NYL2dEryM2N7m6+cI9rEdwSBGcRYLxbpQ+HYa93P9gVD4ZrkdIyjjDK402Q7gKB4LOT+FHziHn01/cBy3hFrcwXloZJXdOIQsSasTSb02NI31BeI9eBWLqCAJepK0+jt3fgz3sEzonYFSxDnsLDgZEFLwBhmuCX3QaHJewvXc+cK5SyVMRAg+5Os2PMcjoU670IfTGMeTRlbZkH+7KRLs3qReG+rH0ybjOA5iC2pYFwmgWd4jzfVPBWymhGdC44zhopCOOkaW4FweyOUkrc7gRQEbSVoMu95INO1kFiuEFN0QUnkXw+UWBzZ34Bx6sDpJq1P+jxO07uQvHRLM4nsMaEXwTijwUmUsSavR96LdLKrg6xKcvxZGTFTaEUxinzAG5iL4N+HW9SVpNZoeaHWLilLGSqH95zAvf0IXezL/AehJeQFpkZ+QAAAAAElFTkSuQmCC">
          <span>TA的文章</span>
        </div>
        <div class="ui site-more-articles-list">
          <ul class="wide column">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <li class="ui card">
                        <a class="image" href="<?php echo the_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
                        </a>
                        <div class="content">
                            <div class="title">
                                <a href="<?php echo the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </div>
                            <div class="time"><?php the_time("Y-m-d") ?></div>
                            <div class="description">
                                <a href="<?php echo the_permalink(); ?>">
                                    <?php echo get_the_excerpt(); ?>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>

      <?php get_template_part("util_paginator"); ?>
    </div>

  </div>
</main><!-- main end -->
<?php get_footer(); ?>
