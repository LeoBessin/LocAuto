/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.{html,js,php}","index.html"],
  theme: {
    extend: {
      fontFamily:{
        'barlow':['"barlow"'],
      }
    },
  },
  plugins: [],
}

