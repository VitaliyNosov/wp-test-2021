(function($){

    console.log('Проверка работоспособности слайдера в админке');

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function( $block ) {
        $block.find('.slides-two').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            responsive: [
                {
                  breakpoint: 1025,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                  }
                },
                {
                    breakpoint: 913,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2,
                      infinite: true,
                      dots: true
                    }
                  },
                {
                  breakpoint: 769,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                    breakpoint: 541,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
                {
                breakpoint: 280,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
              }
            }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
              ]
        });     
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.slider-two').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=slider-two', initializeBlock );
    }

})(jQuery);