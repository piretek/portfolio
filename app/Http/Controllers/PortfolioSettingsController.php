<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PortfolioSetting;

class PortfolioSettingsController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {

        $settings = PortfolioSetting::all();

        return view('management.settings.index', compact('settings'));
    }

    public function modify() {

        $data = request()->validate([
            'id' => 'integer:required',
            'title' => '',
            'subtitle_en' => '',
            'subtitle_pl' => '',
            'mail' => 'required|email',
        ]);

        $setting = PortfolioSetting::findOrFail($data['id']);

        $setting->update( $data );

        session()->flash( 'status', __('Updated successfully') );

        return redirect( route('settings-portfolio.index') );
    }
}
