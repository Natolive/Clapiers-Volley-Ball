class HelperLoader {

    static add_loader() {
        const $loader = $("<div>").css({
            "z-index": "9999",
            "display": "flex",
            "background-color": "rgba(0, 0, 0, 0.5)",
            "position": "absolute",
            "height": "100vh",
            "width": "100vw",
            "align-items": "center",
            "justify-content": "center",
        }).attr("id", "loader")
        const $image = $("<img>").attr("src", `${GlobalVariables.baseUrl}src/images/59f89ca5-45eb-4f0c-b952-6b3edc05f17e.svg`).css("height", "20%")
        $loader.append($image)
        $loader.prependTo($("body"))
    }

    static remove_loader() {
        if ($("#loader").length > 0) {
            $("#loader").remove()
        }
    }
}