<?php

// THEME OPTIONS

function lightwords_customize_register($wp_customize)
{
    // Sections
    $wp_customize->add_section('lightwords_options', array(
        'title' => __('Lightwords', 'theme'),
        'description' => __('Base theme options'),
        'priority' => 5000,
        'capability' => 'edit_theme_options',
    ));

    // Settings
    $wp_customize->add_setting('lw_settings_debug', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_debugBreakpoints', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_search', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_breadcrumbs', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_breadcrumbsInContent', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_hero', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_hasScrollDirectionTracking', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_stickyHeader', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_compressHeader', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_compressHeaderOffset', array(
        'default' => 200,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_compressHeaderLogoSwap', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_transparentHeader', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_expandDropdownsOnHover', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_hasScrollTop', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_scrollTopOffset', array(
        'default' => 400,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_fixedWidthContainers', array(
        'default' => false,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_fixedWidthHeader', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_fixedWidthFooter', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_fixedWidthContent', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_menuCartDropdown', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_menuMyAccountDropdown', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_rippleEffect', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_rippleSelector', array(
        'default' => '.btn, .scroll-btn, .rrssb-button > a',
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('lw_settings_pageTransitions', array(
        'default' => false,
        'transport' => 'refresh',
    ));

    // Controls
    $wp_customize->add_control('lw_settings_debug', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Debug'),
        'description' => __('Enable debug mode'),
    ));
    $wp_customize->add_control('lw_settings_debugBreakpoints', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Debug breakpoints'),
        'description' => __('Show current breakpoint infos (bottom right corner)'),
    ));
    $wp_customize->add_control('lw_settings_search', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Search'),
        'description' => __('Enable search bar'),
    ));
    $wp_customize->add_control('lw_settings_breadcrumbs', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Breadcrumbs'),
        'description' => __('Enable breadcrumbs'),
    ));
    $wp_customize->add_control('lw_settings_breadcrumbsInContent', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Breadcrumbs in content'),
        'description' => __('Show breadcrumbs under the page title'),
    ));
    $wp_customize->add_control('lw_settings_hero', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Hero'),
        'description' => __('Enable hero image'),
    ));
    $wp_customize->add_control('lw_settings_hasScrollDirectionTracking', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Scroll direction tracking'),
        'description' => __('Detects if the user scroll the page up or down'),
    ));
    $wp_customize->add_control('lw_settings_stickyHeader', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Sticky header'),
        'description' => __('The header of the page stays on top'),
    ));
    $wp_customize->add_control('lw_settings_compressHeader', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Compress header'),
        'description' => __('The header can shrink (reduce its height)'),
    ));
    $wp_customize->add_control('lw_settings_compressHeaderOffset', array(
        'type' => 'number',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Compress header offset'),
        'description' => __('Scroll distance in pixels before the header gets smaller'),
    ));
    $wp_customize->add_control('lw_settings_compressHeaderLogoSwap', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Compress header logo swap'),
        'description' => __('Replace the desktop logo with the tablet logo when header is compressed'),
    ));
    $wp_customize->add_control('lw_settings_transparentHeader', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Transparent header'),
        'description' => __('The header is transparent, then opacified when scrolling down'),
    ));
    $wp_customize->add_control('lw_settings_expandDropdownsOnHover', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Expand dropdown on hover'),
        'description' => __('Hover on dropdown menus to open them'),
    ));
    $wp_customize->add_control('lw_settings_hasScrollTop', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Scroll top button'),
        'description' => __('Show "scroll-to-top" button'),
    ));
    $wp_customize->add_control('lw_settings_scrollTopOffset', array(
        'type' => 'number',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Scroll top offset'),
        'description' => __('How much scroll in pixel before showing the scroll top button'),
    ));
    $wp_customize->add_control('lw_settings_fixedWidthContainers', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Fixed-width containers'),
        'description' => __('All containers are fixed-width (not fluid)'),
    ));
    $wp_customize->add_control('lw_settings_fixedWidthHeader', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Fixed-width header'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_settings_fixedWidthFooter', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Fixed-width footer'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_settings_fixedWidthContent', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Fixed-width content'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_settings_menuCartDropdown', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Dropdown cart menu item'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_settings_menuMyAccountDropdown', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Dropdown "my account" menu item'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_settings_rippleEffect', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Ripple effect'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_settings_rippleSelector', array(
        'type' => 'text',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Ripple effect CSS selector'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_settings_pageTransitions', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_options',
        'label' => __('Page transitions'),
        'description' => __('Animation between page load'),
    ));
}

add_action('customize_register', 'lightwords_customize_register');
