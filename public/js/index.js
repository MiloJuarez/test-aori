import ResponseMessages from "./messages.js";
import HTTPHeaders from "./headers.js";

$(".btnDelete").click(function (e) {
    $("#modal-content").html("");
    const identifier = $(this).attr("data-identifier");
    $("input[name='identifier']").val(identifier);
    $(".modal-title").html("Delete user");
    $("#modal-content").append("<p>Delete the selected user</p>");
});

$("#btnConfirmDelete").click(function (e) {
    e.preventDefault();
    const identifier = $("input[name='identifier']").val();

    if (identifier == null || identifier === "") {
        $("#errors").html(
            ResponseMessages.getSimpleErrorMessage(
                "There is a missing field: identifier"
            )
        );
        return;
    }

    $.ajax({
        url: "api/v1/users/delete/" + identifier,
        method: "DELETE",
        headers: HTTPHeaders.deleteHeaders(),
        dataType: "json",
        success: function (response) {
            $("#errors").html(
                ResponseMessages.getSuccessMessage(
                    "Usuario eleminado correctamente!"
                )
            );
            setTimeout(() => {
                $(".btn-close").click();
                window.location.reload();
            }, 2000);
        },
        error: function (response) {
            $("#errors").html(ResponseMessages.getErrorsMessages(response));
        },
    });
});
