$(document).ready(function () {

    let token = ('{{\Auth::user()->api_token}}');
    let csrf = ('X-CSRF-TOKEN: {{ csrf_token() }}');
    sessionStorage.country = $(this).val();
    sessionStorage.division = $(this).val();


    function data_table_initialisation(columns_array) {

        $(document).ready(function () {

            let columns = [];
            for (let column in columns_array) {

                let column_name = columns_array[column];
                let visible = localStorage[column_name] == "false" ? false : true;

                columns.push({
                    'data': columns_array[column],
                    'visible': visible,
                    'className': column_name
                    // "createdCell": function (td, cellData, rowData, row, col) {
                    //
                    //     $(td).attr('type',column_name);
                    // }
                })
            }


            // DataTable
            var table = $('#data').DataTable(
                {
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "public/api/system/get-data-table",
                        "type": "POST",
                        "headers": {
                            "Authorization": "Bearer " + localStorage.access_token
                        }
                    },
                    rowCallback: function (row, data) {

                        $(row).attr('row-id', data.id);
                    },
                    "columns": columns
                }
            );

            //adding multiselection
            $('#data tbody').on('click', 'tr', function () {
                $(this).toggleClass('selected');
            });

            $('#button').click(function () {
                alert(table.rows('.selected').data().length + ' row(s) selected');
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });

            // Setup - add a text input to each footer cell
            $('#data tfoot th').each(function (i, el) {
                var title = $(this).text();
                let width = 33;

                console.log(title);
                if (i == 0) {
                    width = 61;
                }
                $(this).html(`<input style="width: ${width}px" type="text" placeholder="${title}" />`);
            });
        });
    }


    function insert_data_row() {

        $('#insertDataRow').on('click', function () {

            let columns = $('#data>thead>tr th');
            let date = new Date();
            let add_row_button = `<button insertion-button-id="${date.getTime()}" class="btn btn-xs btn-success add-row-button add-row-buttons" time="${date.getTime()}">ADD</button>`;
            let cancel_row_button = `<button insertion-button-id="${date.getTime()}" class="btn btn-xs btn-default cancel-row-button add-row-buttons" time="${date.getTime()}">CANCEL</button>`;
            let row_string = `<tr class="insertion_row" insertion-row-id="${date.getTime()}">`;

            columns.each(function (i, el) {
                let column_name = $(el).attr('column_type');
                let add_button_string = '';
                let cancel_button_string = '';
                if (column_name == 'id') {
                    add_button_string = add_row_button;
                    cancel_button_string = cancel_row_button;
                }

                row_string += `
                    <td>${add_button_string}<input time="${date.getTime()}" style="width: 60px" type="text" placeholder="${column_name}">${cancel_button_string}</td>
                `;
            });
            row_string += '</tr>';

            $('#data tbody').prepend(
                row_string
            );
        })

        $(document).on('click', '.add-row-button', function () {
            let time = $(this).attr('insertion-button-id');
            let inputs = $(`input[time="${time}"]`);
            let data = {};
            inputs.each(function () {
                let name = $(this).attr('placeholder');
                let value = $(this).val();
                data[name] = value;
            });

            if(!data.home_team || !data.away_team ){
                match_app.message('Please enter team names','error');
                return;
            }

            match_app.data_service('/')
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

    function load_columns_data() {

        return match_app.request('system/get-columns', 'GET', [], [], function (data) {

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

    load_columns_data().then(function (data) {
        data_table_initialisation(data.success);
    });

    upload_file();
    show_hide_columns();
    insert_data_row();

});