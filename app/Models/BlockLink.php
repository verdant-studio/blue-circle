<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockLink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'block_id',
        'icon',
        'link',
        'name',
    ];
}
