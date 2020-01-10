<?php

namespace App\Http\Controllers;

use App\Website;
use App\PortfolioSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $websites = Website::orderBy('created_at', 'DESC')->get();

        $settings = PortfolioSetting::all();

        if (count($settings) == 0) {

            $setting = new PortfolioSetting;

            $setting->title = "Piotr Czarnecki";
            $setting->subtitle_en = "I don't know :)";
            $setting->subtitle_pl = "Nie wiem :)";
            $setting->mail = "piretek@piretek.pro";

            $setting->save();
        }

        $setting = PortfolioSetting::find(1);

        $title = Cache::remember('ProfileSettings.title',
            now()->addDays(7),
            function() use ($setting) {
                return $setting->title;
            }
        );

        $subtitle = Cache::remember('ProfileSettings.subtitle',
            now()->addDays(7),
            function() use ($setting) {

                if ( App::isLocale('pl') ) {
                    return $setting->subtitle_pl;
                }

                return $setting->subtitle_en;
            }
        );

        return view('welcome', [
            'websites' => $websites,
            'title' => $title,
            'subtitle' => $subtitle,
        ]);
    }
}
