const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    mode: 'jit',

    content: [
        './safelist.txt',
        './app/**/*.php',
        './resources/markdown/**/*.md',
        './resources/views/**/*.blade.php',
        './storage/framework/views/**/*.php',
    ],

    theme: {
        extend: {
            colors: {
                gray: colors.slate,
                primary: colors.emerald,
            },
            fontFamily: {
                sans: ['Poppins var', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                'base': '17px',
            },
        }
    },
};
