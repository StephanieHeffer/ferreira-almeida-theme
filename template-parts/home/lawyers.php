<?php
$eyebrow = get_field('lawyers_eyebrow');
$title   = get_field('lawyers_title');
?>
<section id="lawyers" class="bg-white py-24">

    <div class="max-w-7xl mx-auto px-6">

        <?php if ($eyebrow) : ?>
            <span class="font-body text-secondary font-semibold text-4xl lg:text-lg uppercase tracking-wide">
                <?php echo esc_html($eyebrow); ?>
            </span>
        <?php endif; ?>

        <?php if ($title) : ?>
            <h2 class="mt-4 font-title text-dark text-6xl lg:text-5xl leading-tight">
                <?php echo wp_kses_post($title); ?>
            </h2>
        <?php endif; ?>
        <!-- Ferreira & Almeida-->
         <?php
        $featured_lawyers = new WP_Query([
            'post_type'      => 'lawyer',
            'posts_per_page' => 2,
            'meta_key'       => 'featured_order',
            'orderby'        => 'meta_value_num',
            'order'          => 'ASC',
            'meta_query'     => [
                [
                    'key'     => 'enabled',
                    'value'   => '1',
                    'compare' => '=',
                ],
                [
                    'key'     => 'featured_partner',
                    'value'   => '1',
                    'compare' => '=',
                ],
            ],
        ]);
        ?>

        <?php if ( $featured_lawyers->have_posts() ) : ?>
        <div class="grid grid-cols-2 gap-8 lg:gap-16 mt-10 lg:mt-14">
            <?php while ( $featured_lawyers->have_posts() ) : $featured_lawyers->the_post(); ?>

                    <?php
                    $oab      = get_field('oab');
                    $bio = fa_is_en() ? get_field('bio_en') : get_field('bio');
                        if (!$bio) {
                            $bio = get_field('bio');
                        }
                    $linkedin = get_field('linkedin');
                    ?>

            <article class="flex flex-col gap-4 lg:gap-6">
                <?php if ( has_post_thumbnail() ) : ?>

                    <?php the_post_thumbnail(
                        'large',
                        [
                            'class' => 'w-full aspect-square object-cover',
                            'alt'   => get_the_title(),
                        ]
                    ); ?>

                 <?php endif; ?>

                <div>

                    <h3 class="font-body font-bold text-dark text-3xl lg:text-2xl">
                        <?php the_title(); ?>
                    </h3>
                    
                    <?php if ( $oab ) : ?>
                    <p class="mt-1 lg:mt-2 font-body text-dark text-3xl lg:text-base">
                        OAB/SP <?php echo esc_html( $oab ); ?>
                    </p>
                    <?php endif; ?>
                    
                    <?php if ( $bio ) : ?>
                    <p class="mt-2 lg:mt-4 font-body text-dark text-3xl lg:text-lg leading-relaxed">
                        <?php echo esc_html( $bio ); ?>
                    </p>
                    <?php endif; ?>

                    <?php if ( $linkedin ) : ?>
                                <a href="<?php echo esc_url( $linkedin ); ?>" class="mt-2 lg:mt-3 block" target="_blank">
                                    <img
                                        class="w-8 lg:w-4"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/in.png"
                                        alt="Linkedin">
                                </a>
                    <?php endif; ?>

                </div>

            </article>
            <?php endwhile; ?>

        </div>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <!-- Advogados Gerais-->
         <?php
        $lawyers = new WP_Query([
            'post_type'      => 'lawyer',
            'posts_per_page' => -1,
            'meta_query'     => [
                [
                    'key'     => 'enabled',
                    'value'   => '1',
                    'compare' => '=',
                ],
                [
                    'key'     => 'featured_partner',
                    'value'   => '0',
                    'compare' => '=',
                ],
            ],
        ]);
        ?>

        <?php if ( $lawyers->have_posts() ) : ?>
        <div id="lawyers-carousel" class="mt-10 overflow-x-auto cursor-grab select-none">
            <div class="flex gap-8 snap-x snap-mandatory w-max">
                <?php while ( $lawyers->have_posts() ) : $lawyers->the_post(); ?>

                        <?php
                        $oab      = get_field('oab');
                        $bio = fa_is_en() ? get_field('bio_en') : get_field('bio');
                        if (!$bio) {
                            $bio = get_field('bio');
                        }
                        $linkedin = get_field('linkedin');
                        ?>

                <article class="snap-start shrink-0 w-[40vw] lg:w-[380px] text-dark">

                    <?php if ( has_post_thumbnail() ) : ?>

                                <?php the_post_thumbnail(
                                    'large',
                                    [
                                        'class' => 'w-full aspect-square object-cover',
                                        'alt'   => get_the_title(),
                                    ]
                                ); ?>

                            <?php endif; ?>

                    <div class="mt-4">

                        <h3 class="font-body font-bold text-2xl lg:text-lg">

                            <?php the_title(); ?>

                        </h3>
                        <?php if ( $oab ) : ?>
                        <p class="mt-2 font-body text-2xl lg:text-lg">

                            OAB/SP <?php echo esc_html( $oab ); ?>

                        </p>
                        <?php endif; ?>

                        <?php if ( $bio ) : ?>
                        <p class="mt-2 font-body text-2xl lg:text-lg leading-relaxed">

                            <?php echo esc_html( $bio ); ?>

                        </p>
                        <?php endif; ?>
                        <?php if ( $linkedin ) : ?>
                                    <a href="<?php echo esc_url( $linkedin ); ?>" class="mt-2 block" target="_blank">
                                        <img
                                            class="w-8 lg:w-4"
                                            src="<?php echo get_template_directory_uri(); ?>/assets/img/in.png"
                                            alt="Linkedin">
                                    </a>
                                <?php endif; ?>

                    </div>

                </article>

                <?php endwhile; ?>
            </div>
        </div>

        <?php wp_reset_postdata(); ?>

        <?php endif; ?>

    </div>

</section>
