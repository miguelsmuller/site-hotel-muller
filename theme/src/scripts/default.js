jQuery(document).ready(function($) {
  'use strict';

  $('.input_phone').mask('(00) 00009-0000');

  $('.input_period').daterangepicker({
    minDate: moment(),
    startDate: moment().add(1, 'days'),
    endDate: moment().add(2, 'days'),
    locale: {
      format: 'DD/M/YYYY'
    },
    autoApply: true,
  });

  $('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:10,
    nav:true,
    navText: ["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
    responsive:{
      0:{ items:1 },
      600:{ items:1 },
      1000:{ items:1 },
    }
  });

  $(window).scroll(function() {
    var scrollHeight = $(window).height()/2;

    if ($(this).scrollTop() > scrollHeight) {
      $('.btn-float').addClass('btn-float-open');
    } else {
      $('.btn-float').removeClass('btn-float-open');
    }

    if ($(this).scrollTop() > 60){
      $('header').addClass("header-shrink");
    }
    else{
      $('header').removeClass("header-shrink");
    }
  });

  document.addEventListener( 'wpcf7invalid', function( event ) {
    $('.wpcf7-response-output').addClass('alert alert-danger').removeClass('wpcf7-acceptance-missing wpcf7-validation-errors wpcf7-response-output');
  }, false );
  document.addEventListener( 'wpcf7spam', function( event ) {
    $('.wpcf7-response-output').addClass('alert alert-warning').removeClass('wpcf7-acceptance-missing wpcf7-validation-errors wpcf7-response-output');
  }, false );
  document.addEventListener( 'wpcf7mailfailed', function( event ) {
    $('.wpcf7-response-output').addClass('alert alert-warning').removeClass('wpcf7-acceptance-missing wpcf7-validation-errors wpcf7-response-output');
  }, false );
  document.addEventListener( 'wpcf7mailsent', function( event ) {
    $('.wpcf7-response-output').addClass('alert alert-success').removeClass('wpcf7-acceptance-missing wpcf7-validation-errors wpcf7-response-output');
  }, false );

  $('a[href*="#"]:not([href="#"], [data-toggle="tab"], [rel*="modal"])').click(function(e) {
    if(this.hash == '#main-menu'){
      var menu = $( '#main-menu' );

      if (menu.hasClass( 'open' )){
        menu.removeClass( 'open' );
      }else{
        menu.addClass( 'open' );
      }

      return false;
    }

    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        var $padding = parseInt($(this).attr('data-padding'), 10);
        $padding = (($padding >= 1) ? $padding : 0);
        $('html,body').animate({
            scrollTop: target.offset().top - $padding - 70
        }, 1000);
        return false;
      }
    }
  });
});
