<?php

namespace App;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Cache;

class Geolocation {

    public $language;

    public function __construct( $ignore_cache = false ) {
        $cache_id = 'lang-'.str_replace('.','',Request::ip());

        if ($ignore_cache) {
            $this->language = strtolower( $this->request() );
        }
        else {
            if ( Cache::has($cache_id) ) {
                $this->language = Cache::get($cache_id);
            }
            else {
                $this->language = strtolower( $this->request() );
                Cache::add($cache_id, $this->language, now()->addDays(1));
            }
        }
    }

    public function __toString() {
        return $this->language === null ? 'en' : $this->language;
    }

    protected final function request() {
        // Thanks to geoplugin.com for great geolocation service.

        $request = curl_init( 'http://www.geoplugin.net/json.gp?ip='.Request::ip() );
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($request);
        curl_close($request);

        $response = json_decode($output, true);

        if ($response !== null){
            return $response['geoplugin_countryCode'] !== null ? $response['geoplugin_countryCode'] : 'en';
        }
        else {
            return 'en';
        }
    }
}
