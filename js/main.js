$(function () {
  var mixer = mixitup('.works__content');

  Fancybox.bind('[data-fancybox="gallery"]', {
    caption: function (fancybox, carousel, slide) {
      return (
        `${slide.index + 1} / ${carousel.slides.length} <br />` + slide.caption
      );
    },
  });

  // $('.video').magnificPopup({
  //   disableOn: 700,
  //   type: 'iframe',
  //   mainClass: 'mfp-fade',
  //   removalDelay: 160,
  //   preloader: false,

  //   fixedContentPos: false
  // });

  $('.reviews__slider').slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    adaptiveHeight: true,
    prevArrow: false,
    nextArrow: false
  });



  $("#toggle, .menu__link, .menu__link").on("click", function () {
    $(this).toggleClass("burger--close");
    $('.menu').toggleClass("menu--open");
  });

  $(".menu__link").on("click", function () {
    $('.burger').removeClass("burger--close");
  });


  $(".header, .hero").on("click", "a", function (e) {
    e.preventDefault();
    var id = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({
      scrollTop: top
    }, 500);
  });



  var menu = $('.header');
  $(window).scroll(function () {
    if ($(window).scrollTop() > 10) {
      menu.addClass('header--fixid');
    } else {
      menu.removeClass('header--fixid');
    }
  });


  var btn = $('.button, .logo');
  $(window).scroll(function () {
    if ($(window).scrollTop() > 500) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });
  btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '500');
  });

});


