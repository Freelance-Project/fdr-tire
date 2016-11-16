<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NewsContent;
class NewsContentComment extends Model
{
    protected $table = 'news_content_comments';

    public $guarded = [];

    public function news()
    {
        return $this->belongsTo(NewsContent::class);
    }
}
