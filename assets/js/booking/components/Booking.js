import Cart from '../cart.js'

class Booking {
    $app
    $preloader
    $salonSelect
    $hairLengthSelect
    $masterSwitch
    $servicesWrapper
    $cart
    $cartForm
    $cartSalonSelect
    $cartHairLengthSelect
    $cartSubmit

    _utils
    _cart

    categories
    activeCategory
    services

    isLoading

    constructor() {
        const _this = this
        document.addEventListener('DOMContentLoaded', function(){ _this.init() })
    }

    async init() {
        if(!!!document.getElementById('booking')) {
            return
        }

        this._utils = {
            createElement: (type, classes = '') => {
                if(!type){
                    return null
                }

                const el = document.createElement(type)

                if(classes){
                    el.classList.add(classes)
                }

                return el
            }
        }

        this.queryElements()

        this.initCart()
        this.bindEvents()

        await this.fetchCategories()

        const activeCategorySlug = this.$categoriesDesktop.querySelector('[data-active]').dataset.slug
        this.activeCategory = this.categories.filter(cat => cat.slug === activeCategorySlug)[0]

        await this.fetchServices()
    }

    queryElements(){
        this.$app = document.getElementById('booking')
        this.$salonSelect = this.$app.querySelector('.booking-header__salon input[name="salon"]')
        this.$categoriesDesktop = this.$app.querySelector('.booking-categories--desktop')
        this.$categoriesMobile = this.$app.querySelector('.booking-categories--mobile')
        this.$hairLengthWrapper = this.$app.querySelector('.booking-hair-length')
        this.$hairLengthSelect = this.$app.querySelector('.booking-hair-length input[name="hair"]')
        this.$masterSwitchWrapper = this.$app.querySelector('.booking-master')
        this.$masterSwitch = this.$app.querySelector('.booking-master input')
        this.$servicesWrapper = this.$app.querySelector('.booking-listing')
        this.$preloader = this.$app.querySelector('.booking-preloader')

        this.$cart = this.$app.querySelector('.booking-cart')
        this.$cartForm = this.$cart.querySelector('.booking-cart__form')
        this.$cartSalonSelect = this.$cart.querySelector('input[name="salon"]')
        this.$cartHairLengthSelect = this.$cart.querySelector('input[name="hair"]')
        this.$cartSubmit = this.$cart.querySelector('.booking-cart__submit')
        this.$cartInput = this.$cart.querySelector('input[name="cart"]')
    }

    initCart(){
        this._cart = new Cart()

        if(this._cart.salon && !new URLSearchParams(window.location.search).get('salonId')){
            const currentSalon = bookingData.salons.filter(salon => {
                for(const [key, value] of Object.entries(salon)){
                    return value === this._cart.salon
                }
            }).pop()

            if(currentSalon){
                this.$salonSelect.value = currentSalon[booking_i18n.lang]
                this.$salonSelect.dispatchEvent(new Event('change'))
                this.$cartSalonSelect.value = currentSalon[booking_i18n.lang]
                this.$cartSalonSelect.dispatchEvent(new Event('change'))
            }
        }
        else{
            this._cart.salon = this.$salonSelect.value
        }

        if(this._cart.hair){
            this.$hairLengthSelect.value = this._cart.hair
            this.$hairLengthSelect.dispatchEvent(new Event('change'))
            this.$cartHairLengthSelect.value = this._cart.hair
            this.$cartHairLengthSelect.dispatchEvent(new Event('change'))
        }

        if(this._cart.master){
            this.$masterSwitch.checked = true
        }

        this.renderCart()
        this.$cartInput.value = this._cart.json
    }

    addService(id) {
        const activeCategoryServices = this.services[this.activeCategory.slug]
        const subcategory = activeCategoryServices.subcategories.filter(subcategory => subcategory.services.some(service => service.id === id)).shift()
        const service = subcategory.services.filter(service => service.id === id).shift()

        this._cart.addService(service)
        this.renderServicesList()
        this.renderCart()

        this.$cartInput.value = this._cart.json
    }

    setSalon(id){
        this._cart.salon = id
        this.renderCart()
        this.fetchServices()

        this.$cartInput.value = this._cart.json
    }

    validateCart(){
        !this._cart || !this._cart.services.length ? this.$cartSubmit.setAttribute('disabled', '') : this.$cartSubmit.removeAttribute('disabled')
    }

    bindEvents(){
        const _this = this


        /**
         *  Salon Select
         */

        _this.$salonSelect.addEventListener('change', e => {
            const newValue = e.target.value

            if(_this.$cartSalonSelect.value !== newValue){
                _this.$cartSalonSelect.value = newValue
                _this.$cartSalonSelect.dispatchEvent(new Event('change'))
            }

            _this.setSalon(newValue)
            _this.setActiveCategory(_this.activeCategory)

            _this.renderCart()

            _this.$cartInput.value = this._cart.json
        })

        _this.$cartSalonSelect.addEventListener('change', e => {
            const newValue = e.target.value

            if(_this.$salonSelect.value !== newValue){
                _this.$salonSelect.value = newValue
                _this.$salonSelect.dispatchEvent(new Event('change'))
            }
        })


        /**
         *  Category
         */

        _this.$categoriesDesktop.querySelectorAll('.booking-category').forEach(el => {
            el.addEventListener('click', e => {
                delete _this.$categoriesDesktop.querySelector('.booking-category[data-active]').dataset.active
                e.target.dataset.active = ''

                delete _this.$categoriesMobile.querySelector('[data-active]').dataset.active
                _this.$categoriesMobile.querySelector('[data-slug="' + e.target.dataset.slug + '"]').closest('.service-card').dataset.active = ''

                _this.setActiveCategory(_this.categories.filter(category => category.slug === e.target.dataset.slug).pop())
            })
        })

        _this.$categoriesMobile.querySelectorAll('.service-card').forEach(cat => {
            cat.addEventListener('click', e => {
                delete _this.$categoriesMobile.querySelector('[data-active]').dataset.active
                e.target.closest('.service-card').dataset.active = ''

                delete _this.$categoriesDesktop.querySelector('[data-active]').dataset.active
                _this.$categoriesDesktop.querySelector('[data-slug="' + e.target.dataset.slug + '"]').dataset.active = ''

                _this.setActiveCategory(_this.categories.filter(category => category.slug === e.target.dataset.slug).pop())
            })
        })


        /**
         *  Hair Select
         */

        _this.$hairLengthSelect.addEventListener('change', e => {
            const newValue = e.target.value

            if(_this.$cartHairLengthSelect.value !== newValue){
                _this.$cartHairLengthSelect.value = newValue
                _this.$cartHairLengthSelect.dispatchEvent(new Event('change'))
            }

            _this._cart.hair = newValue

            _this.renderServicesList()
            _this.renderCart()

            _this.$cartInput.value = this._cart.json
        })

        _this.$cartHairLengthSelect.addEventListener('change', e => {
            const newValue = e.target.value

            if(_this.$hairLengthSelect.value !== newValue){
                _this.$hairLengthSelect.value = newValue
                _this.$hairLengthSelect.dispatchEvent(new Event('change'))
            }
        })


        /**
         *  Master
         */

        _this.$masterSwitch.addEventListener('change', e => {
            _this._cart.master = e.target.checked ? 1 : 0
            _this.renderServicesList()
            _this.renderCart()

            _this.$cartInput.value = this._cart.json
        })


        /**
         *  Form
         */

        _this.$cartForm.addEventListener('success', e => {
            _this._cart.clearServices()
        })
    }

    async fetchCategories(){
        const res = await fetch(`${bookingData.restUrl}/pdp/v1/services/get_categories`)
        this.categories = await res.json()
    }

    async fetchServices(){
        this.showPreloader()

        const res = await fetch(`${bookingData.restUrl}/pdp/v1/services/${this._cart.salon}`)
        this.services = await res.json()
        this.setActiveCategory(this.activeCategory ? this.activeCategory : this.categories[Object.keys(this.categories)[0]])

        this.hidePreloader()
    }

    setActiveCategory(category){
        this.activeCategory = category
        this.renderServicesList()
    }


    /**
     *  Preloader Rendering
     */

    showPreloader(){
        this.isLoading = true

        if(this.$preloader){
            this.$preloader.classList.remove('booking-preloader--hidden')
            document.body.style.overflow = 'hidden'
        }
    }

    hidePreloader(){
        this.isLoading = false

        if(this.$preloader){
            this.$preloader.classList.add('booking-preloader--hidden')
            document.body.style.overflow = ''
        }
    }


    /**
     *  Services Rendering
     */

    renderServicesList(){
        const _this = this
        const category = _this.services[_this.activeCategory.slug]

        category.is_hair_services ? _this.$hairLengthWrapper.classList.add('booking-hair-length--active') : _this.$hairLengthWrapper.classList.remove('booking-hair-length--active')
        category.is_master_option ? _this.$masterSwitchWrapper.classList.add('booking-master--active') : _this.$masterSwitchWrapper.classList.remove('booking-master--active')

        _this.$servicesWrapper.innerHTML = ''
        category.subcategories.forEach(subcategory => {
            _this.$servicesWrapper.appendChild(_this.renderSubcategory(subcategory))
        })

        _this.$servicesWrapper.querySelectorAll('.booking-service-item__button').forEach(service => {
            service.addEventListener('click', e => {
                _this.addService(e.target.dataset.id)
            })
        })
    }

    renderSubcategory(subcategory){
        const _this = this

        const $wrapper = this._utils.createElement('div', 'booking-services-subcategory')
        const $header = this._utils.createElement('div', 'booking-services-subcategory__header')
        const $title = this._utils.createElement('div', 'booking-services-subcategory__title')
        const $items = this._utils.createElement('div', 'booking-services-subcategory__items')

        $title.innerText = subcategory.name.ru

        subcategory.services.forEach(service => {
            $items.appendChild(_this.renderSubcategoryItem(service))
        })

        $header.append($title)
        $wrapper.append($header, $items)

        return $wrapper
    }

    renderSubcategoryItem(service){
        const $wrapper = this._utils.createElement('div', 'booking-service-item')
        const $info = this._utils.createElement('div', 'booking-service-item__info')
        const $name = this._utils.createElement('div', 'booking-service-item__name')
        const $priceWrapper = this._utils.createElement('div', 'booking-service-item__price')
        const $price = this._utils.createElement('span', 'amount')
        const $currency = this._utils.createElement('span', 'currency')
        const $button = this._utils.createElement('button', 'booking-service-item__button')

        if(this._cart.isServiceAdded(service)){
            $wrapper.classList.add('booking-service-item--in-cart')
        }

        $name.innerText = service.name[booking_i18n.lang]
        $price.innerText = this._cart.extractPrice(service)
        $currency.innerText = '₴'

        $button.dataset.id = service.id

        $priceWrapper.append($price, $currency)
        $info.append($name, $priceWrapper)
        $wrapper.append($info, $button)

        return $wrapper
    }


    /**
     *  Cart Rendering
     */

    renderCart(){
        this.validateCart()
        this.renderCartList()
        this.renderCartTotal()
    }

    renderCartList(){
        const _this = this
        const $servicesWrapper = _this.$cart.querySelector('.booking-cart__items')

        $servicesWrapper.innerHTML = ''
        if(_this._cart.services.length){
            _this.$cart.classList.remove('booking-cart--empty')

            _this._cart.services.forEach(service => {
                $servicesWrapper.appendChild(_this.renderCartListItem(service))
            })

            $servicesWrapper.querySelectorAll('.booking-cart-item__button').forEach(service => {
                service.addEventListener('click', e => {
                    _this.addService(e.target.dataset.id)
                })
            })
        }
        else{
            _this.$cart.classList.add('booking-cart--empty')
        }
    }

    renderCartListItem(service){
        const $wrapper = this._utils.createElement('div', 'booking-cart-item')
        const $button = this._utils.createElement('button', 'booking-cart-item__button')
        const $name = this._utils.createElement('div', 'booking-cart-item__name')
        const $price = this._utils.createElement('div', 'booking-cart-item__price')
        const $amount = this._utils.createElement('span', 'amount')
        const $currency = this._utils.createElement('span', 'currency')

        $button.dataset.id = service.id
        $name.innerText = service.name[booking_i18n.lang]
        $amount.innerText = this._cart.extractPrice(service)
        $currency.innerText = '₴'

        $price.append($amount, $currency)
        $wrapper.append($button, $name, $price)

        return $wrapper
    }

    renderCartTotal(){
        const _this = this
        const $total = _this.$cart.querySelector('.booking-cart__total')

        $total.querySelector('.amount').innerText = _this._cart.total
    }
}

new Booking()