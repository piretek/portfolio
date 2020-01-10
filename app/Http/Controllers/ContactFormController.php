<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\PortfolioSetting;

class ContactFormController extends Controller
{
    public function store() {

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'details' => 'required',
            'agreement' => 'accepted',
        ],
        [
            'agreement.accepted' => __('You must accept the agreement.'),
        ]);

        $setting = PortfolioSetting::find(1);

        Mail::to($setting->mail, 'Piotr Czarnecki')->send( new ContactMail( $data ) );

        session()->flash('status', __('Form submitted. Thank you!'));

        return redirect( '/#contact' );
    }
}
