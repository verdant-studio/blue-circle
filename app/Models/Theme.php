<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    /**
      * The attributes that are mass assignable.
      *
      * @var string[]
      */
    protected $fillable = [
        'name',
        'color',
    ];

    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}
