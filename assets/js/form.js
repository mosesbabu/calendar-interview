$("#addEventBtn").on("click", function(e) {
    var formData = buildFormData();
    console.log("Form data being sent:", formData);
    $.ajax("server/event.php", {
        method: $(this).hasClass("btn-add-event") ? "POST" : "PUT",
        data: formData
    })
});

function buildFormData() {
    var formData = {};
    var inputs = $("#eventForm input");
    var selections = $("#eventForm select");
    var textarea = $("#eventForm textarea");

    inputs.each(function() {
        if ($(this).attr("id")) {
            formData[$(this).attr("id")] = $(this).val();
        }
    });

    selections.each(function() {
        if ($(this).attr("id")) {
            formData[$(this).attr("id")] = $(this).val();
        }
    });

    formData[textarea.attr("id")] = textarea.val();

    if (window.event_id) {
        formData.id = window.event_id;
    }

    return formData;
}

$("#deleteEventBtn").on("click", function(e) {
    var eventId = $("#eventId").val(); 
    if (!eventId) {
        alert("Event ID is required for deletion.");
        return;
    }

    console.log("Event ID being sent for deletion:", eventId);
  
    $.ajax("server/event.php", {
        method: "DELETE",
        data: { id: eventId },
        success: function(response) {
            console.log("Server Response: ", response);
            alert("Event deleted successfully.");
           
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("AJAX Error: ", textStatus, errorThrown);
        }
    });
});

const bsOffcanvas = $('#addEventSidebar').on('shown.bs.offcanvas', event => {
    window.event_id = null;
    const formData = formatEvent(buildFormData());
    const matches = window.events.filter(e => {
        let { id, ...rest } = e;
        return JSON.stringify(formData) === JSON.stringify(rest);
    });

    if (matches.length) {
        window.event_id = matches[0].id;
    }
});

function formatEvent(event) {
    return {
        url: event.eventURL,
        title: event.eventTitle,
        start: new Date(event.eventStartDate),
        end: new Date(event.eventEndDate),
        allDay: event.allDaySwitch === "on" ? true : false,
        extendedProps: {
            calendar: event.eventLabel || "",
            guests: event.eventGuests.join(","),
            location: event.eventLocation || "",
            description: event.eventDescription || ""
        }
    };
}
