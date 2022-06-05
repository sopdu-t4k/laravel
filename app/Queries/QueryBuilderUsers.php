<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBuilderUsers implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return User::query();
    }

    public function getUsers(): Collection
    {
        return User::select(['id', 'name', 'email', 'is_admin', 'created_at'])
                ->get();
    }

    public function updateIsAdmin(array $keys, bool $is_admin): int
    {
        return User::whereIn('id', $keys)
                ->update(['is_admin' => $is_admin]);
    }
}
