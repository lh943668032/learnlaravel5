<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //后台视图首页
    public function index()
    {
        return view('admin/home');
    }
}
