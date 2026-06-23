<?php

$eyebrow = get_field('hero_eyebrow');
$title = get_field('hero_title');
$description = get_field('hero_description');
$button_text = get_field('hero_button_text');
$button_url = get_field('hero_button_url');
$image = get_field('hero_image');

$image_url = $image ? $image['url'] : get_template_directory_uri() . '/assets/img/hero2.png';
$image_alt = $image && ! empty($image['alt']) ? $image['alt'] : '';

?>

<section id="hero" class="pt-[10vh] lg:pt-[86px] relative min-h-[calc(100vh-72px)] lg:min-h-[calc(100vh-86px)] overflow-hidden">

    <img
        class="absolute inset-0 w-full h-full object-cover object-[80%_center] lg:object-center"
        src="<?php echo esc_url($image_url); ?>"
        alt="<?php echo esc_attr($image_alt); ?>">

    <div class="absolute inset-0 bg-gradient-to-r from-[#041221] via-[#041221]/85 to-transparent lg:from-[#041221] lg:via-[#041221]/95 lg:via-[#041221]/75 ">
    </div>

    <div class="relative z-10 h-full flex items-center">

        <div class="max-w-7xl mx-auto w-full px-6">

            <div class="lg:max-w-[520px] pt-15 pb-15">

                <?php if ($eyebrow) : ?>
                    <span class="font-body text-secondary font-semibold text-4xl lg:text-lg">
                        <?php echo esc_html($eyebrow); ?>
                    </span>
                <?php endif; ?>

                <?php if ($title) : ?>
                <h1 class="mt-8 font-title text-white text-8xl lg:text-5xl leading-tight">
                    <?php echo wp_kses_post($title); ?>
                </h1>
                <?php endif; ?>

                <div class="mt-8 w-[60%] lg:w-16 border-b-2 border-secondary"></div>
                
                <?php if ($description) : ?>
                <p class="mt-8 font-body text-light text-6xl lg:text-xl leading-relaxed">
                    <?php echo nl2br(esc_html($description)); ?>
                </p>
                <?php endif; ?>

                <?php if ($button_text && $button_url) : ?>
                    <a href="<?php echo esc_url($button_url); ?>"
                       class="mt-10 inline-flex items-center justify-center rounded-full bg-secondary px-10 py-15 lg:py-5 font-body font-semibold text-white text-6xl lg:text-sm uppercase tracking-wide hover:opacity-90 transition">
                        <?php echo esc_html($button_text); ?>
                    </a>
                <?php endif; ?>

            </div>

        </div>

    </div>

</section>
