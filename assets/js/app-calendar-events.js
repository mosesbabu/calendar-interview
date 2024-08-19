function formatEvents(events) {
    return events.map(event => ({
        id: event.id,
        url: event.url || "",
        title: event.title || "",
        start: new Date(event.start_date),
        end: new Date(event.end_date),
        allDay: Boolean(event.all_day),
        extendedProps: {
            calendar: event.label || "",
            guests: event.guests || "",
            location: event.location || "",
            description: event.description || ""
        }
    }));
}

function fetchEvents() {
    $.ajax({
        url: "server/event.php",
        method: "GET",
        dataType: "json",
        success: function(response) {
            console.log("Raw response:", response);
            try {
                if (Array.isArray(response)) {
                    window.events = formatEvents(response);
                    console.log("Formatted events:", window.events);
                    // Attach app-calendar-events.js now that window.events is available
                    var s = document.createElement("script");
                    s.type = "text/javascript";
                    s.src = "assets/js/app-calendar.js";
                    $("body").append(s);
                } else {
                    console.error("Invalid response format. Expected an array.");
                }
            } catch (e) {
                console.error("Failed to format events:", e);
            }
        },
        error: function(xhr, status, error) {
            console.error("Failed to fetch events:", error);
            console.log("Response text:", xhr.responseText);
        }
    });
}

fetchEvents();
