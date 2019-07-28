<?php

namespace App\Http\Controllers\main_site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index() {

        return view('main_site.index');

    }

}
