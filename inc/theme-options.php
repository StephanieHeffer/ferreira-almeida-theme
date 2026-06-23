<?php

function fa_register_theme_options_page() {
    add_menu_page(
        'Informações Gerais',
        'Informações Gerais',
        'manage_options',
        'fa-informacoes-gerais',
        'fa_render_theme_options_page',
        'dashicons-info',
        30
    );
}
add_action('admin_menu', 'fa_register_theme_options_page');


function fa_register_theme_options_settings() {
    register_setting('fa_theme_options', 'fa_footer_description');
    register_setting( 'fa_theme_options', 'fa_footer_description_en');
    register_setting('fa_theme_options', 'fa_phone');
    register_setting('fa_theme_options', 'fa_email');
    register_setting('fa_theme_options', 'fa_address');
}
add_action('admin_init', 'fa_register_theme_options_settings');


function fa_render_theme_options_page() {
    ?>
    <div class="wrap">
        <h1>Informações Gerais</h1>

        <form method="post" action="options.php">
            <?php settings_fields('fa_theme_options'); ?>

            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="fa_footer_description">Texto do rodapé</label>
                    </th>
                    <td>
                        <textarea
                            id="fa_footer_description"
                            name="fa_footer_description"
                            rows="4"
                            class="large-text"><?php echo esc_textarea(get_option('fa_footer_description')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="fa_footer_description_en">Texto do rodapé EN</label>
                    </th>
                    <td>
                        <textarea
                            id="fa_footer_description_en"
                            name="fa_footer_description_en"
                            rows="4"
                            class="large-text"><?php echo esc_textarea(get_option('fa_footer_description_en')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="fa_phone">Telefone</label>
                    </th>
                    <td>
                        <input
                            type="text"
                            id="fa_phone"
                            name="fa_phone"
                            class="regular-text"
                            value="<?php echo esc_attr(get_option('fa_phone')); ?>">
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="fa_email">E-mail</label>
                    </th>
                    <td>
                        <input
                            type="email"
                            id="fa_email"
                            name="fa_email"
                            class="regular-text"
                            value="<?php echo esc_attr(get_option('fa_email')); ?>">
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="fa_address">Endereço</label>
                    </th>
                    <td>
                        <textarea
                            id="fa_address"
                            name="fa_address"
                            rows="4"
                            class="large-text"><?php echo esc_textarea(get_option('fa_address')); ?></textarea>
                    </td>
                </tr>
            </table>

            <?php submit_button('Salvar informações'); ?>
        </form>
    </div>
    <?php
}