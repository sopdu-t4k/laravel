<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBuilderNews implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return News::query();
    }

    public function getNews(): LengthAwarePaginator
    {
        return News::join('sources', 'news.source_id', '=', 'sources.id')
                ->select(['news.id', 'news.title', 'news.slug', 'news.preview', 'news.image', 'news.status', 'news.created_at', 'sources.title as source'])
                ->orderBy('news.created_at', 'desc')
                ->paginate(15);
    }

    public function getNewsPublic(): LengthAwarePaginator
    {
        return News::join('sources', 'news.source_id', '=', 'sources.id')
                ->select(['news.id', 'news.title', 'news.slug', 'news.preview', 'news.image', 'news.status', 'news.created_at', 'sources.title as source'])
                ->active()
                ->orderBy('news.created_at', 'desc')
                ->paginate(9);
    }

    public function getNewsById(int $id)
    {
        return News::select('id', 'category_id', 'source_id', 'title', 'slug', 'image', 'status', 'preview', 'created_at')
                ->with('source')
                ->findOrFail($id);
    }

    public function getNewsByCategory(int $id)
    {
        return News::join('sources', 'news.source_id', '=', 'sources.id')
                ->select(['news.id', 'news.category_id', 'news.title', 'news.slug', 'news.preview', 'news.image', 'news.status', 'news.created_at', 'sources.title as source'])
                ->where('news.category_id', '=', $id)
                ->active()
                ->orderBy('news.created_at', 'desc')
                ->get();
    }
}
