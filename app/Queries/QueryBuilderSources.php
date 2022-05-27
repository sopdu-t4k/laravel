<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Source;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBuilderSources implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Source::query();
    }

    public function getSources(): Collection
    {
        return Source::select(['id', 'title', 'url', 'created_at'])
                ->get();
    }

    public function getSource(int $id)
    {
        return Source::select(['id', 'title', 'url', 'created_at'])
               ->findOrFail($id);
    }
}
