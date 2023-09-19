<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
