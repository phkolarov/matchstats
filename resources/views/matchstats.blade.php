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
                <button class="btn btn-danger btn-xs" data-toggle="modal" id="clearFilters">Clear filters
                </button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" col-lg-12 col-xl-10">
                <div class="card">
                    <div class="card-header"><label><b>Dashboard</b></label>
                        <div class="col-lg-12">
                            <label class=""><span>Match filter obtainers</span></label>
                        </div>
                        <div class="col-xs-12 mb-2">
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 22</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 23</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 24</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 25</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 26</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 27</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 28</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 29</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 30</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 31</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 32</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 33</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 34</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 35</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 36</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 37</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 38</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 39</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 40</button>
                        </div>
                        <div class="col-xs-12 mb-2">
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 22</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 23</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 24</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 25</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 26</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 27</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 28</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 29</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 30</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 31</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 32</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 33</button>
                            <button class="btn btn-info btn-xs" data-toggle="modal" id="clearFilters"> w/o - 34</button>
                        </div>
                        <table id="data" class="display compact dataTable  table-striped table-bordered"
                               style="width:100%">
                            <thead class="thead-dark">
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
                                {{--                                                                    <th class="w-20">id</th>--}}
                                {{--                                                                    <th class="w-20">date</th>--}}
                                {{--                                                                    <th class="w-15">time</th>--}}
                                {{--                                                                    <th class="w-20">country</th>--}}
                                {{--                                                                    <th class="w-5">division</th>--}}
                                {{--                                                                    <th class="w-5">stage</th>--}}
                                {{--                                                                    <th class="w-5">play_offs</th>--}}
                                {{--                                                                    <th class="w-5">eliminations</th>--}}
                                {{--                                                                    <th class="w-5">SEASn</th>--}}
                                {{--                                                                    <th class="w-5">home_team_percent_over_2_5_goals</th>--}}
                                {{--                                                                    <th class="w-5">home_team_percent_home_success_rate</th>--}}
                                {{--                                                                    <th class="w-5">home_team_percent_total_success_rate</th>--}}
                                {{--                                                                    <th class="w-20">home_team</th>--}}
                                {{--                                                                    <th class="w-5">half_time_result_h</th>--}}
                                {{--                                                                    <th class="w-5">half_time_result_t</th>--}}
                                {{--                                                                    <th class="w-5">full_time_result_f</th>--}}
                                {{--                                                                    <th class="w-5">full_time_result_t</th>--}}
                                {{--                                                                    <th class="w-20">away_team</th>--}}
                                {{--                                                                    <th class="w-5">away_team_percent_total_success_rate</th>--}}
                                {{--                                                                    <th class="w-5">away_team_percent_away_success_rate</th>--}}
                                {{--                                                                    <th class="w-5">away_team_percent_over_2_5_goals</th>--}}
                                {{--                                                                    <th class="w-5">neutral_stadium</th>--}}
                                {{--                                                                    <th class="w-5">home_team_to_win</th>--}}
                                {{--                                                                    <th class="w-5">draw</th>--}}
                                {{--                                                                    <th class="w-5">away_team_to_win</th>--}}
                                {{--                                                                    <th class="w-5">home_team_win_or_draw</th>--}}
                                {{--                                                                    <th class="w-5">away_team_win_or_draw</th>--}}
                                {{--                                                                    <th class="w-5">home_team_or_away_team_win</th>--}}
                                {{--                                                                    <th class="w-5">home_team_draw_no_bet</th>--}}
                                {{--                                                                    <th class="w-5">away_team_draw_no_bet</th>--}}
                                {{--                                                                    <th class="w-5">home_team_over_0_5_goals</th>--}}
                                {{--                                                                    <th class="w-5">home_team_over_1_5_goals</th>--}}
                                {{--                                                                    <th class="w-5">home_team_over_2_5_goals</th>--}}
                                {{--                                                                    <th class="w-5">away_team_over_0_5_goals</th>--}}
                                {{--                                                                    <th class="w-5">away_team_over_1_5_goals</th>--}}
                                {{--                                                                    <th class="w-5">away_team_over_2_5_goals</th>--}}
                                {{--                                                                    <th class="w-5">both_teams_to_score</th>--}}
                                {{--                                                                    <th class="w-5">total_goals_over_0_5</th>--}}
                                {{--                                                                    <th class="w-5">total_goals_over_1_5</th>--}}
                                {{--                                                                    <th class="w-5">total_goals_over_2_5</th>--}}
                                {{--                                                                    <th class="w-5">total_goals_over_3_5</th>--}}
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