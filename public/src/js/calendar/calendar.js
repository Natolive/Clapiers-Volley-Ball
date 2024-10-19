var instanceCalendar

const calendar = async () => {
    const calendarEl = document.getElementById("calendar");
    instanceCalendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale:"fr",
        headerToolbar: {
            left: "today",
            center: "title",
            right: "prev,next multiMonthYear,dayGridMonth,listWeek",
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
        },
        eventContent: function(arg) {
            const titleEl = document.createElement('span');
            titleEl.innerHTML = arg.event.title + ' ';
            titleEl.style.cursor = "pointer"
      
            const trashEl = document.createElement('span');
            trashEl.innerHTML = 'X';
            trashEl.style.cursor = 'pointer';
            trashEl.style.position = 'absolute';
            trashEl.style.right = '0px';
            trashEl.style.background = 'red';
            trashEl.style.borderRadius = '3px';
            trashEl.style.width = '15%';
            trashEl.style.textAlign = 'center';
            trashEl.style.color = 'white';

            trashEl.addEventListener('click', function(e) {
              e.stopPropagation();
              delete_game(arg.event.id)
            });
      
            return { domNodes: [titleEl, trashEl] };
          }
    });
    instanceCalendar.render();

    $(window).bind('resize', function () {
        const navbar = document.getElementById("navbar").offsetHeight
        const windowHeight = window.innerHeight
        const finalHeight = windowHeight - navbar - 20
        instanceCalendar.setOption('height', finalHeight);
    }).trigger('resize');
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

const calendar_delete_game = (idGame) => {
    instanceCalendar.getEventById(idGame).remove()
}