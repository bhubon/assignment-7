<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function homeView() {
        return view('pages.home');
    }
}
