class ResponseMessages {
    static getSuccessMessage(message) {
        let htmlMessage = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success!</strong> ${message}
            </div>
        `;

        return htmlMessage;
    }

    static getSimpleErrorMessage(message) {
        let htmlSimpleError = `
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Woops!</strong> ${message}
            </div>
        `;

        return htmlSimpleError;
    }

    static getErrorsMessages(response) {
        let htmlErrors = "";
        let errors = "";
        const object = response.responseJSON.errors;

        for (const key in object) {
            if (Object.hasOwnProperty.call(object, key)) {
                errors += `<li>${object[key]}</li>`;
            }
        }

        htmlErrors = `
            <div class="alert alert-danger" role="alert">
                <strong>Woops! ${response.responseJSON.message}</strong>
                <ul>${errors}</ul>
            </div>
        `;

        return htmlErrors;
    }
}

export default ResponseMessages;
