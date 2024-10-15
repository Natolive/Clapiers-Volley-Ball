// const HelperLoader = new HelperLoader()
$(document).ready(() => {
    HelperLoader.add_loader()
    $iframe = $("#rankings-website")
    $iframe.on("load", () => {
        HelperLoader.remove_loader()
    })
})