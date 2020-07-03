let _ = require('lodash')
let flattenColorPalette = require('tailwindcss/lib/util/flattenColorPalette').default

module.exports = {

    purge: {
        content: [
            './tailwind.purgecss',
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
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelist: [],
            whitelistPatterns: [
                /-active$/,
                /-enter$/,
                /-leave-to$/,
                /show$/,
            ],
        },
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins var', ...require('tailwindcss/defaultTheme').fontFamily.sans],
            },
            fontSize: {
                'base': '17px',
            },
            opacity: {
                '10': '0.10',
                '20': '0.20',
                '30': '0.30',
                '85': '0.85',
                '90': '0.90',
                '95': '0.95',
                '96': '0.96',
                '97': '0.97',
                '98': '0.98',
                '99': '0.98',
            },
        },
    },

    variants: {
        display: ['responsive', 'last', 'hover', 'focus', 'group-hover'],
        backgroundColor: ['responsive', 'hover', 'focus', 'active'],
    },

    plugins: [
        require('@tailwindcss/ui'),

        function({ addUtilities, e, theme, variants }) {
            const colors = flattenColorPalette(theme('borderColor'))

            const utilities = _.flatMap(_.omit(colors, 'default'), (value, modifier) => ({
                [`.${e(`border-t-${modifier}`)}`]: { borderTopColor: `${value}` },
                [`.${e(`border-r-${modifier}`)}`]: { borderRightColor: `${value}` },
                [`.${e(`border-b-${modifier}`)}`]: { borderBottomColor: `${value}` },
                [`.${e(`border-l-${modifier}`)}`]: { borderLeftColor: `${value}` },
            }))

            addUtilities(utilities, variants('borderColor'))
        },
    ],
}
