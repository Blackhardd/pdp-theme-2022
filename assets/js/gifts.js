jQuery(document).ready(function($){
    function getDirection(){
        return window.innerWidth < 1024 ? 'horizontal' : 'vertical'
    }

    function buildOptions(values){
        let html = ''

        values.forEach(function(item){
            html += '<div class="select-dropdown-item" data-value="' + item + '">' + item + '</div>'
        })

        return html
    }

    const cardsNav = new Swiper('#modal-gift-card .gallery__nav', {
        direction: getDirection(),
        spaceBetween: 15,
        slidesPerView: 6,
        on: {
            resize: function(){
                cardsNav.changeDirection(getDirection())
            }
        }
    })

    const cards = new Swiper('#modal-gift-card .gallery__slides', {
        spaceBetween: 10,
        slidesPerView: 1,
        navigation: {
            nextEl: '#modal-gift-card .swiper-button-next',
            prevEl: '#modal-gift-card .swiper-button-prev'
        },
        thumbs: {
            swiper: cardsNav
        }
    })

    const boxesNav = new Swiper('#modal-gift-box .gallery__nav', {
        direction: getDirection(),
        spaceBetween: 15,
        slidesPerView: 6,
        on: {
            resize: function(){
                boxesNav.changeDirection(getDirection())
            }
        }
    })

    new Swiper('#modal-gift-box .gallery__slides', {
        spaceBetween: 10,
        slidesPerView: 1,
        navigation: {
            nextEl: '#modal-gift-box .swiper-button-next',
            prevEl: '#modal-gift-box .swiper-button-prev'
        },
        thumbs: {
            swiper: boxesNav
        }
    })

    $('.gift-card-order__color input[type="radio"]').on('change', function(){
        if($(this).val() === 'white' || $(this).val() === 'Белый' || $(this).val() === 'Білий'){
            cards.slideTo(0)
        }
        else if($(this).val() === 'pink' || $(this).val() === 'Розовый' || $(this).val() === 'Рожевий'){
            cards.slideTo(8)
        }
        else if($(this).val() === 'black' || $(this).val() === 'Черный' || $(this).val() === 'Чорний'){
            cards.slideTo(14)
        }

        $('.gift-card-order .form fieldset').removeAttr('disabled')

        $('.gift-card-order__amount .select-dropdown').html(buildOptions($(this).data('amounts').split(',')))
        $('.gift-card-order__amount .select-hidden-input input').val($(this).data('amounts').split(',')[0])
        $('.gift-card-order__amount .select-hidden-input input')[0].dispatchEvent(new Event('change'))
    })

    $('.order-item--gift-box .order-item__add-btn input').on('change', function(){
        $(this).is(':checked') ? $(this).closest('.order-item').find('.select-wrapper').removeClass('select-wrapper--disabled') : $(this).closest('.order-item').find('.select-wrapper').addClass('select-wrapper--disabled')
        $('#modal-gift-box input[type="checkbox"]:checked').length ? $('#modal-gift-box button[type="submit"]').removeAttr('disabled') : $('#modal-gift-box button[type="submit"]').attr('disabled', true)
    })


})