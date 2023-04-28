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
            width: {
                '422': '422px',
            },
            colors: {
                'blue': '#2029F3',
                'light-blue': 'rgba(32, 41, 243, 0.08)',
                'green': '#0FBA68',
                'light-green': 'rgba(15, 186, 104, 0.08)',
                'input-green': '#249E2C',
                'teal': '#0DC9BE',
                'gray': '#808189',
                'light-gray': '#E6E6E7',
                'table-color': '#F6F6F7',
                'red': '#CC1E1E',
                'yellow': '#EAD621',
                'light-yellow': 'rgba(234, 214, 33, 0.08)',
            },
        },
        screens: {
            'xs': '370px',
            'sm': '576px',
            '2sm': '710px',
            'md': '960px',
            'lg': '1440px',
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('tailwind-scrollbar'),
    ],
}


