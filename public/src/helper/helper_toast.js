class HelperToast {

    /**
     * 
     * @param {String} type Can be Success|Error
     */
    constructor(type = "Success") {
        this.type = type
        this.text = ""
    }

    /**
     * 
     * @param {String} text 
     */
    addText = (text) => {
        this.text = text
    }

    display = () => {
        let icon = "error"
        if (this.type === "Success") {
            icon = "success"
        }

        $.toast({
            heading: this.type,
            text: this.text,
            icon
        })
    }

}