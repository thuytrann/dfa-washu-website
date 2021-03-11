<?php

// adding the CSS and JS file

function gt_setup(){
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, "1.0", 'all');
    wp_enqueue_script('main', get_theme_file_uri().'/js/main.js', NULL, '1.0', true);
    wp_enqueue_script('carousel', get_theme_file_uri().'/js/carousel.js', NULL, '1.0', true);
    wp_enqueue_script('bootstraps', get_theme_file_uri()."//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js");
}

add_action('wp_enqueue_scripts', 'gt_setup');
 
// Adding Theme Support

function gt_init(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', 
        array('comment-list', 'comment-form', 'search-form')
);
}

add_action('after_setup_theme', 'gt_init');

// Projects Post Type

function gt_custom_post_type() {
    register_post_type('project', 
        array(
            'rewrite' => array('slug' => 'projects'),
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new_item' => 'Add New Project',
                'edit_item' => 'Edit Project'
            ),
            'menu-icon' => 'dashicons-clipboard',
            'public' => true,
            'has_archive'=> true,
            'supports' => array(
                'title', 'thumbnail', 'editor', 'excerpt', 'comments'
            )
        )
    );
}

add_action('init', 'gt_custom_post_type');