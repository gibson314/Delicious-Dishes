<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cart;
class HomeController extends Controller
{
    public function index () {
        return view ('home.index');
    }
    public function about () {

        Cart::add('192ao12', 'Product 1', 1, 9.99);
        Cart::add('1239ad0', 'Product 2', 2, 5.95, array('size' => 'large'));
        $cart = Cart::content();
        return view ('home.about', compact('cart'));
    }
}

