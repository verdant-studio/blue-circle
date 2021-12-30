<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockContent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'block_id',
        'content',
        'name',
    ];
}
