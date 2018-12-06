$(window).scroll(function() {
    if($(this).scrollTop() > 2) {
        $('.contact-nav').addClass('active');
    } else {
        $('.contact-nav').removeClass('active');
    };
});

$(window).scroll(function() {
    if($(this).scrollTop() > 100) {
        $('.nav_custom').addClass('nav_active');
    } else {
        $('.nav_custom').removeClass('nav_active');
    };
});




window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}


function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}




$('.owl-carousel_client').owlCarousel({
    loop: true,
    dots: false,
    autoplay: true,
    animateOut: false,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
})



// testimonial slider
$('#owl-carousel_testimonial').owlCarousel({
    margin: 30,
    loop: true,
    nav: true,
    navText: ['<span class="ion-ios-arrow-left"></span>', '<span class="ion-ios-arrow-right"></span>'],
    dots: true,
    autoplay: true,
    smartSpeed: 1000,
    animateOut: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 2
        }
    }
})


$("#header_slider").vegas({
    delay: 10000,
    slides: [
        { src: "img/slider/1.jpg" },
        { src: "img/slider/2.jpg" },
        { src: "img/slider/3.jpg" }
    ],
    animation: ['kenburnsUp']
    
});