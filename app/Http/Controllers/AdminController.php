<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request){
        return view('dashboard');
    }

    public function config(Request $request){
        return view('configuração');
    }

}
