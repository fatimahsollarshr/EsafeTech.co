;(function($){

    // JavaScript for Client Section
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/client.default',function(scope,$){
            
            // Goes Here 

        });
    });
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/brand.default',function(scope,$){
            
            /* ==================================================
            # Brand Carousel
         ===============================================*/
        const brand4col = new Swiper(".brand4col", {
            // Optional parameters
            loop: true,
            slidesPerView: 2,
            spaceBetween: 30,
            autoplay: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // Navigation arrows
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 60,
                }
            },
        });
            
        });
    });

    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/software.default',function(scope,$){
            
            /* ==================================================
            # Software Details Carousel
         ===============================================*/
        const softDetails = new Swiper(".soft-details-carousel", {
            // Optional parameters
            direction: "horizontal",
            loop: true,
            autoplay: true,
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }

            // And if we need scrollbar
            /*scrollbar: {
            el: '.swiper-scrollbar',
          },*/
        });

        });
    });

    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/user.default',function(scope,$){
            
            /* ==================================================
            # Fun Factor Init
        ===============================================*/
        $('.timer').countTo();
        $('.fun-fact').appear(function() {
            $('.timer').countTo();
        }, {
            accY: -100
        });

        });
    });

    // JavaScript for Testimonial Section
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default',function(scope,$){
            
            /* ==================================================
            # Testimonial Carousel
         ===============================================*/
        const swiperStageRight = new Swiper(".carousel-stage-right", {
            // Optional parameters
            loop: true,
            freeMode: true,
            grabCursor: true,
            slidesPerView: 1,
            spaceBetween: 30,
            // Navigation arrows
            navigation: {
                nextEl: ".testimonial-button-next",
                prevEl: ".testimonial-button-prev"
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 50,
                },
                1367: {
                    slidesPerView: 2.5,
                    spaceBetween: 50,
                },
            },
        });

        });
    });

    // JavaScript for Testimonial Two Section
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonial2.default',function(scope,$){
            
            /* ==================================================
            # Testimonial Carousel
         ===============================================*/
        const testimonial2 = new Swiper(".testimonial-style-two-carousel", {
            // Optional parameters
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }

            // And if we need scrollbar
            /*scrollbar: {
            el: '.swiper-scrollbar',
          },*/
        });

        });
    });


    

})(jQuery);
