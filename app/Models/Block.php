<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'site_id',
    ];

    /**
     * Get the site this block belongs to.
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * Get the links associated with the block.
     */
    // public function links()
    // {
    //     return $this->hasMany(BlockContent::class, 'id');
    // }
}
