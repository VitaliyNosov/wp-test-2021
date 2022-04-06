jQuery(document).ready(function( $ ) {

console.log('Проверка работоспособности!');

// burger menu

$('.burger__button').click(function () {
  $('.menu').slideToggle(500);
});
$(window).resize(function () {
  if ($(window).width() > 500) {
      $('.menu').removeAttr('style');
  }
});

// slider

$('.multiple-items').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 2,
    dots: true,
    arrows: true,
    prevArrow: $('.prev'),
    nextArrow: $('.next')
  });
    

});



