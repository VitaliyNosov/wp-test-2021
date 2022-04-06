<?php

/**
 * Part-slider-two
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-two' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider-two';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>


<div class="slider-two-block">
                    <div class="next next-slider-two">
                        <
                    </div>
                    <div class="prev prev-slider-two">
                        >
                    </div>
</div>


<div class="block-slider-two">

	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    	<?php if( have_rows('slides-two') ): ?>
			<div class="slides-two">
				<?php while( have_rows('slides-two') ): the_row(); 
					$image = get_sub_field('image-two');
					?>
					<div>
						<?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php else: ?>
			<p>Please add some slides-two Vitaliy.</p>
		<?php endif; ?>
	</div>

</div>
