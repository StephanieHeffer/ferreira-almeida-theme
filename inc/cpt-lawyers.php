<?php

function fa_register_lawyers_cpt() {
    register_post_type('lawyer', [
        'labels' => [
            'name'          => 'Advogados',
            'singular_name' => 'Advogado',
            'add_new_item'  => 'Adicionar Advogado',
            'edit_item'     => 'Editar Advogado',
        ],
        'public'       => true,
        'menu_icon'    => 'dashicons-businessperson',
        'supports'     => ['title', 'thumbnail'],
        'has_archive'  => false,
        'rewrite'      => ['slug' => 'advogados'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'fa_register_lawyers_cpt');