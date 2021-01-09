<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'active',
        'notes',
        'city_id',
        'image'
    ];

    public function city(){
        return $this->belongsTo(City::class/*,'city_id','id'*/);
    }
}
