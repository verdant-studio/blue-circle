<?php

namespace Database\Seeders;

use App\Models\PageTemplate;
use Illuminate\Database\Seeder;

class PageTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Based on the default Tailwind colors and selected for accessibility.
         */
        PageTemplate::create([
            'name'  => 'Default',
            'slug'  => 'default',
        ]);
        PageTemplate::create([
            'name'  => 'Weather',
            'slug'  => 'weather',
        ]);
        PageTemplate::create([
            'name'  => 'Contact',
            'slug'  => 'contact',
        ]);
    }
}
