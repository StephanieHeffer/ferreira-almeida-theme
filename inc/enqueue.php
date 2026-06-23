<?php

function fa_enqueue_assets() {

    wp_enqueue_style(
        'fa-tailwind',
        get_template_directory_uri() . '/assets/css/output.css',
        [],
        filemtime( get_template_directory() . '/assets/css/output.css' )
    );

}

add_action( 'wp_enqueue_scripts', 'fa_enqueue_assets' );

wp_enqueue_script(
    'fa-main',
    get_template_directory_uri() . '/assets/js/main.js',
    [],
    filemtime(get_template_directory() . '/assets/js/main.js'),
    true
);