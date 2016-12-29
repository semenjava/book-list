<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Шаблоны формирования метаданных для категорий
|--------------------------------------------------------------------------
*/
$config['category_meta_templates'] = array(

    'title' => array(
        array(
            'type' => 'regular',
            'value' => 'Купить'
        ),
        array(
            'type' => 'varying',
            'values' => array(
                'чехол',
                'чехлы',
                'аксессуары',
            )
        ),
        array(
            'type' => 'regular',
            'value' => 'для'
        ),
        array(
            'type' => 'varying',
            'values' => array(
                0 => array(
                    '',
                    'модели',
                ),
                1 => array(
                    'телефона',
                    'смартфона',
                ),
                2 => array(
                    'планшета'
                )
            )
        ),
        array(
            'type' => 'title'
        ),
        array(
            'type' => 'varying',
            'values' => array(
                'на',
                '—',
                '|',
                '•',
            )
        ),
        array(
            'type' => 'regular',
            'value' => 'RosCase.ru'
        )
    ),

    'description' => array(
        array(
            'type' => 'varying',
            'values' => array(
                'Ищете',
                'Выбираете',
                'Подбираете',
            )
        ),
        array(
            'type' => 'varying',
            'values' => array(
                'оригинальный чехол',
                'оригинальные чехлы',
                'оригинальные аксессуары',
                'эксклюзивный чехол',
                'эксклюзивные чехлы',
                'эксклюзивные аксессуары',
                'дизайнерские чехлы',
                'дизайнерский чехол',
                'дизайнерские аксессуары',
                'стильный чехол',
                'стильные чехлы',
                'стильные аксессуары',
                'ультрамодный чехол',
                'ультрамодные чехлы',
                'ультратрамодные аксессуары',
            )
        ),
        array(
            'type' => 'regular',
            'value' => 'для'
        ),
        array(
            'type' => 'varying',
            'values' => array(
                'любимого',
                'нового',
                'своего',
            )
        ),
        array(
            'type' => 'varying',
            'values' => array(
                0 => array(
                    'гаджета?',
                ),
                1 => array(
                    'телефона?',
                    'смартфона?',
                ),
                2 => array(
                    'планшета?',
                )
            )
        ),
        array(
            'type' => 'regular',
            'value' => '►РосКейc.ru◄ WOW!!'
        ),
        array(
            'type' => 'varying',
            'values' => array(
                '✔ Приятные цены',
                '✔ Низкие цены',
                '✔ Лучшие цены',
                '✔ Доступные цены',
            )
        ),
        array(
            'type' => 'varying',
            'values' => array(
                '✔ Сжатые сроки доставки',
                '✔ Быстрая доставка',
                '✔ Доставка в Ваш город',
                '✔ Доставка по всей России',
            )
        ),
        array(
            'type' => 'varying',
            'values' => array(
                '✔ Большой выбор аксессуаров.',
                '✔ Широкий ассортимент.',
                '✔ Огромный выбор.',
                '✔ Скидки до -30%!',
            )
        ),
        array(
            'type' => 'varying',
            'values' => array(
                'Сделайте заказ прямо сейчас!',
                'Делайте заказ сейчас!',
                'Заказывайте уже сейчас!',
                'Успейте купить!',
                'Торопитесь!',
                'Не пропустите!',
            )
        )
    ),

    'keywords' => array(
        array(
            'type' => 'regular',
            'value' => 'купить чехол'
        ),
        array(
            'type' => 'title',
            'no_whitespace' => true
        ),
        array(
            'type' => 'regular',
            'value' => ','
        ),
        array(
            'type' => 'regular',
            'value' => 'чехол для'
        ),
        array(
            'type' => 'title',
            'no_whitespace' => true
        ),
        array(
            'type' => 'regular',
            'value' => ','
        ),
        array(
            'type' => 'title'
        ),
        array(
            'type' => 'regular',
            'value' => 'чехол,'
        ),
        array(
            'type' => 'regular',
            'value' => 'аксессуары для'
        ),
        array(
            'type' => 'title',
        )
    )

);

$config['product_meta_templates'] = array(

    'title' => array(
/*        array(
            'type' => 'regular',
            'value' => 'Купить',
        ),*/
        array(
            'type' => 'title',
           // 'lowercase' => true,
        ),
        /*array(
            'type' => 'regular',
            'value' => ' | RosCase'
        )*/
    ),

    'description' => array(
        array(
            'type' => 'varying',
            'values' => array(
                'Большой выбор',
                'Множество',
                'Широкий ассортимент',
                'Огромный выбор',
            )
        ),
        array(
            'type' => 'varying',
            'values' => array(
                'оригинальных чехлов и аксессуаров',
                'эксклюзивный чехлов и аксессуаров',
                'дизайнерских чехлов и аксессуаров',
                'стильных чехлов и аксессуаров',
                'ультрамодных чехлов и аксессуаров',
            )
        ),
        array(
            'type' => 'varying',
            'values' => array(
                'по ПРИЯТНЫМ ценам!',
                'по НИЗКИМ ценам!',
                'по ЛУЧШИМ ценам!',
                'по ДОСТУПНЫМ ценам!',
                'по САМЫМ НИЗКИМ ценам!',
            )
        ),
        array(
            'type' => 'regular',
            'value' => '►► Пластиковые накладки, наушники, автозарядки, автодержатели, карты памяти и флешки, внешние аккумуляторы и переходники',
        ),
        array(
            'type' => 'varying',
            'values' => array(
                'для Ваших гаджетов',
                'для Ваших телефонов и планшетов',
                'для Ваших смартфонов и планшетов',
                'для Ваших устройств',
                'для Ваших мобильных устройств',
            )
        ),
        array(
            'type' => 'varying',
            'values' => array(
                'на',
                '—',
                '|',
                '•',
            )
        ),
        array(
            'type' => 'varying',
            'values' => array(
                '&quot;РосКейc&quot;',
                'РосКейc',
                'RosCase',
                '«RosCase»',
            ),
        )
    ),

    'keywords' => array(
        array(
            'type' => 'title',
            'no_whitespace' => true,
            'lowercase' => true,
        ),
        array(
            'type' => 'regular',
            'value' => ', купить аксессуары'
        )
    )

);

/* End of file meta_templates.php */
/* Location: ./application/config/meta_templates.php */
