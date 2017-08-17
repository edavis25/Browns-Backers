$(document).ready(function() {

    // Toggle delete confirm div
    $('.delete-button').on('click', function () {
        var parent = $(this).closest('div[class^="delete-wrapper"]');

        var div = parent.children();
        toggle(div[1]);
    });

    // AJAX call for edit recipient modal
    $('.edit-recipient').on('submit', function(e) {
        e.preventDefault();
        var url = $(this).attr('action') + "?" + $(this).serialize();
        $.get(url, function(data) {
            $("#edit-recipient-modal-content").html(data);
        });
    });
});

function toggle(element) {
    if (element) {
        var display = element.style.display;
        if (display == "none") {
            element.style.display = "inline-block";
        } else {
            element.style.display = "none";
        }
    }
}