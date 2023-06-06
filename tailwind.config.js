/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.{html,js,php}","./phpFiles/widgets/html-part.php"],
  theme: {
    extend: {
      fontFamily:{
        'barlow':['"barlow"'],
      }
    },
  },
  plugins: [],
}

