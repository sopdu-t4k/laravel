<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Review;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBuilderReviews implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Review::query();
    }

    public function getReviews(): Collection
    {
        return Review::select(['id', 'name', 'message', 'created_at'])
                ->orderBy('created_at', 'desc')
                ->get();
    }
}
