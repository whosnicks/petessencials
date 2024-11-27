/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,
  content: ["./**/*.php", "./assets/js/**/*.js", "./assets/css/**/*.css"],
  theme: {
    extend: {
      backgroundImage: {
        "hero-pattern":
          "url('https://wallpapers.com/images/featured/dog-wj7msvc5kj9v6cyy.jpg')",
      },
      dropShadow: {
        dark: "0 0 0 red",
      },
    },
  },
  plugins: [],
}
