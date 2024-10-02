class HelperFloatingActionButton {

    constructor(icon, color) {
        if (!window.jQuery) {
            console.error("JQuery not loaded")
        }

        if (!window.M) {
            console.error("Materialze not loaded")
        }
        
        this.$button = $("<div>").addClass("fixed-action-btn")
        const $a = $("<a>").addClass(`btn-floating btn-large ${color}`)
        const $ul = $("<ul>")
        const $i = $("<i>").addClass("large material-icons").text(icon)
        this.$button.append($ul)
        this.$button.append($a.append($i))
    }

    add_button(icon, color, callback) {
        const $button = $("<li>")
        const $a = $("<a>").addClass("btn-floating").addClass(color)
        const $i = $("<i>").addClass("material-icons").text(icon)
        $button.append($a.append($i))
        $button.on("click", callback)
        this.$button.find("ul").append($button)
    }

    build() {
        $("body").append(this.$button)
        M.FloatingActionButton.init(this.$button[0], []);
    }
}