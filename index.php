<?php get_header(); ?>

<?php

global $more;
while( have_posts() ) : the_post();
	$more = 1; // отображаем полностью всё содержимое поста
	// the_title(); // эта функция выводит заголовок
	the_content(); // выводим контент
endwhile;

?>

<?php get_footer(); ?>





