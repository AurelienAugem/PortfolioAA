<?php get_header()?>
<main>
    <?php get_template_part('templates/background'); 
    
        if (have_posts()):
            while (have_posts()) : the_post();

            $description = get_post_meta(get_the_id(),'description_du_projet',true);
            $lienGit = get_post_meta(get_the_id(),'lien_github',true);
            $technos = get_the_terms($post->ID, 'techno');
            $projectType = get_the_terms($post->ID, 'project_type');
            $technoList = portfolio_array_taxo($technos);
            $type = portfolio_taxo($projectType);
    ?>
            <section class="post">
                <div class="post-content">
                    <div  class="post-title">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="post-image">
                        <?php the_content(); ?>
                    </div>
                    <div class="techno">
                        <?php portfolio_show_tech($technoList); ?>
                    </div>
                    <div class="post-type">
                        <p class="type">Projet de type : <?php echo $type; ?> </p>
                    </div>
                    <div class="post-description">
                        
                        <p class="text-description"><?php echo $description; ?></p>
                    </div>
                    <div class="git-link">
                        <a href=<?php echo $lienGit; ?> target="_blank">Lien vers le code sur GitHub</a>
                    </div>
                </div>
                

            </section>
    <?php            
            endwhile;
        endif;
    ?>  
</main>
<?php get_footer()?>