<?php
$home_url = fa_home_url_lang();
?>
<header class="fixed top-0 left-0 w-full z-50 bg-primary h-[10vh] lg:h-[86px]">
    <div class="h-full px-6 lg:px-8 flex items-center justify-between">

        <a class="logo shrink-0" href="<?php echo esc_url(fa_home_url_lang()); ?>">
            <img
                class="h-60 lg:h-22 w-auto"
                src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg"
                alt="Ferreira & Almeida">
        </a>

        <div class="flex items-center gap-10">
            <?php if (fa_is_home_like()) : ?>
            <button  id="mobile-button" class="text-6xl lg:hidden text-secondary">
                ☰
            </button>
            <nav id="mobile-menu" class="hidden fixed inset-0 z-50 lg:hidden">
                <div class="absolute inset-0 bg-dark/60 backdrop-blur-md"></div>
                <ul class="relative z-10 pt-40 px-10 space-y-6 text-white text-7xl *:py-10 font-body">
                    <li class="mobile-item">
                        <a href="<?php echo esc_url($home_url . '#hero'); ?>">
                            Home
                        </a>
                    </li>

                    <li class="mobile-item">
                        <a href="<?php echo esc_url($home_url . '#about'); ?>">
                            <?php echo fa_is_en() ? 'About' : 'Quem Somos'; ?>
                        </a>
                    </li>

                    <li class="mobile-item">
                        <a href="<?php echo esc_url($home_url . '#lawyers'); ?>">
                            <?php echo fa_is_en() ? 'Lawyers' : 'Advogados'; ?>
                        </a>
                    </li>

                    <li class="mobile-item">
                        <a href="<?php echo esc_url($home_url . '#news'); ?>">
                            <?php echo fa_is_en() ? 'News' : 'Notícias'; ?>
                        </a>
                    </li>

                </ul>

            </nav>
            <nav class="hidden lg:block">
                <ul class="flex gap-9 font-body text-white text-sm">
                    <li><a href="<?php echo esc_url($home_url . '#hero'); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url($home_url . '#about'); ?>"><?php echo fa_is_en() ? 'About' : 'Quem Somos'; ?></a></li>
                    <li><a href="<?php echo esc_url($home_url . '#lawyers'); ?>"><?php echo fa_is_en() ? 'Lawyers' : 'Advogados'; ?></a></li>
                    <li><a href="<?php echo esc_url($home_url . '#news'); ?>"><?php echo fa_is_en() ? 'News' : 'Notícias'; ?></a></li>
                </ul>
            </nav>
            <div class="relative group font-body text-white text-sm">
                <button id="lang-button" class="flex items-center gap-2 text-6xl lg:text-sm" type="button">
                    <?php echo fa_is_en() ? 'EN' : 'PT'; ?>
                    <span class="text-secondary">∨</span>
                </button>

                <div id="lang-menu" class="absolute right-0 mt-3 hidden bg-dark border border-secondary/40 min-w-[90px] z-[100]">
                    <a href="<?php echo esc_url(fa_lang_url('pt')); ?>" class="block text-6xl lg:text-sm px-4 py-3 hover:bg-primary <?php echo !fa_is_en() ? 'bg-primary' : ''; ?>">PT</a>
                    <a href="<?php echo esc_url(fa_lang_url('en')); ?>" class="block text-6xl lg:text-sm px-4 py-3 hover:bg-primary <?php echo fa_is_en() ? 'bg-primary' : ''; ?>">EN</a>
                </div>
            </div>
            <?php endif; ?>
            
        </div>

    </div>
</header>
