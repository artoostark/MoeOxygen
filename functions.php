<?php

function reg_scripts(){
    // 注册css和js

    //semantic.css
    wp_enqueue_style('semantic_css', get_template_directory_uri() . '/assets/semantic/semantic.css', false ,'20180312','all');
    //主样式css
    $apc_css_file = get_template_directory() . '/public/css/style.css';
    wp_enqueue_style('apc_css',get_template_directory_uri() . '/public/css/style.css' , array("semantic_css") , "20180314", 'all');

    //semantic.css
    wp_enqueue_script('semantic_js', get_template_directory_uri() . '/assets/semantic/semantic.js', array("jquery") ,'20180314',true);
    //主js
    wp_enqueue_script('apc_js', get_template_directory_uri() . '/assets/javascript/apc.js', array("jquery", "semantic_js") ,'20180316',true);
    wp_enqueue_script("terseBanner", get_template_directory_uri() . '/assets/javascript/jquery.terseBanner.min.js', array("jquery"), "20180312", true);
}

add_action( 'wp_enqueue_scripts', 'reg_scripts' );

// 关闭adminbar
add_filter("show_admin_bar", "__return_false");

// 开启文章封面支持
add_theme_support( 'post-thumbnails' );

// 注册菜单位置
function register_apc_nav_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary Menu' ),
      'extra' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_apc_nav_menus' );

function apc_menu_item_class( $classes, $item ) {
    // 设置菜单目录的li的class
    $classes[] = 'ui nav-list';
    return $classes;
}

add_filter( 'nav_menu_css_class', 'apc_menu_item_class', 10, 2);

function apc_menu_link_attrs($atts, $item, $args, $depth){
    // 设置菜单目录a链接的属性
    $atts["class"] = "item";
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'apc_menu_link_attrs', 10, 4);
