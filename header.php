<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title>爱评测</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <?php wp_head(); ?>
  <!-- <link rel="stylesheet" type="text/css" href="assets/semantic/semantic.css">
  <link rel="stylesheet" type="text/css" href="assets/style/style.css"> -->
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
            <input class="input-search" type="text" placeholder="搜索">
            <a class="nav-search" href="#"><i class="search link icon"></i></a>
          </div>
        </div>
        <a class="nav-user ui item">
          <img class="circular" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/header-img.png"/>
          <span>光小猫</span>
        </a>
      </div>
    </div>
  </div>
  <div class="header-content header-bg-img">
    <div class="header-logo ui container">
      <a class="nav-logo" href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.png"/></a>
    </div>
  </div>
</header><!-- header end -->
