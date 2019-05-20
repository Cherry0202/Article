<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//これ
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Cart;
//use App\Http\Controllers\Cart;

class DemocartController extends Controller
{
    //
    public function demo()
    {
        Cart::add('192ao12', 'Product 1', 1, 9.99);
        Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);

        return view('shoppingcart');
    }
}
