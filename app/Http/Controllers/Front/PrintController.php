<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function printView(Request $request)
    {
        $name= $request->name;
        $price= $request->price;
        $date= $request->date;

        return view('pages.order_print', [
            'name' => $name,
            'price' => $price,
            'date' => $date,

        ]);
    }
}
