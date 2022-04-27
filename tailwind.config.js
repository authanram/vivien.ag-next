const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    mode: 'jit',

    content: [
        './safelist.txt',
        './app/**/*.php',
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
                display: ['Poppins var', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                'base': '17px',
            },
        }
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
