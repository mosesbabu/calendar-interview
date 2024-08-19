$("#addEventBtn").on("click", function(e) {
    var formData = buildFormData();
    console.log("Form data being sent:", formData);
    $.ajax("server/event.php", {
        method: "POST",
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

    return formData;
}
$("#addEventBtn").on("click", function(e) {
    var formData = buildFormData();
    console.log("Form data being sent:", formData);
    $.ajax("server/event.php", {
        method: "PUT",
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
