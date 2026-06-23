<?php get_header(); ?>

<?php

if (is_page('en')): ?>
    <main>
    <?php
    get_header();

    get_template_part('template-parts/home/hero');
    get_template_part('template-parts/home/about');
    get_template_part('template-parts/home/lawyers');
    get_template_part('template-parts/home/news');

    ?>
    </main>
    <?php
    get_footer();
    return;
endif;
?>
<main class="max-w-4xl mx-auto px-6 py-24">

<?php while(have_posts()) : the_post(); ?>

    <h1 class="font-title text-dark text-5xl">

        <?php the_title(); ?>

    </h1>


    <div class="mt-10 font-body text-dark leading-relaxed">

        <?php the_content(); ?>

    </div>

<?php endwhile; ?>

</main>

<?php get_footer(); ?>