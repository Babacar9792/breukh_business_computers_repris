/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,ts}",
    "./node_modules/flowbite/**/*.js" 

  ],
  theme: {
    extend: {},
    colors : {
      primary: "#272426",
      secondary : "#FFB26B",
      tertiary : "#3D6DB9",
      red : "#8A0303",
      white : "#FFFFFF",
      green : "008000"
    }
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

