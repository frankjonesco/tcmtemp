import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            
            colors: {

                // ACTION TYPE COLORS
    
                primary: colors.indigo,
                secondary: colors.stone,
                success: colors.green,
                danger: colors.red,
                warning: colors.yellow,
                info: colors.sky,
                action: colors.purple,
                dark: colors.black,
                light: colors.white,
    
            },

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
