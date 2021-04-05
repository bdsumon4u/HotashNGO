jQuery(function ($) {
    'use strict';

    // Menu JS
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 50) {
            $('.main-nav').addClass('menu-shrink');
        } else {
            $('.main-nav').removeClass('menu-shrink');
        }
    });

    // Header Search JS
    $('#close-btn').on('click', function() {
        $('#search-overlay').fadeOut();
        $('#search-btn').show();
    });
    $('#search-btn').on('click', function() {
        $('#search-overlay').fadeIn();
    });

    // Mean Menu JS
    jQuery('.mean-menu').meanmenu({
        meanScreenWidth: '991'
    });

    // Nice Select JS
    $('select').niceSelect();

    // Modal Video JS
    $('.js-modal-btn').modalVideo();

    // Wow JS
    new WOW().init();

    // Popup Image JS
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'fadeDuration': 100,
        'imageFadeDuration': 200,
        'disableScrolling': true,
        'positionFromTop': 120,
    });

    // Preloader JS
    jQuery(window).on('load', function(){
        jQuery('.loader').fadeOut(500);
    });

    // Banner Slider JS
    $('.banner-slider').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        smartSpeed: 1000,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: [
            "<i class='icofont-rounded-double-left'></i>",
            "<i class='icofont-rounded-double-right'></i>"
        ],
    });

    // Gallery Slider JS
    $('.gallery-slider').owlCarousel({
        items: 1,
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
        smartSpeed: 1000,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive:{
            0:{
                items: 1,
            },
            600:{
                items: 3,
            },
            1000:{
                items: 5,
            }
        }
    });

    // Odometer JS
    $('.odometer').appear(function(e) {
        var odo = $('.odometer');
        odo.each(function() {
            var countNumber = $(this).attr('data-count');
            $(this).html(countNumber);
        });
    });

    // Testimonial Slider JS
    $('.testimonial-slider').owlCarousel({
        items: 1,
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        smartSpeed: 1000,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
    });

    // Accordion JS
    $('.accordion > li:eq(0) a').addClass('active').next().slideDown();
    $('.accordion a').on('click', function(j) {
        var dropDown = $(this).closest('li').find('p');
        $(this).closest('.accordion').find('p').not(dropDown).slideUp();
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        }
        else {
            $(this).closest('.accordion').find('a.active').removeClass('active');
            $(this).addClass('active');
        }
        dropDown.stop(false, true).slideToggle();
        j.preventDefault();
    });

    // Timer JS
    let getDaysId = document.getElementById('days');
    if(getDaysId !== null){

        const second = 1000;
        const minute = second * 60;
        const hour = minute * 60;
        const day = hour * 24;

        let countDown = new Date('December 25, 2021 00:00:00').getTime();
        setInterval(function() {
            let now = new Date().getTime();
            let distance = countDown - now;

            document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
        }, second);
    };

    // Back to Top JS
    $(function(){
        $(window).on('scroll', function(){
            var scrolled = $(window).scrollTop();
            if (scrolled > 500) $('.go-top').addClass('active');
            if (scrolled < 500) $('.go-top').removeClass('active');
        });
        $('.go-top').on('click', function() {
            $('html, body').animate({ scrollTop: '0' },  500);
        });
    });
}(jQuery));
