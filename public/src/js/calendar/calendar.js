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