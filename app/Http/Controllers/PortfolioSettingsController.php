<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioSettingsController extends Controller
{
    public function index() {

        return view('management.settings.index');
    }
}
