/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.{html,js,php}","index.php"],
  theme: {
    extend: {
      fontFamily:{
        'barlow':['"barlow"'],
      }
    },
  },
  plugins: [],
}

