$("#addEventBtn").on("click", function(e) {
    var formData = buildFormData();
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
