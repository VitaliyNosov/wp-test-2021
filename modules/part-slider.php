<section class="section__slider">
    <div class="container">
        <div class="slider">
            <h3><?php the_field('title_slider'); ?></h3>
                <div class="slider__block">
                    <div class="next slider__button slider__button_left">
                        <img src="<?php the_field('slider_button_left'); ?>" alt="">
                    </div>
                    <div class="prev slider__button slider__button_right">
                        <img src="<?php the_field('slider_button_right'); ?>" alt="">
                    </div>
                </div>
            <div class="multiple-items">
                <div class="slider__item">
                    <img src="<?php the_field('image_slider1'); ?>" alt="#">
                </div>
                <div class="slider__item">
                    <img src="<?php the_field('image_slider2'); ?>" alt="#">
                </div>
                <div class="slider__item">
                    <img src="<?php the_field('image_slider3'); ?>" alt="#">
                </div>
                <div class="slider__item">
                    <img src="<?php the_field('image_slider4'); ?>" alt="#">
                </div>
                <div class="slider__item">
                    <img src="<?php the_field('image_slider5'); ?>" alt="#">
                </div>
                <div class="slider__item">
                    <img src="<?php the_field('image_slider5'); ?>" alt="#">
                </div>
            </div>
        </div>
    </div>
</section>

