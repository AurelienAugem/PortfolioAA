<?

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

?>