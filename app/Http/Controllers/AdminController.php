<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller{
    Public function  __construct(){
    $this->middleware('auth');

}

public function index(){
    return view('admin.dashboard.index');
}

}
