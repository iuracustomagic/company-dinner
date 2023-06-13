<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show()
    {
        return view('pages.home', [
            'user' =>''
        ]);
    }
    public function check(Request $request)
    {
        $number = $request->input('number');
        $today = date("Y-m-d");
$userCard = DB::table('user_card')->where('number', $number)->first();
if(isset($userCard->id)) {
    $user = DB::table('users')->where('id', $userCard->user_id)->first();
    $division = DB::table('divisions')->where('id', $user->division_id)->first();
    $menuType = DB::table('menu_type')->where('id', $userCard->menu_id)->first();
}


$userList = DB::table('user_list')->where('date_from', '<=', $today)->where('date_to', '>=', $today)->get();


if(isset($user->id)) {
    if(!empty($userList)) {
        foreach ($userList as $item ) {

            $users = json_decode($item->users);


            foreach ($users as $key) {
//                dd($key->user_card, $number);
                $today_lists = DB::table('orders')->where('date', $today)->get();
                foreach($today_lists as $today_list) {
                    if($today_list->user_name == $user->name) {
                        if($userCard->admin) {
                            break;
//                        return view("pages.admin", ['name' => $user->name, 'price'=> $key->price, 'date' => date("Y-m-d")]);
                        }
                      else return redirect("/")->with('message-error', 'Вы уже оформляли заказ');
                    }
                }
                if($key->user_card == $number ) {
                    $order = new Order();
                    $order->user_name = $user->name;
                    $order->division = $division->name;
                    $order->menu_type = $menuType->name;
                    $order->price = $key->price;
                    $order->date = date("Y-m-d");
                    $order->save();
                    return view("pages.order", ['order' => $order, 'admin' => $userCard->admin]);
//                    return redirect("/")->with('order', $order) ;
                }
            };

//            if ( DB::table('list_user')->where('list_id', $item->id)->where('user_id', $user->id)->exists()) {
//
//                return redirect("/")->with('message-success', 'Вы успешно оформили заказ') ;
//            }
//            else return redirect("/")->with('message-error', 'Вас нет в списке');
        }
        return redirect("/")->with('message-error', 'Вас нет в списке');
    }
} else return redirect("/")->with('message-error', 'У вас нет карты');




//        return redirect('/users');
    }
}
