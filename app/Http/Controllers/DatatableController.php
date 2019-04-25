<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatatableController extends Controller
{

    function get_data_table(Request $request)
    {

        $columns = collect(DB::select('DESCRIBE data;'))->pluck('Field')->toArray();

        DB::enableQueryLog();
        $data = DB::table('data');
        $skip = $request->get('start');
        $limit = $request->get('length');
        $request_data = $request->all();
        $requested_columns = $request_data['columns'] ?? [];

        foreach ($requested_columns as $column) {
            if ($column['searchable'] == "true" && in_array($column['data'], $columns)) {
                $searched_data = $column['search']['value'];
                if ($searched_data != '' && $searched_data != null) {
                    if(is_numeric($searched_data)){
                        $data->where($column['data'], '=', $searched_data);
                    }else{
                        if($column['data'] == 'date'){
                            $parsed_date = strtotime($searched_data);
                            $str_date = date('Y-m-d',$parsed_date);
                            $data->where($column['data'], 'like', '%'.$str_date.'%');
                        }else{
                            $data->where($column['data'], 'like', '%'.$searched_data.'%');
                        }
                    }
                }
            }
        }

        $order_columns = $request->get('order') ?? [];


        foreach ($order_columns as $order) {
            $index = $order['column'];
            $dir = $order['dir'];
            $order_column = $requested_columns[$index ];

            if ($order_column['orderable'] == "true") {
                $column_name = $order_column['data'];
                $data->orderBy($column_name,$dir);
            }
        }

        $cloned_filtering_object = clone $data;

        $filtered = $cloned_filtering_object->count();
        $total = DB::table('data')->count();

        DB::enableQueryLog();
        $output_data = $data->skip($skip)->limit($limit)->select([
            'id', DB::raw('DATE_FORMAT(date, "%d-%m-%Y") as date'), 'time', 'country', 'division', 'stage', 'play_offs', 'eliminations', 'season', 'home_team_percent_over_2_5_goals', 'home_team_percent_home_success_rate', 'home_team_percent_total_success_rate', 'home_team', 'half_time_result_h', 'half_time_result_t', 'full_time_result_f', 'full_time_result_t', 'away_team', 'away_team_percent_total_success_rate', 'away_team_percent_away_success_rate', 'away_team_percent_over_2_5_goals', 'neutral_stadium', 'home_team_to_win', 'draw', 'away_team_to_win', 'home_team_win_or_draw', 'away_team_win_or_draw', 'home_team_or_away_team_win', 'home_team_draw_no_bet', 'away_team_draw_no_bet', 'home_team_over_0_5_goals', 'home_team_over_1_5_goals', 'home_team_over_2_5_goals', 'away_team_over_0_5_goals', 'away_team_over_1_5_goals', 'away_team_over_2_5_goals', 'both_teams_to_score', 'total_goals_over_0_5', 'total_goals_over_1_5', 'total_goals_over_2_5', 'total_goals_over_3_5'
        ])->get();


        $requested_columns['data'] = $output_data;
        $requested_columns['recordsTotal'] = $total;
        $requested_columns['recordsFiltered'] = $filtered;

        return response()->json($requested_columns,200,[],JSON_UNESCAPED_UNICODE);
    }
}