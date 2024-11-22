<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
}
