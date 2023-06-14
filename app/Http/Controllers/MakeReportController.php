<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MakeReportController extends Controller
{
    public function report(Request $request) {
        $date_from = $request->get('date_from');
        $date_to = $request->get('date_to');
        $user_name = $request->get('user_name');
        $division = $request->get('division');

        if($user_name != 0) {
            $result = DB::table('orders')->where('user_name', $user_name)->whereBetween('date', [$date_from, $date_to])->get();
            $arr = Array();
            $arr['user_name'] = $user_name;
            $arr['division'] = $result[0]->division;
            $arr['price'] = $result[0]->price;
            $arr['count'] = $result->count();
            $sum = 0;
            foreach ($result as $item) {
                $sum += $item->price;
            }
            $arr['sum'] = $sum;
            $rows[$user_name] = $arr;
            return view('reports.report-summary')->with('rows', $rows);
        }

if($division) {
    $result = DB::table('orders')->where('division', $division)->whereBetween('date', [$date_from, $date_to])->get();
    $rows = Array();
    foreach ($result as $user) {
        $item =  DB::table('orders')->where('division', $division)->where('user_name', $user->user_name)->whereBetween('date', [$date_from, $date_to])->get();
        $rows[$user->user_name] = [
            'id' => $user->id,
            'user_name' => $user->user_name,
            'division' => $user->division,
            'price' => $user->price,
            'count' => $item->count(),
            'sum' => $item->count() * $user->price,
        ];
    }
    return view('reports.report-summary')->with('rows', $rows);
}
//       dd($rows);
      else return back();
    }


}
