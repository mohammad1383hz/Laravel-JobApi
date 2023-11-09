<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory,
    HasApiTokens;
    protected $guarded = [];
    public function packages(){

     return $this->belongsToMany(Package::class);

    }
    public function jobs(){

        return $this->hasMany(Job::class);

       }
       public function requests(){
        return $this->hasMany(Request::class);
       }
}
