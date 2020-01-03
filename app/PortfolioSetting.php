<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioSetting extends Model
{
    protected $fillable = ['title', 'subtitle', 'mail'];
}
