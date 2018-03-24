<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <?php
    if ( ! function_exists( '_wp_render_title_tag' ) ) {
    	function theme_slug_render_title() {
    ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
    	}
    	add_action( 'wp_head', 'theme_slug_render_title' );
    }
  ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <?php wp_head(); ?>
</head>
<body>
<header>
  <div class="header-nav ui fixed secondary menu">
    <div class="ui container">
      <?php
      wp_nav_menu(
          array(
              'theme_location' => 'primary',
              'container' => 'ul',
              'menu_class' => 'ui nav-list-ul',
          )
      );
      ?>
      <div class="right menu">
        <div class="nav-search item">
          <div class="ui icon input">
            <form name="search" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input class="input-search" name="s" type="search" placeholder="搜索">
                <a class="nav-search" href="javascript:document.search.submit();">
                    <i class="search link icon"></i>
                </a>
            </form>
          </div>
        </div>
        <?php $current_user = wp_get_current_user(); ?>
        <div class="ui pointing link dropdown nav-user item">
            <?php if(is_user_logged_in()): ?>
                <img class="ui mini circular image" src="<?php echo get_avatar_url($current_user, array("size"=>35)); ?>"/>
                <span class="text"><?php echo $current_user->display_name ?></span>
            <?php else: ?>
                <img class="circular" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/header-img.png"/>
                <span class="text">登录/注册</span>
            <?php endif; ?>
            <i class="inverted dropdown icon"></i>
            <div class="menu">
                <?php if(is_user_logged_in()): ?>
                    <div class="item" data-href="<?php echo get_admin_url(); ?>">个人中心</div>
                    <div class="item" data-href="<?php echo wp_logout_url(get_permalink()); ?>">退出用户</div>
                <?php else: ?>
                    <div class="item" data-href="<?php echo wp_login_url(get_permalink()); ?>">登录</div>
                    <div class="item" data-href="<?php echo wp_registration_url()?>">注册</div>
                <?php endif; ?>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-content header-bg-img" style="background-image:url(<?php header_image(); ?>);">
    <div class="header-logo ui container">
      <a class="nav-logo" href="<?php echo get_home_url(); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.png"/>
      </a>
    </div>
  </div>
</header><!-- header end -->
