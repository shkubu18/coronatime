/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
    ],
    theme: {
        extend: {
            height: {
                '600': '600px',
            },
        },
        screens: {
            'xs': '370px',
            'sm': '576px',
            'md': '960px',
            'lg': '1440px',
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('tailwind-scrollbar'),
    ],
}


