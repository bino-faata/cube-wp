<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bg.js"></script>

</head>
<body <?php body_class(); ?>>
<div class="page">
    <div class="head lcol">
        <div class="inlogo"></div>
            <nav>
                <?php
                $menuClass = 'menu';
                $primaryNav = '';
                if (function_exists('wp_nav_menu')) {
                    $primaryNav = wp_nav_menu(array('theme_location' => 'primary-menu','container' => '','fallback_cb' => '','menu_class' => $menuClass,'echo' => false));
                    echo($primaryNav); }
                else
                    echo($primaryNav);
                ?>
            </nav>
    </div>
    <?php if ((is_front_page()) and (!is_paged())) { ?>
    <div class="lcol aroundcont">
        <div class="allcontents2 lcol">
            <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Header') ) ?>
        </div>
        <div class="rcol allblocks2">
            <div class="lcol force">
                <div>
                    <div>
<a href="https://goo.gl/cbCgwX" target="_blank" title="Кликни чтобы скачать!" alt="Кликни чтобы скачать!" >
                        <ul class="demo-3">
                            <li>
                                <figure>
                                    <img src="<?php bloginfo('template_url') ?>/images/banner.jpg" alt="Скачать" title="Скачать" />
                                    <figcaption>
                                        <h2>Что такое SMITE?</h2>
                                        <p>Smite это 3D Action игра от третьего лица в жанре МОБА. В качестве персонажей в игре являются боги из семи пантеонов мира. </p>
                                        <p>Боги разделены на 5 классов - Убийца, Охотник, Воин, Страж, Маг. У каждого свои особенности и механика игры.</p>
                                        <br />
                                        <h2>Кликни чтобы скачать!</h2>
                                    </figcaption>
                                </figure>
                            </li>
                        </ul>
</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="lcol aroundcont">