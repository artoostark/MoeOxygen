<?php

require "include/walker_comments.php";

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

// 注册尺寸
add_image_size("top_banner", "836", "300", true );
add_image_size("next_post_thumbnail", "400", "85", true);

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
    $class_text .= " ui basic button";
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

/**
 * Edit From WordPress 添加面包屑导航
 * https://www.wpdaxue.com/wordpress-add-a-breadcrumb.html
 */
function apc_breadcrumbs($show_title=false) {
    $delimiter = '<div class="divider">/</div>'; // 分隔符
    $before = '<div class="active section">'; // 在当前链接前插入
    $after = '</div>'; // 在当前链接后插入
    if ( !is_home() && !is_front_page() || is_paged() ) {
        // echo '<div itemscope itemtype="http://schema.org/WebPage" id="crumbs">'.__( 'You are here:' , 'cmp' );
        echo '<div class="ui breadcrumb" itemscope itemtype="http://schema.org/WebPage">';
        global $post;
        $homeLink = home_url();
        echo ' <a class="section" itemprop="breadcrumb" href="' . $homeLink . '">' . "首页" . '</a> ' . $delimiter . ' ';
        if ( is_category() ) { // 分类 存档
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0){
                $cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
                echo $cat_code = str_replace ('<a','<a class="section" itemprop="breadcrumb"', $cat_code );
            }
            echo $before . '' . single_cat_title('', false) . '' . $after;
        } elseif ( is_day() ) { // 天 存档
            echo '<a class="section" itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a class="section" itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif ( is_month() ) { // 月 存档
            echo '<a class="section" itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif ( is_year() ) { // 年 存档
            echo $before . get_the_time('Y') . $after;
        } elseif ( is_single() && !is_attachment() ) { // 文章
            if ( get_post_type() != 'post' ) { // 自定义文章类型
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else { // 文章 post
                $cat = get_the_category(); $cat = $cat[0];
                $cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $cat_code = str_replace ('<a','<a class="section" itemprop="breadcrumb"', $cat_code );
                if($show_title === true){
                    echo $before . get_the_title() . $after;
                }elseif(is_string($show_title)){
                    echo $before . $show_title . $after;
                }

            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif ( is_attachment() ) { // 附件
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); //$cat = $cat[0];
            echo '<a class="section" itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif ( is_page() && !$post->post_parent ) { // 页面
            echo $before . get_the_title() . $after;
        } elseif ( is_page() && $post->post_parent ) { // 父级页面
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a class="section" itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif ( is_search() ) { // 搜索结果
            echo $before ;
            printf( '搜索：%s',  get_search_query() );
            echo  $after;
        } elseif ( is_tag() ) { //标签 存档
            echo $before ;
            printf( '标签存档: %s', single_tag_title( '', false ) );
            echo  $after;
        } elseif ( is_author() ) { // 作者存档
            global $author;
            $userdata = get_userdata($author);
            echo $before ;
            printf( '作者存档: %s',  $userdata->display_name );
            echo  $after;
        } elseif ( is_404() ) { // 404 页面
            echo $before;
            echo "不存在的";
            echo  $after;
        }
        if ( get_query_var('paged') ) { // 分页
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
                echo sprintf( '页数 %s', get_query_var('paged') );
        }
        echo '</div>';
    }
}

function apc_the_tags($tag_list, $before, $sep, $after, $id){
    $tag_list = preg_replace_callback('|<a (.+?)>|i','apc_the_tags_callback', $tag_list);
	// var_dump($tag_list);
	return $tag_list;
}

function apc_the_tags_callback($matches){
    // var_dump($matches);
    return "<a " . $matches[1] . ' class="ui label">';
    // return $matches[0];
}

add_filter( 'the_tags', 'apc_the_tags', 10, 5);

function apc_comment_text( $comment_text, $comment, $args ) {
    $parent_comment_id = intval($comment->comment_parent);
    if($parent_comment_id > 0){
        $parent = get_comment($parent_comment_id);
    }else{
        $parent = null;
    }
    if($parent){
        $parent_link = sprintf(
            '<a class="mention" href="%1$s">@%2$s</a>',
            get_comment_link($parent),
            $parent->comment_author
        );
        $comment_text = $parent_link . $comment_text;
    }
    return $comment_text;
}

add_filter( 'comment_text', 'apc_comment_text', 10, 3);

function apc_paginate_comments_links_callback($matches){
    $class_text = $matches[2];

    if(mb_strpos($class_text, "current") > -1){
        $class_text .= " disabled";
    }
    $class_text .= " ui basic button";
    return sprintf('class="%1$s"', $class_text);
}

// function the_apc_paginate_links($args=array()){
//     $args["type"] = "array";
//     $links = paginate_links($args);
//     $pattern = '/class=(\'|\")(.+?)(\'|\")/i';
//     $new_links = array();
//     foreach ($links as $link) {
//         $link = preg_replace_callback($pattern, "apc_paginate_links_callback", $link);
//         $new_links[] = $link;
//     }
//     echo join("\n", $new_links);
// }

function apc_paginate_comments_links( $post_id, $args = array() ) {
    global $wp_rewrite;

    if ( ! is_singular() )
        return;
    if(!$post_id){
        return;
    }

    $args["type"] = "array";

    $page = get_query_var('cpage');
    if ( !$page )
        $page = 1;
    $comments_query_args = array(
        "post_id" => $post_id
    );

    $comments_query = new WP_Comment_Query;
    $comments = $comments_query->query( $comments_query_args );

    $max_page = get_comment_pages_count($comments);
    $defaults = array(
        'base' => add_query_arg( 'cpage', '%#%' ),
        'total' => $max_page,
        'current' => $page,
    );
    if ( $wp_rewrite->using_permalinks() )
        $defaults['base'] = user_trailingslashit(trailingslashit(get_permalink()) . $wp_rewrite->comments_pagination_base . '-%#%', 'commentpaged');

    $args = wp_parse_args( $args, $defaults );
    $links = paginate_links( $args );
    if(!$links){
        return;
    }
    $pattern = '/class=(\'|\")(.+?)(\'|\")/i';
    $new_links = array();
    foreach ($links as $link) {
        $link = preg_replace_callback($pattern, "apc_paginate_comments_links_callback", $link);
        $new_links[] = $link;
    }
    echo join("\n", $new_links);
}
