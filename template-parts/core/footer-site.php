<?php
$description = fa_is_en()
    ? get_option('fa_footer_description_en')
    : get_option('fa_footer_description');

if (!$description) {
    $description = get_option('fa_footer_description');
}
$phone   = get_option('fa_phone');
$email   = get_option('fa_email');
$address = get_option('fa_address');

?>
<footer class="bg-dark py-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col lg:flex-row lg:justify-between gap-10">

            <div class="text-center lg:text-left">

                <img
                    class="h-60 lg:h-28 w-auto mx-auto lg:mx-0"
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg"
                    alt="Ferreira & Almeida">
                <?php if ($description) : ?>
                <p class="mt-4 lg:max-w-[280px] mx-auto lg:mx-0 font-body text-light text-3xl lg:text-sm leading-relaxed">

                    <?php echo nl2br(esc_html($description)); ?>

                </p>
                <?php endif; ?>
            </div>


            <div class="text-center lg:text-left">

                <span class="font-body text-secondary font-semibold text-3xl lg:text-sm uppercase">

                    <?php echo fa_is_en() ? 'CONTACT' : 'CONTATO'; ?>

                </span>


                <ul class="mt-6 space-y-5 font-body text-light text-3xl lg:text-sm">

                    <?php if ($phone) : ?>
                        <li><?php echo esc_html($phone); ?></li>
                    <?php endif; ?>

                    <?php if ($email) : ?>
                        <li>

                            <a href="mailto:<?php echo esc_attr($email); ?>">

                                <?php echo esc_html($email); ?>

                            </a>

                        </li>
                    <?php endif; ?>


                    <?php if ($address) : ?>
                        <li>

                            <?php echo nl2br(esc_html($address)); ?>

                        </li>
                    <?php endif; ?>

                </ul>

            </div>

        </div>

        <div class="mt-12 border-t border-secondary"></div>


        <div class="mt-8 flex flex-col lg:flex-row gap-4 lg:gap-0 lg:justify-between items-center font-body text-light text-3xl lg:text-sm">

            <span>

                ©<?php echo date('Y'); ?> <?php echo fa_is_en() ? 'All rights reserved' : 'Todos os direitos reservados'; ?>

            </span>


            <a href="#">

                <?php echo fa_is_en() ? 'How this site was built' : 'Como o Site foi feito'; ?>

            </a>


            <a href="https://nousk.com.br">

                <?php echo fa_is_en() ? 'Developed by Nousk' : 'Desenvolvido por Nousk'; ?>

            </a>

        </div>

    </div>

</footer>