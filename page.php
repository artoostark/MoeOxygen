<?php get_header(); ?>

<main class="ui container two column stackable grid">
  <?php get_sidebar(); ?>

  <div class="apc-main twelve wide column">
    <div class="ui leaderboard ad hide">
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
            // get_template_part( "detail_navigation" );
            comments_template();

        // End the loop.
        endwhile;
    ?>
  </div>
</main><!-- main end -->
<?php get_footer(); ?>
