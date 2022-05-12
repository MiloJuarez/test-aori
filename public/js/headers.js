class HTTPHeaders {
    static postHeaders() {
        let headers = {
            headers: {
                Accept: "application/json",
                "Content-Type": "multipart/form-data",
            },
        };

        return headers;
    }

    static putHeaders() {
        let headers = {
            headers: {
                Accept: "application/json",
                "Content-Type": "application/x-www-form-urlencoded",
            },
        };

        return headers;
    }

    static deleteHeaders() {
        let headers = {
            headers: {
                Accept: "application/json",
            },
        };

        return headers;
    }
}

export default HTTPHeaders;
