const  build_floating_action_button = () => {
    const helperFloatingActionButton = new HelperFloatingActionButton("add", "red")
    helperFloatingActionButton.add_callback_to_main_button(add_team)
    helperFloatingActionButton.build()
}