var match_app = match_app || {};


match_app.data_service = function () {

    function get_data(callback, page, limit) {

        let params = {
            country : sessionStorage.country,
            division : sessionStorage.division
        }
        let search_parameters = $.param(params);

        return match_app.request('system/get-data/' + page + '/' + limit + '?'+search_parameters, 'GET', {}, [], function (success) {
            callback(success);
        });
    }


    function get_data_count(callback,per_page) {

        let params = {
            country : sessionStorage.country,
            division : sessionStorage.division
        }
        let search_parameters = $.param(params);

        match_app.request('system/get-data-count'+ '?'+search_parameters, 'GET', [], [], function (success) {

            callback(success);
        })
    }


    return {
        get_data: get_data,
        get_data_count: get_data_count
    }
}();

