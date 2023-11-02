<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body>
    <header>
        <?php wp_nav_menu(array('theme_location' => 'Menu d\'entête')); ?>
        <span class="data-link" data-link="<?php echo get_template_directory_uri(); ?>"></span>
    </header>

