function load_data() {

    let per_page = 10;

    match_app.data_service.get_data_count(function (data) {

        $('#demo').pagination({
            items: data.elements,
            itemsOnPage: per_page,
            cssStyle: 'light-theme',
            onInit: function () {
                match_app.data_service.get_data(load_visual_table_data, 1, per_page);
            },
            onPageClick: function (e, i) {
                match_app.data_service.get_data(load_visual_table_data, e, per_page);
            }
        });
    });
}

function load_visual_table_data(data) {
    let rows = data.success;
    let rows_string = '';
    for (let row of rows) {
        rows_string +=
            `<tr class="clickable-row" row-id="${row.id}">
                                    <th edit-row="${row.id}" edit-selector="true" scope="row">${row.id}</th>
                                    <td edit-row-cell="${row.id}" >${row.date}</td>
                                    <td edit-row-cell="${row.id}">${row.time}</td>
                                    <td edit-row-cell="${row.id}">${row.country}</td>
                                    <td edit-row-cell="${row.id}">${row.division}</td>
                                    <td edit-row-cell="${row.id}">${row.stage}</td>
                                    <td edit-row-cell="${row.id}">${row.play_offs}</td>
                                    <td edit-row-cell="${row.id}">${row.eliminations}</td>
                                    <td edit-row-cell="${row.id}">${row.season}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team_percent_over_2_5_goals}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team_percent_home_success_rate}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team_percent_total_success_rate}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team}</td>
                                    <td edit-row-cell="${row.id}">${row.half_time_result_h}</td>
                                    <td edit-row-cell="${row.id}">${row.half_time_result_t}</td>
                                    <td edit-row-cell="${row.id}">${row.full_time_result_f}</td>
                                    <td edit-row-cell="${row.id}">${row.full_time_result_t}</td>
                                    <td edit-row-cell="${row.id}">${row.away_team}</td>
                                    <td edit-row-cell="${row.id}">${row.away_team_percent_total_success_rate}</td>
                                    <td edit-row-cell="${row.id}">${row.away_team_percent_away_success_rate}</td>
                                    <td edit-row-cell="${row.id}">${row.away_team_percent_over_2_5_goals}</td>
                                    <td edit-row-cell="${row.id}">${row.neutral_stadium}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team_to_win}</td>
                                    <td edit-row-cell="${row.id}">${row.draw}</td>
                                    <td edit-row-cell="${row.id}">${row.away_team_to_win}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team_win_or_draw}</td>
                                    <td edit-row-cell="${row.id}">${row.away_team_win_or_draw}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team_or_away_team_win}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team_draw_no_bet}</td>
                                    <td edit-row-cell="${row.id}">${row.away_team_draw_no_bet}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team_over_0_5_goals}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team_over_1_5_goals}</td>
                                    <td edit-row-cell="${row.id}">${row.home_team_over_2_5_goals}</td>
                                    <td edit-row-cell="${row.id}">${row.away_team_over_0_5_goals}</td>
                                    <td edit-row-cell="${row.id}">${row.away_team_over_1_5_goals}</td>
                                    <td edit-row-cell="${row.id}">${row.away_team_over_2_5_goals}</td>
                                    <td edit-row-cell="${row.id}">${row.both_teams_to_score}</td>
                                    <td edit-row-cell="${row.id}">${row.total_goals_over_0_5}</td>
                                    <td  edit-row-cell="${row.id}">${row.total_goals_over_1_5}</td>
                                    <td  edit-row-cell="${row.id}">${row.total_goals_over_2_5}</td>
                                    <td  edit-row-cell="${row.id}">${row.total_goals_over_3_5}</td>
                                  
                                </tr>
                            `;
    }
    $('#match_stats_data_table').html(rows_string);
}


function load_insert_data_row() {
    let row_num = 1;

    $('#insertDataRow').on('click', function () {

        $('#match_stats_data_table').prepend(
            `<tr row-number="${row_num}">
                                    <th scope="row"><button btn-number="${row_num}" class="btn btn-sm btn-success add_row_btn" id="add_row">add</button></th>
                                    <td ><input type="text" number="${row_num}" class="add_row" autocomplete="off" datetime-s="n-${row_num}" id="date"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" autocomplete="off" time-s="n-${row_num}" id="time"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="country"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="division"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="stage"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="play_offs"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="eliminations"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="season"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team_percent_over_2_5_goals"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team_percent_home_success_rate"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team_percent_total_success_rate"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="half_time_result_h"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="half_time_result_t"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="full_time_result_f"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="full_time_result_t"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="away_team"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="away_team_percent_total_success_rate"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="away_team_percent_away_success_rate"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="away_team_percent_over_2_5_goals"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="neutral_stadium"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team_to_win"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="draw"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="away_team_to_win"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team_win_or_draw"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="away_team_win_or_draw"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team_or_away_team_win"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team_draw_no_bet"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="away_team_draw_no_bet"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team_over_0_5_goals"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team_over_1_5_goals"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="home_team_over_2_5_goals"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="away_team_over_0_5_goals"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="away_team_over_1_5_goals"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="away_team_over_2_5_goals"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="both_teams_to_score"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="total_goals_over_0_5"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="total_goals_over_1_5"></td>
                                    <td ><input type="text" number="${row_num}" class="add_row" id="total_goals_over_2_5"></td>
                                  
                                </tr>
                            `
        )

        $('[time-s="n-' + row_num + '"]').datetimepicker({
            datepicker: false,
            format: 'H:i'
        });
        $('[datetime-s="n-' + row_num + '"]').datetimepicker({
            timepicker: false,
            format: 'Y-m-d'
        });
        row_num++;
    })
}


$(document).ready(function () {

    let token = ('{{\Auth::user()->api_token}}');
    let csrf = ('X-CSRF-TOKEN: {{ csrf_token() }}');
    sessionStorage.country = $(this).val();
    sessionStorage.division = $(this).val();

      $('#country-search').on('keypress',function (e) {

        if(e.which == 13){
            sessionStorage.country = $(this).val();
            sessionStorage.division = $(this).val();
            load_data();
        }
    })

    $('#division-search').on('keypress',function (e) {

        if(e.which == 13){
            sessionStorage.country = $(this).val();
            sessionStorage.division = $(this).val();
            load_data();
        }

    })

    $(document).on('click', '.table .clickable-row', function(event) {

        if($(this).hasClass('active')){
            $(this).removeClass('table-warning');
        } else {
            $(this).addClass('table-warning').siblings().removeClass('table-warning');
            $('#deleteRowBtn').removeAttr('disabled')
            $('#delete_row_id').val($(this).attr('row-id'))
        }
    });

    $('#delete_row').on('click',function () {

        let row_num = $('#delete_row_id').val();

        match_app.request('system/delete-row/'+ row_num, 'DELETE', {}, {}, function (success) {
            load_data();
            $('#deleteRowModal').modal('hide')
        })
    })

    $(document).on('click', '#match_stats_data_table .add_row_btn', function () {

        let home_team = $('#home_team').val();
        let away_team = $('#away_team').val();
        let date = $('#date').val();

        if (!home_team || !away_team || !date) {
            match_app.message('Please fill home, away teams and date at least', 'error');
            return;
        }

        let row_num = $(this).attr('btn-number');
        let post_data = {};

        $("input[number=\"" + row_num + "\"]").each(function () {
            let data_name = $(this).attr('id');
            let data_value = $(this).val();
            post_data[data_name] = data_value;
        });

        match_app.request('system/set-data', 'POST', {}, post_data, function (success) {
            $('tr[row-number="' + row_num + '"]').remove();
            load_data();
        })
    });


    //HERE

    $(document).on('click', '#match_stats_data_table [edit-selector="true"]', function () {

        let row_num = $(this).attr('edit-row');

        if ($("#buttons-wrapper-row_num-" + row_num).length == 0) {
            let edit_inputs_buttons = `
            <div  id="buttons-wrapper-row_num-${row_num}" class="${row_num}">
                <button class="btn btn-success btn-sm btn-edit" id="btn-edit" btn-edit-row-id="${row_num}">Edit</button>
                 <button class="btn btn-sm btn-cancel" btn-cancel-row-id="${row_num}"">Cancel</button>
            </div>
        `;

            $('[edit-row-cell="' + row_num + '"]').each(function () {
                let value = $(this).text();
                let myCol = $(this).index();
                let column_name = $($('.column')[myCol]).text().trim();

                $(this).append(`<input type="text" index="${myCol}" name="${column_name}" class="${row_num}" edit-input-cell="${row_num}" value="${value}">`)
            });

            $(this).append(edit_inputs_buttons);
        }
    })


    $(document).on('click', '#match_stats_data_table .btn-edit', function () {

        let id = $(this).attr('btn-edit-row-id');
        let post_data = {};

        $('input.' + id).each(function () {
            let data_name = $(this).attr('name');
            let data_value = $(this).val();
            post_data[data_name] = data_value;
        })

        match_app.request('system/update-data/'+id, 'POST', {}, post_data, function (success) {
            load_data();
        })

        setTimeout(function () {
            $('.' + id).remove();
        }, 0)
    });


    $(document).on('click', '#match_stats_data_table .btn-cancel', function () {
        let id = $(this).attr('btn-cancel-row-id');
         $('[edit-input-cell="'+ id +'"]').remove();


        setTimeout(function () {
            $('.' + id).remove();
        }, 0)
    });


    window.addEventListener("dragover", function (e) {
        e = e || event;
        e.preventDefault();
    }, false);
    window.addEventListener("drop", function (e) {
        e = e || event;
        e.preventDefault();
    }, false);

    let dragTimer;
    let toggled = false;


    setTimeout(function () {
        $('#insertData').on(
            'drop',
            function (e) {
                if (e.originalEvent.dataTransfer && e.originalEvent.dataTransfer.files.length) {
                    e.preventDefault();
                    e.stopPropagation();
                    /*UPLOAD FILES HERE*/
                    $('#file').prop("files", e.originalEvent.dataTransfer.files);
                }
            }
        );
    }, 200)

    $(document).on('dragover', function (e) {
        var dt = e.originalEvent.dataTransfer;
        if (dt.types && (dt.types.indexOf ? dt.types.indexOf('Files') != -1 : dt.types.contains('Files'))) {
            $('.modal-content').css({'border': '5px dashed green'});
            window.clearTimeout(dragTimer);

            if (!toggled) {
                setTimeout(function () {
                    $('#insertData').modal('show');
                    //console.log('dragover: ' + $('#insertData').is(':visible'));
                }, 200)
            }
        }
    });


    $('#upload_file').on('click', function (el) {

        let reader = new FileReader();
        // let blob = reader.readAsText(this.file)

        let file = $('#file')[0].files[0];
        //console.log(file);
        if (file) {
            reader.readAsDataURL(file);
            reader.onload = async function (e) {

                let stream = reader.result.split('base64,');
                let data = {'file_stream': stream.pop()};

                let result = await match_app.request('system/add-data', 'POST', {}, data, function (success) {

                    $('#insertData').modal('hide');
                    $('#file').val('');
                    setTimeout(function () {
                        location.reload();
                    }, 3000)
                });

                // console.log(reader.result)
            };
        } else {
            match_app.message('Please select file for upload', 'error');
        }
    });

    load_data();
    load_insert_data_row();

});