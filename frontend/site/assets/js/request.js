var myAjax = {
    get: function (url, data, callback) {
        return this.request(url, data, 'GET', callback);
    },
    post: function (url, data, callback) {
        return this.request(url, data, 'POST', callback);
    },
    request: function (url, data, method, callback) {
        $.when(
            $.ajax({
                data: data,
                type: method,
                dataType: 'json',
                url: url,
                done: function(data) {
                    return data;
                }
            })
        ).done(function(json) {
            return callback({
                status: true,
                data: json
            });
        }).fail(function(data) {
            return callback({
                status: false,
                data: data.responseJSON
            });
        });
    }
}
