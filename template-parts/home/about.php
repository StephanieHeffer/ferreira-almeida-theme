<?php

$image = get_field('about_image');
$eyebrow = get_field('about_eyebrow');
$title = get_field('about_title');
$text = get_field('about_text');

$image_url = $image
    ? $image['url']
    : get_template_directory_uri() . '/assets/img/escritorio.png';

$image_alt = $image && !empty($image['alt'])
    ? $image['alt']
    : '';

?>

<section id="about" class="bg-white py-16 lg:py-28">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-center">

            <div class="lg:order-1 order-2">

                <img
                    class="w-full rounded-sm"
                    src="<?php echo esc_url($image_url); ?>"
                    alt="<?php echo esc_attr($image_alt); ?>">

            </div>


            <div class="order-1 lg:order-2">

                <?php if ($eyebrow) : ?>

                    <span class="font-body text-secondary font-semibold text-4xl lg:text-lg uppercase tracking-wide">

                        <?php echo esc_html($eyebrow); ?>

                    </span>

                <?php endif; ?>


                <?php if ($title) : ?>

                    <h2 class="mt-4 font-title text-dark text-8xl lg:text-4xl leading-tight">

                        <?php echo wp_kses_post($title); ?>

                    </h2>

                <?php endif; ?>


                <?php if ($text) : ?>

                    <p class="mt-8 font-body text-dark text-4xl lg:text-2xl leading-relaxed">

                        <?php echo nl2br(esc_html($text)); ?>

                    </p>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>
