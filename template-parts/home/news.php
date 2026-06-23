<?php

$eyebrow = get_field('news_eyebrow');
$title   = get_field('news_title');
$mode    = get_field('news_mode');

$current_lang = fa_current_lang();

$args = [
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'meta_query'     => [
        [
            'key'   => 'post_lang',
            'value' => $current_lang,
        ],
    ],
];

if ($mode === 'random') {
    $args['orderby'] = 'rand';
}

if ($mode === 'manual') {
    $manual_posts = array_filter([
        get_field('news_post_1'),
        get_field('news_post_2'),
        get_field('news_post_3'),
    ]);

    $manual_ids = array_map(function ($post) {
        return is_object($post) ? $post->ID : $post;
    }, $manual_posts);

    if (!empty($manual_ids)) {
        $args['post__in'] = $manual_ids;
        $args['orderby'] = 'post__in';
        $args['posts_per_page'] = count($manual_ids);
    }
}

$news_query = new WP_Query($args);

?>

<section id="news" class="bg-light py-24">

    <div class="max-w-7xl mx-auto px-6">

        <?php if ($eyebrow) : ?>
            <span class="font-body text-secondary font-semibold uppercase text-4xl lg:text-lg tracking-wide">
                <?php echo esc_html($eyebrow); ?>
            </span>
        <?php endif; ?>

        <?php if ($title) : ?>
            <h2 class="mt-4 font-title text-dark text-6xl lg:text-3xl leading-tight">
                <?php echo wp_kses_post($title); ?>
            </h2>
        <?php endif; ?>

        <?php if ( $news_query->have_posts() ) : ?>
            <div class="mt-10 grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-20">

                <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>

                    <article class="group">

                        <a href="<?php the_permalink(); ?>" class="block overflow-hidden">

                            <?php if (has_post_thumbnail()) : ?>

                                <?php the_post_thumbnail(
                                    'large',
                                    [
                                        'class' => 'w-full h-[220px] lg:h-[190px] object-cover transition duration-300 group-hover:scale-[1.02]',
                                        'alt'   => get_the_title(),
                                    ]
                                ); ?>

                            <?php else : ?>

                                <img
                                    class="w-full h-[220px] lg:h-[190px] object-cover transition duration-300 group-hover:scale-[1.02]"
                                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/contratoemartelo.png'); ?>"
                                    alt="<?php the_title_attribute(); ?>">

                            <?php endif; ?>

                        </a>

                        <p class="mt-4 font-body text-dark/70 text-3xl lg:text-sm">
                            <?php echo get_the_date('d \d\e F \d\e Y'); ?>
                        </p>

                        <h3 class="mt-2 font-body font-semibold text-dark text-4xl lg:text-xl leading-snug group-hover:text-secondary transition">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                    </article>

                <?php endwhile; ?>

            </div>
        <?php wp_reset_postdata(); ?>

        <?php endif; ?>
    </div>

</section>
