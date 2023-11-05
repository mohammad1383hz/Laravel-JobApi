<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favourite extends Model
{
    use HasFactory,
    HasApiTokens;
    protected $guarded = [];
    public function job(){

     return $this->belongsToMany(Job::class);

    }
    public function user(){

        return $this->belongsToMany(User::class);

       }

}
