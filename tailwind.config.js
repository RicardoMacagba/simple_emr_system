import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                turquoise: '#40E0D0', // hex code for turquoise
                seaGreen: '#2E8B57',
                darkGreen: '#006400',
                lightGreen: '#90EE90',
                lightBlue: '#ADD8E6',
                lightGrey: '#D3D3D3',
                lightPink: '#FFB6C1',
            },
        },
    },
    // add require for colotrs
    plugins: [forms, typography, colors],
};