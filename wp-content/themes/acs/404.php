<?php get_header(); 
$is_ru = function_exists('pll_current_language') && pll_current_language() === 'ru';
?>
<div class="acs-404-page">
    <div class="acs-404-inner">
        <div class="acs-404-code">404</div>
        <h1 class="acs-404-title"><?php echo $is_ru ? 'Страница не найдена' : 'Сторінку не знайдено'; ?></h1>
        <p class="acs-404-text"><?php echo $is_ru 
            ? 'К сожалению, запрашиваемая страница не существует или была перемещена.' 
            : 'На жаль, сторінка, яку ви шукаєте, не існує або була переміщена.'; ?></p>
        <div class="acs-404-buttons">
            <a href="<?php echo $is_ru ? home_url('/ru/') : home_url('/'); ?>" class="acs-404-btn acs-404-btn-primary">
                <?php echo $is_ru ? 'На главную' : 'На головну'; ?>
            </a>
            <a href="<?php echo $is_ru ? home_url('/ru/uslugi/') : home_url('/service/'); ?>" class="acs-404-btn acs-404-btn-secondary">
                <?php echo $is_ru ? 'Наши услуги' : 'Наші послуги'; ?>
            </a>
        </div>
        <div class="acs-404-contact">
            <p><?php echo $is_ru ? 'Или свяжитесь с нами:' : 'Або зв\'яжіться з нами:'; ?></p>
            <a href="tel:+380985660202">+38 098 566 02 02</a>
        </div>
    </div>
</div>
<?php get_footer(); ?>
