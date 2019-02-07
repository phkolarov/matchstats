@extends('layouts.app')
@section('content')
    <div class="tr">
        <div class="row justify-content-center mb-2">
            <div class="col-md-11">
                <button class="btn btn-success btn-sm" data-toggle="modal" id="insertDataRow">Insert Data Row
                </button>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#insertData">Insert Data From
                    File
                </button>
                <button class="btn btn-danger btn-sm" data-toggle="modal"  id="deleteRowBtn" data-target="#deleteRowModal" disabled="disabled">Delete Row</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-11">

                <div class="card">
                    <div class="card-header"><label>Dashboard</label>
                      <div class="row">
                          <div class="col-2">
                              <input class="form-control form-control-sm mb-1" placeholder="SEARCH BY COUNTRY" id="country-search">
                          </div>
                          <div class="col-2">
                              <input class="form-control form-control-sm" placeholder="SEARCH BY DIVISION" id="division-search">
                          </div>
                      </div>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">#id
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">date
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">time
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">country
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">division
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">stage
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">play_offs
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">eliminations
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">season
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team_percent_over_2_5_goals
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team_percent_home_success_rate
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team_percent_total_success_rate
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">half_time_result_h
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">half_time_result_t
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">full_time_result_f
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">full_time_result_t
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">away_team
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">away_team_percent_total_success_rate
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">away_team_percent_away_success_rate
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">away_team_percent_over_2_5_goals
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">neutral_stadium
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team_to_win
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">draw
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">away_team_to_win
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team_win_or_draw
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">away_team_win_or_draw
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team_or_away_team_win
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team_draw_no_bet
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">away_team_draw_no_bet
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team_over_0_5_goals
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team_over_1_5_goals
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">home_team_over_2_5_goals
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">away_team_over_0_5_goals
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">away_team_over_1_5_goals
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">away_team_over_2_5_goals
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">both_teams_to_score
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">total_goals_over_0_5
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">total_goals_over_1_5
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">total_goals_over_2_5
                                    </th>
                                    <th class="column" style="word-wrap: break-word;min-width: 70px;max-width: 60px;"
                                        scope="col text-sm-left">total_goals_over_3_5
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="match_stats_data_table">
                                </tbody>
                            </table>

                        </div>
                        <div id="demo"></div>
                    </div>
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
                        <button type="button" id="delete_row" class="btn btn-danger" >Yes</button>
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
                        <input class="box__file" type="file" name="files[]" id="file"
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
@endsection

@section('page-js-script')
    <script src="public/js/matchstats_page_files/matchstats_common_data_page.js"></script>
@endsection