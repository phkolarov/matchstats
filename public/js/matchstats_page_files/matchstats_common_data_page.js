$(document).ready(function () {

    let token = ('{{\Auth::user()->api_token}}');
    let csrf = ('X-CSRF-TOKEN: {{ csrf_token() }}');
    let datatable = null;

    sessionStorage.country = $(this).val();
    sessionStorage.division = $(this).val();

    function data_table_rendering(columns_array) {

        let columns = [];
        for (let column in columns_array) {

            let column_name = columns_array[column];
            let visible = localStorage[column_name] != "false";// ? false : true;

            columns.push({
                'data': columns_array[column],
                'visible': visible,
                'className': column_name,
                "createdCell": function (td, cellData, rowData, row, col) {

                    // if(column_name == 'home_team'){
                    //     $(td).append(`<i class="fas fa-info-circle load_team_data"></i>`)
                    // }
                    $(td).attr('type', column_name);

                    if (col == 2) {
                        cellData = cellData.substring(0, cellData.length - 3);
                        $(td).text(cellData);
                    }

                }
            })
        }

        // Setup - add a text input to each footer cell
        $('#data tfoot th').each(function (i, el) {
            var column_type = $(this).attr('column_type_f');
            let width = input_width(column_type);
            let cell_width = $(this).width();
            // console.log(cell_width)
            $(this).html(`<input style="width: ${width}px; height: 18px;" autofocus="autofocus" type="text"  />`);
            // $(this).css({'width': cell_width});
        });


        // $('#data tfoot').css({'position': 'absolute'});

        //adding multiselection
        $('#data tbody').on('click', 'tr', function () {
            $(this).toggleClass('selected');
        });

        $('#button').click(function () {
            alert(table.rows('.selected').data().length + ' row(s) selected');
        });

        // DataTable
        let table = $('#data').DataTable(
            {
                "rowReorder": true,
                "processing": true,
                "serverSide": true,
                "bSort": true,
                "width": 100,
                // "scrollY": "320px",
                // "scrollCollapse": true,
                "order": [[0, "desc"]],
                "ajax": {
                    "url": "public/api/system/get-data-table",
                    "type": "POST",
                    "headers": {
                        "Authorization": "Bearer " + localStorage.access_token
                    }
                },
               // searching: false,
                "pageLength": 15,
                "lengthMenu": [[10, 15, 25, 50], [10, 15, 25, 50]],
                createdRow: function (row, data, dataIndex, cells) {

                    let home_result = $(cells[15]).text();
                    let away_result = $(cells[16]).text();


                    if (home_result != '' && away_result != '')
                        colorize(row, data);

                    // sizer(cells);


                    // console.log(123123)
                },
                preDraw: function (row, data, dataIndex, cells) {
                    data.time = data.time.slice(0, data.time.length - 3);

                    console.log(123);
                },
                rowCallback: function (row, data, dataIndex, cells) {
                    $(row).attr('row-id', data.id);

                    data.time = data.time.substring(0, data.time.length - 3);
                    // let home_result = $(cells[15]).text();
                    // let away_result = $(cells[16]).text();

                    // console.log(232323)
                    // if (home_result != '' && away_result != '')
                    //     colorize(row, data);
                },
                "columns": columns,
                "initComplete": function () {
                    // api.$('td').click(function () {
                    //     api.search(this.innerHTML).draw();
                    // });
                },
                drawCallback: function () {
                },
                "preDrawCallback": function () {

                    $('.obtainer_btn').attr('disabled', 'disabled');
                    $('.filter_obtainer_btn').attr('disabled', 'disabled');
                    $('input[column_name="DATE"]').datetimepicker({
                        timepicker: false,
                        format: 'd-m-Y'
                    })
                }
            }
        );

        // Apply the search
        table.columns().every(function (i, e) {
            var that = this;
            $('input', this.footer()).on('propertychange filter clear change click keyup input paste', function (i, e) {

                if (i.type == 'filter') {
                    that
                        .search(this.value);
                } else if (that.search() !== this.value && i.type != 'filter' && i.type != 'clear') {

                    that
                        .search(this.value).draw();
                } else if (i.type == 'clear' && this.value == "") {
                    that
                        .search(this.value);
                }

            });
        });

        return table;
    }

    function insert_data_row() {

        $('#insertDataRow').on('click', function () {

            let columns = $('#data>thead>tr:nth-child(2) th');
            let date = new Date();
            let add_row_button = `<button insertion-button-id="${date.getTime()}" class="btn btn-xs btn-success add-row-button add-row-buttons" time="${date.getTime()}">A</button>`;
            let cancel_row_button = `<button insertion-button-id="${date.getTime()}" class="btn btn-xs btn-default cancel-row-button add-row-buttons" time="${date.getTime()}">C</button>`;
            let row_string = `<tr class="insertion_row" insertion-row-id="${date.getTime()}">`;

            columns.each(function (i, el) {

                let column_name = $(el).attr('column_type');
                let add_button_string = '';
                let cancel_button_string = '';
                if (column_name == 'id') {
                    add_button_string = add_row_button;
                    cancel_button_string = cancel_row_button;
                    row_string += `
                    <td>${add_button_string}${cancel_button_string}</td>
                `;
                } else {

                    let picker_type = '';

                    if (column_name == 'date') {
                        picker_type = 'picker-type="date"';
                    }
                    let width = input_width(column_name);


                    row_string += `
                    <td>${add_button_string}<input  ${picker_type} time="${date.getTime()}" style="width: ${width}px" type="text" column_name="${column_name}">${cancel_button_string}</td>
                `;
                }
            });

            row_string += '</tr>';

            $('#data tbody').prepend(
                row_string
            );

            $('[picker-type="date"]').datetimepicker({
                timepicker: false,
                format: 'd-m-Y'
            });

            $('[picker-type="time"]').datetimepicker({
                datepicker: false,
                format: 'H:i'
            });
        });

        $(document).on('click', '.add-row-button', function () {
            let time = $(this).attr('insertion-button-id');
            let inputs = $(`input[time="${time}"]`);
            let data = {};
            inputs.each(function () {
                let name = $(this).attr('column_name');
                data[name] = $(this).val();
            });

            if (!data.home_team || !data.away_team) {
                match_app.message('Please enter team names', 'error');
                return;
            }

            match_app.request('system/set-data', 'POST', {}, data, function (success) {
                $(`[insertion-row-id="${time}"]`).remove();
            })
        });
        $(document).on('click', '.cancel-row-button', function () {

            let id = $(this).attr('insertion-button-id');
            $(`[insertion-row-id="${id}"]`).remove();
        })


    }

    function upload_file() {
        // UPLOAD FILE

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

    }

    function show_hide_columns() {

        $('#save_show_hide_columns').on('click', function () {
            let columns = $('.column-option')
            for (let column of columns) {
                if ($(column).attr('id') != 'id') {
                    localStorage[$(column).attr('id')] = $(column).is(':checked') ? true : false;
                }
            }

            $('#showHideColumnsModal').modal('hide');
            setTimeout(function () {
                location.reload();
            }, 2000)
        })
    }

    function load_columns_data(filters = {}) {

        return match_app.request('system/get-columns', 'GET', [], filters, function (data) {

            let columns = data.success;
            let element = `<tr>`;
            for (var column in columns) {
                let column_name = columns[column];
                let checked = '';

                if (column_name == 'id') {
                    continue;
                }
                if (localStorage[column_name] == "true" || localStorage[column_name] == undefined) {
                    checked = 'checked';
                }

                element += `
                                    <td><label for="${column_name}">${column_name}</label>
                                    <td><input id="${column_name}" type="checkbox" class="column-option" ${checked}></td>
                `
                if (column % 2 == 0 || (columns.length - 1) == column) {
                    element += ' </tr>';
                    $('#showHideOptionsTable').append(element)
                    element = '<tr>'
                }
            }

            return columns;
        })
    }

    function delete_rows() {
        sessionStorage.selected_columns = [];
        $(document).on('click', 'tr[role="row"]', function () {
            if ($('tr.selected').length > 0) {
                $('#deleteRowBtn').removeAttr('disabled');
            } else {
                $('#deleteRowBtn').attr('disabled', 'disabled');
            }
        });


        $('#delete_row').on('click', function () {

            let deleted_row_ids = [];
            $('tr.selected').each(function (i, e) {
                deleted_row_ids.push($(this).attr('row-id'))
            });

            match_app.request('system/delete-rows', 'DELETE', {}, {'ids': deleted_row_ids}, function (success) {
                $('tr.selected').remove();
                $('#deleteRowModal').modal('hide');
            })

        });
    }

    function update_rows() {

        $(document).on('click', '[type="id"]', function () {
            let id = $(this).text().trim();

            if (!isNaN(id)) {
                let edit_buttons = `
                            <button button-id="${id}" class="btn btn-xs btn-warning edit-row-button add-row-buttons" >E</button>
                            <button button-id="${id}" class="btn btn-xs btn-default cancel-edit-row-button add-row-buttons">C</button>`;
                $(this).html(edit_buttons);


                let columns = $(`[row-id="${id}"]`).children();


                columns.each(function () {

                    let column_name = $(this).attr('type');
                    let column_value = $(this).text();
                    if (column_name != 'id') {
                        let width = input_width(column_name);

                        let edit_input = `
                            <input type="text" value="${column_value}" name="${column_name}" column_name="${column_name}" style="width: ${width}px">
               `;
                        $(this).html(edit_input);
                    }
                });
            }
        })

        $(document).on('click', '.edit-row-button', function () {

            let id = $(this).attr('button-id');
            let columns = $(`[row-id="${id}"]`).children();
            let data = {};
            columns.each(function (i, e) {
                let column_name = $(this).attr('type').trim();
                let column_value = $($(this).children()[0]).val();
                if (column_name != 'id') {
                    data[column_name] = column_value;
                }
            });


            match_app.request('system/update-data/' + id, 'PUT', {}, data, function () {

            });

            remove_row(this);
        })

        $(document).on('click', '.cancel-edit-row-button', function () {
            remove_row(this);
        })


        function remove_row(that) {

            let id = $(that).attr('button-id').trim();
            let parent_cell = $(that).parent();
            setTimeout(function () {
                $(parent_cell).html(id)
            }, 0)

            let cells = $(`[row-id="${id}"]`).children();
            cells.each(function (i, e) {
                let input = $(e).children('input')[0];

                let column_name = $(input).attr('name');
                let column_value = $(input).val();
                if (column_name != 'id' && column_name != undefined) {
                    setTimeout(function () {
                        $(e).html(column_value);
                    }, 0)
                }
            });
        }
    }

    function obtain_similar_data() {

        $(document).on('click', 'tr[role="row"]', function () {
            if ($('tr.selected').length == 1) {
                $('#obtainSimilarMatchesBtn').removeAttr('disabled');
                $('.obtainer_btn').removeAttr('disabled');
                $('.filter_obtainer_btn').removeAttr('disabled');

            } else {
                $('#obtainSimilarMatchesBtn').attr('disabled', 'disabled');
                $('.obtainer_btn').attr('disabled', 'disabled');
                $('.filter_obtainer_btn').attr('disabled', 'disabled');

            }
        });


        $('#obtainSimilarMatchesBtn').on('click', function () {

            let selected = $('tr.selected').children();
            let obtained_row_data = `
            <tr class="d-flex" >
                <th  class="col-5">column name</th>
                <th  class="col-4">column value</th>
                <th  class="col-3"></th>
            </tr>
            `;

            selected.each(function (i, e) {

                let name = $(e).attr('type');
                let value = $(e).text().trim();

                if (name != 'id') {
                    obtained_row_data += `
                <tr class="d-flex">
                    <td class="col-5"><b>${name}</b></td>
                    <td class="col-4"><b>${value}</b></td>
                    <td class="col-3"><button type="button" class="btn btn-info btn-xs obtain_data" o_type="${name}" o_value="${value}">obtain data</button></td>
                </tr>
                `
                }

            })
            $('#obtainSimilarMatchesTable').html(obtained_row_data);
        })

        $(document).on('click', '.obtain_data', function () {

            let fieldName = $(this).attr('o_type');
            let fieldValue = $(this).attr('o_value');

            let input_field = $(`[column_type="${fieldName}"]`).children();

            let input = $(input_field);
            input.val(fieldValue);
            input.trigger('change');
            match_app.message('Obtained', 'success');
        })
    }

    function obtainers(datatable) {

        $('.obtainer_btn').on('click', function () {


            let column = $($(this).parent()[0]).attr('column_type');
            $('tfoot>tr> th>input').val('');
            for (let el in settings.columns) {
                let column_settings = settings.columns[el];
                if (column_settings.skip_filter == true && el != column) {
                    let filter_value = $('tr.selected' + ` [type="${el}"]`).text().trim()
                    $(`[column_type_f="${el}"] input`).val(filter_value);
                }
                // else if (column_settings.skip_filter == true && el == column) {
                //     console.log(el)
                // }
            }
            $('#data thead th').removeAttr('style');
            $($('tfoot>tr> th>input')).trigger('filter');
            datatable.draw();


            // load_columns_data({'skip_filter_column': '123'});
            // datatable.ajax.reload();
        })
    }

    function filters() {

        tippy('.filter_obtainer_btn', {arrow: true,});
        tippy('.sort_btn', {arrow: true,});

        let filters = settings.filters;

        $('.filter_obtainer_btn').on('click', function () {

            $('.filter_obtainer_btn').removeAttr('style');
            $(this).css({'background-color': '#dc3545', 'border-color': '#dc3545'});


            let filter_num = parseInt($(this).attr('filter-num')) - 1;
            let current_filter_indexes = filters[filter_num];

            $('#data thead th').removeAttr('style');
            // $(`tfoot th`).css({'color': 'black'});
            $('tfoot input').val('');


            $('.table_columns th').each(function (i, e) {
                let filter_name = $(this).attr('column_type');
                let index = $(this).attr('column_num');

                $(`th[column_type="${filter_name}"]`).removeAttr('style');

                if (current_filter_indexes.includes(parseInt(index))) {
                    let filter_value = $(`#data tbody .selected td.${filter_name}`).text();
                    $(`.${filter_name}>input`).val(filter_value);
                    // $(`tfoot .${filter_name} `).css({'background-color': '#ffa000'});
                    // $(`th[column_type="${filter_name}"]`).css({color: 'red'});
                }
            });


            $($('tfoot>tr> th>input')).trigger('filter');
            datatable.draw();
            // $($('tfoot>tr> th>input')[0]).trigger('filter');
        })


    }


    load_columns_data().then(function (data) {
        datatable = data_table_rendering(data.success);
        obtainers(datatable);
        orders(datatable);
    });

    function clear_inputs() {
        $('#clear_filters').on('click', function () {
            $('.filter_obtainer_btn').removeAttr('style');
            $('th input').val('')
            $($('tfoot>tr> th>input')).trigger('clear');
            datatable.draw();
            $('table thead th').removeAttr('style');
            $(`tfoot th `).css({'background-color': 'transparent'});

        })
    }

    function sizer(cells) {
        for (let index in cells) {
            let jcell = $(cells[index]);
            let jcell_type = jcell.attr('type');
            let width = settings.columns[jcell_type].width || 27;
            jcell.css({'width': width});
        }
    }

    function colorize(row, data) {

        let cell1 = $(row).find('[type="date"]');
        let cell2 = $(row).find('[type="time"]');
        let cell3 = $(row).find('[type="country"]');
        let cell12 = $(row).find('[type="home_team"]');
        let cell13 = $(row).find('[type="half_time_result_h"]');
        let cell14 = $(row).find('[type="half_time_result_t"]');
        let cell15 = $(row).find('[type="full_time_result_f"]');
        let cell16 = $(row).find('[type="full_time_result_t"]');
        let cell17 = $(row).find('[type="away_team"]');
        // let cell18 = $(row).find('[type="away_team_percent_total_success_rate"]');
        // let cell19 = $(row).find('[type="away_team_percent_away_success_rate"]');
        // let cell20 = $(row).find('[type="away_team_percent_over_2_5_goals"]');
        // let cell21 = $(row).find('[type="neutral_stadium"]');
        let cell22 = $(row).find('[type="home_team_to_win"]');
        let cell23 = $(row).find('[type="draw"]');
        let cell24 = $(row).find('[type="away_team_to_win"]');
        let cell25 = $(row).find('[type="home_team_win_or_draw"]');
        let cell26 = $(row).find('[type="away_team_win_or_draw"]');
        let cell27 = $(row).find('[type="home_team_or_away_team_win"]');
        let cell28 = $(row).find('[type="home_team_draw_no_bet"]');
        let cell29 = $(row).find('[type="away_team_draw_no_bet"]');
        let cell30 = $(row).find('[type="home_team_over_0_5_goals"]');
        let cell31 = $(row).find('[type="home_team_over_1_5_goals"]');
        let cell32 = $(row).find('[type="home_team_over_2_5_goals"]');
        let cell33 = $(row).find('[type="away_team_over_0_5_goals"]');
        let cell34 = $(row).find('[type="away_team_over_1_5_goals"]');
        let cell35 = $(row).find('[type="away_team_over_2_5_goals"]');
        let cell36 = $(row).find('[type="both_teams_to_score"]');
        let cell37 = $(row).find('[type="total_goals_over_0_5"]');
        let cell38 = $(row).find('[type="total_goals_over_1_5"]');
        let cell39 = $(row).find('[type="total_goals_over_2_5"]');
        let cell40 = $(row).find('[type="total_goals_over_3_5"]');

        // $(cell1).css({'color': 'blue'});
        // $(cell2).css({'color': 'blue'});
        // $(cell3).css({'color': 'blue'});


        //case 1
        if (parseFloat(data.half_time_result_h) > 0 && parseFloat(data.half_time_result_t) > 0 && parseFloat(data.both_teams_to_score) > 0) {
            $(cell36).css({color: 'blue', 'text-decoration': "underline"})
        }

        if (parseFloat(data.half_time_result_h) > parseFloat(data.half_time_result_t) && parseFloat(data.home_team_to_win) > 0) {
            $(cell22).css({'color': 'blue', 'text-decoration': 'underline'})
        } else if (parseFloat(data.half_time_result_h) === parseFloat(data.half_time_result_t) && parseFloat(data.draw) > 0) {
            $(cell23).css({'color': 'blue', 'text-decoration': 'underline'})
        } else if (parseFloat(data.half_time_result_h) < parseFloat(data.half_time_result_t) && parseFloat(data.away_team_to_win) > 0) {
            $(cell24).css({'color': 'blue', 'text-decoration': 'underline'})
        }




        let condition = (parseFloat(data.half_time_result_h) + parseFloat(data.half_time_result_t));
        if (condition > 0 && parseFloat(data.total_goals_over_0_5) > 0) {
            $(cell37).css({'color': 'blue', 'text-decoration': 'underline'})
        }
        if (condition > 1 && parseFloat(data.total_goals_over_1_5) > 0) {
            $(cell38).css({'color': 'blue', 'text-decoration': 'underline'})
        }
        if (condition > 2 && parseFloat(data.total_goals_over_2_5) > 0) {
            $(cell39).css({'color': 'blue', 'text-decoration': 'underline'})
        }
        if (condition > 3 && parseFloat(data.total_goals_over_3_5) > 0) {
            $(cell40).css({'color': 'blue', 'text-decoration': 'underline'})
        }

        // console.log(parseFloat(data.full_time_result_f) > parseFloat(data.full_time_result_t) ,
        //
        //     parseFloat(data.full_time_result_f)> 0,
        //     parseFloat(data.full_time_result_t)> 0,
        //     parseFloat(data.home_team_win_or_draw)> 0,
        //     parseFloat(data.home_team_or_away_team_win)> 0,
        //     parseFloat(data.home_team_draw_no_bet)> 0);


        if (parseFloat(data.full_time_result_f) > parseFloat(data.full_time_result_t) && (
            parseFloat(data.full_time_result_f) >= 0 &&
            parseFloat(data.full_time_result_t) >= 0 &&
            parseFloat(data.home_team_win_or_draw) > 0 &&
            parseFloat(data.home_team_or_away_team_win) > 0 &&
            parseFloat(data.home_team_draw_no_bet) > 0)) {

            $(cell12).css({'background-color': '#e2efda'});
            $(cell15).css({'background-color': '#e2efda'});
            $(cell16).css({'background-color': '#e2efda'});
            $(cell17).css({'background-color': '#e2efda'});
            $(cell28).css({'background-color': '#e2efda'});
            $(cell25).css({'background-color': '#e3e3e3'});
            $(cell27).css({'background-color': '#e3e3e3'});
        } else if (parseFloat(data.full_time_result_f) === parseFloat(data.full_time_result_t) &&

            parseFloat(data.full_time_result_f) >= 0 &&
            parseFloat(data.full_time_result_t) >= 0 &&
            parseFloat(data.home_team_win_or_draw) > 0 &&
            parseFloat(data.away_team_win_or_draw) > 0
        ) {
            $(cell12).css({'background-color': '#ccccff'});
            $(cell15).css({'background-color': '#ccccff'});
            $(cell16).css({'background-color': '#ccccff'});
            $(cell17).css({'background-color': '#ccccff'});
            $(cell25).css({'background-color': '#e3e3e3'});
            $(cell26).css({'background-color': '#e3e3e3'});
        } else if (parseFloat(data.full_time_result_f) < parseFloat(data.full_time_result_t) &&

            parseFloat(data.full_time_result_f) >= 0 &&
            parseFloat(data.full_time_result_t) >= 0 &&
            parseFloat(data.away_team_draw_no_bet) > 0 &&
            parseFloat(data.away_team_win_or_draw) > 0 &&
            parseFloat(data.home_team_or_away_team_win) > 0
        ) {

            $(cell12).css({'background-color': '#ff99cc'});
            $(cell15).css({'background-color': '#ff99cc'});
            $(cell16).css({'background-color': '#ff99cc'});
            $(cell17).css({'background-color': '#ff99cc'});
            $(cell29).css({'background-color': '#ff99cc'});
            $(cell26).css({'background-color': '#e3e3e3'});
            $(cell27).css({'background-color': '#e3e3e3'});
        }


        if (parseFloat(data.full_time_result_f) > parseFloat(data.full_time_result_t)) {

            $(cell12).css({'background-color': '#e2efda'});
            $(cell15).css({'background-color': '#e2efda'});
            $(cell16).css({'background-color': '#e2efda'});
            $(cell17).css({'background-color': '#e2efda'});

        } else if (parseFloat(data.full_time_result_f) === parseFloat(data.full_time_result_t)
        ) {
            $(cell12).css({'background-color': '#ccccff'});
            $(cell15).css({'background-color': '#ccccff'});
            $(cell16).css({'background-color': '#ccccff'});
            $(cell17).css({'background-color': '#ccccff'});

        } else if (parseFloat(data.full_time_result_f) < parseFloat(data.full_time_result_t)
        ) {

            $(cell12).css({'background-color': '#ff99cc'});
            $(cell15).css({'background-color': '#ff99cc'});
            $(cell16).css({'background-color': '#ff99cc'});
            $(cell17).css({'background-color': '#ff99cc'});
        }


        if (parseFloat(data.full_time_result_f) > 0 && cell30.text() != '') {
            $(cell30).css({'background-color': '#e2efda'});
        }
        if (parseFloat(data.full_time_result_f) > 1 && cell31.text() != '') {
            $(cell31).css({'background-color': '#e2efda'});
        }
        if (parseFloat(data.full_time_result_f) > 2 && cell32.text() != '') {
            $(cell32).css({'background-color': '#e2efda'});
        }

        if (parseFloat(data.full_time_result_t) > 0 && cell33.text() != '') {
            $(cell33).css({'background-color': '#ff99cc'});
        }
        if (parseFloat(data.full_time_result_t) > 1 && cell34.text() != '') {
            $(cell34).css({'background-color': '#ff99cc'});
        }
        if (parseFloat(data.full_time_result_t) > 2 && cell35.text() != '') {
            $(cell35).css({'background-color': '#ff99cc'});
        }


        if (parseFloat(data.half_time_result_h) > 0 && parseFloat(data.half_time_result_t) > 0 && cell36.text() != '') {
            $(cell36).css({'background-color': '#72d9df', 'text-decoration': 'underline'});
        }

        if (parseFloat(data.half_time_result_h) > 0 && parseFloat(data.half_time_result_t) > 0 && parseFloat(data.both_teams_to_score) > 0) {
          //  $(cell36).css({'background-color': 'blue', 'text-decoration': 'underline'})
        }

        let condition_s = (parseFloat(data.full_time_result_f) + parseFloat(data.full_time_result_t));

        if (condition_s > 0 && cell37.text() != '') {
            $(cell37).css({'background-color': '#72d9df'});
            // $(cell36).css({'background-color': '#72d9df'});
        }

        if (condition_s > 0 && cell36.text() != '') {
            $(cell36).css({'background-color': '#72d9df'});
        }


        if (condition_s > 1 && cell38.text() != '') {
            $(cell38).css({'background-color': '#72d9df'});
        }

        if (condition_s > 2 && cell39.text() != '') {
            $(cell39).css({'background-color': '#72d9df'});
        }

        if (condition_s > 3 && cell40.text() != '') {
            $(cell40).css({'background-color': '#72d9df'});
        }

        // let date_params = cell1.text().split('-');
        // let today = new Date();
        // let match_date = new Date(date_params[2] + '-' + date_params[1] + '-' + date_params[0]);
        // match_date.setDate(match_date.getDate() + 3);
        // match_date.setHours(23);
        // match_date.setMinutes(59);
        //
        // if (match_date.getTime() > new Date().getTime()) {
        //     $(cell12).removeAttr('style');
        //     $(cell17).removeAttr('style');
        //
        //     $(cell15).removeAttr('style');
        //     $(cell16).removeAttr('style');
        //
        //     $(cell22).removeAttr('style');
        //     $(cell23).removeAttr('style');
        //     $(cell24).removeAttr('style');
        // }
    }

    function load_statistics() {

        $(document).on('click', 'tr[role="row"]', function () {
            if ($('tr.selected').length == 1) {
                $('#load_match_stats').removeAttr('disabled');

            } else {
                $('#load_match_stats').attr('disabled', 'disabled');
            }
        });

        $('#load_match_stats').on('click', function () {


        });
    }

    function orders(datatable) {

        $('.sort_btn').on('click', function () {
            var attr = $(this).attr('style');

            if (typeof attr !== typeof undefined && attr !== false) {
                $(this).removeAttr('style');
            } else {
                $('.sort_btn').removeAttr('style');
                $(this).css('border-color', '#ff0707');
            }


            let sort_num = $(this).attr('sort-num');
            let sort_columns_indexes = settings.orders[sort_num];

            if (!$(this).attr('enable')) {

                let order_columns = [];
                for (let index of sort_columns_indexes) {
                    order_columns.push([index, 'asc']);
                }
                datatable.order(order_columns);
                datatable.draw();
                $(this).attr('enable', 'enabled')
            } else {

                datatable.order([0, 'desc']);
                datatable.draw();
                $(this).removeAttr('enable')
            }
        })

    }

    function hover_filters() {
        $('.filter_obtainer_btn').hover(function () {
            let filter_num = $(this).attr('filter-num');
            let column_filters = settings.filters[filter_num - 1];
            for(let index of column_filters){
                $(`[column_num=${index}]`).css({'border-top':'1px solid red','border-left':'1px solid red','border-bottom':'1px solid red',})
            }
        }, function () {
            let filter_num = $(this).attr('filter-num');
            let column_filters = settings.filters[filter_num - 1];

            for(let index of column_filters){
                $(`[column_num=${index}]`).css({'border-top':'1px solid black','border-left':'1px solid black','border-bottom':'1px solid black',})

            }
        });
    }

    function input_width(column_name) {
        let width = 31;
        switch (column_name) {
            case 'id':
                width = 39;
                break;
            case 'home_team':
                width = 95;
                break;
            case 'away_team':
                width = 95;
                break;
            case 'date':
                width = 61;
                break;
            case 'time':
                width = 41;
                break;
            case 'half_time_result_h':
                width = 21;
                break;
            case 'half_time_result_t':
                width = 21;
                break;
            case 'full_time_result_f':
                width = 21;
                break;
            case 'full_time_result_t':
                width = 21;
                break;
            case 'neutral_stadium':
                width = 21;
                break;
        }
        return width;
    }

    load_statistics();
    clear_inputs();
    filters();
    obtain_similar_data();
    upload_file();
    show_hide_columns();
    insert_data_row();
    delete_rows();
    update_rows();
    hover_filters();

});