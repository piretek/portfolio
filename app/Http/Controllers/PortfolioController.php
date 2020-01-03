<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
    }

    public function websites() {

        $websites = Website::orderBy('created_at', 'DESC')->get();

        return view('management.websites.websites', [
            'websites' => $websites
        ]);
    }

    public function website( Website $website) {

        return view('management.websites.website', [
            'website' => $website
        ]);
    }

    public function create() {

        return view('management.websites.website_create');
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

        session()->flash('status', __('Created successfully') );

        return redirect( route('portfolio.show', ['website' => $created_website->id]) );
    }

    public function modify( Website $website) {

        $data = request()->validate([
            'title' => 'required',
            'url' => 'required',
            'desc' => 'required',
            'used_tools' => 'required',
            'screenshot' => 'image'
        ]);

        $website->title = $data['title'];
        $website->url = $data['url'];
        $website->desc = $data['desc'];
        $website->used_tools = $data['used_tools'];

        if (!is_null(request('screenshot'))) {

            Storage::delete($website->screenshot);
            $ssPath = request('screenshot')->store('uploads', 'public');

            $data['screenshot'] = $ssPath;
            $website->screenshot = $data['screenshot'];
        }

        $website->save();

        session()->flash('status', __('Updated successfully') );

        return redirect( route('portfolio.show', ['website' => $website->id]) );
    }

    public function destroy( Website $website) {

        Storage::delete($website->screenshot);

        $website->delete();

        session()->flash('status', __('Deleted successfully') );

        return redirect( route( 'portfolio.index' ) );
    }
}
