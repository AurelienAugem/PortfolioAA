<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio de développeur Wordpress et Web de Aurélien Augem</title>
    <meta name="description" content="Présentation et description des différents projets de développement web et WordPress aux quels j'ai participé">
    <?php wp_head() ?>
</head>

<body>
    <header>
        <?php wp_nav_menu(array('theme_location' => 'Menu d\'entête')); ?>
        <span class="data-link" data-link="<?php echo get_template_directory_uri(); ?>"></span>
    </header>

