<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<div class="berrors">Этот пост защищен паролем. Введите пароль для просмотра комментариев.</div>
	<?php
		return;
	}
?>
	
<!-- You can start editing here. -->
<div id="new_comments"></div>
<?php if ( have_comments() ) : ?>

	<ol class="commentlist">
		<?php wp_list_comments('type=comment&avatar_size=60&callback=smite_comment'); ?>
	</ol>
	
	<div class="comments-navigation">
	    <div class="alignleft"><?php previous_comments_link(); ?></div>
	    <div class="alignright"><?php next_comments_link(); ?></div>
	</div>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<div class="berrors">Комментарии закрыты.</div>

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

    <div class="baseconet lcol">
    <div class="fortxtfull">
        <div class="ftitle">
            <div class="otitle">
                <h3 class="btl"><b><?php comment_form_title( 'Написать', 'Написать' ); ?></b></h3>
            </div>
        </div>
	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p>Вам необходимо <a href="<?php echo wp_login_url( get_permalink() ); ?>">войти</a> чтобы оставить комментарий.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

		<?php if ( is_user_logged_in() ) : ?>

		<div style="font-size: 16px;padding-left: 14px;">Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Выйти">Выйти &raquo;</a></div>

<table class="tableform">
		                <tr>
                            <td class="editorcomm">
                            <label for="comment" class="label">Комментарий</label>
                                <div>
                                    <textarea name="comment" id="comment" cols="39" rows="4" tabindex="4" class="f_textarea" required></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <input name="submit" type="submit" id="submit" value="Добавить комментарий" class="fbutton" />
                            <?php comment_id_fields(); ?>
			                <?php do_action('comment_form', $post->ID); ?>
                            </td>
                       </tr>
</table>
		<?php else : ?>
            <div class="ftitle">
                <div class="otitle">
                    <table class="tableform">
                        <tr>
                            <td class="label">
                                <label for="author">Имя <span class="req"><?php if ($req) echo "(необходимо)"; ?></span></label>
                            </td>
                            <td><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> class="f_input" placeholder="Имя" required /></td>
                        </tr>
                        <tr>
                            <td class="label">
                                <label for="email">Email <span class="req"><?php if ($req) echo "(необходимо)"; ?></span></label>
                            </td>
                            <td><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>"  tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> class="f_input" placeholder="ваша@почта" required  /></td>
                        </tr>
                        <tr>
                            <td class="label">
                                <label for="url">Сайт</label>
                            </td>
                            <td><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>"  tabindex="3" class="f_input" placeholder="http://" required /></td>
                        </tr>
                        <tr>
                            <td class="label">
                                <label for="comment">Комментарий</label>
                            </td>
                            <td class="editorcomm">
                                <div>
                                    <textarea name="comment" id="comment" cols="39" rows="4" tabindex="4" class="f_textarea" required></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="fieldsubmit">
                        <input name="submit" type="submit" id="submit" value="Добавить комментарий" class="fbutton" />
                        <?php comment_id_fields(); ?>
                        <?php do_action('comment_form', $post->ID); ?>
                    </div>
                </div>
            </div>
		<?php endif; ?>
	</div>
</div>
	</form>

	<?php endif; // If registration required and not logged in ?>
	


<?php endif; // if you delete this the sky will fall on your head ?>