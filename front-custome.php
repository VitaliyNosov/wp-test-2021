<?php get_header(); 

/*
Template Name: front-custome
*/

?>


<!-- content -->

<div class="wrapper">
    <?php get_template_part('modules/part','content'); ?>
    <?php get_template_part('modules/part','info'); ?>
    <?php get_template_part('modules/part','slider'); ?>
    <?php get_template_part('modules/part','form'); ?>
    <?php get_template_part('tempalte/parts','slider'); ?>
</div>

<!-- content -->


<?php get_footer(); ?>