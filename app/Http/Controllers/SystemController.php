<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '300');

class SystemController extends Controller
{

    public function upload_file(Request $request)
    {

        $file_stream = $request->get('file_stream');
        $file_data = base64_decode($file_stream);
        $lines = explode("\n", $file_data);
        $array = array_map('str_getcsv', $lines);
        $f = fopen('../testt.csv', 'w+');
        foreach ($array as $row) {

            $row[0] = date('Y-m-d', strtotime(str_replace('/', '-', $row[0])));


            $str = '"' . implode('","', $row) . '"' . "\n";
            $str = str_replace('""', '"0"', $str);
            fwrite($f, $str);
        }
        fclose($f);
        $file_path = addslashes(realpath('../testt.csv'));

        $pdo = DB::connection()->getPdo();

        $stmt = $pdo->prepare("LOAD DATA LOCAL INFILE '$file_path'
        INTO TABLE data
FIELDS TERMINATED BY ','
ENCLOSED BY '\"'
LINES TERMINATED BY '\n'
IGNORE 3 LINES
( date, time, country, division, stage, play_offs, eliminations, season, home_team_percent_over_2_5_goals, home_team_percent_home_success_rate, home_team_percent_total_success_rate, home_team, half_time_result_h, half_time_result_t, full_time_result_f, full_time_result_t, away_team, away_team_percent_total_success_rate, away_team_percent_away_success_rate, away_team_percent_over_2_5_goals, neutral_stadium, home_team_to_win, draw, away_team_to_win, home_team_win_or_draw, away_team_win_or_draw, home_team_or_away_team_win, home_team_draw_no_bet, away_team_draw_no_bet, home_team_over_0_5_goals, home_team_over_1_5_goals, home_team_over_2_5_goals, away_team_over_0_5_goals, away_team_over_1_5_goals, away_team_over_2_5_goals, both_teams_to_score, total_goals_over_0_5, total_goals_over_1_5, total_goals_over_2_5, total_goals_over_3_5)
SET id = NULL;
   ");

        $insertion_result = $stmt->execute();

        if ($insertion_result) {
            return response()->json(['message' => 'Successfully imported']);
        } else {
            return response()->json(['message' => 'Unsuccessfully imported'], 500);
        }
    }


    public function get_data(Request $request, int $page, int $limit)
    {

        $data = DB::table('data');

        if($request->query('country')){
            $data->where('country',$request->query('country'));
        }
        if($request->query('division')){
            $data->where('division',$request->query('division'));
        }
        $result = $data->skip(($page - 1) * $limit)->limit($limit)->orderBy('id', 'desc')->get();

        return response()->json(['success' => $result]);
    }

    public function set_data(Request $request)
    {
        $parameters = $request->json()->all();
        $columns = collect(DB::select("SHOW COLUMNS FROM data"))->pluck('Field')->toArray();
        array_shift($columns);

        $insertion_state = DB::table('data');
        $insertion_parameters = [];

        foreach ($parameters as $key => $parameter) {
            if (in_array($key, $columns)) {

                if ($parameter == "") {
                    $parameter = 0;
                }
                $insertion_parameters[$key] = $parameter;
            }

        }

        $insertion_status = $insertion_state->insert($insertion_parameters);

        if ($insertion_status) {
            return response()->json(['message' => 'Successfully added']);
        } else {
            return response()->json(['message' => 'Unsuccessfully added'], 500);
        }
    }

    public function update_data(Request $request, int $id)
    {
        $parameters = $request->json()->all();
        $columns = collect(DB::select("SHOW COLUMNS FROM data"))->pluck('Field')->toArray();
        array_shift($columns);

        $insertion_state = DB::table('data');
        $insertion_parameters = [];

        foreach ($parameters as $key => $parameter) {
            if (in_array($key, $columns)) {

                if ($parameter == "") {
                    $parameter = 0;
                }elseif(strtolower($parameter) == "null"){
                    $parameter = 0;
                }

                if($key == 'date'){
                    if(date('Y-m-d',strtotime($parameter))!= $parameter){
                        return response()->json(['message' => 'Invalid data format'], 500);
                    }
                }

                if($key == 'time'){
                    if(date('H:i:s',strtotime($parameter))!= $parameter){
                        return response()->json(['message' => 'Invalid time format'], 500);
                    }
                }

                $insertion_parameters[$key] = $parameter;
            }

        }

        $insertion_status = $insertion_state->where('id', $id)->update($insertion_parameters);

        if ($insertion_status) {
            return response()->json(['message' => 'Successfully updated']);
        }elseif ($insertion_status == 0){
            return response()->json(['message' => 'Nothing to update'], 500);
        } else {
            return response()->json(['message' => 'Unsuccessfully updated'], 500);
        }
    }

    function delete_row(Request $reques, int $id){

       $result =  DB::table('data')->delete($id);

        if ($result) {
            return response()->json(['message' => 'Successfully deleted']);
        } else {
            return response()->json(['message' => 'Unsuccessfully deleted'], 500);
        }
    }

    function param_mapper($row)
    {
        if (count($row) == 40) {
            return [
                'date' => $this->parse_params(date('Y-m-d', strtotime(str_replace('/', '-', $row[0]))) ?? NULL),
                'time' => $this->parse_params(date('H:i:s', strtotime($row[1])) ?? NULL),
                'country' => $this->parse_params($row[2] ?? NULL),
                'division' => $this->parse_params($row[3] ?? NULL),
                'stage' => $this->parse_params($row[4] ?? NULL),
                'play_offs' => $this->parse_params($row[5] ?? NULL),
                'eliminations' => $this->parse_params($row[6] ?? NULL),
                'season' => $this->parse_params($row[7] ?? NULL),
                'home_team_percent_over_ 2-5_goals' => $this->parse_params($row[8] ?? NULL),
                'home_team_percent_home_success_rate' => $this->parse_params($row[9] ?? NULL),
                'home_team_percent_total_success_rate' => $this->parse_params($row[10] ?? NULL),
                'home_team' => $this->parse_params($row[11] ?? NULL),
                'half_time_result_h' => $this->parse_params($row[12] ?? NULL),
                'half_time_result_t' => $this->parse_params($row[13] ?? NULL),
                'full_time_result_f' => $this->parse_params($row[14] ?? NULL),
                'full_time_result_t' => $this->parse_params($row[15] ?? NULL),
                'away_team' => $this->parse_params($row[16] ?? NULL),
                'away_team_percent_total_success_rate' => $this->parse_params($row[17] ?? NULL),
                'away_team_percent_away_success_rate' => $this->parse_params($row[18] ?? NULL),
                'away_team_percent_over_2-5_goals' => $this->parse_params($row[19] ?? NULL),
                'neutral_stadium' => $this->parse_params($row[20] ?? NULL),
                'home_team_to_win' => $this->parse_params($row[21] ?? NULL),
                'draw' => $this->parse_params($row[22] ?? NULL),
                'away_team_to_win' => $this->parse_params($row[23] ?? NULL),
                'home_team_win_or_draw' => $this->parse_params($row[24] ?? NULL),
                'away_team_win_or_draw' => $this->parse_params($row[25] ?? NULL),
                'home_team_or_away_team_win' => $this->parse_params($row[26] ?? NULL),
                'home_team_draw_no_bet' => $this->parse_params($row[27] ?? NULL),
                'away_team_draw_no_bet' => $this->parse_params($row[28] ?? NULL),
                'home_team_over_0-5_goals' => $this->parse_params($row[29] ?? NULL),
                'home_team_over_1-5_goals' => $this->parse_params($row[30] ?? NULL),
                'home_team_over_2-5_goals' => $this->parse_params($row[31] ?? NULL),
                'away_team_over_0-5_goals' => $this->parse_params($row[32] ?? NULL),
                'away_team_over_1-5_goals' => $this->parse_params($row[33] ?? NULL),
                'away_team_over_2-5_goals' => $this->parse_params($row[34] ?? NULL),
                'both_teams_to_score' => $this->parse_params($row[35] ?? NULL),
                'total_goals_over_0-5' => $this->parse_params($row[36] ?? NULL),
                'total_goals_over_1-5' => $this->parse_params($row[37] ?? NULL),
                'total_goals_over_2-5' => $this->parse_params($row[38] ?? NULL),
                'total_goals_over_3-5' => $this->parse_params($row[39] ?? NULL)
            ];

        }
    }

    public function get_page_count(Request $request, $page_count = 1)
    {
        $row_count = DB::table('data');

        if($request->query('country')){
            $row_count->where('country',$request->query('country'));
        }
        if($request->query('division')){
            $row_count->where('division',$request->query('division'));
        }

        $result = $row_count->count('id');

        return response()->json(['elements' => ceil($result / $page_count)]);
    }


    public function parse_params($param)
    {
        if (is_numeric($param)) {
            return floatval($param);
        } else {
            return $param != '' ? $param : NULL;
        }

    }
}
