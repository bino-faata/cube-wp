<?php get_header(); ?>
	<div class="lcol aroundcont">
	<div class="lcol allcontents">
		<div class="speedbarcol lcol">
			<div class="spd">
				<h2>
					<?php if (is_home()) { ?>
					<?php } elseif (is_single()) { ?>
						<a href="<?php echo get_option('home'); ?>">Главная</a> »
						<?php foreach((get_the_category()) as $cat) {
							$cat=$cat->cat_ID;
							echo(get_category_parents($cat, TRUE, ' » ')); } the_title(); ?>
					<?php } ?>
				</h2>
			</div>
		</div>
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
					<p class="basetags"><i><?php the_tags(('<div class="editdate"><b>Тэги:</b>') . ' ', ', ', '<br /></div>'); ?></i></p>
					<div class="clr"></div>
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
						<?php edit_post_link('Редактировать', '<i>', '</i>'); ?>
					</div>
				</div>
				<div class="edites">
					<div class="lcol">
					</div>
					<div class="rcol txtcom">
						<img src="<?php bloginfo('template_url'); ?>/images/comm.png" alt="" width="27" height="17" /> <?php comments_number('0', '1', '%' );?>
					</div>
				</div>
			</div>

		</div>
	</div>



<div class="clr"></div>
	<div class="baseconet lcol">
	<div class="fortxtfull">
	<div class="ftitle">
	<div class="otitle">
	
<div class="sample-posts">	
<h2 style="font-family: BebasNeueRegular; color:#8C816E;">Похожие статьи:</h2>	
<?php
$categories = get_the_category($post->ID);
if ($categories) {
	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

	$args=array(
		'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>5, // Number of related posts that will be shown.
		'caller_get_posts'=>1
	);
	// Rest is the same as the previous code
$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
		echo '<ul>';
		while ($my_query->have_posts()) {
			$my_query->the_post();
		?>
			<li style="font-family: BebasNeueRegular; padding-left:20px;"><h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3></li>
		<?php 
		}
		echo '</ul>';
	}
	wp_reset_query();
}
?></div>

	
	</div>
	</div>
	</div>
	</div>
	<div class="clr"></div>


	<?php
	if ( comments_open() || get_comments_number() ) {
		comments_template();
		}
	?>
<?php endwhile; endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
