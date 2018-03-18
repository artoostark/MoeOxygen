<?php

// 关掉文件编辑
define("DISALLOW_FILE_EDIT", true);
// 备案号编辑
define('WP_ZH_CN_ICP_NUM', true);

// 开启title-tag支持
add_theme_support( 'title-tag' );

add_theme_support( 'custom-header', array(
    'default-image' => get_template_directory_uri() . '/assets/images/header-banner.png',
    'uploads'       => true,
    "height" => 113
));

// 关闭adminbar
add_filter("show_admin_bar", "__return_false");

// 开启文章封面支持
add_theme_support( 'post-thumbnails' );

add_image_size( "top_banner", "836", "300", true );

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




// 注册菜单位置
function register_apc_nav_menus() {
  register_nav_menus(
    array(
      'primary' => "顶部主目录位",
      "cates-nav-list" => "侧边栏分类目录位",
      "top_slider_images" => "头部滑动图片",
      'mall_link' => "商城链接位",
      "about_link" => "网站信息链接位",
      "cooperation_link" => "广告合作链接位",
      "social_link" => "社交媒体链接位",
      "friendly_link" => "底部友情链接位",
    )
  );
}
add_action( 'init', 'register_apc_nav_menus' );

function apc_menu_item_class( $classes, $item, $args, $depth ) {
    if($args->theme_location == "primary"){
        // 设置主菜单目录的li的class
        $classes[] = 'ui nav-list';
    }
    return $classes;

}

add_filter( 'nav_menu_css_class', 'apc_menu_item_class', 10, 4);

function apc_menu_link_attrs($atts, $item, $args, $depth){
    if($args->theme_location == "primary"){
        // 设置主菜单目录a链接的属性
        $atts["class"] = "item";
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'apc_menu_link_attrs', 10, 4);

function apc_walker_nav_menu_start_el($item_output, $item, $depth, $args){
    if($args->theme_location == "mall_link"){
        // 设置商城链接菜单项链接内容
        $format = '<a href="%1$s" title="%2$s" rel="nofollow" target="%3$s"><img src="%4$s"></a>';
        return sprintf(
            $format,
            $item->url,
            $item->title,
            $item->target,
            get_template_directory_uri() . "/assets/images/mall_icon_" . $item->description . ".png"
        );
    }elseif($args->theme_location == "cates-nav-list"){
        if(in_array("menu-item-has-children", $item->classes)){
            $item_output = '<span class="icon-right"><i class="angle right icon"></i></span>' . $item_output;
        }
        // var_dump($item_output);
    }elseif($args->theme_location == "top_slider_images"){
        // 设置顶部轮播图菜单项链接内容
        $format = '<a href="%1$s" title="%2$s" target="%3$s"><img src="%4$s"></a>';
        return sprintf(
            $format,
            $item->url,
            $item->title,
            $item->target,
            get_the_post_thumbnail_url($item->object_id)
        );
    }
    return $item_output;

}

add_filter( 'walker_nav_menu_start_el', 'apc_walker_nav_menu_start_el', 10, 4);
function apc_wp_nav_menu($nav_menu, $args){
    if($args->theme_location == "top_slider_images"){
        $nav_menu = preg_replace('|<li (.+?)>|i','', $nav_menu);
        $nav_menu = preg_replace('|</li (.+?)>|i','', $nav_menu);
    }
    return $nav_menu;
}
add_filter("wp_nav_menu", "apc_wp_nav_menu", 10, 2);


function apc_color_tag_cloud($return, $args) {
	$text = preg_replace_callback('|<a (.+?)>|i','apc_color_tag_cloud_callback', $return);
	return $text;
}

function apc_color_tag_cloud_callback($matches){
    // 彩色标签云
    $color_class = array(
        "red",
        "orange",
        "yellow",
        "olive",
        "green",
        "teal",
        "blue",
        "violet",
        "purple",
        "pink",
        "brown",
        "grey",
        "black"
    );
    $text = $matches[1];
    $tag_link_matches = null;
    $tag_link_matches_count = preg_match("/(tag-link-)([0-9]+)/i", $text, $tag_link_matches);
    $tag_color_class = "";
    if($tag_link_matches_count > 0){
        $term_id = $tag_link_matches[2];
        $tag_color_class .= (
            " " . $color_class[$term_id % count($color_class)]
        );
    }
    $pattern = '/class=(\'|\")(.+?)(\'|\")/i';
	$text = preg_replace($pattern, "class=\"ui label{$tag_color_class} $2\"", $text);
    return "<a $text>";
}
add_filter( 'wp_tag_cloud', 'apc_color_tag_cloud', 10, 2);


add_action('customize_register','apc_customize_register');
function apc_customize_register( $wp_customize ) {
    // 底部网站描述设置
    $wp_customize->add_setting( 'footer_desc', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'default' => '<p></p>',
    ) );

    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        "footer_desc",
        array(
            "section"=>"footer_desc_section",
        )
    ));

    $wp_customize->add_section( 'footer_desc_section', array(
      'title' => "底部文字简介",
      'priority' => 220,
      'capability' => 'edit_theme_options',
    ));

    $wp_customize->selective_refresh->add_partial( 'footer_desc', array(
        'selector' => '.footer-info div.text'
    ) );

    // 微信二维码链接
    $wp_customize->add_setting( 'wechat_qrcode', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'default' => '',
    ) );

    $wp_customize->add_control(new WP_Customize_Upload_Control(
        $wp_customize,
        "wechat_qrcode",
        array(
            "section"=>"wechat_qrcode_section",
        )
    ));

    $wp_customize->add_section( 'wechat_qrcode_section', array(
      'title' => "微信二维码图片",
      'priority' => 220,
      'capability' => 'edit_theme_options',
    ));

    $wp_customize->selective_refresh->add_partial( 'wechat_qrcode', array(
        'selector' => 'footer .footer-info div.wechat div.qr'
    ) );

    // 新浪微博二维码链接
    $wp_customize->add_setting( 'weibo_qrcode', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'default' => '',
    ) );

    $wp_customize->add_control(new WP_Customize_Upload_Control(
        $wp_customize,
        "weibo_qrcode",
        array(
            "section"=>"weibo_qrcode_section",
        )
    ));

    $wp_customize->add_section( 'weibo_qrcode_section', array(
      'title' => "新浪微博二维码图片",
      'priority' => 220,
      'capability' => 'edit_theme_options',
    ));

    $wp_customize->selective_refresh->add_partial( 'weibo_qrcode', array(
        'selector' => 'footer .footer-info div.weibo div.qr'
    ) );

    // 底部QQ群
    $wp_customize->add_setting( 'footer_qq_group', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'default' => '',
    ) );

    $wp_customize->add_control(
        "footer_qq_group",
        array(
            'type' => 'textarea',
            "section"=>"footer_qq_group_section",
            "label" => "网站QQ群"
        )
    );

    $wp_customize->add_section( 'footer_qq_group_section', array(
      'title' => "网站QQ群",
      'priority' => 220,
      'capability' => 'edit_theme_options',
    ));

    // $wp_customize->selective_refresh->add_partial( 'footer_qq_group', array(
    //     'selector' => '.footer-info div.text'
    // ) );
}

function get_qq_group_select(){
    $groups_str = get_theme_mod( 'footer_qq_group', '' );
    $groups_list = mb_split("\n", $groups_str);
    $output = "<select class='qq_groups'>";
    foreach ($groups_list as $group_num_str) {
        $output .= sprintf(
            '<option>%1$s</option>',
            $group_num_str
        );
    }
    $output .= "</select>";
    echo $output;
}

function get_now_year(){
    echo date("Y");
}

function apc_paginate_links_callback($matches){
    $class_text = $matches[2];

    if(mb_strpos($class_text, "current") > -1){
        $class_text .= " disabled";
    }
    $class_text .= " ui button";
    return sprintf('class="%1$s"', $class_text);
}

function the_apc_paginate_links($args=array()){
    $args["type"] = "array";
    $links = paginate_links($args);
    $pattern = '/class=(\'|\")(.+?)(\'|\")/i';
    $new_links = array();
    foreach ($links as $link) {
        $link = preg_replace_callback($pattern, "apc_paginate_links_callback", $link);
        $new_links[] = $link;
    }
    echo join("\n", $new_links);
}
