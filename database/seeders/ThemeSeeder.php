<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
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
        Theme::create([
            'name'     => 'Red',
            'color'    => 'red-700',
        ]);
        Theme::create([
            'name'     => 'Orange',
            'color'    => 'orange-700',
        ]);
        Theme::create([
            'name'     => 'Amber',
            'color'    => 'amber-700',
        ]);
        Theme::create([
            'name'     => 'Yellow',
            'color'    => 'yellow-700',
        ]);
        Theme::create([
            'name'     => 'Lime',
            'color'    => 'lime-700',
        ]);
        Theme::create([
            'name'     => 'Green',
            'color'    => 'green-700',
        ]);
        Theme::create([
            'name'     => 'Emerald',
            'color'    => 'emerald-700',
        ]);
        Theme::create([
            'name'     => 'Teal',
            'color'    => 'teal-700',
        ]);
        Theme::create([
            'name'     => 'Cyan',
            'color'    => 'cyan-700',
        ]);
        Theme::create([
            'name'     => 'Sky',
            'color'    => 'sky-700',
        ]);
        Theme::create([
            'name'     => 'Blue',
            'color'    => 'blue-700',
        ]);
        Theme::create([
            'name'     => 'Indigo',
            'color'    => 'indigo-700',
        ]);
        Theme::create([
            'name'     => 'Violet',
            'color'    => 'violet-700',
        ]);
        Theme::create([
            'name'     => 'Purple',
            'color'    => 'purple-700',
        ]);
        Theme::create([
            'name'     => 'Fuchsia',
            'color'    => 'fuchsia-700',
        ]);
        Theme::create([
            'name'     => 'Pink',
            'color'    => 'pink-700',
        ]);
        Theme::create([
            'name'     => 'Rose',
            'color'    => 'rose-700',
        ]);
    }
}
