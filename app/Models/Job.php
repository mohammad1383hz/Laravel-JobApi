<?php

namespace App\Models;

use App\Http\Builders\JobBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    protected $guarded = [];

    use HasFactory;
    public function newEloquentBuilder($query): JobBuilder
    {
        return new JobBuilder($query);
    }
    public function company(){
        return $this->BelongsTo(Company::class);
    }
    public function category(){
        return $this->BelongsTo(Category::class);
    }
    public function city(){
        return $this->BelongsTo(City::class);
    }
    public function province(){
        return $this->BelongsTo(province::class);
    }
    public function requests(){
        return $this->hasMany(Request::class);
       }

}
