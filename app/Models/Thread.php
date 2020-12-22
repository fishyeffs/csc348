<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    public function comments() {
        return $this->hasMany("App\Models\Comments");
    }

    public function user() {
        return $this->belongsTo("App\Models\User");
    }
}
