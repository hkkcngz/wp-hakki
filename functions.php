<?php
define('WP_THEME_TEXTDOMAIN', 'hakki');
define('HC_STYLESHEET_DIRECTORY_URI', get_stylesheet_directory_uri());
define('HC_TEMPLATE_DIRECTORY', get_template_directory());
define('HC_THEME_VERSION', '0.1.0');

load_theme_textdomain(WP_THEME_TEXTDOMAIN, HC_TEMPLATE_DIRECTORY . '/languages');

if ( file_exists(HC_TEMPLATE_DIRECTORY.'/admin/adminpage.php') ) {
    include_once("admin/adminpage.php");
}

// Temel Kodlar

// Register Theme Features
function tema_destekleri()  {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    remove_filter('the_content', 'wptexturize');
}
add_action( 'after_setup_theme', 'tema_destekleri' );

function add_image_insert_override($sizes){
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'add_image_insert_override' );

// the excerpt
function my_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );

    // Excerpt kısmından [] parantezleri kaldırmak
    function new_excerpt_more($more)
    {
        return '...';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

// Disable Comments URL field
function disable_comment_url($fields) { 
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','disable_comment_url');

    // JQMIGRATE: Migrate is installed, version 1.4.0 HATASI
    add_action('wp_default_scripts', function ($scripts) {
        if (!empty($scripts->registered['jquery'])) {
            $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps,
                array('jquery-migrate'));
        }
    });

// PRE GET POSTS 
	// normal loopta 10 post çıkar ve bu author sayfasını da etkiler.
	add_action('pre_get_posts','change_numberposts_for_author');
	function change_numberposts_for_author( $query ) {
	  if ( ! is_admin() && $query->is_main_query() && is_author() ) {
		$query->set('posts_per_page', 150); // 30 is the number of posts
	  }
	}



    /* Code Share Shorcode*/
    function code_embed($atts, $content = null)
    {
        extract(shortcode_atts(
            array(
                'type' => '',
            ), $atts));

        return '<pre><code class="language-' . $type . '">' . do_shortcode($content) . '</code></pre>';
    }
    add_shortcode('kodpaylas', 'code_embed');
    /* Code Share Shorcode*/

// SHARE CODE Quick Buttons
function my_quicktags() {
    if ( wp_script_is( 'quicktags' ) ) {
    ?>
    <script type="text/javascript">
    QTags.addButton( 'eg_php', 'PHP', '<pre><code class=\"language-php\">', '</code></pre>', 'p', 'PHP Code', 100 );
    QTags.addButton( 'eg_css', 'CSS', '<pre><code class=\"language-css\">', '</code></pre>', 'q', 'CSS Code', 100 );
    QTags.addButton( 'eg_html','HTML', '<pre><code class=\"language-html\">', '</code></pre>', 'r', 'HTML Code', 100 );
    </script>
    <?php
    }
}
add_action( 'admin_print_footer_scripts', 'my_quicktags' ); 


// sidebar
function arphabet_widgets_init() {
    register_sidebar( array(
        'name'          => 'Ana Side Sidebar',
        'id'            => 'home_side_1',
        'before_widget' => '<li>',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="stripe-title">',
        'after_title'   => '</h2><div class="stripe-line"></div>',
    ) );	
}
add_action( 'widgets_init', 'arphabet_widgets_init' );


  // Rasgele Post
  function yazi_yonlendir() {
    global $wpdb;
    $query = "SELECT ID FROM $wpdb->posts WHERE post_type = 'post' AND post_password = '' AND post_status = 'publish' ORDER BY RAND() LIMIT 1";
    if ( isset( $_GET['random_cat_id'] ) ) {
      $random_cat_id = (int) $_GET['random_cat_id'];
      $query = "SELECT DISTINCT ID FROM $wpdb->posts AS p INNER JOIN $wpdb->term_relationships AS tr ON (p.ID = tr.object_id AND tr.term_taxonomy_id = $random_cat_id) INNER JOIN $wpdb->term_taxonomy AS tt ON(tr.term_taxonomy_id = tt.term_taxonomy_id AND taxonomy = 'category') WHERE post_type = 'post' AND post_password = '' AND post_status = 'publish' ORDER BY RAND() LIMIT 1";
    }
    if ( isset( $_GET['random_post_type'] ) ) {
      $post_type = preg_replace( '|[^a-z]|i', '', $_GET['random_post_type'] );
      $query = "SELECT ID FROM $wpdb->posts WHERE post_type = '$post_type' AND post_password = '' AND post_status = 'publish' ORDER BY RAND() LIMIT 1";
    }
    $random_id = $wpdb->get_var( $query );
    wp_redirect( get_permalink( $random_id ) );
    exit;
  }
  if ( isset( $_GET['rastgele'] ) ) {
    add_action( 'template_redirect', 'yazi_yonlendir' );
  }

  	// Yorum Listeleme Özelliği
	function tartisma_comment($comment, $args, $depth) { $GLOBALS['comment'] = $comment; ?>
        <?php $PostAuthor = false; 
        if($comment->comment_author_email == get_the_author_meta('email')) {$PostAuthor = true;}
        elseif($comment->comment_author_email == 'mailadresiniz@mail.com') {
        $PostAuthor = true;}
        ?>
        <div <?php if($PostAuthor) {echo "class='argue-message argue-message-author' ";} else {echo "class='argue-message argue-message-commenter' ";} ?> id="argue-message-<?php comment_ID() ?>">
          <img class="argue-image argue-image-default" src="<?php echo get_avatar_url($comment,$size='64'); ?>" />
        
        <div class="argue-message-wrapper">
          <div class="argue-message-content">
            <?php comment_text() ?>
          </div>
          
              <div class="argue-details">
                <span class="argue-message-localisation font-size-small"><?php printf( _x( '%s önce', '%s = human-readable time difference', 'editorsel'), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
                <span class="argue-message-read-status font-size-small">- <?php comment_author(); ?></span>
              </div>
        </div>
          <?php if ($comment->comment_approved == '0') : ?>
          <em class="yorumonay">Yorumunuz onaylandıktan sonra görüntülenecektir.</em>
          <?php endif; ?>
        </div>
        <?php }




/**
     * Rewrite author base to custom
     *
     * @return void
     */

    function hc_author_base_rewrite()
    {
        global $wp_rewrite;
        $author_base_db = get_option('hc_author_base');
        if (!empty($author_base_db)) {
            $wp_rewrite->author_base = $author_base_db;
        }
    }
    add_action('init', 'hc_author_base_rewrite');

    /**
     * Render textinput for Author base
     * Callback for the add_settings_function()
     *
     * @return void
     */

    function hc_author_base_render_field()
    {
        global $wp_rewrite;
        printf(
            '<input name="hc_author_base" id="hc_author_base" type="text" value="%s" class="regular-text code">',
            esc_attr($wp_rewrite->author_base)
        );
    }

    /**
     * Add a setting field for Author Base to the "Optional" Section
     * of the Permalinks Page
     *
     * @return void
     */
    function hc_author_base_add_settings_field()
    {

        add_settings_field(
            'hc_author_base',
            esc_html__('Yazar'),
            'hc_author_base_render_field',
            'permalink',
            'optional',
            array('label_for' => 'hc_author_base')
        );
    }

    add_action('admin_init', 'hc_author_base_add_settings_field');

    /**
     * Sanitize and save the given Author Base value to the database
     *
     * @return void
     */

    function hc_author_base_update()
    {
        $author_base_db = get_option('hc_author_base');

        if (isset($_POST['hc_author_base']) &&
            isset($_POST['permalink_structure']) &&
            check_admin_referer('update-permalink')
        ) {
            $author_base = sanitize_title($_POST['hc_author_base']);

            if (empty($author_base)) {

                add_settings_error(
                    'hc_author_base',
                    'hc_author_base',
                    esc_html__('Invalid Author Base.'),
                    'error'
                );

            } elseif ($author_base_db != $author_base) {
                update_option('hc_author_base', $author_base);
            }
        }
    }
    add_action('admin_init', 'hc_author_base_update');




    // #1 Post Type: Youtube List

    // Youtube Link Eraser
    function extractUTubeVidId($url)
    {
        /*
        * type1: http://www.youtube.com/watch?v=9Jr6OtgiOIw
        * type2: http://www.youtube.com/watch?v=9Jr6OtgiOIw&feature=related
        * type3: http://youtu.be/9Jr6OtgiOIw
        */
        $vid_id = "";
        $flag = false;
        if (isset($url) && !empty($url)) {
            /*case1 and 2*/
            $parts = explode("?", $url);
            if (isset($parts) && !empty($parts) && is_array($parts) && count($parts) > 1) {
                $params = explode("&", $parts[1]);
                if (isset($params) && !empty($params) && is_array($params)) {
                    foreach ($params as $param) {
                        $kv = explode("=", $param);
                        if (isset($kv) && !empty($kv) && is_array($kv) && count($kv) > 1) {
                            if ($kv[0] == 'v') {
                                $vid_id = $kv[1];
                                $flag = true;
                                break;
                            }
                        }
                    }
                }
            }

            /*case 3*/
            if (!$flag) {
                $needle = "youtu.be/";
                $pos = null;
                $pos = strpos($url, $needle);
                if ($pos !== false) {
                    $start = $pos + strlen($needle);
                    $vid_id = substr($url, $start, 11);
                    $flag = true;
                }
            }
        }
        return $vid_id;
    }

    function func_youtubelist()
    {

        $labels = array(
            'name' => 'YoutubeList İşlemleri',
            'singular_name' => 'YoutubeList İşlemi',
            'menu_name' => 'YoutubeList İşlemleri',
            'name_admin_bar' => 'YoutubeList İşlemleri',
            'archives' => 'Arşivler',
            'attributes' => 'YoutubeList Attributes',
            'parent_item_colon' => 'Alt YoutubeList',
            'all_items' => 'Tüm YoutubeListler',
            'add_new_item' => 'Yeni YoutubeList Ekle',
            'add_new' => 'Yeni Ekle',
            'new_item' => 'Yeni YoutubeList Ekle',
            'edit_item' => 'YoutubeList Düzenle',
            'update_item' => 'YoutubeList Güncelle',
            'view_item' => 'YoutubeList Göster',
            'view_items' => 'YoutubeListları Göster',
            'search_items' => 'YoutubeList Ara',
            'not_found' => 'Bulunamadı',
            'not_found_in_trash' => 'YoutubeList Çöpte de Yok',
            'featured_image' => 'Öne Çıkan Görsel',
            'set_featured_image' => 'Öne Çıkan Görsel Ayarla',
            'remove_featured_image' => 'Öne Çıkan Görseli Sil',
            'use_featured_image' => 'Öne Çıkan Görsel Belirle',
            'insert_into_item' => 'YoutubeList\'e Ekle',
            'uploaded_to_this_item' => 'Bu işlem güncellendi',
            'items_list' => 'YoutubeListlar listesi',
            'items_list_navigation' => 'YoutubeListlar listesi menu',
            'filter_items_list' => 'YoutubeListlar listesi filtre',
        );

        $args = array(
            'label' => 'YoutubeList İşlemi',
            'description' => 'YoutubeList İşlemleri, Raporlar',
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', 'author'),
            'taxonomies' => array('category', 'post_tag'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_icon' => 'dashicons-groups',
            'show_in_admin_bar' => false,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'show_in_rest' => true,
        );
        register_post_type('youtubelist', $args);

    }
    add_action('init', 'func_youtubelist', 0);


///// Post Like System

$postlikeurl = get_stylesheet_directory() . '/inc/likes/init.php';
if (file_exists($postlikeurl)) {
    include_once $postlikeurl;
}