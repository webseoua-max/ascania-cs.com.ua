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
    // SVG іконки прямо в коді - білі на кольоровому фоні
    $tg_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="13" height="13" fill="#ffffff"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>';
    $vb_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="13" height="13" fill="#ffffff"><path d="M18.121 2.879C16.243 1.346 13.33.057 7.9.018 7.9.018 1.32-.39.387 6.23c-.38 2.702-.43 6.219 1.837 9.73h.003l-.003 3.524s-.054 1.414.878 1.7c1.133.355 1.8-.731 2.881-1.899.595-.643 1.414-1.584 2.035-2.304 5.616.472 9.935-.608 10.425-.766 1.134-.369 7.55-1.188 8.595-9.694.912-8.792-.52-14.33-8.909-9.442zm.571 9.243c-.881 7.104-6.08 7.554-7.05 7.863-.41.13-4.284 1.107-9.35.766 0 0-3.701 4.469-4.858 5.631-.178.178-.382.253-.52.212-.197-.056-.253-.286-.252-.642l.027-5.543c-6.96-1.925-6.56-9.408-6.482-13.42.079-4.003.813-7.228 2.985-9.367C-2.3.319 6.327.836 6.327.836c6.847.028 10.085 2.09 10.807 2.775 7.247 6.231 5.558 8.511.558 8.511zm.558-8.511zM9.834 16.1c-.057 0-.116-.002-.175-.006-1.32-.09-2.59-.622-3.686-1.538-.937-.784-1.717-1.836-2.258-3.04-.55-1.226-.793-2.53-.703-3.773.138-1.907 1.047-3.273 2.395-3.63.498-.133 1.017-.04 1.417.25.445.321.765.862.9 1.524l.282 1.363c.19.916-.184 1.36-.423 1.596l-.44.435c.233.687.65 1.327 1.218 1.858.568.53 1.256.895 1.985 1.063l.447-.45c.254-.257.725-.619 1.63-.394l1.316.34c.645.167 1.163.517 1.452.984.264.427.323.93.163 1.404-.382 1.129-1.77 1.974-3.52 1.974z"/></svg>';
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var inner = document.querySelector('.elementor-element-8027c60 .e-con-inner');
        if (!inner) return;
        var tgSvg = <?php echo json_encode($tg_svg); ?>;
        var vbSvg = <?php echo json_encode($vb_svg); ?>;
        var phones = document.createElement('div');
        phones.className = 'acs-phones-bar';
        phones.innerHTML =
          '<div class="acs-phone-item">' +
            '<span>Автомийка:</span>' +
            '<a class="acs-num" href="tel:+380985670202">+38 098 567 0202</a>' +
            '<a class="acs-icon-tg" href="https://t.me/+380985670202" target="_blank" title="Telegram">' + tgSvg + '</a>' +
            '<a class="acs-icon-vb" href="viber://chat?number=%2B380985670202" title="Viber">' + vbSvg + '</a>' +
          '</div>' +
          '<div class="acs-phone-item">' +
            '<span>Кузовний ремонт:</span>' +
            '<a class="acs-num" href="tel:+380985680202">+38 098 568 0202</a>' +
            '<a class="acs-icon-tg" href="https://t.me/+380985680202" target="_blank" title="Telegram">' + tgSvg + '</a>' +
            '<a class="acs-icon-vb" href="viber://chat?number=%2B380985680202" title="Viber">' + vbSvg + '</a>' +
          '</div>' +
          '<div class="acs-phone-item">' +
            '<span>Підбір запчастин:</span>' +
            '<a class="acs-num" href="tel:+380672464304">+38 067 246 4304</a>' +
            '<a class="acs-icon-tg" href="https://t.me/+380672464304" target="_blank" title="Telegram">' + tgSvg + '</a>' +
            '<a class="acs-icon-vb" href="viber://chat?number=%2B380672464304" title="Viber">' + vbSvg + '</a>' +
          '</div>';
        inner.insertBefore(phones, inner.children[1]);
    });
    </script>
    <?php
});
