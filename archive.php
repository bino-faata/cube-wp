<?php get_header(); ?>
    <div class="lcol allcontents">
        <div class="speedbarcol lcol">
            <div class="spd">
                <div id="lpblock">
                    <?php if(is_month()) { ?>
                        <div id="archive-title">
                            <h2>Просмотр статей за "<?php the_time('F, Y') ?> "</h2>
                        </div>
                    <?php } ?>
                    <?php if(is_category()) { ?>
                        <div id="archive-title">
                            <h2>Категория "<?php $current_category = single_cat_title("", true); ?> "</h2>
                        </div>
                    <?php } ?>
                    <?php if(is_tag()) { ?>
                        <div id="archive-title">
                            <h2>Просмотр по метке "<?php wp_title('',true,''); ?> "</h2>
                        </div>
                    <?php } ?>
                    <?php if(is_author()) { ?>
                        <div id="archive-title">
                            <h2>Статьи "<?php wp_title('',true,''); ?> "</h2>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <div class="allcontents lcol">
                <div class="contenttwo">
                    <div class="polno">
                        <div class="lcol odri">
                            <div class="lcol imapage">
                                <a onclick="return !window.open(this.href)" href="<?php the_permalink() ?>">
                                    <?php
                                   if(  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
                                        the_post_thumbnail('220');
                                    } else {
                                        echo '<img src="'.get_bloginfo("template_url").'/images/noimage.jpg" />';
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="rcol ostav">
                                <div class="txtosn">
                                    <div class="titlethis"><a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                                    <div class="txtyou"><?php the_excerpt(''); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="rcol">
                            <div class="widna">
                                <div class="stp">
                                    <div class="wert">
                                        <?php comments_number('0', '1', '%' );?>
                                    </div>
                                </div>
                                <div class="drink"></div>
                                <div class="dalee">
                                    <span class="morelink"><a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>
        <div class="allcontents lcol"><?php wp_pagenavi(); ?></div>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
