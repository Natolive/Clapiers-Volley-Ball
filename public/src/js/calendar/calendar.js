const calendar = () => {
    const calendarEl = document.getElementById("calendar");
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        headerToolbar: {
            left: "today",
            center: "title",
            right: "prev,next",
        },
        dateClick: add_event
    });
    calendar.render();
}

const add_event = (info) => {
    
}