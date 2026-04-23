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

// Language switcher labels
document.addEventListener('DOMContentLoaded', function() {
    var items = document.querySelectorAll('.cpel-switcher__lang a');
    items.forEach(function(a) {
        var lang = a.getAttribute('lang');
        if (lang === 'uk') {
            var span = document.createElement('span');
            span.className = 'cpel-lang-label';
            span.textContent = ' Мова';
            a.appendChild(span);
        } else if (lang && lang.startsWith('ru')) {
            var flag = a.querySelector('.cpel-switcher__flag');
            if (flag) flag.remove();
            var span = document.createElement('span');
            span.className = 'cpel-lang-label';
            span.textContent = 'Язык';
            a.appendChild(span);
        }
    });
});

// Header/Footer translation for RU
document.addEventListener('DOMContentLoaded', function() {
    var isRu = document.documentElement.lang && document.documentElement.lang.startsWith('ru');
    if (!isRu) return;

    var translations = {
        'Розташування': 'Расположение',
        'Зателефонувати': 'Позвонить',
        'Записатись': 'Записаться',
        "Зв'язок з нами": 'Связь с нами',
        'Запишіться на сервіс зараз': 'Запишитесь на сервис сейчас',
        "Напишіть нам:": 'Напишите нам:',
        "Телефон:": 'Телефон:',
        "Соц мережі:": 'Соц сети:',
        'м. Бровари, вулиця Металургів, 51': 'г. Бровары, улица Металлургов, 51',
        'Послуги': 'Услуги',
        'Про нас': 'О нас',
        'Головна': 'Главная',
        'Контакти': 'Контакты',
        'Ціни': 'Цены'
    };

    function translateTextNodes(root) {
        var walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, null, false);
        while (walker.nextNode()) {
            var node = walker.currentNode;
            var text = node.textContent.trim();
            if (translations[text]) {
                node.textContent = node.textContent.replace(text, translations[text]);
            }
        }
    }

    var header = document.querySelector('.elementor-location-header');
    if (header) translateTextNodes(header);

    var footer = document.querySelector('.elementor-location-footer');
    if (footer) translateTextNodes(footer);

    // Перекласти кнопку Записатись
    document.querySelectorAll('.elementor-button-text').forEach(function(btn) {
        if (btn.textContent.trim() === 'Записатись') {
            btn.textContent = 'Записаться';
        }
    });
});
