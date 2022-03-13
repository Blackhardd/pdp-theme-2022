class Select {
    $defaultSelectElements
    icons

    constructor() {
        const _this = this

        document.addEventListener('DOMContentLoaded', () => _this.init())
    }

    init() {
        const _this = this

        _this.icons = {
            arrow: '<svg width="10" height="6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M.54.54a.65.65 0 0 1 .92 0L5 4.08 8.54.54a.65.65 0 1 1 .92.92l-4 4a.65.65 0 0 1-.92 0l-4-4a.65.65 0 0 1 0-.92Z" /></svg>',
            location: '<svg width="11" height="14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.07 0A5.08 5.08 0 0 0 0 5.07c0 3.47 4.54 8.56 4.73 8.78.18.2.5.2.68 0 .2-.22 4.73-5.31 4.73-8.78C10.14 2.27 7.87 0 5.07 0Zm0 7.62a2.55 2.55 0 1 1 0-5.1 2.55 2.55 0 0 1 0 5.1Z" /></svg>',
            list: '<svg width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.08 4.97v1.92c0 .32-.26.58-.58.58H.58A.58.58 0 0 1 0 6.89V4.97c0-.32.26-.58.58-.58H2.5c.32 0 .58.26.58.58Zm10.34-.58H4.82a.58.58 0 0 0-.57.58v1.92c0 .32.26.58.58.58H13.43c.31 0 .57-.26.57-.58V4.97a.58.58 0 0 0-.58-.58ZM2.5 0H.58A.58.58 0 0 0 0 .58V2.5c0 .32.26.58.58.58H2.5c.32 0 .58-.26.58-.58V.58A.58.58 0 0 0 2.5 0Zm10.92 0H4.82a.58.58 0 0 0-.57.58V2.5c0 .32.26.58.58.58H13.43c.31 0 .57-.26.57-.58V.58a.58.58 0 0 0-.58-.58ZM2.5 8.78H.58a.58.58 0 0 0-.58.58v1.92c0 .32.26.58.58.58H2.5c.32 0 .58-.26.58-.58V9.36a.58.58 0 0 0-.58-.58Zm10.92 0H4.82a.58.58 0 0 0-.57.58v1.92c0 .32.26.58.58.58H13.43c.31 0 .57-.26.57-.58V9.36a.58.58 0 0 0-.58-.58Z" /></svg>'
        }

        _this.$defaultSelectElements = document.querySelectorAll('select')
        _this.$defaultSelectElements.forEach(select => _this.buildSelectElement(select))

        _this.bindEvents()
    }

    bindEvents(){
        const _this = this

        document.addEventListener('click', e => {
            const $target = e.target
            if(!$target.closest('.select-wrapper')){
                _this.closeAll()
            }
        })
    }

    createElement(type) {
        return document.createElement(type)
    }

    truncateString(str) {
        return str.length > 30 ? str.substr(0, 29) + '&hellip;' : str
    }

    buildSelectElement($sel) {
        const _this = this

        /**
         *  Elements
         */

        const $wrapper = _this.createElement('div')
        const $originalSelect = $sel
        const $hiddenInputWrapper = _this.createElement('div')
        const $hiddenInput = _this.createElement('input')
        const $select = _this.createElement('div')
        const $placeholder = _this.createElement('div')
        const $arrow = _this.createElement('div')
        const $dropdown = _this.createElement('div')

        let placeholder = i18n.placeholder ? i18n.placeholder : 'Выберите опцию'

        $wrapper.classList.add('select-wrapper')

        if($originalSelect.hasAttribute('disabled')){
            $wrapper.classList.add('select-wrapper--disabled')
        }

        $hiddenInputWrapper.classList.add('select-hidden-input')
        $hiddenInput.type = 'hidden'
        $hiddenInput.setAttribute('name', $originalSelect.getAttribute('name'))

        $hiddenInput.addEventListener('change', e => {
            $placeholder.innerHTML = e.target.value && !!$dropdown.querySelector('[data-value="' + e.target.value + '"]') ? $dropdown.querySelector('[data-value="' + e.target.value + '"]').innerText : placeholder

            if(!!$dropdown.querySelector('[data-active]')){
                $dropdown.querySelector('[data-active]').removeAttribute('data-active')
            }

            if(!!$dropdown.querySelector('[data-value="' + e.target.value + '"]')){
                $dropdown.querySelector('[data-value="' + e.target.value + '"]').dataset.active = ''
            }
            else{
                e.target.value = ''
            }
        })

        $select.classList.add('select-input')

        $select.addEventListener('click', () => {
            if(!$select.classList.contains('select-input--opened')){
                _this.closeAll(() => {
                    $wrapper.classList.add('select-wrapper--active')
                    $select.classList.add('select-input--opened')
                    setTimeout(() => {
                        $dropdown.classList.add('select-dropdown--visible')
                    }, 20)
                })
            }
            else{
                $dropdown.classList.remove('select-dropdown--visible')
                $dropdown.addEventListener('transitionend', () => {
                    $select.classList.remove('select-input--opened')
                    $wrapper.classList.remove('select-wrapper--active')
                }, { capture: false, once: true, passive: false })
            }
        })

        $placeholder.classList.add('select-input-placeholder')

        if(!!$originalSelect.querySelector('option[selected]:not([disabled])')){
            const selectedValue = $originalSelect.querySelector('option[selected]').value
            $hiddenInput.value = selectedValue
            $hiddenInput.setAttribute('value', selectedValue)
            $placeholder.innerHTML = $originalSelect.querySelector('option[selected]').innerText
        }
        else{
            placeholder = $originalSelect.querySelector('option[disabled]') ? $originalSelect.querySelector('option[disabled]').innerText : placeholder
            $placeholder.innerHTML = placeholder
        }
       
        $arrow.classList.add('select-arrow')
        $arrow.innerHTML = this.icons.arrow
        
        if($originalSelect.dataset.icon && _this.icons[$originalSelect.dataset.icon]){
            $select.classList.add('select-input--icon')
            
            const $icon = _this.createElement('div')
            $icon.classList.add('select-icon')
            $icon.innerHTML = _this.icons[$originalSelect.dataset.icon]
            $select.appendChild($icon)
        }

        $dropdown.classList.add('select-dropdown')

        $originalSelect.querySelectorAll('option:not([disabled])').forEach(option => {
            const $newOption = _this.createElement('div')

            $newOption.classList.add('select-dropdown-item')
            if(option.hasAttribute('selected')){
                $newOption.dataset.active = ''
            }
            $newOption.dataset.value = option.value
            $newOption.innerText = option.innerText

            $dropdown.appendChild($newOption)
        })

        $dropdown.addEventListener('click', e => {
            if(e.target.classList.contains('select-dropdown-item')){
                if($hiddenInput.value !== e.target.dataset.value && (($originalSelect.dataset.confirm && confirm($originalSelect.dataset.confirm)) || !$originalSelect.dataset.confirm)){
                    $hiddenInput.value = e.target.dataset.value
                    $hiddenInput.dispatchEvent(new Event('change'))
                }

                $dropdown.classList.remove('select-dropdown--visible')
                $dropdown.addEventListener('transitionend', () => {
                    $select.classList.remove('select-input--opened')
                    $wrapper.classList.remove('select-wrapper--active')
                }, { capture: false, once: true, passive: false })
            }
        })

        $hiddenInputWrapper.appendChild($hiddenInput)

        $select.appendChild($placeholder)
        $select.appendChild($arrow)

        $wrapper.appendChild($hiddenInputWrapper)
        $wrapper.appendChild($select)
        $wrapper.appendChild($dropdown)

        $sel.parentNode.replaceChild($wrapper, $sel)
    }

    closeAll(callback = () => {}) {
        const $opened = document.querySelectorAll('.select-wrapper--active')

        if($opened.length){
            $opened.forEach((element, index) => {
                const $dropdown = element.querySelector('.select-dropdown')
                const $select = element.querySelector('.select-input')
    
                $dropdown.classList.remove('select-dropdown--visible')
                $dropdown.addEventListener('transitionend', () => {
                    $select.classList.remove('select-input--opened')
                    element.classList.remove('select-wrapper--active')
    
                    if(index === $opened.length - 1){
                        callback()
                    }
                }, { capture: false, once: true, passive: false })
            })
        }
        else{
            callback()
        }
    }
}

new Select()