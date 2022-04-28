const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/filament/forms/resources/views/**/*.blade.php',
        './vendor/filament/tables/resources/views/**/*.blade.php',
        './vendor/usernotnull/tall-toasts/config/**/*.php',
        './vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php',
    ],
    theme: {
       screens: {
            'xxs': '375px',
            'xs': '475px',
            ...defaultTheme.screens,
        },
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.red,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
