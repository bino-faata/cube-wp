<?php get_header(); ?>

    <!-- BEGIN POST -->
    <div class="lcol aroundcont">
    <div class="lcol allcontents">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="baseconet lcol">
                <div class="fortxtfull">
                    <div class="ftitle">
                        <div class="otitle">
                            <h3 class="btl"><b><?php the_title(); ?></b></h3>
                        </div>
                    </div>
                    <div class="ftitle">
                        <div class="otitle">
                            <?php the_content(); ?>
                            <?php wp_link_pages('before=<span class="page-links"><strong>Страницы:</strong> &after=</span>'); ?>
                            <div class="editdate"></div>
                            <div class="clr"></div>
                            <p class="basetags"><i><?php the_tags(('<b>Тэги:</b>') . ' ', ', ', '<br />'); ?></i></p>
                        </div>
                    </div>
                </div>
                <div class="botcont">
                    <div class="eig">
                        <div class="edits">
                            <div class="lcol txted">
                                <i>Опубликовал <b><?php the_author_posts_link(); ?></b>, <?php the_time( get_option('date_format') ); ?></i>
                            </div>
                            <div class="rcol txtes">

                            </div>
                        </div>
                        <div class="edites">
                            <div class="lcol">
                                   </div>
                            <div class="rcol txtcom">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>
        <!-- END POST -->
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>