<?php
if (!function_exists('inicijaliziraj_temu')) {
	function inicijaliziraj_temu()
	{
		add_theme_support('post-thumbnails');
		register_nav_menus(array(
			'glavni-menu' => "Glavni navigacijski izbornik"
		));
		add_theme_support('custom-background', apply_filters(
			'test_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		));
		add_theme_support('customize-selective-refresh-widgets');
		add_post_type_support( 'nastavnik', 'thumbnail' );
		add_post_type_support( 'predmet', 'thumbnail' );
	}
}
add_action('after_setup_theme', 'inicijaliziraj_temu');




//SIDEBAR ZA NOVOSTI
function aktiviraj_sidebar()
{
	register_sidebar(
		array(
			'name' => "Glavni sidebar",
			'id' => 'glavni-sidebar',
			'description' => "Glavni sidebar",
			'before_widget' => '<div class="widget-content">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name' => "Kategorije sidebar",
			'id' => 'kategorije-sidebar',
			'description' => "Kategorije sidebar",
			'before_widget' => '<div class="widget-content">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name' => "Footer sidebar 1",
			'id' => 'footer-sidebar1',
			'description' => "Footer sidebar 1",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);


	register_sidebar(
		array(
			'name' => "Footer sidebar 2",
			'id' => 'footer-sidebar2',
			'description' => "Footer sidebar 2",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name' => "Footer sidebar 3",
			'id' => 'footer-sidebar3',
			'description' => "Footer sidebar 3",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name' => "Footer sidebar 4",
			'id' => 'footer-sidebar4',
			'description' => "Footer sidebar 4",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);
}
add_action('widgets_init', 'aktiviraj_sidebar');


function DajObjaveStudij()
{
	$args = array(
		'posts_per_page' => -1,
		'category_name' => 'studij'
	);

	$oResults = get_posts($args);
	$sIstaknutaSlika = "";
	foreach ($oResults as $oRezultat) {

		if (get_the_post_thumbnail_url($oRezultat->ID)) {
			$sIstaknutaSlika = get_the_post_thumbnail_url($oRezultat->ID);
		} else {
			$sIstaknutaSlika = get_template_directory_uri() . '/img/home-bg.jpg';
		}

		$sUrl = get_permalink($oRezultat->ID);
		$sRezultatNaziv = $oRezultat->post_title;

		$sHtml = '
						<div class="row dvObavijesti">
							<h4><a href="' . $sUrl . '" style="cursor:pointer;">' . $sRezultatNaziv . '</a></h4>
						</div>';
	}
	return $sHtml;
}
function DajObjaveStudenti()
{
	$args = array(
		'posts_per_page' => -1,
		'category_name' => 'studenti'
	);

	$oResults = get_posts($args);
	$sIstaknutaSlika = "";

	foreach ($oResults as $oRezultat) {

		if (get_the_post_thumbnail_url($oRezultat->ID)) {
			$sIstaknutaSlika = get_the_post_thumbnail_url($oRezultat->ID);
		} else {
			$sIstaknutaSlika = get_template_directory_uri() . '/img/home-bg.jpg';
		}

		$sUrl = get_permalink($oRezultat->ID);
		$sRezultatNaziv = $oRezultat->post_title;

		$sHtml = '
						<div class="row dvObavijesti">
						<h4><a href="' . $sUrl . '" style="cursor:pointer;">' . $sRezultatNaziv . '</a></h4>
						</div>';
	}
	return $sHtml;
}


function DajObjaveObavijesti()
{
	$args = array(
		'posts_per_page' => -1,
		'category_name' => 'obavijesti'
	);

	$oResults = get_posts($args);
	$sIstaknutaSlika = "";

	foreach ($oResults as $oRezultat) {

		if (get_the_post_thumbnail_url($oRezultat->ID)) {
			$sIstaknutaSlika = get_the_post_thumbnail_url($oRezultat->ID);
		} else {
			$sIstaknutaSlika = get_template_directory_uri() . '/img/home-bg.jpg';
		}

		$sUrl = get_permalink($oRezultat->ID);
		$sRezultatNaziv = $oRezultat->post_title;

		$sHtml = '
						<div class="row dvObavijesti">
						<h4><a href="' . $sUrl . '" style="cursor:pointer;">' . $sRezultatNaziv . '</a></h4>
						</div>';
	}
	return $sHtml;
}
//UCITAVANJE CSS DATOTEKA
function UcitajCssTeme()
{
	wp_enqueue_style('clean-blog-css', get_template_directory_uri() . '/css/clean-blog.min.css');
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css');
	wp_enqueue_style('glavni-css', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'UcitajCssTeme');

//UCITAVANJE JS DATOTEKA
function UcitajJsTeme()
{
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), true);
	wp_enqueue_script('fontawesome-js', get_template_directory_uri() . '/vendor/fontawesome-free/js/all.min.js', array('jquery'), true);
	wp_enqueue_script('jquery-js', get_template_directory_uri() . '/vendor/jquery/jquery.min.js', array('jquery'), true);
	wp_enqueue_style('clean-blog-js', get_template_directory_uri() . '/js/clean-blog.min.js');
	wp_enqueue_script('glavni-js', get_template_directory_uri() . '/js/skripta.js', array('jquery'), true);
}
add_action('wp_enqueue_scripts', 'UcitajJsTeme');

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';



function registriraj_nastavnik_cpt()
{
	$labels = array(
		'name' => _x('Nastavnici', 'Post Type General Name', 'vsmti'),
		'singular_name' => _x('Nastavnik', 'Post Type Singular Name', 'vsmti'),
		'menu_name' => __('Nastavnici', 'vsmti'),
		'name_admin_bar' => __('Nastavnici', 'vsmti'),
		'archives' => __('Nastavnici arhiva', 'vsmti'),
		'attributes' => __('Atributi', 'vsmti'),
		'parent_item_colon' => __('Roditeljski element', 'vsmti'),
		'all_items' => __('Svi nastavnici', 'vsmti'),
		'add_new_item' => __('Dodaj novoga nastavnika', 'vsmti'),
		'add_new' => __('Dodaj novi', 'vsmti'),
		'new_item' => __('Novi nastavnik', 'vsmti'),
		'edit_item' => __('Uredi nastavnika', 'vsmti'),
		'update_item' => __('Ažuriraj nastavnika', 'vsmti'),
		'view_item' => __('Pogledaj nastavnika', 'vsmti'),
		'view_items' => __('Pogledaj nastavnike', 'vsmti'),
		'search_items' => __('Pretraži nastavnike', 'vsmti'),
		'not_found' => __('Nije pronađeno', 'vsmti'),
		'not_found_in_trash' => __('Nije pronađeno u smeću', 'vsmti'),
		'featured_image' => __('Glavna slika', 'vsmti'),
		'set_featured_image' => __('Postavi glavnu sliku', 'vsmti'),
		'remove_featured_image' => __('Ukloni glavnu sliku', 'vsmti'),
		'use_featured_image' => __('Postavi za glavnu sliku', 'vsmti'),
		'insert_into_item' => __('Umentni', 'vsmti'),
		'uploaded_to_this_item' => __('Preneseno', 'vsmti'),
		'items_list' => __('Lista', 'vsmti'),
		'items_list_navigation' => __('Navigacija među nastanvicima', 'vsmti'),
		'filter_items_list' => __('Filtriranje nastavnika', 'vsmti'),
	);
	$args = array(
		'label' => __('Nastavnik', 'vsmti'),
		'description' => __('Nastavnik post type', 'vsmti'),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-groups',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => false,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type('nastavnik', $args);
}
add_action('init', 'registriraj_nastavnik_cpt', 0);




function registriraj_taksonomiju_naslovno_zvanje()
{
	$labels = array(
		'name' => __('Naslovna zvanja', 'Taxonomy General Name', 'vsmti'),
		'singular_name' => __('Naslovno zvanje', 'Taxonomy Singular Name', 'vsmti'),
		'menu_name' => __('Naslovna zvanja', 'vsmti'),
		'all_items' => __('Sva naslovna zvanja', 'vsmti'),
		'parent_item' => __('Roditeljsko zvanje', 'vsmti'),
		'parent_item_colon' => __('Roditeljsko zvanje', 'vsmti'),
		'new_item_name' => __('Novo naslovno zvanje', 'vsmti'),
		'add_new_item' => __('Dodaj novo naslovno zvanje', 'vsmti'),
		'edit_item' => __('Uredi naslovno zvanje', 'vsmti'),
		'update_item' => __('Ažuiriraj naslovno zvanje', 'vsmti'),
		'view_item' => __('Pogledaj naslovno zvanje', 'vsmti'),
		'separate_items_with_commas' => __('Odvojite zvanja sa zarezima', 'vsmti'),
		'add_or_remove_items' => __('Dodaj ili ukloni naslovno zvanje', 'vsmti'),
		'choose_from_most_used' => __('Odaberi među najčešće korištenima', 'vsmti'),
		'popular_items' => __('Popularna naslovna zvanja', 'vsmti'),
		'search_items' => __('Pretraga', 'vsmti'),
		'not_found' => __('Nema rezultata', 'vsmti'),
		'no_terms' => __('Nema naslovnih zvanja', 'vsmti'),
		'items_list' => __('Lista naslovnih zvanja', 'vsmti'),
		'items_list_navigation' => __('Navigacija', 'vsmti'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
	);
	register_taxonomy('naslovno_zvanje', array('nastavnik'), $args);
}
add_action('init', 'registriraj_taksonomiju_naslovno_zvanje', 0);

// Register Custom Post Type
// Register Custom Post Type
function registriraj_predmete_cpt()
{

	$labels = array(
		'name'                  => _x('Predmeti', 'Post Type General Name', 'text_domain'),
		'singular_name'         => _x('Predmet', 'Post Type Singular Name', 'text_domain'),
		'menu_name'             => __('Predmeti', 'text_domain'),
		'name_admin_bar'        => __('Predmeti', 'text_domain'),
		'archives'              => __('Arhive predmeta', 'text_domain'),
		'attributes'            => __('Atributi predmeta', 'text_domain'),
		'parent_item_colon'     => __('Roditeljski predmet', 'text_domain'),
		'all_items'             => __('Svi predmeti', 'text_domain'),
		'add_new_item'          => __('Dodaj novi predmet', 'text_domain'),
		'add_new'               => __('Dodaj predmet', 'text_domain'),
		'new_item'              => __('Novi predmet', 'text_domain'),
		'edit_item'             => __('Uredi predmet', 'text_domain'),
		'update_item'           => __('Ažuriraj predmet', 'text_domain'),
		'view_item'             => __('Pogledaj predmet', 'text_domain'),
		'view_items'            => __('Pogledaj predmete', 'text_domain'),
		'search_items'          => __('Pretraga', 'text_domain'),
		'not_found'             => __('Not found', 'text_domain'),
		'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
		'featured_image'        => __('Featured Image', 'text_domain'),
		'set_featured_image'    => __('Set featured image', 'text_domain'),
		'remove_featured_image' => __('Remove featured image', 'text_domain'),
		'use_featured_image'    => __('Use as featured image', 'text_domain'),
		'insert_into_item'      => __('Insert into item', 'text_domain'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
		'items_list'            => __('Items list', 'text_domain'),
		'items_list_navigation' => __('Items list navigation', 'text_domain'),
		'filter_items_list'     => __('Filter items list', 'text_domain'),
	);
	$args = array(
		'label'                 => __('Predmet', 'text_domain'),
		'description'           => __('Upravljanje predmetima', 'text_domain'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type('predmet', $args);
}
add_action('init', 'registriraj_predmete_cpt', 0);

function registriraj_taksonomiju_godina()
{
	$labels = array(
		'name' => _x('Godina', 'Taxonomy General Name', 'vsmti'),
		'singular_name' => _x('Godina', 'Taxonomy Singular Name', 'vsmti'),
		'menu_name' => __('Godine', 'vsmti'),
		'all_items' => __('Sve godine', 'vsmti'),
		'parent_item' => __('Rdoiteljska godina', 'vsmti'),
		'parent_item_colon' => __('Roditeljska godina', 'vsmti'),
		'new_item_name' => __('Nova godina', 'vsmti'),
		'add_new_item' => __('Dodaj novu godinu', 'vsmti'),
		'edit_item' => __('Uredi godinu', 'vsmti'),
		'update_item' => __('Ažuiriraj godinu', 'vsmti'),
		'view_item' => __('Pogledaj godinu', 'vsmti'),
		'separate_items_with_commas' => __('Odvojite godine sa zarezima', 'vsmti'),
		'add_or_remove_items' => __('Dodaj ili ukloni godinu', 'vsmti'),
		'choose_from_most_used' => __('Odaberi među najčešće korištenima', 'vsmti'),
		'popular_items' => __('Popularne godine', 'vsmti'),
		'search_items' => __('Pretraga', 'vsmti'),
		'not_found' => __('Nema rezultata', 'vsmti'),
		'no_terms' => __('Nema godina', 'vsmti'),
		'items_list' => __('Lista godina', 'vsmti'),
		'items_list_navigation' => __('Navigacija', 'vsmti'),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
	);
	register_taxonomy('godina', array('predmet'), $args);
}
add_action('init', 'registriraj_taksonomiju_godina', 0);



function registriraj_taksonomiju_semestar()
{
	$labels = array(
		'name' => _x('Semestar', 'Taxonomy General Name', 'vsmti'),
		'singular_name' => _x('Semestar', 'Taxonomy Singular Name', 'vsmti'),
		'menu_name' => __('Semestri', 'vsmti'),
		'all_items' => __('Svi semestri', 'vsmti'),
		'parent_item' => __('Rdoiteljski semestar', 'vsmti'),
		'parent_item_colon' => __('Roditeljski semestar', 'vsmti'),
		'new_item_name' => __('Novi semestar', 'vsmti'),
		'add_new_item' => __('Dodaj semestar', 'vsmti'),
		'edit_item' => __('Uredi semestar', 'vsmti'),
		'update_item' => __('Ažuiriraj semestar', 'vsmti'),
		'view_item' => __('Pogledaj semestar', 'vsmti'),
		'separate_items_with_commas' => __('Odvojite semestre sa zarezima', 'vsmti'),
		'add_or_remove_items' => __('Dodaj ili ukloni semestar', 'vsmti'),
		'choose_from_most_used' => __('Odaberi među najčešće korištenima', 'vsmti'),
		'popular_items' => __('Popularni semestar', 'vsmti'),
		'search_items' => __('Pretraga', 'vsmti'),
		'not_found' => __('Nema rezultata', 'vsmti'),
		'no_terms' => __('Nema semestara', 'vsmti'),
		'items_list' => __('Lista semestara', 'vsmti'),
		'items_list_navigation' => __('Navigacija', 'vsmti'),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
	);
	register_taxonomy('semestar', array('predmet'), $args);
}
add_action('init', 'registriraj_taksonomiju_semestar', 0);


?>

<?php

function daj_nastavnike($slug)
{
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'nastavnik',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'naslovno_zvanje',
				'field' => 'slug',
				'terms' => $slug
			)
		)
	);
	$nastavnici = get_posts($args);
	$sHtml = "<ul>";
	foreach ($nastavnici as $nastavnik) {
		$sNastavnikUrl = $nastavnik->guid;
		$sNastavnikNaziv = $nastavnik->post_title;
		$sNastavnikIstaknutaSlika  = "";
		if(get_the_post_thumbnail_url($nastavnik->ID))
		{
			$sNastavnikIstaknutaSlika = get_the_post_thumbnail_url($nastavnik->ID);
		}
		else 
		{
			$sNastavnikIstaknutaSlika = get_template_directory_uri() . '/img/home-bg.jpg';
		}
		$sHtml .= '<li>
					<a href="' . $sNastavnikUrl . '">
						<div class="col-md-3">
							<div class="card" style="width: 12rem;">
								<img class="card-img-top" width="100px" height="200px" src="'.$sNastavnikIstaknutaSlika.'">
								<div class="card-body">
									<h5 class="card-title" style="color:black;">'.$sNastavnikNaziv.'
								</div>
							</div>
						</div>
					</a>

				   </li>';
	}
	$sHtml .= "</ul>";
	return $sHtml;
}

function daj_predmete($slug, $slugdva)
{

	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'predmet',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'godina',

				'field' => 'slug',
				'terms' => $slug
			),
			array(
				'taxonomy' => 'semestar',

				'field' => 'slug',
				'terms' => $slugdva
			)
		)
	);
	$predmeti = get_posts($args);

	$sHtml = "    <table border='1'>
					<thead>
					<tr>
						<th>Naziv predmeta</th>
						<th>ECTS bodova</th>
						<th>Predavanja</th>
						<th>LV</th>
						<th>KV</th>
						<th>Status predmeta</th>
					</tr>
					</thead>
					<tbody>";
	foreach ($predmeti as $Predmet) {
		$nPredmetID = $Predmet->ID;
		$sPredmetUrl = $Predmet->guid;
		$sPredmetNaziv = $Predmet->post_title;
		$ects = get_post_meta($nPredmetID, 'ects_predmeta', true);
		if($ects ==""|| $ects == 0 || $ects == NULL) {
			$ects = "-";
		}
		$sp = get_post_meta($nPredmetID, 'sp_predmeta', true);
		if($sp ==""|| $sp == 0 || $sp == NULL) {
			$sp = "-";
		}
		$slv = get_post_meta($nPredmetID, 'slv_predmeta', true);
		if($slv ==""|| $slv == 0 || $slv == NULL) {
			$slv = "-";
		}
		$skv = get_post_meta($nPredmetID, 'skv_predmeta', true);
		if($skv ==""|| $skv == 0 || $skv == NULL) {
			$skv = "-";
		}
		$ssp = get_post_meta($nPredmetID, 'status_predmeta', true);
		if($ssp ==""|| $ssp == 0 || $ssp == NULL) {
		}

		$sHtml .= '<tr>
					<td><a href="' . $sPredmetUrl . '">' . $sPredmetNaziv . '</a></li></td>
					<td>'.$ects.'</td>
					<td>'.$sp.'</td>
					<td>'.$slv.'</td>
					<td>'.$skv.'</td>
					<td>'.$ssp.'</td>
				   </tr>';
	}
	$sHtml .= "</tbody></table>";
	return $sHtml;
}

function add_meta_box_titula()
{
	add_meta_box('vsmti_nastavnik_titula', 'Titula', 'html_meta_box_nastavnik', 'nastavnik');
}
function html_meta_box_nastavnik($post)
{
	wp_nonce_field('spremi_titlu_nastavnika', 'titula_prefiks_nonce');
	wp_nonce_field('spremi_titlu_nastavnika', 'titula_sufiks_nonce');
	//dohvaćanje meta vrijednosti
	$titula_prefiks = get_post_meta($post->ID, 'titula_prefiks_nastavnika', true);
	$titula_sufiks = get_post_meta($post->ID, 'titula_sufiks_nastavnika', true);
	echo '
<div>
<div>
<label for="titula_prefiks_nastavnika">Titula prefiks nastavnika: </label>
<input type="text" id="titula_prefiks_nastavnika"
name="titula_prefiks_nastavnika" value="' . $titula_prefiks . '" />
</div><br/>
<div>
<label for="titula_sufiks_nastavnika">Titula sufiks nastavnika: </label>
<input type="text" id="titula_sufiks_nastavnika"
name="titula_sufiks_nastavnika" value="' . $titula_sufiks . '" />
</div>
</div>';
}
function spremi_titlu_nastavnika($post_id)
{
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce_titula_prefiks = (isset($_POST['titula_prefiks_nonce']) && wp_verify_nonce(
		$_POST['titula_prefiks_nonce'],
		basename(__FILE__)
	)) ? 'true' : 'false';
	$is_valid_nonce_titula_sufiks = (isset($_POST['titula_sufiks_nonce']) && wp_verify_nonce(
		$_POST['titula_sufiks_nonce'],
		basename(__FILE__)
	)) ? 'true' : 'false';
	if (
		$is_autosave || $is_revision || !$is_valid_nonce_titula_prefiks ||
		!$is_valid_nonce_titula_sufiks
	) {
		return;
	}
	if (!empty($_POST['titula_prefiks_nastavnika'])) {
		update_post_meta(
			$post_id,
			'titula_prefiks_nastavnika',
			$_POST['titula_prefiks_nastavnika']
		);
	} else {
		delete_post_meta($post_id, 'titula_prefiks_nastavnika');
	}
	if (!empty($_POST['titula_sufiks_nastavnika'])) {
		update_post_meta(
			$post_id,
			'titula_sufiks_nastavnika',
			$_POST['titula_sufiks_nastavnika']
		);
	} else {
		delete_post_meta($post_id, 'titula_sufiks_nastavnika');
	}
}
add_action('add_meta_boxes', 'add_meta_box_titula');
add_action('save_post', 'spremi_titlu_nastavnika');















function add_meta_box_predmet_info_cmb()
{
	add_meta_box('vsmti_predmet_cmb', 'Info o predmetu', 'html_meta_box_info_predmeta', 'predmet');
}
function html_meta_box_info_predmeta($post)
{
	wp_nonce_field('spremi_ects_predmeta', 'ects_predmeta_nonce');
	wp_nonce_field('spremi_sp_predmeta', 'sp_predmeta_nonce');
	wp_nonce_field('spremi_slv_predmeta', 'slv_predmeta_nonce');
	wp_nonce_field('spremi_skv_predmeta', 'skv_predmeta_nonce');
	wp_nonce_field('spremi_nastavnike_predmeta', 'nastavnici_predmeta_nonce');
	//dohvaćanje meta vrijednosti
	$ects_predmeta = get_post_meta($post->ID, 'ects_predmeta', true);
	$sp_predmeta = get_post_meta($post->ID, 'sp_predmeta', true);
	$slv_predmeta = get_post_meta($post->ID, 'slv_predmeta', true);
	$skv_predmeta = get_post_meta($post->ID, 'skv_predmeta', true);
	$nastavnici_predmeta = get_post_meta($post->ID, 'nastavnici_predmeta', true);
	echo '
	<div>
		<div>
			<label for="ects_predmeta">ECTS predmeta: </label>
			<input type="number" id="ects_predmeta"
			name="ects_predmeta" value="' . $ects_predmeta . '" />
		</div>
		<div>
			<label for="sp_predmeta">Sati predavanja predmeta: </label>
			<input type="number" id="sp_predmeta"
			name="sp_predmeta" value="' . $sp_predmeta . '" />
		</div>
		<div>
			<label for="slv_predmeta">Sati LV predmeta : </label>
			<input type="number" id="slv_predmeta"
			name="slv_predmeta" value="' . $slv_predmeta . '" />
		</div>
		<div>
			<label for="skv_predmeta">Sati KV predmeta: </label>
			<input type="number" id="skv_predmeta"
			name="skv_predmeta" value="' . $skv_predmeta . '" />
		</div>
		<div>
		<label for="nastavnici_predmeta">Nastavnici: </label>
			<select id="nastavnici_predmeta" name="nastavnici_predmeta[]" multiple="multiple">
				  '.
				  $args = array(
					'posts_per_page' => -1,
					'post_type' => 'nastavnik',
					'post_status' => 'publish'
					);
					$nastavnici = get_posts( $args );
					$sHtml = "";
		
					foreach ($nastavnici as $nastavnik)
						{
							$sNastavnikNaziv = $nastavnik->post_title;
							$nastavniciArray = explode(', ', $nastavnici_predmeta);
							$selected = "";
							foreach ($nastavniciArray as $oNastavnik) 
							{
								
								if ($oNastavnik == $sNastavnikNaziv)
								{
									$selected = "selected";
								}
							}

							
							$sHtml .= '<option value="'.$sNastavnikNaziv.'" '. $selected .'>'.$sNastavnikNaziv.'</option>';
						}
					echo $sHtml
				  .'
			</select>
			</div>
	</div>
  ';
}
function spremi_info_predmeta($post_id)
{
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce_ects_predmeta = (isset($_POST['ects_predmeta_nonce']) && wp_verify_nonce(
		$_POST['ects_predmeta_nonce'],
		basename(__FILE__)
	)) ? 'true' : 'false';
	$is_valid_nonce_sp_predmeta = (isset($_POST['sp_predmeta_nonce']) && wp_verify_nonce(
		$_POST['sp_predmeta_nonce'],
		basename(__FILE__)
	)) ? 'true' : 'false';
	$is_valid_nonce_slv_predmeta = (isset($_POST['slv_predmeta_nonce']) && wp_verify_nonce(
		$_POST['slv_predmeta_nonce'],
		basename(__FILE__)
	)) ? 'true' : 'false';
	$is_valid_nonce_skv_predmeta = (isset($_POST['skv_predmeta_nonce']) && wp_verify_nonce(
		$_POST['skv_predmeta'],
		basename(__FILE__)
	)) ? 'true' : 'false';
	$is_valid_nonce_nastavnici_predmeta = ( isset( $_POST[ 'nastavnici_predmeta_nonce' ] ) &&
			 wp_verify_nonce($_POST[ 'nastavnici_predmeta_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	if (
		$is_autosave || $is_revision || !$is_valid_nonce_ects_predmeta ||
		!$is_valid_nonce_sp_predmeta || !$is_valid_nonce_slv_predmeta || !$is_valid_nonce_skv_predmeta || !$is_valid_nonce_nastavnici_predmeta
	) {
		return;
	}
	if (!empty($_POST['ects_predmeta'])) {
		update_post_meta(
			$post_id,
			'ects_predmeta',
			$_POST['ects_predmeta']
		);
	} else {
		delete_post_meta($post_id, 'ects_predmeta');
	}
	if (!empty($_POST['sp_predmeta'])) {
		update_post_meta(
			$post_id,
			'sp_predmeta',
			$_POST['sp_predmeta']
		);
	} else {
		delete_post_meta($post_id, 'sp_predmeta');
	}
	if (!empty($_POST['slv_predmeta'])) {
		update_post_meta(
			$post_id,
			'slv_predmeta',
			$_POST['slv_predmeta']
		);
	} else {
		delete_post_meta($post_id, 'slv_predmeta');
	}
	if (!empty($_POST['skv_predmeta'])) {
		update_post_meta(
			$post_id,
			'skv_predmeta',
			$_POST['skv_predmeta']
		);
	} else {
		delete_post_meta($post_id, 'skv_predmeta');
	}
	if(!empty($_POST['nastavnici_predmeta']))
	{
		if (is_array($_POST[ 'nastavnici_predmeta' ]))
		{
			$nastavnici = implode(", ", $_POST[ 'nastavnici_predmeta' ]);
		}
		else
		{
			$nastavnici = $_POST[ 'nastavnici_predmeta' ];
		}
		update_post_meta($post_id, 'nastavnici_predmeta',
		$nastavnici);
	}
	else
	{
		delete_post_meta($post_id, 'nastavnici_predmeta');
	}
}
add_action('add_meta_boxes', 'add_meta_box_predmet_info_cmb');
add_action('save_post', 'spremi_info_predmeta');


?>

