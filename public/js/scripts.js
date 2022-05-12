import ResponseMessages from "./messages.js";
import HTTPHeaders from "./headers.js";

function validateEmptyForm() {
    let emptyInputs = 0;

    if ($("input[name='name']").val() === "") {
        emptyInputs++;
    }

    if ($("input[name='lastname']").val() === "") {
        emptyInputs++;
    }

    if ($("input[name='age']").val() === "") {
        emptyInputs++;
    }

    return emptyInputs;
}

function getFormData() {
    let formData = {
        nombre: $("input[name='name']").val(),
        apellido: $("input[name='lastname']").val(),
        edad: $("input[name='age']").val(),
    };

    return formData;
}

$("#btnEdit").click(function (e) {
    e.preventDefault();
    $("#errors").html("");
    if (validateEmptyForm() > 0) {
        $("#errors").html(
            ResponseMessages.getSimpleErrorMessage("There are empty inputs")
        );
        return;
    }

    const data = getFormData();
    const userIdentifier = $("input[name='identifier']").val();

    $.ajax({
        url: "/api/v1/users/update/" + userIdentifier,
        method: "PUT",
        headers: HTTPHeaders.putHeaders(),
        data: data,
        dataType: "json",
        success: function (response) {
            $("#errors").html(
                ResponseMessages.getSuccessMessage(response.message)
            );
            setTimeout(() => {
                window.location = "/";
            }, 2000);
        },
        error: function (response) {
            if (response.status == 422) {
                $("#errors").html(ResponseMessages.getErrorsMessages(response));
            }
        },
    });
});

$("#btnRegister").click(function (e) {
    e.preventDefault();
    $("#errors").html("");
    if (validateEmptyForm() > 0) {
        $("#errors").html(getSimpleErrorMessage());
        return;
    }

    let data = getFormData();

    $.ajax({
        url: "/api/v1/users/new",
        method: "POST",
        headers: HTTPHeaders.postHeaders(),
        data: data,
        dataType: "json",
        success: function (response) {
            $("#errors").html(
                ResponseMessages.getSuccessMessage(response.message)
            );
            setTimeout(() => {
                window.location = "/";
            }, 2000);
        },
        error: function (response) {
            $("#errors").html(ResponseMessages.getErrorsMessages(response));
        },
    });
});
