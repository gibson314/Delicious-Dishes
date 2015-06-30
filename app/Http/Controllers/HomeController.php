<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index () {
        return view ('home.index');
    }
    public function about () {
        $message = DB::table ('users')->get;
        return view ('home.about', compact('message'));
    }
}

