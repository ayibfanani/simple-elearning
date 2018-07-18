<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'user_id', 'title', 'subtitle', 'duration', 'content', 'thumb', 'attachments'
    ];

    protected $casts = [
        'attachments' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
