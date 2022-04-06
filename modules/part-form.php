<div class="section__form">
    <div class="container">
            <div class="form">
                <div class="form__image">
                    <img src="<?php the_field('form_image'); ?>" alt="#">
                </div>
                <div class="form__block">
                    <h2><?php the_field('title_form'); ?></h2>
                    <?php echo do_shortcode( '[contact-form-7 id="42" title="Без названия"]' );?>
            </div>
        </div>
    </div>
</div>

