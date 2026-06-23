<?php

function fa_is_en() {
    if (is_page('en')) {
        return true;
    }

    if (is_singular('post') && get_field('post_lang') === 'en') {
        return true;
    }

    return false;
}

function fa_current_lang() {
    return fa_is_en() ? 'en' : 'pt';
}

function fa_home_url_lang() {
    return fa_is_en() ? home_url('/en/') : home_url('/');
}

function fa_is_home_like() {
    return is_front_page() || is_page('en');
}

function fa_lang_url($lang) {
    return $lang === 'en' ? home_url('/en/') : home_url('/');
}