import Cart from '../cart.js'

class HeaderCartMobileComponent {
    _rootSelector
    _utils
    _cart

    $elements

    constructor() {
        const _this = this
        document.addEventListener('DOMContentLoaded', function(){ _this.init() })
    }

    init() {
        this._rootSelector = '.booking-cart--header-mobile'

        if(!!!document.querySelector(this._rootSelector)){
            console.warn('HeaderCartMobileComponent root not found.')
            return
        }

        this.$elements = {
            root: document.querySelector(this._rootSelector),
            counter: document.querySelector('.header-cart--mobile .header-cart__counter'),
            form: document.querySelector(this._rootSelector + ' .booking-cart__form'),
            fields: {
                name: document.querySelector(this._rootSelector + ' input[name="name"]'),
                phone: document.querySelector(this._rootSelector + ' input[name="phone"]'),
                salon: document.querySelector(this._rootSelector + ' input[name="salon"]'),
                hair: document.querySelector(this._rootSelector + ' input[name="hair"]'),
                cart: document.querySelector(this._rootSelector + ' input[name="cart"]')
            },
            list: document.querySelector(this._rootSelector + ' .booking-cart__items'),
            total: document.querySelector(this._rootSelector + ' .booking-cart__total .amount'),
            submit: document.querySelector(this._rootSelector + ' .booking-cart__submit')
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

        this._cart = new Cart()

        if(this._cart.salon){
            this.$elements.fields.salon.value = this._cart.salon
            this.$elements.fields.salon.dispatchEvent(new Event('change'))
        }

        if(this._cart.hair){
            this.$elements.fields.hair.value = this._cart.hair
            this.$elements.fields.hair.dispatchEvent(new Event('change'))
        }

        this.$elements.fields.cart.value = this._cart.json

        this.render()

        this.bindEvents()
    }

    bindEvents() {
        const _this = this

        _this.$elements.form.addEventListener('success', e => {
            _this._cart.clearServices()
        })

        _this.$elements.fields.salon.addEventListener('change', e => {
            _this._cart.salon = e.target.value
            _this.$elements.fields.cart.value = this._cart.json
            _this.render()
        })

        _this.$elements.fields.hair.addEventListener('change', e => {
            _this._cart.hair = e.target.value
            _this.$elements.fields.cart.value = this._cart.json
            _this.render()
        })

        _this.$elements.list.addEventListener('click', e => {
            if(e.target.classList.contains('booking-cart-item__button')){
                _this._cart.removeService(e.target.dataset.id)
                _this.$elements.fields.cart.value = this._cart.json
                _this.render()
            }
        })
    }

    validateCart(){
        !this._cart || !this._cart.services.length ? this.$elements.submit.setAttribute('disabled', '') : this.$elements.submit.removeAttribute('disabled')
    }


    /**
     *  Renderers
     */

    render() {
        this.validateCart()
        this.renderCounter()
        this.renderServiceList()
        this.renderTotal()
    }

    renderCounter() {
        this.$elements.counter.innerText = this._cart.services.length
    }

    renderServiceList() {
        const _this = this

        let itemsHtml = ''

        if(_this._cart.services.length){
            _this.$elements.root.classList.remove('booking-cart--empty')

            _this._cart.services.forEach(service => {
                itemsHtml += _this.renderServiceItem(service)
            })
        }
        else{
            _this.$elements.root.classList.add('booking-cart--empty')
        }

        _this.$elements.list.innerHTML = itemsHtml
    }

    renderServiceItem(service) {
        return `
            <div class="booking-cart-item">
                <button class="booking-cart-item__button" data-id="${service.id}"></button>
                <div class="booking-cart-item__name">${service.name[headerCart_i18n.lang]}</div>
                <div class="booking-cart-item__price"><span class="amount">${this._cart.extractPrice(service)}</span><span class="currency">₴</span></div>
            </div>
        `
    }

    renderTotal() {
        this.$elements.total.innerText = this._cart.total
    }
}

new HeaderCartMobileComponent()