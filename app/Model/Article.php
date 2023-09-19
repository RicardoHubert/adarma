<?php

namespace App\Model;

use App\User;
use App\Model\Writer;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(CategoryArticle::class, 'category_id', 'id');
    }

    public function editor_id()
    {
        return $this->belongsTo(User::class, 'editor', 'id');
    }

    public function relate_article1()
    {
        return $this->belongsTo(Article::class, 'relate_article_first', 'id');
    }

    public function relate_article2()
    {
        return $this->belongsTo(Article::class, 'relate_article_second', 'id');
    }

    public function writer_id()
    {
        return $this->belongsTo(Writer::class, 'writer', 'id');
    }
}
