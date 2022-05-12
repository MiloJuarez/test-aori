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

function getSuccessMessage(message) {
    let htmlMessage = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Success!</strong> ${message}
        </div>
    `;

    return htmlMessage;
}

function getErrorsMessages(response) {
    let htmlErrors,
        errors = "";
    $(response.responseJSON.errors).each((error) => {
        $(error).each((errorChild) => {
            errors += `<li>${errorChild}</li>`;
        });
    });

    htmlErrors = `
        <div class="alert alert-danger" role="alert">
            <strong>Woops! ${response.responseJSON.message}</strong>
            <ul>${errors}</ul>
        </div>
    `;

    return htmlErrors;
}

function getSimpleErrorMessage() {
    let htmlSimpleError = `
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Woops!</strong> There are empty fields
        </div>
    `;

    return htmlSimpleError;
}

$("#btnEdit").click(function (e) {
    e.preventDefault();
    $("#errors").html("");
    if (validateEmptyForm() > 0) {
        $("#errors").html(getSimpleErrorMessage());
        return;
    }

    let headers = {
        headers: {
            Accept: "application/json",
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };

    const data = getFormData();
    const userIdentifier = $("input[name='identifier']").val();

    $.ajax({
        url: "/api/v1/users/update/" + userIdentifier,
        method: "PUT",
        headers: headers,
        data: data,
        dataType: "json",
        success: function (response) {
            $("#errors").html(getSuccessMessage(response.message));
            setTimeout(() => {
                window.location = "/";
            }, 3000);
        },
        error: function (response) {
            if (response.status == 422) {
                $("#errors").html(getErrorsMessages(response));
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

    let headers = {
        headers: {
            Accept: "application/json",
            "Content-Type": "multipart/form-data",
        },
    };

    let data = getFormData();

    $.ajax({
        url: "/api/v1/users/new",
        method: "POST",
        headers: headers,
        data: data,
        dataType: "json",
        success: function (response) {
            $("#errors").html(getSuccessMessage(response.message));
            setTimeout(() => {
                window.location = "/";
            }, 3000);
        },
        error: function (response) {
            $("#errors").html(getErrorsMessages(response));
        },
    });
});
