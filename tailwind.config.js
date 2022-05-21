const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    mode: 'jit',

    content: [
        'app/**/*.php',
        'resources/css/**/*.pcss',
        'resources/views/**/*.blade.php',
        'safelist.txt',
        'storage/framework/views/**/*.php',
    ],

    theme: {
        extend: {
            colors: {
                blue: colors.sky,
                gray: colors.slate,
                green: colors.emerald,
            },
            fontSize: {
                base: '0.9777rem',
            },
        },
        fontFamily: {
            display: ['Poppins', ...defaultTheme.fontFamily.sans],
        },
    },

    plugins: [
        require('tailwind-children'),
    ],
};
