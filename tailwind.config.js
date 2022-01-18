const colors = require('tailwindcss/colors');

module.exports = {
    mode: 'jit',

    content: [
        './safelist.txt',
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './storage/framework/views/**/*.php',
    ],

    theme: {
        extend: {
            colors: {
                gray: colors.slate,
                primary: colors.emerald,
            },
            fontFamily: {
                sans: ['Poppins var', ...require('tailwindcss/defaultTheme').fontFamily.sans],
            },
            fontSize: {
                'base': '17px',
            },
        }
    },
};
