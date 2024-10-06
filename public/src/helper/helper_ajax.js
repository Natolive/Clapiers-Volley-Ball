class HelperAjax {

    /**
     * 
     * @param {String} url 
     */
    constructor(url) {
        this.method = "GET"
        this.url = url
    }

    setMethod(method) {
        this.method = method
    }

    setFormData(formData) {
        this.formData = formData
    }

    async request() {
        try {
            HelperLoader.add_loader()

            const settings = {
                method: this.method,
            }
            if (this.method === "POST") {
                settings.body = this.formData
            }

            const response = await fetch(this.url, settings)
        
            HelperLoader.remove_loader()

            if (!response.ok) {
                const error = await response.json()
                throw new Error(error.message)
            }
        
            return await response.json()
        } catch (error) {
            console.error(error)
            return false
        }
    }
}

