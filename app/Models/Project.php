<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function quotation(){
        return $this->belongsTo(Quotation::class);
    }

    public function log(){
        return $this->hasMany(Log::class);
    }
}
