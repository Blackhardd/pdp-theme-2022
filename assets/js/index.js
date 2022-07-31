jQuery(document).ready(async function($){
    initHeader()
    initHeaderSalonsMenu()
    initSmoothScroll()
    initFixedContacts()
    initModals()
    initCarousels()
    initHomeSlider()
    initAdvantages()
    initTestimonials()
    initFaq()
    initContacts()
    initPhoneInputMask()
    initSalonGallery()
    initSalonsSlider()
    initVacancies()

    await initVideoCaching()
    initVideoLazyLoading()

    initCookieAcceptance()

    initViewportHeightFix()


    function initHeaderSalonsMenu(){
        if($('.desktop-salons-menu').length){
            $('.desktop-salons-menu__button').on('click', function(){
                $('.header-cart--active').removeClass('header-cart--active')

                $(this).parent().toggleClass('desktop-salons-menu--active')
            })

            $('.desktop-salons-panel').on('mouseleave', function(){
                $('.desktop-salons-menu').removeClass('desktop-salons-menu--active')
            })
        }
    }

    function initHeader(){
        const $mobileSalonsMenu = $('.mobile-salons-menu')
        const $mobileNavigation = $('.navigation--mobile')

        $('.navigation--header .menu > .menu-item-has-children > .sub-menu-wrap > .sub-menu > .menu-item-has-children > .sub-menu-wrap > .sub-menu > .menu-item-has-children').on('mouseenter', function(){
            $(this).addClass('menu-item--opened')
        })

        $('.mobile-salons-menu').on('click', function(e){
            if($(e.target).is('.mobile-salons-menu')){
                !$(this).hasClass('mobile-salons-menu--active') ? $('body').css('overflow', 'hidden') : $('body').css('overflow', '')
                $mobileSalonsMenu.removeClass('mobile-salons-menu--active')
            }
        })

        $('.mobile-salons-menu__button').on('click', function(){
            $mobileNavigation.removeClass('navigation--active')
            $mobileNavigation.find('.burger').removeClass('burger--active')
            !$(this).parent().hasClass('mobile-salons-menu--active') ? $('body').css('overflow', 'hidden') : $('body').css('overflow', '')
            $mobileSalonsMenu.toggleClass('mobile-salons-menu--active')
        })

        $('.navigation--mobile').on('click', function(e){
            if($(e.target).is('.navigation--mobile')){
                !$(this).hasClass('navigation--active') ? $('body').css('overflow', 'hidden') : $('body').css('overflow', '')
                $(this).find('.burger').toggleClass('burger--active')
                $mobileNavigation.removeClass('navigation--active')
            }
        })

        $('.navigation--mobile .navigation__button').on('click', function(){
            $mobileSalonsMenu.removeClass('mobile-salons-menu--active')
            !$(this).closest('.navigation').hasClass('navigation--active') ? $('body').css('overflow', 'hidden') : $('body').css('overflow', '')
            $(this).find('.burger').toggleClass('burger--active')
            $mobileNavigation.toggleClass('navigation--active')
        })

        $('.navigation--mobile .menu-item-has-children .menu-item-link > button').on('click', function(){
            $(this).closest('.menu-item').toggleClass('menu-item--opened')
        })
    }

    function initSmoothScroll(){
        $(document).on('click', 'a[href^="#"]:not([href^="#modal"])', function (event) {
            event.preventDefault();

            $('html, body').animate({
                scrollTop: $('body').hasClass('admin-bar') ? $($.attr(this, 'href')).offset().top - 132 : $($.attr(this, 'href')).offset().top - 100
            }, 500);
        });
    }

    function initFixedContacts(){
        if($('.fixed-contacts').length){
            $('.fixed-contacts__trigger').on('click', function(){
                $(this).closest('.fixed-contacts').toggleClass('fixed-contacts--active')
            })

            const $fixedContacts = $('.fixed-contacts')
            const $footer = $('.site-footer')

            function handleFixedContactsColorInvert(){
                const footerTop = $footer.offset().top
                const screenBottom = $(window).scrollTop() + $(window).innerHeight()

                screenBottom > footerTop + 128 ? $fixedContacts.addClass('fixed-contacts--inverted') : $fixedContacts.removeClass('fixed-contacts--inverted')
            }

            $(window).scroll(handleFixedContactsColorInvert)
            handleFixedContactsColorInvert()
        }
    }

    function initModals(){
        const options = {
            openClass: 'modal--active',
            disableScroll: true,
            awaitOpenAnimation: true,
            awaitCloseAnimation: true
        }

        MicroModal.init(options)

        $(document).on('click', 'a[href^="#modal"]', function(e){
            e.preventDefault();

            $('.navigation--mobile').removeClass('navigation--active')
            $('.navigation--mobile .burger').removeClass('burger--active')
            $('.mobile-salons-menu').removeClass('mobile-salons-menu--active')

            const href = $(this).attr('href')
            const modal = !!~href.indexOf('?') ? href.slice(1, href.indexOf('?')) : href.substring(1)

            if($('#' + modal).length){
                if(modal !== 'modal-booking-cart' && $('#' + modal + ' input[name="salon"]').length && !!~href.indexOf('salon=')){
                    const $salonInput = $('#' + modal + ' input[name="salon"]')
                    $salonInput.val(href.substring(href.indexOf('salon=') + 'salon='.length))
                    $salonInput[0].dispatchEvent(new Event('change'))
                }
                else if(modal !== 'modal-booking-cart' && $('#' + modal + ' input[name="salon"]').length && $('#' + modal + ' input[name="salon"]').attr('type') !== 'hidden'){
                    const $salonInput = $('#' + modal + ' input[name="salon"]')
                    $salonInput.val('')
                    $salonInput[0].dispatchEvent(new Event('change'))
                }

                if(modal !== 'modal-booking-cart' && $('#' + modal + ' input[name="service"]').length && !!~href.indexOf('service=')){
                    const $serviceInput = $('#' + modal + ' input[name="service"]')
                    $serviceInput.val(href.substring(href.indexOf('service=') + 'service='.length))
                    $serviceInput[0].dispatchEvent(new Event('change'))
                }
                else if(modal !== 'modal-booking-cart' && $('#' + modal + ' input[name="service"]').length){
                    const $serviceInput = $('#' + modal + ' input[name="service"]')
                    $serviceInput.val('')
                    $serviceInput[0].dispatchEvent(new Event('change'))
                }

                if(modal !== 'modal-booking-cart' && $('#' + modal + ' input[name="promotion"]').length && $(this).data('promotion')){
                    $('#' + modal + ' input[name="promotion"]').val($(this).data('promotion'))

                    $('#' + modal + ' input[name="service"]').on('change', function(){
                        $('#' + modal + ' input[name="promotion"]').val('')
                    })
                }

                MicroModal.show(modal, options)
            }
        });
    }

    function initCarousels(){
        if($('.carousel').length){
            const $carousel = $('.carousel')

            new Swiper('.carousel', {
                slidesPerView: 'auto',
                spaceBetween: 20,
                scrollbar: {
                    el: '.swiper-scrollbar',
                    draggable: true
                },
                pagination: {
                    el: '.swiper-pagination',
                    type: 'fraction'
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2
                    },
                    768: {
                        slidesPerView: 3
                    },
                    1024: {
                        slidesPerView: 4
                    }
                },
                resizeObserver: false,
                on: {
                    init: function(){
                        if(!$carousel.hasClass('carousel--boxed')){
                            stretchCarousel()
                        }
                    },
                    beforeResize: function(){
                        if(!$carousel.hasClass('carousel--boxed')){
                            $carousel.css('left', '')
                            $carousel.css('padding-left', '')
                            $carousel.css('width', '')
                        }
                    },
                    resize: function(){
                        if(!$carousel.hasClass('carousel--boxed')){
                            stretchCarousel()
                        }
                    }
                }
            })

            function stretchCarousel(){
                const leftOffset = $carousel.offset().left
                $carousel.css('padding-left', leftOffset)
                $carousel.css('left', -leftOffset)
                $carousel.width($(window).width() - leftOffset)
            }
        }
    }

    function initHomeSlider(){
        if($('.slider').length){
            new Swiper('.slider', {
                slidesPerView: 1,
                spaceBetween: 20,
                autoHeight: true,
                autoplay: {
                    delay: 5000
                },
                scrollbar: {
                    el: '.swiper-scrollbar',
                    draggable: true
                },
                breakpoints: {
                    560: {
                        autoHeight: false
                    }
                },
            })
        }
    }

    function initAdvantages(){
        if($('.advantages').length){
            $('.advantages__more > span').on('click', function(){
                $(this).closest('.advantages').addClass('advantages--active')
            })
        }
    }

    function initTestimonials(){
        if($('.testimonials').length){
            $('.testimonials__nav').overlayScrollbars({})

            $('.testimonial-item').on('click', function(){
                $('.testimonial-item').removeClass('testimonial-item--active')
                $('.testimonial').removeClass('testimonial--active')
                $(this).addClass('testimonial-item--active')
                $('.testimonial[data-author="' + $(this).data('author') + '"]').addClass('testimonial--active')
            })


            const breakpoint = window.matchMedia('(max-width: 1024px)')
            let carousel = null

            function breakpointChecker(){
                if(breakpoint.matches){
                    $('.testimonial').removeClass('testimonial--active').addClass('swiper-slide')
                    carousel = new Swiper(document.querySelector('.testimonials__items'), {
                        slidesPerView: 1,
                        autoHeight: true,
                        scrollbar: {
                            el: '.swiper-scrollbar',
                            draggable: true
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            type: 'fraction'
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        },
                    })
                }
                else{
                    $('.testimonial').removeClass('swiper-slide')
                    $('.testimonial[data-author="' + $('.testimonial-item--active').data('author') + '"]').addClass('testimonial--active')

                    if(carousel){
                        carousel.destroy(true, true)
                    }
                }
            }

            breakpoint.addEventListener('change', breakpointChecker)
            breakpointChecker()
        }
    }

    function initFaq(){
        if($('.faq-item').length){
            $('.faq-item__header').on('click', function(e){
                const $item = $(this).parent()

                if(!$item.hasClass('faq-item--active')){
                    $item.addClass('faq-item--active')
                    $item.find('.faq-item__body').slideDown()
                }
                else{
                    $item.removeClass('faq-item--active')
                    $item.find('.faq-item__body').slideUp()
                }
            })
        }
    }

    function initContacts(){
        if($('.contacts').length){
            const $contactNavItems = $('.contacts-group-item')

            $contactNavItems.on('click', function(){
                $contactNavItems.removeClass('contacts-group-item--active')
                $(this).addClass('contacts-group-item--active')

                $('.contacts__forms .contacts-salon-form--active').removeClass('contacts-salon-form--active')
                $('.contacts__forms .contacts-salon-form[data-salon="' + $(this).data('salon') + '"]').addClass('contacts-salon-form--active')
            })

            $('.contacts-group__title').on('click', function(){
                if(window.matchMedia('(max-width: 560px)').matches){
                    const $group = $(this).parent()

                    !$group.hasClass('contacts-group--active') ? $group.find('.contacts-group__items').slideDown() : $group.find('.contacts-group__items').slideUp()
                    $(this).parent().toggleClass('contacts-group--active')
                }
            })

            if(window.matchMedia('(max-width: 560px)').matches){
                $('.contacts-group-item--active').closest('.contacts-group').find('.contacts-group__title').click()
            }
        }
    }

    function initPhoneInputMask(){
        if($('input[type="tel"]').length){
            $('input[type="tel"]').each(function(index){
                IMask($(this)[0], { mask: pdp_frontend_data.phone_mask })
            })
        }
    }

    function initSalonGallery(){
        if($('.salon-info').length){
            new Swiper('.salon-info__slider', {
                slidesPerView: 'auto',
                spaceBetween: 20,
                scrollbar: {
                    el: '.swiper-scrollbar',
                    draggable: true
                }
            })
        }
    }

    function initSalonsSlider(){
        if($('.salons-carousel').length){
            const $carousel = $('.salons-carousel')

            const breakpoint = window.matchMedia('(max-width: 560px)')
            let carousel = null

            function breakpointChecker(){
                if(!breakpoint.matches){
                    carousel = new Swiper('.salons-carousel', {
                        slidesPerView: 'auto',
                        spaceBetween: 20,
                        scrollbar: {
                            el: '.swiper-scrollbar',
                            draggable: true
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            type: 'fraction'
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        },
                        breakpoints: {
                            1024: {
                                slidesPerView: 4
                            }
                        },
                        resizeObserver: false,
                        on: {
                            init: function(){
                                stretchCarousel()
                            },
                            beforeResize: function(){
                                $carousel.css('left', '')
                                $carousel.css('padding-left', '')
                                $carousel.css('width', '')
                            },
                            resize: function(){
                                stretchCarousel()
                            }
                        }
                    })

                    function stretchCarousel(){
                        const leftOffset = $carousel.offset().left
                        $carousel.css('padding-left', leftOffset)
                        $carousel.css('left', -leftOffset)
                        $carousel.width($(window).width() - leftOffset)
                    }
                }
                else{
                    if(carousel){
                        carousel.destroy(true, true)
                    }
                }
            }

            breakpoint.addEventListener('change', breakpointChecker)
            breakpointChecker()
        }
    }

    function initVacancies(){
        if($('.vacancy-item').length){
            const $vacancyInput = $('#modal-vacancy-apply input[name="vacancy"]')

            $('.vacancy-item__button, .vacancy-item__read-more').on('click', function(){
                const $item = $(this).closest('.vacancy-item')
                $item.toggleClass('vacancy-item--active')
            })

            $('.vacancy-item__action > button').on('click', function(){
                $vacancyInput.val($(this).data('slug'))
                $vacancyInput[0].dispatchEvent(new Event('change'))
            })
        }
    }

    async function initVideoCaching(){
        if(document.querySelectorAll('video.lazy').length){
            let mediaSources = []
            let mediaBlobUrls = []
            const $videos = document.querySelectorAll('video.lazy')

            for(const $video of $videos){
                const $source = $video.querySelector('source')

                if(!mediaSources.includes($source.dataset.src)){
                    mediaSources.push($source.dataset.src)
                    const blob = await fetch($source.dataset.src).then(res => res.blob())
                    const blobUrl = URL.createObjectURL(blob)
                    mediaBlobUrls.push(blobUrl)
                }

                $source.dataset.src = mediaBlobUrls[mediaSources.indexOf($source.dataset.src)]
            }
        }
    }

    function initVideoLazyLoading(){
        if($('.site-content video.lazy').length && 'IntersectionObserver' in window){
            const lazyVideos = [].slice.call(document.querySelectorAll('video.lazy'))

            let lazyVideoObserver = new IntersectionObserver(function(entries, observer){
                entries.forEach(function(video){
                    if(video.isIntersecting){
                        for(let src in video.target.children){
                            const videoSrc = video.target.children[src]
                            if(typeof videoSrc.tagName === 'string' && videoSrc.tagName === 'SOURCE'){
                                videoSrc.src = videoSrc.dataset.src
                            }
                        }

                        video.target.load()
                        video.target.classList.remove('lazy')
                        lazyVideoObserver.unobserve(video.target)
                    }
                })
            })

            lazyVideos.forEach(function(video){
                lazyVideoObserver.observe(video)
            })
        }

        if($('.site-header--desktop video.lazy').length && window.matchMedia('(min-width: 1220px)').matches){
            $('.site-header--desktop video.lazy').each(function(index){
                const $video = $(this)[0]

                for(let src in $video.children){
                    const videoSrc = $video.children[src]
                    if(typeof videoSrc.tagName === 'string' && videoSrc.tagName === 'SOURCE'){
                        videoSrc.src = videoSrc.dataset.src
                    }
                }

                $video.load()
                $video.classList.remove('lazy')
            })
        }
    }

    function initCookieAcceptance(){
        if(!$('.cookie-acceptance').length) return

        $('.cookie-acceptance').on('click', function(){
            $(this).addClass('cookie-acceptance--hidden')

            const date = new Date()
            const expires_in = new Date(date.setMonth(date.getMonth() + 3))
            document.cookie = "cookieaccept=true; path=/; max-age=" + expires_in.toUTCString()
        })
    }

    function initViewportHeightFix(){
        function updateVH(){
            let vh = window.innerHeight * 0.01
            document.documentElement.style.setProperty('--vh', `${vh}px`)
        }

        updateVH()
        window.addEventListener('resize', updateVH)
    }
})