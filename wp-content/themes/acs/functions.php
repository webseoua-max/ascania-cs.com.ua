<?php
/*
 * This is the child theme for Hello Elementor theme, generated with Generate Child Theme plugin by catchthemes.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
add_action( 'wp_enqueue_scripts', 'acs_enqueue_styles' );
function acs_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
	wp_enqueue_style('acs-global', get_stylesheet_directory_uri() . '/assets/css/global.css' );
}
function acs_scripts() {
	wp_enqueue_script('acs-custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);
}
add_action( 'wp_enqueue_scripts', 'acs_scripts' );
/*
 * Your code goes below
 */
// off xml
add_filter('xmlrpc_enabled', '__return_false');
//clasic widget
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
//remove wpcf7 autop
add_filter('wpcf7_autop_or_not', '__return_false');
//url widget
function alter_login_headerurl() {
	return '/'; 
}
add_action('login_headerurl','alter_login_headerurl');

// === Телефони у верхньому рядку хедера ===
add_action('wp_footer', function() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var inner = document.querySelector('.elementor-element-8027c60 .e-con-inner');
        if (!inner) return;

        // Білі SVG іконки закодовані в base64 - гарантовано білі
        var tgIcon = 'data:image/svg+xml;base64,' + btoa('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#fff" d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>');

        var vbIcon = 'data:image/svg+xml;base64,' + btoa('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fff" d="M444 49.9C431.3 38.2 379.9.9 265.3.4c0 0-135.1-8.1-200.9 52.3C27.8 89.3 14.9 143 13.5 209.5c-1.4 66.5-3.1 191.1 117 224.9h.1l-.1 51.6s-.8 20.7 12.9 24.9c16.6 5.2 26.4-10.7 42.3-27.8 8.7-9.4 20.7-23.2 29.8-33.7 82.2 6.9 145.3-8.9 152.5-11.2 16.6-5.4 110.5-17.4 125.7-142 15.8-128.6-7.6-209.8-49.7-246.3zm-88.5 242.3c-12.9 104-89 110.6-103.2 115.1-6 1.9-62.7 16.2-136.8 11.2 0 0-54.2 65.4-71.1 82.4-2.6 2.6-5.6 3.7-7.6 3.1-2.9-.8-3.7-4.2-3.7-9.4l.4-81.1c-101.9-28.2-96-137.7-94.9-196.3 1.1-58.6 11.9-105.8 43.7-137.1 57.4-52 176.2-45.1 176.2-45.1 100.2.4 147.6 30.6 158.1 40.6 36.6 31.5 55.5 103.8 38.9 216.6zM310 315.6c-11-6.4-21.9-3.7-27 3.4l-9.7 12.7c-5.4 7.1-16.3 5.9-16.3 5.9-59.6-15.2-75.5-75.5-75.5-75.5s-1.2-10.9 5.9-16.3l12.7-9.7c7.1-5.1 9.8-16 3.4-27-19.7-33.8-29.9-40.8-34.9-47.7-5.3-6.6-14.9-8.1-22.6-3.7l-.2.1c-15.4 8.8-32.4 25.6-27.5 42.8 8.5 29.8 33.8 119.7 119.7 166 86 46.5 175.5 26.3 205 14.2 16.7-6.8 31.2-25.2 21-41.4-7-10.4-15.1-19.2-54-24.8z"/></svg>');

        function makeItem(label, phone, phoneFormatted, tgHref, vbHref) {
            return '<div class="acs-phone-item">' +
                '<span>' + label + ':</span>' +
                '<a class="acs-num" href="tel:' + phone + '">' + phoneFormatted + '</a>' +
                '<a class="acs-icon-tg" href="' + tgHref + '" target="_blank" title="Telegram"><img src="' + tgIcon + '" width="13" height="13" alt="Telegram"></a>' +
                '<a class="acs-icon-vb" href="' + vbHref + '" title="Viber"><img src="' + vbIcon + '" width="13" height="13" alt="Viber"></a>' +
            '</div>';
        }

        var phones = document.createElement('div');
        phones.className = 'acs-phones-bar';
        phones.innerHTML =
            makeItem('Автомийка', '+380985670202', '+38 098 567 0202', 'https://t.me/+380985670202', 'viber://chat?number=%2B380985670202') +
            makeItem('Кузовний ремонт', '+380985680202', '+38 098 568 0202', 'https://t.me/+380985680202', 'viber://chat?number=%2B380985680202') +
            makeItem('Підбір запчастин', '+380672464304', '+38 067 246 4304', 'https://t.me/+380672464304', 'viber://chat?number=%2B380672464304');

        inner.insertBefore(phones, inner.children[1]);
    });
    </script>
    <?php
});
