<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'noOfComments',
        'user_id',
        'img'
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
