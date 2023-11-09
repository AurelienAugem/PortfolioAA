<?
/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );

//Chargement de la feuille de style
function portfolio_style(){
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'portfolio_style');

//Chargement du script principal
function portfolio_script(){
    wp_enqueue_script(
        'script',
        get_template_directory_uri() . '/scripts/main.js',
        array(),
        1.0,
        true
    );
}
add_action('wp_enqueue_scripts', 'portfolio_script');

//Chargement du script ajax
function portfolio_ajax(){
    wp_enqueue_script(
        'ajax',
        get_template_directory_uri() . '/scripts/ajax.js',
        array(),
        1.0,
        true
    );
}
add_action('wp_enqueue_scripts', 'portfolio_ajax');

//Enregistrement du menu personnalisé
function portfolio_register_menu(){
    register_nav_menu('menu-header',__('Menu d\'entête'));
}
add_action('init','portfolio_register_menu');

//Récupérer le nom d'une taxonomie
function portfolio_taxo($args){
    foreach ($args as $arg) {
        $taxonomie = $arg->name;
    }return $taxonomie;
}

//Récupérer l'ensemble des noms d'une taxonomie
function portfolio_array_taxo($args){
    $arrayTaxonomies = array();
    foreach ($args as $arg) {
        $arrayTaxonomies[]=$arg;
    }return $arrayTaxonomies;
}

//Affichage des technologie utilisés dans le projet
function portfolio_show_tech($args) {
    $html = 51;
    $css = 50;
    $javascript = 52;
    $php = 53;
    $wordpress= 54;
    for ($i = 0; $i < count($args); $i++) {
        if ($args[$i]->slug == "html") {
            echo '<div class="block-info">';
            echo wp_get_attachment_image($html);
            echo '<span class="infobulle">' . get_post_meta($html, '_wp_attachment_image_alt', true) . '</span>';
            echo '</div>';
        } elseif ($args[$i]->slug == "css") {
            echo '<div class="block-info">';
            echo wp_get_attachment_image($css);
            echo '<span class="infobulle">' . get_post_meta($css, '_wp_attachment_image_alt', true) . '</span>';
            echo '</div>';
        } elseif ($args[$i]->slug == "javascript") {
            echo '<div class="block-info">';
            echo wp_get_attachment_image($javascript);
            echo '<span class="infobulle">' . get_post_meta($javascript, '_wp_attachment_image_alt', true) . '</span>';
            echo '</div>';
        } elseif ($args[$i]->slug == "php") {
            echo '<div class="block-info">';
            echo wp_get_attachment_image($php);
            echo '<span class="infobulle">' . get_post_meta($php, '_wp_attachment_image_alt', true) . '</span>';
            echo '</div>';
        } elseif ($args[$i]->slug == "wordpress") {
            echo '<div class="block-info">';
            echo wp_get_attachment_image($wordpress);
            echo '<span class="infobulle">' . get_post_meta($wordpress, '_wp_attachment_image_alt', true) . '</span>';
            echo '</div>';
        }
    }
}

//Réponse requête ajax des filtres
function portfolio_project_filter(){
    $type = $_POST['projectType'];

    $args = array(
        'post_type' => 'projet',
        'posts_per_page' => 10, 
        'tax_query' => array(
            array(
                'taxonomy' => 'project_type',
                'field' => 'slug',
                'terms' => $type,
            ),
        ),
    );

    $ajaxQuery = new WP_Query($args);
    $result = '';

    if($ajaxQuery->have_posts()){ while($ajaxQuery->have_posts()) : 
        $ajaxQuery->the_post();

        $result .= get_template_part('templates/card');

        endwhile; 
    } else {
        $result = '';
    }
    echo $result;
    exit;
}

add_action('wp_ajax_portfolio_project_filter', 'portfolio_project_filter');
add_action('wp_ajax_nopriv_portfolio_project_filter', 'portfolio_project_filter');

?>