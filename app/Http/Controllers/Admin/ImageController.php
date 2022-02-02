<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ImageController extends Controller
{
    public function store()
    {
        $article = new Article();
        $article->id = 0;
        $article->exists = true;
        $image = $article->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl('thumb')
        ]);
    }
}
