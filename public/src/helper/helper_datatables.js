class HelperDatatables {

    constructor(id) {
        if (!window.DataTable) {
            throw new Error("Datatables is not loaded")

        }

        this.id = id

        this.settings = {}
        this.settings.processing = false
        this.settings.serverSide = false
        this.settings.ajax = false
        this.settings.columns = false
    }

    set_ajax(url, type = "GET", dataSrc = (data) => {
        return data.data;
    }) {
        this.settings.processing = true
        this.settings.serverSide = true
        this.settings.ajax = {}
        this.settings.ajax.url = url
        this.settings.ajax.type = type
        this.settings.ajax.dataSrc = dataSrc
    }

    set_columns(columns) {
        this.settings.columns = columns
    }

    build() {
        new DataTable(`#${this.id}`, this.settings)
    }

}