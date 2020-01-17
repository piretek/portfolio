<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $guarded = [];

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function screenshot( $small = false ) {

        $filename = pathinfo(public_path('storage/'.$this->screenshot), PATHINFO_FILENAME);

        if ($small) return asset( 'storage/'.str_replace($filename, $filename.'-447-251' , $this->screenshot) );

        return asset( 'storage/'.$this->screenshot );
    }

    public function description() {

        if ( \App::isLocale('pl') ) {
            return $this->desc_pl;
        }

        return $this->desc_en;
    }
}
