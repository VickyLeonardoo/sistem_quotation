<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.viewIndex',[
                'title' => 'Home',
                'slug' => '',
            ]);
        } else {
            return view('karyawan.viewIndex',[
                'title' => 'Home',
                'slug' => '',
            ]);
        }

    }
}
