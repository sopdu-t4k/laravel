<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews()
    {
        return DB::table($this->table)
                ->join('sources', 'news.source_id', '=', 'sources.id')
                ->select(['news.id', 'news.title', 'news.slug', 'news.preview', 'news.image', 'news.status', 'news.created_at', 'sources.title as source'])
                ->orderBy('news.created_at', 'desc')
                ->get();
    }

    public function getNewsById(int $id)
    {
        return DB::table($this->table)
                ->join('sources', 'news.source_id', '=', 'sources.id')
                ->select(['news.id', 'news.category_id', 'news.title', 'news.preview', 'news.image', 'news.status', 'news.created_at', 'sources.title as source'])
                ->where('news.id', '=', $id)
                ->first();
    }

    public function getNewsByCategory(int $id)
    {
        return DB::table($this->table)
                ->join('sources', 'news.source_id', '=', 'sources.id')
                ->select(['news.id', 'news.category_id', 'news.title', 'news.slug', 'news.preview', 'news.image', 'news.status', 'news.created_at', 'sources.title as source'])
                ->where('news.category_id', '=', $id)
                ->orderBy('news.created_at', 'desc')
                ->get();
    }
}
