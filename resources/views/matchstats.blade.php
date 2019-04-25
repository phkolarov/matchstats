@extends('layouts.app')
@section('content')
    <div class="tr">

        <div class="row justify-content-center">

            <div class=" col-lg-12 col-xl-8">
                <div class="card">

                    <div class="card-header"><label><b>Dashboard</b></label>


                    </div>
                    <div class="card-body table-wrapper">
                        <div class="row justify-content-center mb-2">
                            <div class=" col-lg-12 col-xl-12">
                                <button class="btn btn-success btn-xs" data-toggle="modal" id="insertDataRow">Insert
                                    Data Row <i class="far fa-plus-square"></i>
                                </button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" id="deleteRowBtn"
                                        data-target="#deleteRowModal" disabled="disabled">Delete Row <i
                                            class="far fa-trash-alt"></i>
                                </button>
                                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#insertData">Insert
                                    Data From
                                    File <i class="far fa-address-card"></i>
                                </button>

                                <button class="btn btn-info btn-xs" id="load_match_stats"> Load match stats data <i
                                            class="fas fa-info-circle load_team_data"></i>
                                </button>
                                <button class="btn btn-success btn-xs" data-toggle="modal" id="showHideColumnsBtn"
                                        data-target="#showHideColumnsModal">Show/Hide columns <i class="far fa-eye"></i>
                                </button>

                                <button class="btn btn-success btn-xs" data-toggle="modal" id="obtainSimilarMatchesBtn"
                                        data-target="#obtainSimilarMatchesModal" disabled="disabled">Obtain similar
                                    matches <i class="fab fa-get-pocket"></i>
                                </button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" id="clear_filters">Clear
                                    filters <i class="fas fa-broom"></i>
                                </button>
                            </div>
                        </div>

                        <div class="">
                            {{--                            <label class=""><span class="filter_title">Custom order</span></label>--}}
                            <div class="mb-3">
                                <button class="btn btn-warning btn-xxs sort_btn" sort-num="0"
                                        data-tippy-content="Columns 3, 4, 1, 2, 12, 17">By Date <i
                                            class="fas fa-filter"></i>
                                </button>
                                <button class="btn btn-warning btn-xxs sort_btn" sort-num="1" data-tippy-content="Columns 23, 22, 24, 25, 26, 27, 28, 29. 30, 31, 32, 33, 34, 35, 36, 37, 38,
39, 40">By Odds <i class="fas fa-filter"></i>
                                </button>
                            </div>
                        </div>
                        <table id="data" class="display compact dataTable nowrap table-striped table-bordered"
                               style="width:100%">
                            <thead class="thead-dark">
                            <tr class="">
                                <th class="obtain_column_buttons filters_column" column_type="id" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="date" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="time" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="country" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="division" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="stage" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="play_offs" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="eliminations" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="season" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="home_team_percent_over_2_5_goals"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="home_team_percent_home_success_rate"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="home_team_percent_total_success_rate"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team" scope="col"
                                    style="width: 60px">

                                </th>
                                <th column_type="half_time_result_h" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="half_time_result_t"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="full_time_result_f"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="full_time_result_t"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team" scope="col"
                                    style="width: 60px">

                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="away_team_percent_total_success_rate"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="away_team_percent_away_success_rate"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="away_team_percent_over_2_5_goals"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="neutral_stadium" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"  column_type="home_team_to_win" scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn">All</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="draw" scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="1"
                                            data-tippy-content="Columns from  22 to 29, 31, 32, 34, 35, 37 to 40"
                                            disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_to_win"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="2"
                                            data-tippy-content="Columns from  22 to 30, 32, 33, 35, 37 to 40"
                                            disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_win_or_draw"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="3"
                                            data-tippy-content="Columns from  22 to 31, 33, 34, 37 to 40"
                                            disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_win_or_draw"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="4"
                                            data-tippy-content="Columns from  22, 24, 30 to 35, 38 to 40"
                                            disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="home_team_or_away_team_win" scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="5"
                                            data-tippy-content="Columns from  22, 24, 30 to 35, 37, 39, 40"
                                            disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_draw_no_bet"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="6"
                                            data-tippy-content="Columns from  22, 24, 30 to 35, 37, 38, 40"
                                            disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_draw_no_bet"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="7"
                                            data-tippy-content="Columns from  22, 24, 30 to 35, 37 to 39"
                                            disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_over_0_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="8"
                                            data-tippy-content="Columns from  28 to 40" disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_over_1_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="9"
                                            data-tippy-content="Columns from  28 to 36, 38 to 40" disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_over_2_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="10"
                                            data-tippy-content="Columns from  28 to 37, 39, 40" disabled="disabled">
                                        F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_over_0_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="11"
                                            data-tippy-content="Columns from  28 to 38, 40" disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_over_1_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="12"
                                            data-tippy-content="Columns from  28 to 39" disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_over_2_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="13"
                                            data-tippy-content="Columns from  30 to 36" disabled="disabled">F
                                    </button>

                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="both_teams_to_score"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="14"
                                            data-tippy-content="Columns from  22, 28 to 32 и 40" disabled="disabled">
                                        F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_0_5"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="15"
                                            data-tippy-content="Columns from  24, 28, 29, 33 to 35 и 40"
                                            disabled="disabled">F
                                    </button>

                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_1_5"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="16"
                                            data-tippy-content="Columns from  22 to 27" disabled="disabled">F
                                    </button>

                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_2_5"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="17"
                                            data-tippy-content="Columns from  25 to 29" disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_3_5"
                                    scope="col">

                                    <button class="btn btn-info btn-xxs filter_obtainer_btn " filter-num="18"
                                            data-tippy-content="Columns from  36 to 40" disabled="disabled">F
                                    </button>

                                </th>
                            </tr>
                            <tr id="filters2" class="">
                                <th class="obtain_column_buttons filters_column" column_type="id" scope="col">

                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="date" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="time" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="country" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="division" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="stage" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="play_offs" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="eliminations" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="season" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="home_team_percent_over_2_5_goals"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="home_team_percent_home_success_rate"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="home_team_percent_total_success_rate"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team" scope="col"
                                    style="width: 60px">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="19"
                                            data-tippy-content="Columns 12, 36, 37, 38, 40" disabled="disabled">F
                                    </button>
                                </th>
                                <th column_type="half_time_result_h" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="half_time_result_t"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="full_time_result_f"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="full_time_result_t"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team" scope="col"
                                    style="width: 60px">
                                    <button class="btn btn-info btn-xxs filter_obtainer_btn" filter-num="20"
                                            data-tippy-content="Columns 12, 36, 37, 38, 40" disabled="disabled">F
                                    </button>
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="away_team_percent_total_success_rate"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="away_team_percent_away_success_rate"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="away_team_percent_over_2_5_goals"
                                    scope="col">
                                </th>
                                <th class="obtain_column_buttons" column_type="neutral_stadium" scope="col">
                                </th>
                                <th class="obtain_column_buttons filters_column" filter-num="1"
                                    column_type="home_team_to_win" scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="draw" scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_to_win"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_win_or_draw"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_win_or_draw"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column"
                                    column_type="home_team_or_away_team_win" scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_draw_no_bet"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_draw_no_bet"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_over_0_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_over_1_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="home_team_over_2_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_over_0_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_over_1_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="away_team_over_2_5_goals"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="both_teams_to_score"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_0_5"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_1_5"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_2_5"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                                <th class="obtain_column_buttons filters_column" column_type="total_goals_over_3_5"
                                    scope="col">
                                    <button class="btn btn-info btn-xxs obtainer_btn" disabled="disabled">S</button>
                                </th>
                            </tr>

                            <tr class="table_columns">
                                <th column_num="0" column_type="id">ID</th>
                                <th column_num="1" column_type="date" scope="col">DATE</th>
                                <th column_num="2" column_type="time" scope="col">TIME</th>
                                <th column_num="3" column_type="country" scope="col">CTRY</th>
                                <th column_num="4" column_type="division" scope="col">DVS</th>
                                <th column_num="5" column_type="stage" scope="col">STG</th>
                                <th column_num="6" column_type="play_offs" scope="col">PLOF</th>
                                <th column_num="7" column_type="eliminations" scope="col">ELIMI</th>
                                <th column_num="8" column_type="season" scope="col">SEAS</th>
                                <th column_num="9" column_type="home_team_percent_over_2_5_goals" scope="col">%
                                </th>
                                <th column_num="10" column_type="home_team_percent_home_success_rate" scope="col">%
                                </th>
                                <th column_num="11" column_type="home_team_percent_total_success_rate" scope="col">%
                                </th>
                                <th column_num="12" column_type="home_team" scope="col" style="width: 95px">HOME TEAM
                                </th>
                                <th column_num="13" column_type="half_time_result_h" scope="col">H</th>
                                <th column_num="14" column_type="half_time_result_t" scope="col">T</th>
                                <th column_num="15" column_type="full_time_result_f" scope="col">F</th>
                                <th column_num="16" column_type="full_time_result_t" scope="col">T</th>
                                <th column_num="17" column_type="away_team" scope="col" style="width: 95px">AWAY TEAM
                                </th>
                                <th column_num="18" column_type="away_team_percent_total_success_rate" scope="col">%
                                </th>
                                <th column_num="19" column_type="away_team_percent_away_success_rate" scope="col">%
                                </th>
                                <th column_num="20" column_type="away_team_percent_over_2_5_goals" scope="col">%
                                </th>
                                <th column_num="21" column_type="neutral_stadium" scope="col">NS</th>
                                <th column_num="22" column_type="home_team_to_win" scope="col">1</th>
                                <th column_num="23" column_type="draw" scope="col">X</th>
                                <th column_num="24" column_type="away_team_to_win" scope="col">2</th>
                                <th column_num="25" column_type="home_team_win_or_draw" scope="col">1X</th>
                                <th column_num="26" column_type="away_team_win_or_draw" scope="col">X2</th>
                                <th column_num="27" column_type="home_team_or_away_team_win" scope="col">12</th>
                                <th column_num="28" column_type="home_team_draw_no_bet" scope="col">D1</th>
                                <th column_num="29" column_type="away_team_draw_no_bet" scope="col">D2</th>
                                <th column_num="30" column_type="home_team_over_0_5_goals" scope="col">0,5</th>
                                <th column_num="31" column_type="home_team_over_1_5_goals" scope="col">1,5</th>
                                <th column_num="32" column_type="home_team_over_2_5_goals" scope="col">2,5</th>
                                <th column_num="33" column_type="away_team_over_0_5_goals" scope="col">0,5</th>
                                <th column_num="34" column_type="away_team_over_1_5_goals" scope="col">1,5</th>
                                <th column_num="35" column_type="away_team_over_2_5_goals" scope="col">2,5</th>
                                <th column_num="36" column_type="both_teams_to_score" scope="col">BS</th>
                                <th column_num="37" column_type="total_goals_over_0_5" scope="col">0,5</th>
                                <th column_num="38" column_type="total_goals_over_1_5" scope="col">1,5</th>
                                <th column_num="39" column_type="total_goals_over_2_5" scope="col">2,5</th>
                                <th column_num="40" column_type="total_goals_over_3_5" scope="col">3,5</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr class="table_columns">
                                <th column_type_f="id" scope="col"></th>
                                <th column_type_f="date" scope="col"></th>
                                <th column_type_f="time" scope="col"></th>
                                <th column_type_f="country" scope="col"></th>
                                <th column_type_f="division" scope="col"></th>
                                <th column_type_f="stage" scope="col"></th>
                                <th column_type_f="play_offs" scope="col"></th>
                                <th column_type_f="eliminations" scope="col"></th>
                                <th column_type_f="season" scope="col"></th>
                                <th column_type_f="home_team_percent_over_2_5_goals" scope="col"></th>
                                <th column_type_f="home_team_percent_home_success_rate" scope="col"></th>
                                <th column_type_f="home_team_percent_total_success_rate" scope="col"></th>
                                <th column_type_f="home_team" scope="col" style="width: 60px"></th>
                                <th column_type_f="half_time_result_h" scope="col"></th>
                                <th column_type_f="half_time_result_t" scope="col"></th>
                                <th column_type_f="full_time_result_f" scope="col"></th>
                                <th column_type_f="full_time_result_t" scope="col"></th>
                                <th column_type_f="away_team" scope="col" style="width: 60px"></th>
                                <th column_type_f="away_team_percent_total_success_rate" scope="col"></th>
                                <th column_type_f="away_team_percent_away_success_rate" scope="col"></th>
                                <th column_type_f="away_team_percent_over_2_5_goals" scope="col"></th>
                                <th column_type_f="neutral_stadium" scope="col"></th>
                                <th column_type_f="home_team_to_win" scope="col"></th>
                                <th column_type_f="draw" scope="col"></th>
                                <th column_type_f="away_team_to_win" scope="col"></th>
                                <th column_type_f="home_team_win_or_draw" scope="col"></th>
                                <th column_type_f="away_team_win_or_draw" scope="col"></th>
                                <th column_type_f="home_team_or_away_team_win" scope="col"></th>
                                <th column_type_f="home_team_draw_no_bet" scope="col"></th>
                                <th column_type_f="away_team_draw_no_bet" scope="col"></th>
                                <th column_type_f="home_team_over_0_5_goals" scope="col"></th>
                                <th column_type_f="home_team_over_1_5_goals" scope="col"></th>
                                <th column_type_f="home_team_over_2_5_goals" scope="col"></th>
                                <th column_type_f="away_team_over_0_5_goals" scope="col"></th>
                                <th column_type_f="away_team_over_1_5_goals" scope="col"></th>
                                <th column_type_f="away_team_over_2_5_goals" scope="col"></th>
                                <th column_type_f="both_teams_to_score" scope="col"></th>
                                <th column_type_f="total_goals_over_0_5" scope="col"></th>
                                <th column_type_f="total_goals_over_1_5" scope="col"></th>
                                <th column_type_f="total_goals_over_2_5" scope="col"></th>
                                <th column_type_f="total_goals_over_3_5" scope="col"></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            {{--            <div class="match_stats_section col-lg-12 col-xl-10">--}}
            {{--                <div class="card">--}}
            {{--                    <div class="card-header"><label><b>Statistics</b></label>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="">--}}
            {{--                    <table id="last-five-matches-between-teams">--}}

            {{--                    </table>--}}
            {{--                </div>--}}

            {{--                <div class="">--}}
            {{--                    <table id="last-five-home-team">--}}

            {{--                    </table>--}}
            {{--                </div>--}}
            {{--                <div class="">--}}
            {{--                    <table id="last-five-home-away-team">--}}

            {{--                    </table>--}}
            {{--                </div>--}}
            {{--            </div>--}}
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
                            <input class="box__file" type="file" id="file"
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
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close
                            </button>
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
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection

@section('page-js-script')
    <script src="public/js/matchstats_page_files/matchstats_common_data_page.js"></script>
@endsection

