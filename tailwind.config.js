/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      spacing: {
        '84': '21.0rem',
      },
    },
  },
  plugins: [
    // ...
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}