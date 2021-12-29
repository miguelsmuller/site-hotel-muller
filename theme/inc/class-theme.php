<?php
if ( ! defined( 'ABSPATH' ) ) exit;

include_once dirname(__FILE__).'/../assets/components/Aqua-Resizer/aq_resizer.php';
include_once 'custom-fields.php';

add_action( 'wp_footer', 'add_analytics_contact_form' );

function add_analytics_contact_form() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ( event.detail.contactFormId == '139' ) {
        ga('send', 'event', 'Forms', 'Envio', 'Contato');
    }else if ( event.detail.contactFormId == '140' ){
        ga('send', 'event', 'Forms', 'Envio', 'Reserva');
        location = 'http://www.hotelmuller.com.br/termos-e-condicoes-de-reserva/?ref=reserva-concluida';
    }
}, false );
</script>
<?php
}

/**
 * Criação dos menus, Configuração dos Thumbnails e dos ativação dos formatos de posts
 */
add_action( 'after_setup_theme', 'after_setup_theme' );
function after_setup_theme() {
    register_nav_menus(array(
        'menu-principal' => 'Menu Principal',
        'menu-rodape'    => 'Menu Rodapé'
    ));

    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 855, 380, array( 'top', 'center') );
}


/**
 * Criação dos menus, Configuração dos Thumbnails e dos ativação dos formatos de posts
 */
add_action( 'init', 'init_wp' );
function init_wp() {
    update_option('thumbnail_size_w', 250);
    update_option('thumbnail_size_h', 250);
    update_option('thumbnail_crop', 1 );
    update_option('medium_size_w', 855);
    update_option('medium_size_h', 380);
    update_option('large_size_w', 1225);
    update_option('large_size_h', 540);

    if( false == get_option( 'reservationForm' ) ) {
        add_option( 'reservationForm' );
        update_option( 'reservationForm', null );
    }
}


/**
 * Cria opções no painel de configuração geral
 */
add_action( 'admin_init', 'admin_init' );
function admin_init() {
	register_setting( 'general', 'reservationForm', 'esc_attr' );
	register_setting( 'general', 'disableChatWidget', 'esc_attr' );

	add_settings_section(
		'others_themes_setting',
		'Configurações extras',
		null,
		'general'
	);

    add_settings_field(
        'reservationForm',
        '<label for="reservationForm">ID do formulário de reserva na página inicial</label>',
        function(){
            $value = get_option('reservationForm');
            echo '<input name="reservationForm" type="number" step="1" min="1" id="reservationForm" value="' . $value . '" class="small-text">';
        },
        'general',
        'others_themes_setting'
    );

    add_settings_field(
        'disableChatWidget',
        '<label for="disableChatWidget">Desabilitar Widget de chat</label>',
        function(){
            $value = get_option('disableChatWidget');
            echo '<input type="checkbox" name="disableChatWidget" value="1"' . checked( 1, $value, false ) . '/>';
        },
        'general',
        'others_themes_setting'
    );
}


/**
 * Registra uma área de widgets e desabilita alguns widgets padrões
 */
add_action( 'widgets_init', 'widgets_init' );
function widgets_init() {
    register_sidebar( array(
        'name'          => 'Sidebar Blog',
        'id'            => 'sidebar-blog',
        'description'   => 'Sidebar blog',
        'before_widget' => '<div class="row-widget"><div class="widget-full">',
        'before_title'  => '<header class="title-simple"><h3>',
        'after_title'   => '</h3><span></span></header>',
        'after_widget'  => '</div></div>'
    ));

    unregister_widget( 'WP_Widget_Pages' );
    unregister_widget( 'WP_Widget_Calendar' );
    unregister_widget( 'WP_Widget_Archives' );
    unregister_widget( 'WP_Widget_Links' );
    unregister_widget( 'WP_Widget_Meta' );
    unregister_widget( 'WP_Widget_Categories' );
    unregister_widget( 'WP_Widget_Recent_Posts' );
    unregister_widget( 'WP_Widget_Recent_Comments' );
    unregister_widget( 'WP_Widget_RSS' );
    unregister_widget( 'WP_Widget_Tag_Cloud' );
}


/**
 * Carrega os arquivos JS's e CSS's do tema
 */
add_action('wp_enqueue_scripts', 'enqueue_scripts' );
function enqueue_scripts(){
	$template_dir = get_bloginfo('template_directory');

	// COMMON STYLE AND SCRIPT
	wp_register_script( 'common-js', $template_dir .'/assets/scripts/dist/javascript.min.js', array('jquery'), null, true );
	wp_localize_script(
		'common-js',
		'common_params',
		array(
			'site_url'  => esc_url( site_url() )
		)
	);
	wp_enqueue_script( 'common-js' );
	wp_enqueue_style( 'common-css', $template_dir .'/assets/styles/dist/style.css' );

    if ( is_home() ) {
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style( 'jquery-ui', get_bloginfo('template_directory').'/assets/components/jquery-ui/themes/base/jquery-ui.css');
    }
    if ( is_home() || is_page( 'fale-conosco' ) ) {
        wp_enqueue_script('validation-lg', get_bloginfo('template_directory').'/assets/components/validationEngine/js/languages/jquery.validationEngine-pt.js', false, '', true );
        wp_enqueue_script('validation', get_bloginfo('template_directory').'/assets/components/validationEngine/js/jquery.validationEngine.js', false, '', true );
        wp_enqueue_style( 'validation', get_bloginfo('template_directory').'/assets/components/validationEngine/css/validationEngine.jquery.css');
    }
    if ( is_single() || is_page() ) {
        wp_enqueue_script('lightbox', get_bloginfo('template_directory').'/assets/components/lightbox/js/lightbox.min.js', false, '', true );
        wp_enqueue_style('lightbox', get_bloginfo('template_directory').'/assets/components/lightbox/css/lightbox.css');
    }
}


/**
 * Função quer permite a página infinita
 */
add_action('wp_ajax_infinite_scroll', 'wp_infinite_scroll');
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinite_scroll');
function wp_infinite_scroll(){
    $template        = $_POST['template'];
    $post_type       = $_POST['post_type'];
    $posts_per_page  = $_POST['posts_per_page'];
    $paged           = $_POST['paged'];

    query_posts(array('post_type' => $post_type, 'posts_per_page' => $posts_per_page, 'paged' => $paged,));
    get_template_part( $template );

    exit;
}


/**
 * Mensagem de atualização de navegador inseguro
 */
add_filter( 'navigator_insecure', 'navigator_insecure' );
function navigator_insecure( $msg ){
    return 'Parece que está a usar uma versão não segura do <a href="%update_url%" class="alert-link">%name%</a>. Para melhor navegar no nosso site, por favor atualize o seu browser.<br/><a href="%update_url%" class="alert-link">Clique aqui para ser direcionado para atualização do %name% agora.</a>';
}


/**
 * Mensagem de atualização de navegador desatualizado
 */
add_filter( 'navigator_upgrade', 'navigator_upgrade' );
function navigator_upgrade( $msg ){
    return 'Parece que está a usar uma versão antiga do <a href="%s" class="alert-link"%name%</a>. Para melhor navegar no nosso site, por favor atualize o seu browser.<br/><a href="%update_url%" class="alert-link">Clique aqui para ser direcionado para atualização do %name% agora.</a>';
}


/**
 * Remove o widget do mandrill da dashboard
 */
add_action( 'wp_dashboard_setup', 'dashboard_setup' );
function dashboard_setup() {
    if ( in_array('wpmandrill/wpmandrill.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ))) ){
        remove_meta_box('mandrill_widget', 'dashboard', 'normal');
    }
}


/**
 * Determina a imagem que será usada no fundo da página de login
 */
add_filter( 'change_login_bg', 'change_login_bg' );
function change_login_bg( $img ){
    return get_bloginfo( 'template_directory' ) . '/assets/images/image-login-background.png';
}


/**
 * Determina a imagem que será usada como logo na página de login
 */
add_filter( 'change_login_logo', 'change_login_logo' );
function change_login_logo( $img ){
    return get_bloginfo( 'template_directory' ) . '/assets/images/image-login.png';
}


/**
 * PRECISA DE UM COMENTÁRIO
 */
add_action('add_meta_boxes', 'add_box');
function add_box() {
    add_meta_box(
        'postOption',
        'Opções da Publicação:',
        function(){
            global $post;
            wp_nonce_field('nonce_action', 'nonce_name');

            $mostrar_thumbnail = get_post_meta( get_the_ID(), 'mostrar_thumbnail', True);
            $mostrar_thumbnail = ( empty($mostrar_thumbnail) or ($mostrar_thumbnail == 0)) ? False : True;

            ?>
            <div id="extrafields">
                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row"><label for="mostrar_thumbnail">Não mostra imagem de destaque: </label></th>
                            <td>
                                <input type="checkbox" id="mostrar_thumbnail" name="mostrar_thumbnail" <?php checked( $mostrar_thumbnail, True ); ?> />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
        },
        'post',
        'side',
        'high'
    );
}


/**
 * PRECISA DE UM COMENTÁRIO
 */
add_action('save_post', 'save_meta');
function save_meta( $post_id ) {
    if (get_post_type($post_id) !== 'post')
    return $post_id;

    // Antes de dar inicio ao salvamento precisamos verificar 3 coisas:
    // Verificar se a publicação é salva automaticamente
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    //Verificar o valor nonce criado anteriormente, e finalmente
    if( !isset( $_POST['nonce_name'] ) || !wp_verify_nonce($_POST['nonce_name'], 'nonce_action') ) return;
    //Verificar se o usuário atual tem acesso para salvar a pulicação
    if( !current_user_can( 'edit_post' ) ) return;

    // MOSTRAR_THUMB_SINGLE
    $valueChk = isset( $_POST['mostrar_thumbnail'] ) && $_POST['mostrar_thumbnail'] ? 1 : 0;
        update_post_meta( $post_id, 'mostrar_thumbnail', $valueChk );
}


/**
 * Callback para paginação customizada
 */
function do_pagination( $args = array() ) {
    global $wp_query;

    $defaults = array(
        'big_number' => 999999999,
        'base'       => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
        'format'     => '?paged=%#%',
        'current'    => max( 1, get_query_var( 'paged' ) ),
        'total'      => $wp_query->max_num_pages,
        'prev_next'  => true,
        'end_size'   => 1,
        'mid_size'   => 2,
        'type'       => 'list'
    );

    $args = wp_parse_args( $args, $defaults );
    extract( $args, EXTR_SKIP );

    if ( $total == 1 ) return;

    $paginate_links = apply_filters( 'paginacao', paginate_links( array(
        'base'      => $base,
        'format'    => $format,
        'current'   => $current,
        'total'     => $total,
        'prev_next' => $prev_next,
        'end_size'  => $end_size,
        'mid_size'  => $mid_size,
        'type'      => $type
    ) ) );

    echo preg_replace( "/<ul class='page-numbers/", "<ul class='pagination", $paginate_links);
}


/**
 * PRECISA DE UM COMENTÁRIO
 */
function list_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?>>

    <div class="comment-avatar">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>

    <div class="comment-body">
        <?php if ( $comment->comment_approved == '0' ) : ?>
            <em class="label label-warning label-awaiting-moderation">Esse comentário está aguardando moderação.</em>
        <?php endif; ?>
        <?php
            $name = '<cite class="fn">'. get_comment_author_link() .'</cite>';
            $time = human_time_diff( get_comment_date('U'), current_time('timestamp') ) . ' atrás';
            $time = '<a href="'. htmlspecialchars( get_comment_link( $comment->comment_ID ) ) . '">'. $time . '</a>';
            echo $name .' • '. $time ;
        ?>

        <?php edit_comment_link( '(Edit)', '  ', '' );?>

        <?php comment_text(); ?>

        <div class="reply">
        <?php
            $argsMerge = array_merge( $args, array(
                                        'add_below' => 'div-comment',
                                        'depth' => $depth,
                                        'max_depth' => $args['max_depth'] )
            );
            $replyLink = get_comment_reply_link( $argsMerge );
            echo $replyLink;
        ?>
        </div>
    </div>
<?php
}
