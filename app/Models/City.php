<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id'
    ];


    public function students(){
        return $this->hasMany(Student::class);
        //we have id as primary key
        //we have city_id in students table as foriegn key
    }

    public function country(){
        //تابع الى
        return $this->belongsTo(Country::class);
        //we have country_id as forign key
        //we have id in countries table as primary key
    }
}
