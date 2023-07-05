<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'Posts'; //defining table name

    protected $guarded = ['created_at', 'updated_at'];

    //Mentioning that published_at will be date type
    protected $dates = [
        'published_at',
    ];

    //Relation between user_id from user table so we can get user info along with post info.
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
