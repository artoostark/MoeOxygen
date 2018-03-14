<?php get_header(); ?>

<main class="ui container two column stackable grid">
  <?php get_sidebar(); ?>

  <div class="apc-main twelve wide column">
    <div class="ui leaderboard ad">
      <a href="#" target="_blank" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/site-header-ad.png"></a>
    </div>
    <?php
          // Start the loop.
          while ( have_posts() ) : the_post();

              /*
               * Include the post format-specific template for the content. If you want to
               * use this in a child theme, then include a file called called content-___.php
               * (where ___ is the post format) and that will be used instead.
               */
              get_template_part( 'content', get_post_format() );

          // End the loop.
          endwhile;
          ?>
    <div class="ui single-nav">
      <div class="ui card single-nav-left">
        <div class="image">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/site-single-img.png">
          <button class="ui button single-nav-button-left">
            <a href="#"><i class="angle left icon"></i>上一篇</a>
          </button>
        </div>
        <div class="content">
          <div class="title"><a href="#">魔兽世界各地旅店背景音乐原声魔兽世界各地旅店背景音乐原声魔兽世界各地旅店背景音乐原声魔兽世界各地旅店背景音乐原声</a></div>
          <div class="description"><a href="#">其实我很少在小酒馆停留，那时候的我们意气风发，一声号令，手中的朗姆酒还没有凉，就要扛起大剑踏上征程</a></div>
        </div>
      </div>
      <div class="ui card single-nav-right">
        <div class="image">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/site-single-img.png">
          <button class="ui button single-nav-button-right">
            <a href="#">下一篇<i class="angle right icon"></i></a>
          </button>
        </div>
        <div class="content">
          <div class="title"><a href="#">魔兽世界各地旅店背景音乐原声</a></div>
          <div class="description"><a href="#">其实我很少在小酒馆停留，那时候的我们意气风发，一声号令，手中的朗姆酒还没有凉，就要扛起大剑踏上征程</a></div>
        </div>
      </div>
    </div>
    <div class="ui site-comments">
      <div class="site-comments-header">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAYAAACXtf2DAAAB5ElEQVQ4jZXVT4hPURQH8M/7+c2YBVkQ408USlhQymCpZjEbYmGlRnYvGwvZ2EySiLLh9ysbakxJycqf2JIZsxM1O2SMQSwkZow8i/smr9f9/eb3zuaee77vnu9559xzbpI1LCRdyPAniqZZ28O1NthmTOI3fmKwhO/GhGYyp5kMayaLqxJcxtpc78L1wn4Z7mML6jiKoaoE/aV9Nw7m+gGsKOHHqhJ0R2wr83VjBOutSvAiYnuTr58i2Id2BIMYxmnMF+tc6dsp3M31e0Lhi3IzRlDHKVwq2PbiEB4KOT+B7ziDH4U/OIIbQi1u4SxoJtuxH6PSbDzJGqawukS8Ay9jEZUkQY80+5U7P4w7WCT0zkAt4hy2lpwMCCl4jVFcEfogKziv4WrufP7chRrGIwTv83UTnuKBUKdt6MNJjOGRZrIm/3ZdJNidSdbQj8cF4xj2YQOeY1UkgKK8w55c/1jCpmt4IjTOCM4L6fiLRgfO5YFclGbTeFbCGkmLYdcbiaadzGCJkKJrQipvY6je4sD6Cs6hB8ul2aT/4wStO/lzRYIZfIsBrQjeCgXuVEakWfS9aDeLjuNLB85fCSMmKu0IJrBLGAOzEfyrcOv6pFk0PdDqFpWljqVC+89izvwTusCT+Q9vj3BO6KOhIAAAAABJRU5ErkJggg==">
        <span>文章评论</span>
      </div>

      <div class="ui comments">
        <form class="ui reply form">
          <div class="field">
            <textarea placeholder=""></textarea>
            <div class="ui dimmer transition visible active">
              <div class="content">
                <div class="center">
                  请先<button class="ui button login"><a href="#">登录</a></button>后发表评论 ~
                </div>
              </div>
            </div>
          </div>
        </form>
        <button class="ui button smile"><i class="smile icon"></i></button>
        <button class="ui button submit-comment">发表评论</button>
        <div class="comments-sort">
          <button class="ui button active">时间</button>
          <span class="cut">|</span>
          <button class="ui button">热度</button>
        </div>
        <ul class="comments-list">
          <li class="comment">
            <a class="avatar">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/comments-gravatar.png">
            </a>
            <div class="content">
              <a class="author">粉红色的猫</a>
              <div class="metadata">
                <span class="date">今天5:42</span>
              </div>
              <div class="text">请大家多多支持！</div>
              <div class="actions">
                <a class="reply">回复</a>
                <div class="like"><a href="#">赞（10）</a></div>
              </div>
            </div>
          </li>
          <li class="comment">
            <a class="avatar">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/comments-gravatar.png">
            </a>
            <div class="content">
              <a class="author">粉红色的猫</a>
              <div class="metadata">
                <span class="date">今天5:42</span>
              </div>
              <div class="text">请大家多多支持！</div>
              <div class="actions">
                <a class="reply">回复</a>
                <div class="like"><a href="#">赞（10）</a></div>
              </div>
              <ul class="reple-list">
                <li class="comment">
                  <div class="content">
                    <a class="author">建筑家：@粉红色的猫</a>
                    <div class="metadata">
                      <span class="date">今天5:42</span>
                    </div>
                    <div class="text">好的，支持你！</div>
                    <div class="actions">
                      <a class="reply">回复</a>
                      <div class="like"><a href="#">赞（10）</a></div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</main><!-- main end -->
<?php get_footer(); ?>
