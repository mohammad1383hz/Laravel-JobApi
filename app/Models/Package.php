<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    use HasFactory;
    public function companies(){

        return $this->belongsToMany(Company::class);

       }
}
