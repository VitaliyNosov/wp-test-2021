<?php


get_header();?>

<?php

	global $more;
	while( have_posts() ) : the_post();
		$more = 1; 
		the_title(); 
		the_content(); 
	endwhile;

?>

<?php get_footer();
