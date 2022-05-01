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
                green: colors.emerald,
                primary: colors.pink,
            },
            fontFamily: {
                display: ['Poppins', ...defaultTheme.fontFamily.sans],
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
