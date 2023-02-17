/** @type {import('tailwindcss').Config} */

module.exports = {
  content: [
    '**/*.php',
    '*.php',
  ],
  theme: {
    colors: {
      inherit: 'inherit',
      current: 'currentColor',
      transparent: 'transparent',
      black: '#383839',
      gray: '#dadad5',
      white: '#ffffff',
      red: '#ff805b',
      yellow: '#e4ff6a',
      green: '#69a880',
      blue: '#a6ced7',
      indigo: '#5878c5',
      purple: '#ba80ff',
    },

    extend: {
      fontSize: { unset: 'unset' },
      fill: (theme) => ({ ...theme('colors'), none: 'none' }),
      stroke: (theme) => ({ ...theme('colors'), none: 'none' }),
    },
  },
  plugins: [],
}
