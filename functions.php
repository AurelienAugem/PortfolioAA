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

// Chargement de la feuille de style
function portfolio_style(){
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'portfolio_style');

// Chargement du script principal
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

?>