const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        colors: {
            primary: {
                50: '#f7f9f7',
                100: '#eef4ef',
                200: '#d5e3d6',
                300: '#bcd2bd',
                400: '#8ab18c',
                500: '#588f5b',
                600: '#4f8152',
                700: '#426b44',
                800: '#355637',
                900: '#2b462d',
            },
            secondary: {
                50: '#fdfdfd',
                100: '#fcfbfa',
                200: '#f6f5f3',
                300: '#f1efec',
                400: '#e7e4de',
                500: '#dcd8d0',
                600: '#c6c2bb',
                700: '#a5a29c',
                800: '#84827d',
                900: '#6c6a66',
            },
            tertiary: {
                50: '#f7fbfb',
                100: '#eff6f7',
                200: '#d7e9ec',
                300: '#bfdbe0',
                400: '#90c0c8',
                500: '#60a5b1',
                600: '#56959f',
                700: '#487c85',
                800: '#3a636a',
                900: '#2f5157'
            },
            red: {
                100: '#fee2e2',
                600: '#dc2626',
                800: '#991b1b'
            },
            transparent: 'transparent',
            black: '#000',
            white: '#fff',
        },
        fontFamily: {
            display: ['"Quicksand"', 'sans-serif'],
            body: ['"IBM Plex Sans"', 'serif'],
        },
        extend: {
        },
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
