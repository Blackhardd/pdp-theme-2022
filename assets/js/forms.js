jQuery(document).ready(function($){
    const regexpEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/
    const regexpPhone = new RegExp(formsData.phoneRegexp)

    const inputSelectors = 'input[type="text"],input[type="tel"],input[type="email"],.select-hidden-input input[type="hidden"]'

    const $inputs = $(inputSelectors)

    $inputs.on('input change', function(){
        if($(this).is('input:not([type="hidden"])')){
            $(this).closest('.input').removeClass('input--error')
        }
        else if($(this).is('input[type="hidden"]')){
            $(this).closest('.select-wrapper').removeClass('select-wrapper--error')
        }
    });

    $('form.form').on('submit', function(e){
        let isFormValid = true

        const $form = $(this)
        const $fields = $form.find('fieldset')
        const $formInputs = $form.find(inputSelectors)

        $formInputs.each(function(){
            let $field = $(this)
            let isFieldValid = validateInput($field)

            if(!isFieldValid && isFormValid){
                isFormValid = false

                return false
            }
        })

        if(isFormValid){
            submitForm($form)
        }

        return false
    })

    function validateInput($input){
        switch($input.attr('name')){
            case 'name':
                return validateRequired($input) && validateName($input)
                break;
            case 'phone':
                return validateRequired($input) && validatePhone($input)
                break;
            case 'email':
                return validateRequired($input) && validateEmail($input)
                break;
            case 'salon':
            case 'service':
            case 'gift_card':
            case 'course':
                return validateRequired($input) && validateSelect($input)
            default:
                return validateRequired($input) && validateSelect($input)
        }
    }

    function validateRequired($input){
        if($input.prop('required') && !$input.val().length){
            inputError($input, 'Обязатеьное поле.')
            return false;
        }

        return true;
    }

    function validateName($input){
        if($input.val().length < 3){
            inputError($input, 'Имя должно содержать более 3-х символов.');
            return false;
        }
        else if($input.val().length > 24){
            inputError($input, 'Имя должно содержать менее 24-х символов.');
            return false;
        }

        return true;
    }

    function validateEmail($input){
        if(!regexpEmail.test($input.val())){
            inputError($input, 'Неверный почтовый адрес.');
            return false;
        }

        return true;
    }

    function validatePhone($input){
        if(!regexpPhone.test($input.val().replace(/\s+/g, ''))){
            inputError($input, 'Неверный номер телефона.')
            return false
        }

        return true;
    }

    function validateSelect($input){
        if(!$input.val()){
            inputError($input, 'Выберите опцию.')
            return false
        }

        return true
    }

    function inputError($input, error){
        let $inputWrap = null

        if($input.is('input:not([type="hidden"])')){
            $inputWrap = $input.closest('.input')
            $inputWrap.addClass('input--error')
        }
        else if($input.is('input[type="hidden"]')){
            $inputWrap = $input.closest('.select-wrapper')
            $inputWrap.addClass('select-wrapper--error')
        }

        $(`<div class="error-tooltip">${error}</div>`).appendTo($inputWrap).delay(1).queue(function(){
            $(this).addClass('error-tooltip--visible')
        })

        setTimeout(function(){
            const $tooltip = $inputWrap.find('.error-tooltip')
            $tooltip.removeClass('error-tooltip--visible').on('transitionend', function(){
                $(this).remove()
            })
        }, 3000)
    }

    function submitForm($form){
        let formData = new FormData($form[0]);

        $form.find('fieldset').attr('disabled', true)
        $form.find('button[type="submit"]').addClass('btn--loading')

        $.ajax({
            method: 'POST',
            url: formsData.ajaxUrl,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                let res = JSON.parse(response)

                if(res.status){
                    $form[0].dispatchEvent(new CustomEvent('success'))
                }

                if(res.redirect){
                    location.href = res.redirect
                }
                else{
                    $form.find('.form__response').html(res.message)
                    res.status === true ? $form.addClass('form--success') : $form.addClass('form--fail')
                }
            }
        });
    }
})