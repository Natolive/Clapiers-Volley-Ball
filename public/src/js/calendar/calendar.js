var instanceCalendar

const calendar = async () => {
    const calendarEl = document.getElementById("calendar");
    instanceCalendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        headerToolbar: {
            left: "today",
            center: "title",
            right: "prev,next",
        },
        dateClick: add_game
    });
    instanceCalendar.render();

    const games = await requestGetAllGames()
    if (games.length > 0) {
        games.forEach(game => {
            calendar_add_game(game)
        });
    }
}

const calendar_add_game = (game) => {
    let title
    let color
    if (game.id_game_place_type.name === "home") {
        color = "green"
        title = `${game.id_team.name} / ${game.opposite_team}`
    } else {
        color = "blue"
        title = `${game.opposite_team} / ${game.id_team.name}`
    }
    const event = {
        title,
        color,
        start: game.date.date,
        allDay: true,
    }
    instanceCalendar.addEvent(event)
}