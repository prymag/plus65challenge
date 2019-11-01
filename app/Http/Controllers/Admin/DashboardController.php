<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        # code...
    }

    public function index()
    {
        # code...
        return view('admin.dashboard.index');
    }



}
