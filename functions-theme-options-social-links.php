<?php

// THEME OPTIONS - SOCIAL LINKS

function lightwords_customize_register_social_links($wp_customize)
{
    // Sections
    $wp_customize->add_section('lightwords_social_links', array(
        'title' => __('Social links', 'theme'),
        'description' => __('Site-wide social networks links'),
        'priority' => 7000,
        'capability' => 'edit_theme_options',
    ));

    // Settings
    $wp_customize->add_setting('lw_social_links', array('default' => true, 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_topbar', array('default' => true, 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_facebook', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_twitter', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_googlePlus', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_linkedin', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_youtube', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_viadeo', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_email', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_tumblr', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_reddit', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_pinterest', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_pocket', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_social_links_github', array('default' => "", 'transport' => 'refresh'));

    // Controls
    $wp_customize->add_control('lw_social_links', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Social links'),
        'description' => __('Enable social networks links'),
    ));
    $wp_customize->add_control('lw_social_links_topbar', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Social links in topbar'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_facebook', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Facebook'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_twitter', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Twitter'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_googlePlus', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Google+'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_linkedin', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Linkedin'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_youtube', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Youtube'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_viadeo', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Viadeo'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_email', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Email'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_tumblr', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Tumblr'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_reddit', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Reddit'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_pinterest', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Pinterest'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_pocket', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Pocket'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_social_links_github', array(
        'type' => 'url',
        'priority' => 1,
        'section' => 'lightwords_social_links',
        'label' => __('Github'),
        'description' => __(''),
    ));
}

add_action('customize_register', 'lightwords_customize_register_social_links');
