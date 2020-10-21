<div class="rcol allblocks">
    <div class="lcol force">
        <div class="wir">
            <div class="forlogin">
                <div class="toptxt">
                    <div class="toplogin">
                        <div class="fortitlelogin">
                            Последние новости
                        </div>
                    </div>
                    <div class="conlogin">
                        <div class="last-posts">
                            <ul> <?php query_posts('showposts=6'); ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php
                                            if(has_post_thumbnail()) {
                                                the_post_thumbnail('widget');
                                            } else {
                                                echo '<img src="'.get_bloginfo("template_url").'/images/noimage4.jpg" />';
                                            }
                                            ?>
                                        </a>
                                        <a class="titlebebu shadow" style="font-size: 18px;" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                        <br>
                                        <?php $categories = get_the_category();
                                        if($categories[0]){
                                        echo '<a class="titlebebu cat-side" href="' . get_category_link($categories[0]->term_id ) . '">»&nbsp;'. $categories[0]->name . '</a>';
                                        }
                                        ?>
                                    </li>
                                    <div class="clear"></div>
                                    <div style="padding:0 0px; border-bottom:1px dashed #ccc;"></div>
                                <?php endwhile;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><br />
            <div class="forlogin">
                <div class="toptxt">
                    <div class="toplogins">
                        <div class="fortitlelogins">
                            Комментарии
                        </div>
                    </div>
                    <div class="conlogins">
                        <div class="uplogin botbottom2 fucks">
                            <ul>
                                <?php kama_recent_comments("limit=6&ex=40"); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><br />
            <?php	/* Widgetised Area */
                if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar() )
            ?>
        </div>
    </div>
</div>