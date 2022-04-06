<!-- content -->
    <section class="section__content">
        <div class="container">
            <div class="content">
                <div class="content__info">
                    <h1><?php the_field('about_title'); ?></h1>
                    <p><?php the_field('about_desc'); ?></p>
                    <div class="content__button">
                        <a target="_blanck" href="<?php the_field('company_link'); ?>">Get Started</a>
                    </div>
                </div>
                <div class="content__images">
                    <img src="<?php the_field('about_image'); ?>" alt="#">
                </div>
            </div>                
        </div>
    </section>
<!-- content -->