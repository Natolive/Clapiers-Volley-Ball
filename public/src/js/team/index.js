$(document).ready(() => {
    set_floating_action_button()
})

function set_floating_action_button() {
    const helperFloatingActionButton = new HelperFloatingActionButton("mode_edit", "red")
    helperFloatingActionButton.add_button("add", "green")
    helperFloatingActionButton.add_button("edit", "blue")
    helperFloatingActionButton.add_button("delete", "black")
    helperFloatingActionButton.build()
}