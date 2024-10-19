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
        dateClick: add_game,
        eventClick: update_game,
        datesSet: async (info) => {
            instanceCalendar.removeAllEvents()

            const start = `${String(info.start.getDate()).padStart(2, '0')}/${String(info.start.getMonth() + 1).padStart(2, '0')}/${info.start.getFullYear()}`
            const end = `${String(info.end.getDate()).padStart(2, '0')}/${String(info.end.getMonth() + 1).padStart(2, '0')}/${info.end.getFullYear()}`

            const games = await requestGetAllGames(start, end)
            if (games.length > 0) {
                games.forEach(game => {
                    calendar_add_game(game)
                });
            }
        }
    });
    instanceCalendar.render();
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
        id: game.id,
        title,
        color,
        start: game.date.date,
        allDay: true,
    }
    instanceCalendar.addEvent(event)
}



const calendar_update_game = (game) => {
    let title
    let color
    if (game.id_game_place_type.name === "home") {
        color = "green"
        title = `${game.id_team.name} / ${game.opposite_team}`
    } else {
        color = "blue"
        title = `${game.opposite_team} / ${game.id_team.name}`
    }

    const event = instanceCalendar.getEventById(game.id);
    event.setProp('title', title);
    event.setStart(new Date(game.date.date));
    event.setEnd(null)
    event.setProp('color', color)
    event.setAllDay(true)
}