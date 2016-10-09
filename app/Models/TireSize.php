<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TireRim;
use App\Models\TireRatio;

class TireSize extends Model
{
    public $guarded = [];

    public function rim()
    {
    	return $this->belongsTo(TireRim::class);
    }

    public function ratio()
    {
    	return $this->belongsTo(TireRatio::class);
    }
}
