<?php get_header(); ?>
<div class="lcol allcontents">

    <div class="speedbarcol lcol">
        <div class="spd">
            <h2>
                <?php if (is_home()) { ?>
                    <a href="<?php echo get_option('home'); ?>">Новости</a>
                <?php } elseif (is_single()) { ?>
                    <a href="<?php echo get_option('home'); ?>">Главная</a> »
                    <?php foreach((get_the_category()) as $cat) {
                        $cat=$cat->cat_ID;
                        echo(get_category_parents($cat, TRUE, ' » ')); } the_title(); ?>
                <?php } ?>
            </h2>
        </div>
    </div>

<div class="allcontents lcol">

    <?php
    $smite_home = new WP_Query($query_string . '&cat=1&posts_per_page=6');
    while ($smite_home->have_posts()) : $smite_home->the_post(); ?>

        <div id="mainwrapper">
            <div id="box-2" class="boxnews">
                <?php
                if(has_post_thumbnail()) {
                    the_post_thumbnail('334');
                } else {
                    echo '<img src="'.get_bloginfo("template_url").'/images/noimage3.jpg" />';
                }
                ?>
                <a href="<?php echo get_permalink() ?>" />
			<span class="caption full-caption">
				<h3 class="titl"><?php the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>
			</span>
                </a>
            </div>
        </div>

        <?php  endwhile;  ?>

</div>
    <div class="allcontents lcol">
        <?php
        if(function_exists('wp_pagenavi')) {
        wp_pagenavi( array(
        'query' =>  $smite_home
        ));
        }
        ?>
    </div>
    <div class="allcontents lcol">&nbsp;</div>
	<div class="speedbarcol lcol">
        <div class="spd">
            <h2>
                Турниры
            </h2>
        </div>
    </div>  
<div class="allcontents lcol">
<?php $query2 = new WP_Query('cat=34&posts_per_page=4');
while($query2->have_posts()){ $query2->the_post(); ?>
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
<?php } wp_reset_postdata(); ?>
</div>

	<div class="speedbarcol lcol">
        <div class="spd">
            <h2>
                Медиа
            </h2>
        </div>
    </div>  
<div class="allcontents lcol">
<?php $query3 = new WP_Query('cat=4&posts_per_page=9');
while($query3->have_posts()){ $query3->the_post(); ?>

    <div id="mainwrapper">
    <div id="box-1" class="box">
        <a href="<?php the_permalink() ?>">
            <?php
            if(  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
                the_post_thumbnail('220');
            } else {
                echo '<img src="'.get_bloginfo("template_url").'/images/noimage.jpg" />';
            }
            ?>
        		<span class="caption simple-caption">
					<p><?php the_title(); ?></p>
				</span>
        </a>
    </div>
</div>
<?php } wp_reset_postdata(); ?>
</div>
	

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>