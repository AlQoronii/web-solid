/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
export default {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            poppins: ["Poppins", ...defaultTheme.fontFamily.sans],
        },
        colors: {
            "white-snow": "#FFFAFA",
            "soft-snow": "#F2F1F4",
            "green-light": "#AFFF49",
            "azure-blue": "#3384FF",  
            "blue-gray": "#E8F1FF",
            "navy-night": "#0B1215",
        },
    },
  },
  plugins: [],
}

