<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = ['id'];

    const STORE_RULES = [
        'title' => 'required',
        'body' => 'required | min:15',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');   //u zagradu smo mogli da stavimo i 'user'
    }

    public static function publishedPosts()
    {
        return self::where('published', false);
    }
}
