<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function websites() {

        $websites = Website::orderBy('created_at', 'DESC')->get();

        return view('management.websites', [
            'websites' => $websites
        ]);
    }

    public function website($website) {

       $website = Website::findOrFail($website);

        return view('management.website', [
            'website' => $website
        ]);
    }

    public function create() {

        return view('management.website_create');
    }

    public function store() {

        $data = request()->validate([
            'title' => 'required',
            'url' => 'required',
            'desc' => 'required',
            'used_tools' => 'required',
            'screenshot' => 'image:required'
        ]);

        if (!is_null(request('screenshot'))) {
            $ssPath = request('screenshot')->store('uploads', 'public');
        }
        else {
            $ssPath = null;
        }

        $created_website = auth()->user()->websites()->create([
            'title' => $data['title'],
            'url' => $data['url'],
            'desc' => $data['desc'],
            'used_tools' => $data['used_tools'],
            'screenshot' => $ssPath,
        ]);

        return redirect( route('portfolio.show', ['website' => $created_website->id]) );
    }

    public function destroy($website) {

        Website::findOrFail($website)->delete();

        return redirect( route( 'portfolio.index' ) );
    }
}
