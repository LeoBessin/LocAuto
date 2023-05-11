/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.{html,js,php}","car.php"],
  theme: {
    extend: {
      fontFamily:{
        'barlow':['"barlow"'],
      }
    },
  },
  plugins: [],
}

