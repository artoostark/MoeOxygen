<div class="ui single-nav">
    <?php
        $next_post = get_next_post();
        $previous_post = get_previous_post();
    ?>
    <?php if(is_a( $previous_post , 'WP_Post' )): ?>
        <div class="ui card single-nav-left">
            <div class="image">
              <img src="<?php echo get_the_post_thumbnail_url($previous_post->ID, "next_post_thumbnail") ?>">
              <button class="ui button single-nav-button-left">
                <a href="<?php echo the_permalink($previous_post) ?>"><i class="angle left icon"></i>上一篇</a>
              </button>
            </div>
            <div class="content">
              <div class="title">
                  <a href="<?php echo the_permalink($previous_post) ?>">
                      <?php echo get_the_title($previous_post); ?>
                  </a>
              </div>
              <div class="description">
                  <a href="<?php echo the_permalink($previous_post) ?>">
                      <?php echo get_the_excerpt($previous_post->ID); ?>
                  </a>
              </div>
            </div>
        </div>
  <?php endif; ?>
  <?php if(is_a( $next_post , 'WP_Post' )): ?>
      <div class="ui card single-nav-right">
        <div class="image">
          <img src="<?php echo get_the_post_thumbnail_url($next_post->ID, "next_post_thumbnil") ?>">
          <button class="ui button single-nav-button-right">
            <a href="<?php echo the_permalink($next_post) ?>">
                下一篇
            <i class="angle right icon"></i></a>
          </button>
        </div>
        <div class="content">
          <div class="title">
              <a href="<?php echo the_permalink($next_post) ?>">
                  <?php echo get_the_title($next_post); ?>
              </a>
          </div>
          <div class="description">
              <a href="<?php echo the_permalink($next_post) ?>">
                  <?php echo get_the_excerpt($next_post->ID); ?>
              </a>
          </div>
        </div>
      </div>
  <?php endif; ?>
</div>
