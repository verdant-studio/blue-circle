<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTemplate extends Model
{
    /**
      * The attributes that are mass assignable.
      *
      * @var string[]
      */
    protected $fillable = [
        'name',
        'slug',
    ];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
