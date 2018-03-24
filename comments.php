<div class="ui site-comments">
  <div class="site-comments-header">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAYAAACXtf2DAAAB5ElEQVQ4jZXVT4hPURQH8M/7+c2YBVkQ408USlhQymCpZjEbYmGlRnYvGwvZ2EySiLLh9ysbakxJycqf2JIZsxM1O2SMQSwkZow8i/smr9f9/eb3zuaee77vnu9559xzbpI1LCRdyPAniqZZ28O1NthmTOI3fmKwhO/GhGYyp5kMayaLqxJcxtpc78L1wn4Z7mML6jiKoaoE/aV9Nw7m+gGsKOHHqhJ0R2wr83VjBOutSvAiYnuTr58i2Id2BIMYxmnMF+tc6dsp3M31e0Lhi3IzRlDHKVwq2PbiEB4KOT+B7ziDH4U/OIIbQi1u4SxoJtuxH6PSbDzJGqawukS8Ay9jEZUkQY80+5U7P4w7WCT0zkAt4hy2lpwMCCl4jVFcEfogKziv4WrufP7chRrGIwTv83UTnuKBUKdt6MNJjOGRZrIm/3ZdJNidSdbQj8cF4xj2YQOeY1UkgKK8w55c/1jCpmt4IjTOCM4L6fiLRgfO5YFclGbTeFbCGkmLYdcbiaadzGCJkKJrQipvY6je4sD6Cs6hB8ul2aT/4wStO/lzRYIZfIsBrQjeCgXuVEakWfS9aDeLjuNLB85fCSMmKu0IJrBLGAOzEfyrcOv6pFk0PdDqFpWljqVC+89izvwTusCT+Q9vj3BO6KOhIAAAAABJRU5ErkJggg==">
    <span>文章评论</span>
  </div>

  <div class="ui comments">
    <form id="respond" class="ui reply form" action="/wp-comments-post.php" method="POST">

      <div class="field">
        <textarea name="comment" placeholder=""></textarea>
        <!--  -->

        <div class="ui dimmer transition <?php if(!is_user_logged_in()) echo "visible active"; ?>">
          <div class="content">
            <div class="center">
              请先<button class="ui button login" type="button">
                  <a href="javascript:;">登录</a>
              </button>后发表评论 ~
            </div>
          </div>
        </div>
        <?php
          $replytoid = isset($_GET['replytocom']) ? (int) $_GET['replytocom'] : 0;
        ?>
        <input type="hidden" name="comment_post_ID" value="<?php the_ID(); ?>">
        <input type="hidden" name="comment_parent" value="<?php echo $replytoid; ?>">
        <button type="submit" class="ui button submit-comment">发表评论</button>
      </div>

    </form>
    <!-- <button class="ui button smile"><i class="smile icon"></i></button> -->


    <div class="comments-sort hide">
      <button class="ui button active">时间</button>
      <span class="cut">|</span>
      <button class="ui button">热度</button>
    </div>

    <ul class="comments-list">
        <?php
            wp_list_comments(array(
                "page" => get_query_var('cpage'),
                "walker" => new Apc_Comments_Walker(),
                "max_depth" => 2,
                "avatar_size" => 35
            ));
        ?>
    </ul>
  </div>
  <?php get_template_part("util_paginator"); ?>
