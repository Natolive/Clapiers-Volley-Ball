const  build_floating_action_button = () => {
    const helperFloatingActionButton = new HelperFloatingActionButton("more_vert", "red")
    helperFloatingActionButton.add_button("add", "green", add_team)
    helperFloatingActionButton.add_button("delete", "black")
    helperFloatingActionButton.build()
}