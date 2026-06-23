<?php get_header(); ?>

<main class="max-w-4xl mx-auto px-6 py-24">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <p class="mt-6 text-secondary font-body">

            <?php echo get_the_date(); ?>

        </p>


        <h1 class="mt-3 font-title text-5xl">

            <?php the_title(); ?>

        </h1>


        <?php if (has_excerpt()) : ?>

            <p class="mt-6 text-2xl text-dark/80">

                <?php the_excerpt(); ?>

            </p>

        <?php endif; ?>

        <?php if (has_post_thumbnail()) : ?>

            <?php the_post_thumbnail('full', [
                'class' => 'w-full h-[420px] object-cover'
            ]); ?>

        <?php endif; ?>

        <div class="mt-10 prose max-w-none">

            <?php the_content(); ?>

        </div>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>