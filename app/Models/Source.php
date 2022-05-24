<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    public function getSources()
    {
        return DB::table($this->table)
                ->select(['id', 'title', 'url', 'created_at'])
                ->get();
    }

    public function getSource(int $id)
    {
        return DB::table($this->table)
               ->select(['id', 'title', 'url', 'created_at'])
               ->find($id);
    }
}
