<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['city_name'];

    public function college()
    {
        return $this->hasMany('App\Models\College','city_id');
    }
}
