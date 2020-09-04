class AjaxRequest {
    static get(url) {
        return $.ajax({
            type: "get",
            url: url,
            success: function (data) {
                return data;
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                return textStatus;
            }
        });
    }
    static delete(url) {
        return $.ajax({
            type: "delete",
            url: url,
            success: function (data) {
                return data;
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                return textStatus;
            }
        });
    }

    static post(inputUrl,inputData) {
        var csrf = $('meta[name="csrf-token"]').attr('content');
        inputData._token = csrf;
        return $.ajax({
            type: "post",
            url: inputUrl,
            data:inputData,
            success: function (data) {
                // return data;
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                return textStatus;
            }
        });
    }
}
