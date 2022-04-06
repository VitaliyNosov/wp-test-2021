<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test-wpbakery
 */

get_header();
?>

<?php

global $more;
while( have_posts() ) : the_post();
	$more = 1; // отображаем полностью всё содержимое поста
	// the_title(); // эта функция выводит заголовок
	the_content(); // выводим контент
endwhile;

?>

<?php

get_footer();
