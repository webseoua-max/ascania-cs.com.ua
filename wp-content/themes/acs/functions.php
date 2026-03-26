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
        array('parent-style'),
        '2.1'
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
    // Telegram: літак
    $tg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="13" height="13"><path fill="#fff" d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>';
    // Viber: телефонна трубка
    $vb = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="13" height="13"><path fill="#fff" d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>';
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // === Sticky тільки темний верхній рядок ===
        var topBar = document.querySelector('.elementor-element-8027c60');
        if (topBar) {
            var barHeight = topBar.offsetHeight;
            window.addEventListener('scroll', function() {
                if (window.scrollY > barHeight) {
                    topBar.classList.add('acs-topbar-fixed');
                } else {
                    topBar.classList.remove('acs-topbar-fixed');
                }
            });
        }

        // === Телефони у верхньому рядку ===
        var inner = document.querySelector('.elementor-element-8027c60 .e-con-inner');
        if (inner) {
            var tgSvg = <?php echo json_encode($tg); ?>;
            var vbSvg = <?php echo json_encode($vb); ?>;
            function makeItem(label, phone, phoneFormatted, tgHref, vbHref) {
                return '<div class="acs-phone-item">' +
                    '<span>' + label + ':</span>' +
                    '<a class="acs-num" href="tel:' + phone + '">' + phoneFormatted + '</a>' +
                    '<a class="acs-icon-tg" href="' + tgHref + '" target="_blank" title="Telegram">' + tgSvg + '</a>' +
                    '<a class="acs-icon-vb" href="' + vbHref + '" title="Viber">' + vbSvg + '</a>' +
                '</div>';
            }
            var phones = document.createElement('div');
            phones.className = 'acs-phones-bar';
            phones.innerHTML =
                makeItem('Автомийка', '+380985670202', '+38 098 567 0202', 'https://t.me/+380985670202', 'viber://chat?number=%2B380985670202') +
                makeItem('Кузовний ремонт', '+380985680202', '+38 098 568 0202', 'https://t.me/+380985680202', 'viber://chat?number=%2B380985680202') +
                makeItem('Підбір запчастин', '+380672464304', '+38 067 246 4304', 'https://t.me/+380672464304', 'viber://chat?number=%2B380672464304');
            inner.insertBefore(phones, inner.children[1]);
        }

        // === Футер: блок телефону — TG/Viber навпроти кожного номера ===
        var footerPhone = document.querySelector('.elementor-element-12a3208 .elementor-icon-box-content');
        if (footerPhone) {
            var desc = footerPhone.querySelector('.elementor-icon-box-description');
            if (desc) {
                desc.innerHTML =
                    '<div class="acs-sto-row">' +
                        '<span class="acs-footer-label">СТО</span>' +
                    '</div>' +
                    '<div class="acs-sto-row">' +
                        '<a class="acs-sto-num" href="tel:+380677759970">+380 67 775 9970</a>' +
                        '<a class="acs-icon-tg" href="https://t.me/+380677759970" target="_blank" title="Telegram">' + tgSvg + '</a>' +
                        '<a class="acs-icon-vb" href="viber://chat?number=%2B380677759970" title="Viber">' + vbSvg + '</a>' +
                    '</div>' +
                    '<div class="acs-sto-row">' +
                        '<a class="acs-sto-num" href="tel:+380985680202">+380 98 568 0202</a>' +
                        '<a class="acs-icon-tg" href="https://t.me/+380985680202" target="_blank" title="Telegram">' + tgSvg + '</a>' +
                        '<a class="acs-icon-vb" href="viber://chat?number=%2B380985680202" title="Viber">' + vbSvg + '</a>' +
                    '</div>';
            }
        }

        // === Футер: соц мережі — додаємо Instagram і TikTok ===
        var footerSoc = document.querySelector('.elementor-element-242f19c .elementor-icon-box-content');
        if (footerSoc) {
            var socDesc = footerSoc.querySelector('.elementor-icon-box-description');
            if (socDesc) {
                socDesc.innerHTML =
                    '<a class="acs-footer-soc" href="https://www.facebook.com/ascaniacarservice" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>' +
                    '<a class="acs-footer-soc" href="https://www.instagram.com/acs_brovary" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>' +
                    '<a class="acs-footer-soc" href="https://www.tiktok.com/@acs_brovary" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>';
            }
        }

        // === Іконки TG/Viber у нижньому блоку "Зв'язок з нами" ===
        var darkBox = document.querySelector('.elementor-element-ac75887 .elementor-icon-box-content');
        if (darkBox) {
            var darkIcons = document.createElement('div');
            darkIcons.className = 'acs-dark-icons';
            darkIcons.innerHTML =
                '<a class="acs-icon-tg" href="https://t.me/+380985680202" target="_blank" title="Telegram">' + tgSvg + '</a>' +
                '<a class="acs-icon-vb" href="viber://chat?number=%2B380985680202" title="Viber">' + vbSvg + '</a>';
            darkBox.appendChild(darkIcons);
        }

        // === Блок СТО з двома номерами + іконки TG/Viber навпроти кожного ===
        var iconBox = document.querySelector('.elementor-element-acd0e91 .elementor-icon-box-wrapper');
        if (iconBox) {
            var content = iconBox.querySelector('.elementor-icon-box-content');
            if (content) {
                content.innerHTML =
                    '<div class="acs-sto-title">СТО</div>' +
                    '<div class="acs-sto-row">' +
                        '<a class="acs-sto-num" href="tel:+380677759970">+380 67 775 9970</a>' +
                        '<a class="acs-icon-tg" href="https://t.me/+380677759970" target="_blank" title="Telegram">' + tgSvg + '</a>' +
                        '<a class="acs-icon-vb" href="viber://chat?number=%2B380677759970" title="Viber">' + vbSvg + '</a>' +
                    '</div>' +
                    '<div class="acs-sto-row">' +
                        '<a class="acs-sto-num" href="tel:+380985680202">+380 98 568 0202</a>' +
                        '<a class="acs-icon-tg" href="https://t.me/+380985680202" target="_blank" title="Telegram">' + tgSvg + '</a>' +
                        '<a class="acs-icon-vb" href="viber://chat?number=%2B380985680202" title="Viber">' + vbSvg + '</a>' +
                    '</div>';
            }
        }
    });
    </script>
    <?php
});
