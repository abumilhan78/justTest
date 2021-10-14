<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    protected $fillable = ['city_id','college_name'];

    public function city()
    {
    	return $this->belongsTo('App\Models\City', 'city_id');
    }
}
