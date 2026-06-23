<?php

function fa_theme_setup() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => 'Menu Principal',
    ]);

}

add_action('after_setup_theme', 'fa_theme_setup');


if ( function_exists('acf_add_options_page') ) {

    acf_add_options_page([
        'page_title' => 'Informações Gerais',
        'menu_title' => 'Informações Gerais',
        'menu_slug'  => 'informacoes-gerais',
        'redirect'   => false
    ]);

}