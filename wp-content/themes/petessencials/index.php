<?php

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        // get_template_part('partials/header_menu', 'header_menu');
        the_content();

    endwhile;
endif;

get_footer();
