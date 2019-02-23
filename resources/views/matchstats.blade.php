@extends('layouts.app')
@section('content')
    <div class="tr">
        <div class="row justify-content-center mb-2">
            <div class="col-md-8">
                <button class="btn btn-success btn-xs" data-toggle="modal" id="insertDataRow">Insert Data Row
                </button>
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#insertData">Insert Data From
                    File
                </button>
                <button class="btn btn-danger btn-xs" data-toggle="modal" id="deleteRowBtn"
                        data-target="#deleteRowModal" disabled="disabled">Delete Row
                </button>

                <button class="btn btn-success btn-xs" data-toggle="modal" id="showHideColumnsBtn"
                        data-target="#showHideColumnsModal">Show/Hide columns
                </button>

                <button class="btn btn-success btn-xs" data-toggle="modal" id="obtainSimilarMatchesBtn"
                        data-target="#obtainSimilarMatchesModal" disabled="disabled">Obtain similar matches
                </button>
                <button class="btn btn-danger btn-xs" data-toggle="modal" id="clear_filters">Clear filters
                </button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" col-lg-12 col-xl-10">
                <div class="card">
                    <div class="card-header"><label><b>Dashboard</b></label>
                        <div class="">
                            <label class=""><span class="filter_title">Custom filter obtainers</span></label>
                            <div class="mb-3">
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="1" data-tippy-content="Columns from  22 to 29, 31, 32, 34, 35, 37 to 40" disabled="disabled">Filter 1</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="2" data-tippy-content="Columns from  22 to 30, 32, 33, 35, 37 to 40" disabled="disabled">Filter 2</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="3" data-tippy-content="Columns from  22 to 31, 33, 34, 37 to 40" disabled="disabled">Filter 3</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="4" data-tippy-content="Columns from  22, 24, 30 to 35, 38 to 40" disabled="disabled">Filter 4</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="5" data-tippy-content="Columns from  22, 24, 30 to 35, 37, 39, 40" disabled="disabled">Filter 5</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="6" data-tippy-content="Columns from  22, 24, 30 to 35, 37, 38, 40" disabled="disabled">Filter 6</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="7" data-tippy-content="Columns from  22, 24, 30 to 35, 37 to 39" disabled="disabled">Filter 7</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="8" data-tippy-content="Columns from  28 to 40" disabled="disabled">Filter 8</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="9" data-tippy-content="Columns from  28 to 36, 38 to 40" disabled="disabled">Filter 9</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="10" data-tippy-content="Columns from  28 to 37, 39, 40" disabled="disabled">Filter 10</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="11" data-tippy-content="Columns from  28 to 38, 40" disabled="disabled">Filter 11</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="12" data-tippy-content="Columns from  28 to 39" disabled="disabled">Filter 12</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="13" data-tippy-content="Columns from  30 to 36" disabled="disabled">Filter 13</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="14" data-tippy-content="Columns from  22, 28 to 32 и 40" disabled="disabled">Filter 14</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="15" data-tippy-content="Columns from  24, 28, 29, 33 to 35 и 40" disabled="disabled">Filter 15</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="16" data-tippy-content="Columns from  22 to 27" disabled="disabled">Filter 16</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="17" data-tippy-content="Columns from  25 to 29" disabled="disabled">Filter 17</button>
                                <button class="btn btn-info btn-xs filter_obtainer_btn" filter-num="18" data-tippy-content="Columns from  36 to 40" disabled="disabled">Filter 18</button>


                            </div>
                        </div>

                        <table id="data" class="display compact dataTable  table-striped table-bordered"
                               style="width:100%">
                            <thead class="thead-dark">
                            <tr class="">
                                <th class="obtain_column_buttons" column_type="id" scope="col">
                                    <button class="btn btn-info obtainer_btn"   >All</button>
                                </th>
                                <th class="obtain_column_buttons" column_type="date" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="time" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="country" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="division" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="stage" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="play_offs" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="eliminations" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="season" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="home_team_percent_over_2_5_goals" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="home_team_percent_home_success_rate" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="home_team_percent_total_success_rate" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="home_team" scope="col" style="width: 60px">
                                </th>
                                <th column_type="half_time_result_h" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="half_time_result_t" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="full_time_result_f" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="full_time_result_t" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="away_team" scope="col" style="width: 60px">
                                </th>
                                <th class="obtain_column_buttons" column_type="away_team_percent_total_success_rate" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="away_team_percent_away_success_rate" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="away_team_percent_over_2_5_goals" scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="neutral_stadium" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" filter-num="1" column_type="home_team_to_win" scope="col">
                                    <button class="btn btn-info obtainer_btn"   disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="draw" scope="col">
                                    <button class="btn btn-info obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_to_win" scope="col">
                                    <button class="btn btn-info obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_win_or_draw" scope="col">
                                    <button class="btn btn-info obtainer_btn"   disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_win_or_draw" scope="col">
                                    <button class="btn btn-info obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_or_away_team_win" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_draw_no_bet" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_draw_no_bet" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_over_0_5_goals" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_over_1_5_goals" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_over_2_5_goals" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_over_0_5_goals" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_over_1_5_goals" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_over_2_5_goals" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="both_teams_to_score" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_0_5" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_1_5" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_2_5" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_3_5" scope="col">
                                    <button class="btn btn-info obtainer_btn"  disabled="disabled">S</button>
                                </th>
                            </tr>
                            <tr class="">
                                <th column_type="id" scope="col">ID</th>
                                <th column_type="date" scope="col">DATE</th>
                                <th column_type="time" scope="col">TIME</th>
                                <th column_type="country" scope="col">CTRY</th>
                                <th column_type="division" scope="col">DVS</th>
                                <th column_type="stage" scope="col">STG</th>
                                <th column_type="play_offs" scope="col">PLOF</th>
                                <th column_type="eliminations" scope="col">ELIMI</th>
                                <th column_type="season" scope="col">SEAS</th>
                                <th column_type="home_team_percent_over_2_5_goals" scope="col">HT%O 2,5</th>
                                <th column_type="home_team_percent_home_success_rate" scope="col">HT% HSR</th>
                                <th column_type="home_team_percent_total_success_rate" scope="col">HT% TSR</th>
                                <th column_type="home_team" scope="col" style="width: 60px">HOME TEAM</th>
                                <th column_type="half_time_result_h" scope="col">H</th>
                                <th column_type="half_time_result_t" scope="col">T</th>
                                <th column_type="full_time_result_f" scope="col">F</th>
                                <th column_type="full_time_result_t" scope="col">T</th>
                                <th column_type="away_team" scope="col" style="width: 60px">AWAY TEAM</th>
                                <th column_type="away_team_percent_total_success_rate" scope="col">AT% TSR</th>
                                <th column_type="away_team_percent_away_success_rate" scope="col">AT% ASR</th>
                                <th column_type="away_team_percent_over_2_5_goals" scope="col">AT% O2,5</th>
                                <th column_type="neutral_stadium" scope="col">NS</th>
                                <th column_type="home_team_to_win" scope="col">1</th>
                                <th column_type="draw" scope="col">X</th>
                                <th column_type="away_team_to_win" scope="col">2</th>
                                <th column_type="home_team_win_or_draw" scope="col">1X</th>
                                <th column_type="away_team_win_or_draw" scope="col">2X</th>
                                <th column_type="home_team_or_away_team_win" scope="col">12</th>
                                <th column_type="home_team_draw_no_bet" scope="col">DNB1</th>
                                <th column_type="away_team_draw_no_bet" scope="col">DNB2</th>
                                <th column_type="home_team_over_0_5_goals" scope="col">0,5</th>
                                <th column_type="home_team_over_1_5_goals" scope="col">1,5</th>
                                <th column_type="home_team_over_2_5_goals" scope="col">2,5</th>
                                <th column_type="away_team_over_0_5_goals" scope="col">0,5</th>
                                <th column_type="away_team_over_1_5_goals" scope="col">1,5</th>
                                <th column_type="away_team_over_2_5_goals" scope="col">2,5</th>
                                <th column_type="both_teams_to_score" scope="col">BTTS</th>
                                <th column_type="total_goals_over_0_5" scope="col">0,5</th>
                                <th column_type="total_goals_over_1_5" scope="col">1,5</th>
                                <th column_type="total_goals_over_2_5" scope="col">2,5</th>
                                <th column_type="total_goals_over_3_5" scope="col">3,5</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr class="">
                                <th column_type="id" scope="col">ID</th>
                                <th column_type="date" scope="col">DATE</th>
                                <th column_type="time" scope="col">TIME</th>
                                <th column_type="country" scope="col">CTRY</th>
                                <th column_type="division" scope="col">DVSN</th>
                                <th column_type="stage" scope="col">STAGE</th>
                                <th column_type="play_offs" scope="col">PLOF</th>
                                <th column_type="eliminations" scope="col">ELIMI</th>
                                <th column_type="season" scope="col">SEAS</th>
                                <th column_type="home_team_percent_over_2_5_goals" scope="col">HT%O 2,5</th>
                                <th column_type="home_team_percent_home_success_rate" scope="col">HT% HSR</th>
                                <th column_type="home_team_percent_total_success_rate" scope="col">HT% TSR</th>
                                <th column_type="home_team" scope="col" style="width: 60px">HOME TEAM</th>
                                <th column_type="half_time_result_h" scope="col">H</th>
                                <th column_type="half_time_result_t" scope="col">T</th>
                                <th column_type="full_time_result_f" scope="col">F</th>
                                <th column_type="full_time_result_t" scope="col">T</th>
                                <th column_type="away_team" scope="col" style="width: 60px">AWAY TEAM</th>
                                <th column_type="away_team_percent_total_success_rate" scope="col">AT% TSR</th>
                                <th column_type="away_team_percent_away_success_rate" scope="col">AT% ASR</th>
                                <th column_type="away_team_percent_over_2_5_goals" scope="col">AT% O2,5</th>
                                <th column_type="neutral_stadium" scope="col">NS</th>
                                <th column_type="home_team_to_win" scope="col">1</th>
                                <th column_type="draw" scope="col">X</th>
                                <th column_type="away_team_to_win" scope="col">2</th>
                                <th column_type="home_team_win_or_draw" scope="col">1X</th>
                                <th column_type="away_team_win_or_draw" scope="col">2X</th>
                                <th column_type="home_team_or_away_team_win" scope="col">12</th>
                                <th column_type="home_team_draw_no_bet" scope="col">DNB1</th>
                                <th column_type="away_team_draw_no_bet" scope="col">DNB2</th>
                                <th column_type="home_team_over_0_5_goals" scope="col">0,5</th>
                                <th column_type="home_team_over_1_5_goals" scope="col">1,5</th>
                                <th column_type="home_team_over_2_5_goals" scope="col">2,5</th>
                                <th column_type="away_team_over_0_5_goals" scope="col">0,5</th>
                                <th column_type="away_team_over_1_5_goals" scope="col">1,5</th>
                                <th column_type="away_team_over_2_5_goals" scope="col">2,5</th>
                                <th column_type="both_teams_to_score" scope="col">BTTS</th>
                                <th column_type="total_goals_over_0_5" scope="col">0,5</th>
                                <th column_type="total_goals_over_1_5" scope="col">1,5</th>
                                <th column_type="total_goals_over_2_5" scope="col">2,5</th>
                                <th column_type="total_goals_over_3_5" scope="col">3,5</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="deleteRowModal" tabindex="-1" role="dialog" aria-labelledby="insertDataLabel"
             aria-hidden="true">
            <form method="post" id="testid" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <input type="hidden" id="delete_row_id" value="">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><strong>Are you sure</strong><span
                                        class="box__dragndrop"> delete this row</span>.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="delete_row" class="btn btn-danger">Yes</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="insertData" tabindex="-1" role="dialog" aria-labelledby="insertDataLabel"
             aria-hidden="true">
            <form method="post" id="testid" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><strong>Choose a file</strong><span
                                        class="box__dragndrop"> or drag it here</span>.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input class="box__file" type="file" id="files[]" id="file"
                                   data-multiple-caption="{count} files selected"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="upload_file" class="btn btn-primary">Upload file</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="showHideColumnsModal" tabindex="-1" role="dialog"
             aria-labelledby="showHideColumnsDataLabel"
             aria-hidden="true">
            <form method="post" id="testid" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><strong>Show / Hide </strong><span
                                        class="box__dragndrop">columns</span>.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="showHideOptionsTable">
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="button" id="save_show_hide_columns" class="btn btn-success btn-sm">Save
                                columns
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="obtainSimilarMatchesModal" tabindex="-1" role="dialog"
             aria-labelledby="obtainSimilarMatchesLabel"
             aria-hidden="true">
            <form method="post" id="testid" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><strong>Obtain similar </strong><span
                                        class="box__dragndrop">matches</span>.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="obtainSimilarMatchesTable">

                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        @endsection

        @section('page-js-script')
            <script src="public/js/matchstats_page_files/matchstats_common_data_page.js"></script>
@endsection