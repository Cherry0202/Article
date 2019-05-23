<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about() {

        // 変数に値をセット
        $first_name = "Chisei";
        $last_name = "Yamaguchi";

        // view関数の第２引数に compact関数を使う
        return view('pages.about', compact('first_name', 'last_name'));
    }

    public function contact()
    {
        return view("contact");  // (a) view 関数に変更
    }

}
