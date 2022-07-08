class Cart {
    _data

    constructor() {
        this._data = {
            salon: null,
            hair: 0,
            master: 0,
            services: [],
            total: 0
        }

        this.loadFromStorage()
    }

    onChange(action = () => {}){
        action(this._data)
    }


    /**
     *  Storage
     */

    saveToStorage() {
        localStorage.setItem('session_cart', JSON.stringify(this._data))
    }

    loadFromStorage() {
        const storage_data = localStorage.getItem('session_cart') ? JSON.parse( localStorage.getItem('session_cart') ) : this._data

        if(typeof storage_data.salon !== 'null'){
            this._data = storage_data
        }
        else{
            this.deleteFromStorage()
        }
    }

    deleteFromStorage() {
        localStorage.removeItem('session_cart')
    }


    /**
     *  Getters
     */

    get json() {
        const _this = this

        let services = []

        _this._data.services.forEach(service => {
            services.push({ name: service.name.ru, price: _this.extractPrice(service) })
        })

        return JSON.stringify({ ...this._data, services })
    }

    get salon() {
        return this._data.salon
    }

    get hair() {
        return this._data.hair
    }

    get master() {
        return this._data.master
    }

    get services() {
        return this._data.services
    }

    get total() {
        return this._data.total
    }


    /**
     *  Setters
     */

    set salon(value) {
        this._data.salon = parseInt(value)
        this._data.services = []
        this._data.total = 0
        this.saveToStorage()
        this.onChange()
    }

    set hair(value) {
        this._data.hair = parseInt(value)
        this.updateTotal()
        this.saveToStorage()
        this.onChange()
    }

    set master(value) {
        this._data.master = parseInt(value)
        this.updateTotal()
        this.saveToStorage()
        this.onChange()
    }


    /**
     *  Services
     */

    addService(service) {
        !this.isServiceAdded(service) ? this._data.services.push(service) : this.removeService(service.id)
        this.updateTotal()
        this.saveToStorage()
        this.onChange()
    }

    removeService(id) {
        this._data.services = this._data.services.filter(s => s.id !== id)
        this.updateTotal()
        this.saveToStorage()
        this.onChange()
    }

    clearServices() {
        this._data.services = []
        this.updateTotal()
        this.saveToStorage()
        this.onChange()
    }

    isServiceAdded(service) {
        return this._data.services.some(s => s.id === service.id)
    }


    /**
     *  Total
     */

    updateTotal() {
        this._data.total = this._data.services.reduce((accum, cur) =>  parseInt(accum) + this.extractPrice(cur), 0)
    }


    /**
     *  Utils
     */

    extractPrice(service){
        if(service.master && service.prices.length === 1){
            return parseInt(service.prices[0][this._data.master])
        }
        else if(!service.master && service.prices.length === 1){
            return parseInt(service.prices[0][0])
        }
        else if(service.master && service.prices.length === 3){
            return this._data.hair < 3 ? parseInt(service.prices[this._data.hair][this._data.master]) : parseInt(service.prices[2][this._data.master]);
        }
        else if(!service.master && service.prices.length === 3){
            return this._data.hair < 3 ? parseInt(service.prices[this._data.hair][0]) : parseInt(service.prices[2][0]);
        }
        else if(!service.master && service.prices.length === 4){
            return parseInt(service.prices[this._data.hair][0])
        }
        else if(service.master && service.prices.length === 4){
            return parseInt(service.prices[this._data.hair][this._data.master])
        }
    }
}

export default Cart