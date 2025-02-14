<?php
/**
 * kiosque congo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kiosque_congo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kiosque_congo_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on kiosque congo, use a find and replace
		* to change 'kiosque-congo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kiosque-congo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'kiosque-congo' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'kiosque_congo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'kiosque_congo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kiosque_congo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kiosque_congo_content_width', 640 );
}
add_action( 'after_setup_theme', 'kiosque_congo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kiosque_congo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kiosque-congo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kiosque-congo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kiosque_congo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kiosque_congo_scripts() {
	wp_enqueue_style( 'kiosque-congo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'kiosque-congo-style', 'rtl', 'replace' );

	wp_enqueue_script( 'kiosque-congo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kiosque_congo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}






















/***************DEBUT DEVELOPPEMENT DEVLEWI********************/

//ETAPE 1: CREATION DES DIFFERENTS CPT
function create_custom_post_types() {
    // Journal Officiel
    $labels_journal_officiel = array(
        'name'                  => __('Journaux Officiels', 'text_domain'),
        'singular_name'         => __('Journal Officiel', 'text_domain'),
        'menu_name'             => __('Journaux Officiels', 'text_domain'),
        'name_admin_bar'        => __('Journal Officiel', 'text_domain'),
        'archives'              => __('Archives du Journal', 'text_domain'),
        'attributes'            => __('Attributs du Journal', 'text_domain'),
        'parent_item_colon'     => __('Journal Parent', 'text_domain'),
        'all_items'             => __('Tous les Journaux', 'text_domain'),
        'add_new_item'          => __('Ajouter un nouveau Journal', 'text_domain'),
        'add_new'               => __('Ajouter un Journal', 'text_domain'),
        'new_item'              => __('Nouveau Journal', 'text_domain'),
        'edit_item'             => __('Éditer le Journal', 'text_domain'),
        'update_item'           => __('Mettre à jour le Journal', 'text_domain'),
        'view_item'             => __('Voir le Journal', 'text_domain'),
        'view_items'            => __('Voir les Journaux', 'text_domain'),
        'search_items'          => __('Rechercher un Journal', 'text_domain'),
        'not_found'             => __('Pas trouvé', 'text_domain'),
        'not_found_in_trash'    => __('Pas trouvé dans la corbeille', 'text_domain'),
        'featured_image'        => __('Image de couverture', 'text_domain'),
        'set_featured_image'    => __('Définir l’image de couverture', 'text_domain'),
        'remove_featured_image' => __('Supprimer l’image de couverture', 'text_domain'),
        'use_featured_image'    => __('Utiliser comme image de couverture', 'text_domain'),
        'insert_into_item'      => __('Insérer dans le Journal', 'text_domain'),
        'uploaded_to_this_item' => __('Téléchargé dans ce Journal', 'text_domain'),
        'items_list'            => __('Liste des Journaux', 'text_domain'),
        'items_list_navigation' => __('Navigation de la liste des Journaux', 'text_domain'),
        'filter_items_list'     => __('Filtrer la liste des Journaux', 'text_domain'),
    );

    $args_journal_officiel = array(
        'label'                 => __('Journal Officiel', 'text_domain'),
        'description'           => __('Description des Journaux Officiels', 'text_domain'),
        'labels'                => $labels_journal_officiel,
        'supports'              => array('title', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-media-document',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type('journal_officiel', $args_journal_officiel);

    // Dépêches de Brazza
    $labels_depeches_de_brazza = array(
        'name'                  => __('Dépêches de Brazza', 'text_domain'),
        'singular_name'         => __('Dépêche de Brazza', 'text_domain'),
        'menu_name'             => __('Dépêches de Brazza', 'text_domain'),
        'name_admin_bar'        => __('Dépêche de Brazza', 'text_domain'),
        'archives'              => __('Archives des Dépêches', 'text_domain'),
        'attributes'            => __('Attributs des Dépêches', 'text_domain'),
        'parent_item_colon'     => __('Dépêche Parent', 'text_domain'),
        'all_items'             => __('Toutes les Dépêches', 'text_domain'),
        'add_new_item'          => __('Ajouter une nouvelle Dépêche', 'text_domain'),
        'add_new'               => __('Ajouter une Dépêche', 'text_domain'),
        'new_item'              => __('Nouvelle Dépêche', 'text_domain'),
        'edit_item'             => __('Éditer la Dépêche', 'text_domain'),
        'update_item'           => __('Mettre à jour la Dépêche', 'text_domain'),
        'view_item'             => __('Voir la Dépêche', 'text_domain'),
        'view_items'            => __('Voir les Dépêches', 'text_domain'),
        'search_items'          => __('Rechercher une Dépêche', 'text_domain'),
        'not_found'             => __('Pas trouvé', 'text_domain'),
        'not_found_in_trash'    => __('Pas trouvé dans la corbeille', 'text_domain'),
        'featured_image'        => __('Image de couverture', 'text_domain'),
        'set_featured_image'    => __('Définir l’image de couverture', 'text_domain'),
        'remove_featured_image' => __('Supprimer l’image de couverture', 'text_domain'),
        'use_featured_image'    => __('Utiliser comme image de couverture', 'text_domain'),
        'insert_into_item'      => __('Insérer dans la Dépêche', 'text_domain'),
        'uploaded_to_this_item' => __('Téléchargé dans cette Dépêche', 'text_domain'),
        'items_list'            => __('Liste des Dépêches', 'text_domain'),
        'items_list_navigation' => __('Navigation de la liste des Dépêches', 'text_domain'),
        'filter_items_list'     => __('Filtrer la liste des Dépêches', 'text_domain'),
    );

    $args_depeches_de_brazza = array(
        'label'                 => __('Dépêche de Brazza', 'text_domain'),
        'description'           => __('Description des Dépêches de Brazza', 'text_domain'),
        'labels'                => $labels_depeches_de_brazza,
        'supports'              => array('title', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-media-document',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type('depeches_de_brazza', $args_depeches_de_brazza);

    // Semaine Africaine
    $labels_semaine_africaine = array(
        'name'                  => __('Semaine Africaine', 'text_domain'),
        'singular_name'         => __('Semaine Africaine', 'text_domain'),
        'menu_name'             => __('Semaine Africaine', 'text_domain'),
        'name_admin_bar'        => __('Semaine Africaine', 'text_domain'),
        'archives'              => __('Archives de la Semaine', 'text_domain'),
        'attributes'            => __('Attributs de la Semaine', 'text_domain'),
        'parent_item_colon'     => __('Semaine Parent', 'text_domain'),
        'all_items'             => __('Toutes les Semaines', 'text_domain'),
        'add_new_item'          => __('Ajouter une nouvelle Semaine', 'text_domain'),
        'add_new'               => __('Ajouter une Semaine', 'text_domain'),
        'new_item'              => __('Nouvelle Semaine', 'text_domain'),
        'edit_item'             => __('Éditer la Semaine', 'text_domain'),
        'update_item'           => __('Mettre à jour la Semaine', 'text_domain'),
        'view_item'             => __('Voir la Semaine', 'text_domain'),
        'view_items'            => __('Voir les Semaines', 'text_domain'),
        'search_items'          => __('Rechercher une Semaine', 'text_domain'),
        'not_found'             => __('Pas trouvé', 'text_domain'),
        'not_found_in_trash'    => __('Pas trouvé dans la corbeille', 'text_domain'),
        'featured_image'        => __('Image de couverture', 'text_domain'),
        'set_featured_image'    => __('Définir l’image de couverture', 'text_domain'),
        'remove_featured_image' => __('Supprimer l’image de couverture', 'text_domain'),
        'use_featured_image'    => __('Utiliser comme image de couverture', 'text_domain'),
        'insert_into_item'      => __('Insérer dans la Semaine', 'text_domain'),
        'uploaded_to_this_item' => __('Téléchargé dans cette Semaine', 'text_domain'),
        'items_list'            => __('Liste des Semaines', 'text_domain'),
        'items_list_navigation' => __('Navigation de la liste des Semaines', 'text_domain'),
        'filter_items_list'     => __('Filtrer la liste des Semaines', 'text_domain'),
    );

    $args_semaine_africaine = array(
        'label'                 => __('Semaine Africaine', 'text_domain'),
        'description'           => __('Description des Semaines Africaines', 'text_domain'),
        'labels'                => $labels_semaine_africaine,
        'supports'              => array('title', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-media-document',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type('semaine_africaine', $args_semaine_africaine);

    // Echos du Congo
    $labels_echos_du_congo = array(
        'name'                  => __('Echos du Congo', 'text_domain'),
        'singular_name'         => __('Echos du Congo', 'text_domain'),
        'menu_name'             => __('Echos du Congo', 'text_domain'),
        'name_admin_bar'        => __('Echos du Congo', 'text_domain'),
        'archives'              => __('Archives des Echos', 'text_domain'),
        'attributes'            => __('Attributs des Echos', 'text_domain'),
        'parent_item_colon'     => __('Echos Parent', 'text_domain'),
        'all_items'             => __('Tous les Echos', 'text_domain'),
        'add_new_item'          => __('Ajouter un nouveau Echo', 'text_domain'),
        'add_new'               => __('Ajouter un Echo', 'text_domain'),
        'new_item'              => __('Nouveau Echo', 'text_domain'),
        'edit_item'             => __('Éditer l’Echo', 'text_domain'),
        'update_item'           => __('Mettre à jour l’Echo', 'text_domain'),
        'view_item'             => __('Voir l’Echo', 'text_domain'),
        'view_items'            => __('Voir les Echos', 'text_domain'),
        'search_items'          => __('Rechercher un Echo', 'text_domain'),
        'not_found'             => __('Pas trouvé', 'text_domain'),
        'not_found_in_trash'    => __('Pas trouvé dans la corbeille', 'text_domain'),
        'featured_image'        => __('Image de couverture', 'text_domain'),
        'set_featured_image'    => __('Définir l’image de couverture', 'text_domain'),
        'remove_featured_image' => __('Supprimer l’image de couverture', 'text_domain'),
        'use_featured_image'    => __('Utiliser comme image de couverture', 'text_domain'),
        'insert_into_item'      => __('Insérer dans l’Echo', 'text_domain'),
        'uploaded_to_this_item' => __('Téléchargé dans cet Echo', 'text_domain'),
        'items_list'            => __('Liste des Echos', 'text_domain'),
        'items_list_navigation' => __('Navigation de la liste des Echos', 'text_domain'),
        'filter_items_list'     => __('Filtrer la liste des Echos', 'text_domain'),
    );

    $args_echos_du_congo = array(
        'label'                 => __('Echo du Congo', 'text_domain'),
        'description'           => __('Description des Echos du Congo', 'text_domain'),
        'labels'                => $labels_echos_du_congo,
        'supports'              => array('title', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-media-document',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type('echos_du_congo', $args_echos_du_congo);

    // Patriote
    $labels_patriote = array(
        'name'                  => __('Patriotes', 'text_domain'),
        'singular_name'         => __('Patriote', 'text_domain'),
        'menu_name'             => __('Patriotes', 'text_domain'),
        'name_admin_bar'        => __('Patriote', 'text_domain'),
        'archives'              => __('Archives des Patriotes', 'text_domain'),
        'attributes'            => __('Attributs des Patriotes', 'text_domain'),
        'parent_item_colon'     => __('Patriote Parent', 'text_domain'),
        'all_items'             => __('Tous les Patriotes', 'text_domain'),
        'add_new_item'          => __('Ajouter un nouveau Patriote', 'text_domain'),
        'add_new'               => __('Ajouter un Patriote', 'text_domain'),
        'new_item'              => __('Nouveau Patriote', 'text_domain'),
        'edit_item'             => __('Éditer le Patriote', 'text_domain'),
        'update_item'           => __('Mettre à jour le Patriote', 'text_domain'),
        'view_item'             => __('Voir le Patriote', 'text_domain'),
        'view_items'            => __('Voir les Patriotes', 'text_domain'),
        'search_items'          => __('Rechercher un Patriote', 'text_domain'),
        'not_found'             => __('Pas trouvé', 'text_domain'),
        'not_found_in_trash'    => __('Pas trouvé dans la corbeille', 'text_domain'),
        'featured_image'        => __('Image de couverture', 'text_domain'),
        'set_featured_image'    => __('Définir l’image de couverture', 'text_domain'),
        'remove_featured_image' => __('Supprimer l’image de couverture', 'text_domain'),
        'use_featured_image'    => __('Utiliser comme image de couverture', 'text_domain'),
        'insert_into_item'      => __('Insérer dans le Patriote', 'text_domain'),
        'uploaded_to_this_item' => __('Téléchargé dans ce Patriote', 'text_domain'),
        'items_list'            => __('Liste des Patriotes', 'text_domain'),
        'items_list_navigation' => __('Navigation de la liste des Patriotes', 'text_domain'),
        'filter_items_list'     => __('Filtrer la liste des Patriotes', 'text_domain'),
    );

    $args_patriote = array(
        'label'                 => __('Patriote', 'text_domain'),
        'description'           => __('Description des Patriotes', 'text_domain'),
        'labels'                => $labels_patriote,
        'supports'              => array('title', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 9,
        'menu_icon'             => 'dashicons-media-document',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type('patriote', $args_patriote);
}
add_action('init', 'create_custom_post_types');



//ETAPE 2: PERSONNALISER LES COLONNES QUI LISTE LES ARTICLES JOURNAL OFFICIEL
// Ajouter des colonnes personnalisées pour le Custom Post Type "Journal Officiel"
// Ajouter des colonnes personnalisées
function add_custom_columns($columns) {
    $columns['featured_image'] = __('Image de couverture');
    $columns['pdf_document'] = __('Document PDF');
    return $columns;
}

add_filter('manage_journal_officiel_posts_columns', 'add_custom_columns');
add_filter('manage_depeches_de_brazza_posts_columns', 'add_custom_columns');
add_filter('manage_semaine_africaine_posts_columns', 'add_custom_columns');
add_filter('manage_echos_du_congo_posts_columns', 'add_custom_columns');
add_filter('manage_patriote_posts_columns', 'add_custom_columns');

// Afficher les données des colonnes personnalisées
function custom_column_content($column, $post_id) {
    switch ($column) {
        case 'featured_image':
            $featured_image = get_the_post_thumbnail($post_id, array(120, 209));
            if ($featured_image) {
                echo $featured_image;
            } else {
                echo __('Pas d\'image');
            }
            break;

        case 'pdf_document':
            $pdf_document_url = get_field('document_pdf', $post_id);
            if ($pdf_document_url) {
                echo '<a href="' . esc_url($pdf_document_url) . '" target="_blank">Télécharger le PDF</a>';
            } else {
                echo __('Pas de PDF');
            }
            break;
    }
}

add_action('manage_journal_officiel_posts_custom_column', 'custom_column_content', 10, 2);
add_action('manage_depeches_de_brazza_posts_custom_column', 'custom_column_content', 10, 2);
add_action('manage_semaine_africaine_posts_custom_column', 'custom_column_content', 10, 2);
add_action('manage_echos_du_congo_posts_custom_column', 'custom_column_content', 10, 2);
add_action('manage_patriote_posts_custom_column', 'custom_column_content', 10, 2);

// Rendre les colonnes triables
function sortable_custom_columns($columns) {
    $columns['featured_image'] = 'featured_image';
    $columns['pdf_document'] = 'pdf_document';
    return $columns;
}

add_filter('manage_edit-journal_officiel_sortable_columns', 'sortable_custom_columns');
add_filter('manage_edit-depeches_de_brazza_sortable_columns', 'sortable_custom_columns');
add_filter('manage_edit-semaine_africaine_sortable_columns', 'sortable_custom_columns');
add_filter('manage_edit-echos_du_congo_sortable_columns', 'sortable_custom_columns');
add_filter('manage_edit-patriote_sortable_columns', 'sortable_custom_columns');





/***************FIN DEVELOPPEMENT DEVLEWI********************/

