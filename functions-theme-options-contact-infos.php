<?php

// THEME OPTIONS - CONTACT INFOS

function lightwords_customize_register_contact_infos($wp_customize)
{
    // Sections
    $wp_customize->add_section('lightwords_contact_infos', array(
        'title' => __('Contact infos', 'theme'),
        'description' => __('Site-wied contact infos: address, phone number, opening hours...'),
        'priority' => 6000,
        'capability' => 'edit_theme_options',
    ));

    // Settings
    $wp_customize->add_setting('lw_contact_infos', array('default' => true, 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_addressFirmName', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_address1', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_address2', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_addressZipcode', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_addressCity', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_addressCountry', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_phone1', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_phone2', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_fax', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_opening', array('default' => true, 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_opening1', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_opening2', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_opening3', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_email', array('default' => "", 'transport' => 'refresh'));
    $wp_customize->add_setting('lw_contact_infos_linkToContactPage', array('default' => true, 'transport' => 'refresh'));

    // Controls
    $wp_customize->add_control('lw_contact_infos', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Contact infos'),
        'description' => __('Enable contact infos'),
    ));

    $wp_customize->add_control('lw_contact_infos_addressFirmName', array(
        'type' => 'text',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Firm name'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_address1', array(
        'type' => 'text',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Address line 1'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_address2', array(
        'type' => 'text',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Address line 2'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_addressZipcode', array(
        'type' => 'text',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Zip code'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_addressCity', array(
        'type' => 'text',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('City'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_addressCountry', array(
        'type' => 'text',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Country'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_phone1', array(
        'type' => 'number',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Phone 1'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_phone2', array(
        'type' => 'number',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Phone 2'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_fax', array(
        'type' => 'number',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Fax'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_opening', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Opening'),
        'description' => __('Enable opening hours'),
    ));
    $wp_customize->add_control('lw_contact_infos_opening1', array(
        'type' => 'text',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Opening hours 1'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_opening2', array(
        'type' => 'text',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Opening hours 2'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_opening3', array(
        'type' => 'text',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Opening hours 3'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_email', array(
        'type' => 'email',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Email'),
        'description' => __(''),
    ));
    $wp_customize->add_control('lw_contact_infos_linkToContactPage', array(
        'type' => 'checkbox',
        'priority' => 1,
        'section' => 'lightwords_contact_infos',
        'label' => __('Link to contact page'),
        'description' => __(''),
    ));
}

add_action('customize_register', 'lightwords_customize_register_contact_infos');
