import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'purple-theme':"#8e7cc3",
                'purple-lighter-theme' :"#b8b1cc", 
                'purple-dark-theme':"#5b4f80",
                'purple-darker-theme':"#342d4a"
            }
        },
    },

    plugins: [forms],
    
    darkMode: 'class',
};