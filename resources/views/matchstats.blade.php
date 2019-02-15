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
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><label>Dashboard</label>
                        <table id="data" class="display compact dataTable  table-striped table-bordered"
                               style="width:100%">
                            <thead class="thead-dark">
                            <tr class="">
                                <th column_type="id" scope="col">ID</th>
                                <th column_type="date" scope="col">DATE</th>
                                <th column_type="time" scope="col">TIME</th>
                                <th column_type="country" scope="col">HOME TEAM</th>
                                <th column_type="division" scope="col">AWAY TEAM</th>
                                <th column_type="stage" scope="col">CNTRY</th>
                                <th column_type="play_offs" scope="col">DVSN</th>
                                <th column_type="eliminations" scope="col">STAGE</th>
                                <th column_type="season" scope="col">PLOF</th>
                                <th column_type="home_team_percent_over_2_5_goals" scope="col">ELIMI</th>
                                <th column_type="home_team_percent_home_success_rate" scope="col">SEASO</th>
                                <th column_type="home_team_percent_total_success_rate" scope="col">HTPO2,5</th>
                                <th column_type="home_team" scope="col">HTPHSR</th>
                                <th column_type="half_time_result_h" scope="col">HTPTSR</th>
                                <th column_type="half_time_result_t" scope="col">HTRH</th>
                                <th column_type="full_time_result_f" scope="col">HTRT</th>
                                <th column_type="full_time_result_t" scope="col">FTRF</th>
                                <th column_type="away_team" scope="col">FTRT</th>
                                <th column_type="away_team_percent_total_success_rate" scope="col">ATPTSR</th>
                                <th column_type="away_team_percent_away_success_rate" scope="col">ATPASR</th>
                                <th column_type="away_team_percent_over_2_5_goals" scope="col">ATPO2,5</th>
                                <th column_type="neutral_stadium" scope="col">NS</th>
                                <th column_type="home_team_to_win" scope="col">HTTW</th>
                                <th column_type="draw" scope="col">DRAW</th>
                                <th column_type="away_team_to_win" scope="col">ATTW</th>
                                <th column_type="home_team_win_or_draw" scope="col">HTWOD</th>
                                <th column_type="away_team_win_or_draw" scope="col">ATWOD</th>
                                <th column_type="home_team_or_away_team_win" scope="col">HTOATW</th>
                                <th column_type="home_team_draw_no_bet" scope="col">HTDNB</th>
                                <th column_type="away_team_draw_no_bet" scope="col">ATDNB</th>
                                <th column_type="home_team_over_0_5_goals" scope="col">HTO 0,5</th>
                                <th column_type="home_team_over_1_5_goals" scope="col">HTO 1,5</th>
                                <th column_type="home_team_over_2_5_goals" scope="col">HTO 2,5</th>
                                <th column_type="away_team_over_0_5_goals" scope="col">ATO 0,5</th>
                                <th column_type="away_team_over_1_5_goals" scope="col">ATO 1,5</th>
                                <th column_type="away_team_over_2_5_goals" scope="col">ATO 2,5</th>
                                <th column_type="both_teams_to_score" scope="col">BTTS</th>
                                <th column_type="total_goals_over_0_5" scope="col">TGO 0,5</th>
                                <th column_type="total_goals_over_1_5" scope="col">TGO 1,5</th>
                                <th column_type="total_goals_over_2_5" scope="col">TGO 2,5</th>
                                <th column_type="total_goals_over_3_5" scope="col">TGO 3,5</th>
                                {{--                                    <th class="w-20">id</th>--}}
                                {{--                                    <th class="w-20">date</th>--}}
                                {{--                                    <th class="w-15">time</th>--}}
                                {{--                                    <th class="w-20">country</th>--}}
                                {{--                                    <th class="w-5">division</th>--}}
                                {{--                                    <th class="w-5">stage</th>--}}
                                {{--                                    <th class="w-5">play_offs</th>--}}
                                {{--                                    <th class="w-5">eliminations</th>--}}
                                {{--                                    <th class="w-5">season</th>--}}
                                {{--                                    <th class="w-5">home_team_percent_over_2_5_goals</th>--}}
                                {{--                                    <th class="w-5">home_team_percent_home_success_rate</th>--}}
                                {{--                                    <th class="w-5">home_team_percent_total_success_rate</th>--}}
                                {{--                                    <th class="w-20">home_team</th>--}}
                                {{--                                    <th class="w-5">half_time_result_h</th>--}}
                                {{--                                    <th class="w-5">half_time_result_t</th>--}}
                                {{--                                    <th class="w-5">full_time_result_f</th>--}}
                                {{--                                    <th class="w-5">full_time_result_t</th>--}}
                                {{--                                    <th class="w-20">away_team</th>--}}
                                {{--                                    <th class="w-5">away_team_percent_total_success_rate</th>--}}
                                {{--                                    <th class="w-5">away_team_percent_away_success_rate</th>--}}
                                {{--                                    <th class="w-5">away_team_percent_over_2_5_goals</th>--}}
                                {{--                                    <th class="w-5">neutral_stadium</th>--}}
                                {{--                                    <th class="w-5">home_team_to_win</th>--}}
                                {{--                                    <th class="w-5">draw</th>--}}
                                {{--                                    <th class="w-5">away_team_to_win</th>--}}
                                {{--                                    <th class="w-5">home_team_win_or_draw</th>--}}
                                {{--                                    <th class="w-5">away_team_win_or_draw</th>--}}
                                {{--                                    <th class="w-5">home_team_or_away_team_win</th>--}}
                                {{--                                    <th class="w-5">home_team_draw_no_bet</th>--}}
                                {{--                                    <th class="w-5">away_team_draw_no_bet</th>--}}
                                {{--                                    <th class="w-5">home_team_over_0_5_goals</th>--}}
                                {{--                                    <th class="w-5">home_team_over_1_5_goals</th>--}}
                                {{--                                    <th class="w-5">home_team_over_2_5_goals</th>--}}
                                {{--                                    <th class="w-5">away_team_over_0_5_goals</th>--}}
                                {{--                                    <th class="w-5">away_team_over_1_5_goals</th>--}}
                                {{--                                    <th class="w-5">away_team_over_2_5_goals</th>--}}
                                {{--                                    <th class="w-5">both_teams_to_score</th>--}}
                                {{--                                    <th class="w-5">total_goals_over_0_5</th>--}}
                                {{--                                    <th class="w-5">total_goals_over_1_5</th>--}}
                                {{--                                    <th class="w-5">total_goals_over_2_5</th>--}}
                                {{--                                    <th class="w-5">total_goals_over_3_5</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr class="">
                                <th scope="col">ID</th>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                <th scope="col">HOME TEAM</th>
                                <th scope="col">AWAY TEAM</th>
                                <th scope="col">CNTRY</th>
                                <th scope="col">DVSN</th>
                                <th scope="col">STAGE</th>
                                <th scope="col">PLOF</th>
                                <th scope="col">ELIMI</th>
                                <th scope="col">SEASO</th>
                                <th scope="col">HTPO2,5</th>
                                <th scope="col">HTPHSR</th>
                                <th scope="col">HTPTSR</th>
                                <th scope="col">HTRH</th>
                                <th scope="col">HTRT</th>
                                <th scope="col">FTRF</th>
                                <th scope="col">FTRT</th>
                                <th scope="col">ATPTSR</th>
                                <th scope="col">ATPASR</th>
                                <th scope="col">ATPO2,5</th>
                                <th scope="col">NS</th>
                                <th scope="col">HTTW</th>
                                <th scope="col">DRAW</th>
                                <th scope="col">ATTW</th>
                                <th scope="col">HTWOD</th>
                                <th scope="col">ATWOD</th>
                                <th scope="col">HTOATW</th>
                                <th scope="col">HTDNB</th>
                                <th scope="col">ATDNB</th>
                                <th scope="col">HTO 0,5</th>
                                <th scope="col">HTO 1,5</th>
                                <th scope="col">HTO 2,5</th>
                                <th scope="col">ATO 0,5</th>
                                <th scope="col">ATO 1,5</th>
                                <th scope="col">ATO 2,5</th>
                                <th scope="col">BTTS</th>
                                <th scope="col">TGO 0,5</th>
                                <th scope="col">TGO 1,5</th>
                                <th scope="col">TGO 2,5</th>
                                <th scope="col">TGO 3,5</th>
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
                            <button type="button" id="save_show_hide_columns" class="btn btn-success btn-sm">Save columns</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        @endsection

        @section('page-js-script')
            <script src="public/js/matchstats_page_files/matchstats_common_data_page.js"></script>
@endsection