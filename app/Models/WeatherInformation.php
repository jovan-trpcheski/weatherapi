<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherInformation extends Model
{
    use HasFactory;
    protected $fillable = ['city_id','temperature','humidity','description'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
