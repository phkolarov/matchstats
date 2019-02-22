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
                        $data->where($column['data'], 'like', '%'.$searched_data.'%');
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
        $output_data = $data->skip($skip)->limit($limit)->get();

        $requested_columns['data'] = $output_data;
        $requested_columns['recordsTotal'] = $total;
        $requested_columns['recordsFiltered'] = $filtered;

        return response()->json($requested_columns,200,[],JSON_UNESCAPED_UNICODE);
    }
}