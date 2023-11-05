<?php

namespace App\Models;

use App\Http\Builders\RequestBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $guarded = [];

    use HasFactory;
    public function newEloquentBuilder($query): RequestBuilder
    {
        return new RequestBuilder($query);
    }
    public function company(){
        return $this->BelongsTo(Company::class);
    }
    public function job(){
        return $this->BelongsTo(Job::class);
    }

}
