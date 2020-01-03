<?php

namespace App\Http\Controllers;

use App\Website;
use App\PortfolioSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $websites = Website::all();
        $setting = PortfolioSetting::find(1);
        $settings = PortfolioSetting::all();

        $title = Cache::remember('psettings.title',
            now()->addDays(7),
            function() use ($settings) {
                return $settings['title'];
            }
        );

        $subtitle = Cache::remember('psettings.subtitle',
            now()->addDays(7),
            function() use ($settings) {
                return $settings['subtitle'];
            }
        );

        return view('welcome', [
            'websites' => $websites,
            'title' => $title,
            'subtitle' => $subtitle,
        ]);
    }
}
