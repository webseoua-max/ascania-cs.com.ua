document.addEventListener('DOMContentLoaded', function() {
    var src = document.getElementById('acs-breadcrumbs-source');
    if (!src) return;

    var content = document.querySelector('[data-elementor-type="single-post"]') ||
                  document.querySelector('[data-elementor-type="wp-page"]');
    if (content) {
        var sections = content.querySelectorAll(':scope > .e-con.e-parent');
        // Якщо є більше 1 секції — вставляємо перед другою (після hero)
        // Якщо тільки 1 — вставляємо перед нею
        var target = sections.length > 1 ? sections[1] : sections[0];
        if (target) {
            var wrap = document.createElement('div');
            wrap.className = 'acs-breadcrumbs';
            wrap.innerHTML = src.innerHTML;
            target.parentNode.insertBefore(wrap, target);
            src.remove();
            return;
        }
    }

    // Fallback — після header
    var header = document.querySelector('header.elementor-location-header');
    if (header) {
        var wrap = document.createElement('div');
        wrap.className = 'acs-breadcrumbs';
        wrap.innerHTML = src.innerHTML;
        header.parentNode.insertBefore(wrap, header.nextSibling);
        src.remove();
    }
});
