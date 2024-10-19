class HelperAjax {

    /**
     * 
     * @param {String} url 
     */
    constructor(url) {
        this.method = "GET"
        this.url = url
        this.params = null
    }

    setMethod(method) {
        this.method = method
    }

    setFormData(formData) {
        this.formData = formData
    }

    /**
     * Set params to add in url (get)
     * 
     * @param {Array} params 
     */
    setUrlParams(params) {
        this.params = params
    }

    async request() {
        try {
            HelperLoader.add_loader()

            const settings = {
                method: this.method,
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            }
            if (this.method === "POST") {
                settings.body = this.formData
            }

            if (this.params) {
                this.url += `?${new URLSearchParams(this.params).toString()}`
            }

            const response = await fetch(this.url, settings)
        
            HelperLoader.remove_loader()

            if (!response.ok) {
                const error = await response.json()
                const message = error.message
                return false
            }
        
            return await response.json()
        } catch (error) {
            location.reload()
            console.error(error)
            return false
        }
    }
}

