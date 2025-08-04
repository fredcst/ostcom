<?php

function my_supports()
{
    register_nav_menu('header', 'Primary Menu');
    register_nav_menu('footer', 'Footer Menu');
}

add_action('after_setup_theme', 'my_supports');