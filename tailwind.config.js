const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
        'bg-red-700',
        'bg-orange-700',
        'bg-amber-700',
        'bg-yellow-700',
        'bg-lime-700',
        'bg-green-700',
        'bg-emerald-700',
        'bg-teal-700',
        'bg-cyan-700',
        'bg-sky-700',
        'bg-blue-700',
        'bg-indigo-700',
        'bg-violet-700',
        'bg-purple-700',
        'bg-fuchsia-700',
        'bg-pink-700',
        'bg-rose-700',
    ],
    theme: {
        fontFamily: {
            display: ['"Quicksand"', 'sans-serif'],
            body: ['"IBM Plex Sans"', 'serif'],
        },
        extend: {
        },
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
