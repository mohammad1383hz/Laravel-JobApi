<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyValue extends Model
{
    protected $guarded = [];
    protected $table = 'property_value';


    use HasFactory;
}
