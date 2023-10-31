<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordEdocational extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public $table = 'record_edocational';

    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
}
