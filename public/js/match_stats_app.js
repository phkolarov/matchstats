var match_app = match_app || {};


match_app = function () {

    let base_url = 'http://localhost/matchstats/public/api/';

    function message(message,type) {

        new Noty({
            type: type, /*alert, information, error, warning, notification, success*/
            text: message,
            timeout: 3000,
            layout: "bottomRight",
            theme: "bootstrap-v4"
        }).show();


    }

    function request(url, method, headers, data, success, error) {

        headers['X-CSRF-TOKEN'] = $("meta[name=csrf-token]").attr('content');
        headers['Authorization'] = "Bearer "+ localStorage.access_token;
        headers['Accept'] = 'application/json';
        headers['Content-Type'] = 'application/json';

        if(data){
            data = JSON.stringify(data)
        }
        return $.ajax({
            'url': base_url+ url,
            'type': method,
            'headers': headers,
            'data': data,
            'success': function (data) {
                let json = data;
                if(json.message){
                    match_app.message(json.message,'success')
                }
                success(json);
            },
            'error': function (data) {
                let json = data;

                if(json.responseJSON.message){
                    match_app.message(json.responseJSON.message,'error')
                }else{
                    match_app.message(data,'error')
                }
            },
            'beforeSend': function () {
                console.log('beforesend')
            },
            'complete': function () {
                console.log('complete')
            }
        })
    }

    return {
        request: request,
        message: message,
    }

}();