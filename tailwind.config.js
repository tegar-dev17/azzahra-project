/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['index.html'],
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    colors: {
      black: '#333333',
      blue: '#334982',
      grey: '#f3f3f3',
      orange: '#fdb913',
      pink: '#e40087',
      purple: '#782b8f',
      red: '#dd372f',
      teal: '#00857d',
      white: '#fff',
    },
    extend: {
      colors: {
        primary: '#FF0066',
        dark: '#6b21a8',
        putih: '#FFFFFF',
      },
      screens: {
        'sm1': '400px',
        '2xl': '1320px',
      },
      fontFamily:{
        'poli': ['Ramabhadra']
      }
    },
  },
  variants: {},
  plugins: [],
  experimental: {
    applyComplexClasses: true,
  },
  plugins: [],
}

