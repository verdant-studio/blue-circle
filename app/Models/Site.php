<?php

namespace App\Models;

use App\Models\Setting;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'description',
        'intro',
        'name',
        'slug',
        'theme_id',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the user that owns the site.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category associated with the site.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the category associated with the site.
     */
    public function theme()
    {
        return $this->hasOne(Theme::class, 'id');
    }

    /**
     * Search for products related to the site.
     */
    public static function getSearchProducts($query, $limit)
    {
        $settings = Setting::first();

        $key = $settings->bol_com_api_key ?? null;

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request('GET', 'https://api.bol.com/catalog/v4/search/?q='.$query.'&offset=0&limit='.$limit.'&dataoutput=products&apikey='.$key.'&format=json');

            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody()->getContents(), true);

                return collect($data['products']);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();

            return collect([]);
        }
    }
}
