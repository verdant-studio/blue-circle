<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'description',
    ];

    /**
     * Get the articles associated with the blog.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
