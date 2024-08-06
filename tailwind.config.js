/** @type {import('tailwindcss').Config} */

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    container: {
      center: true,
      padding: '16px',
    },

    extend: {
      colors: {
        primaryGrey: '#96B6C5',
        secondaryGrey: '#ADC4CE',
        mediumGrey: '#EEE0C9',
        lightGrey: '#F1F0E8',
        midGrey: '#8492A7',
        lightYellow: 'F8F8F5',
        dark: '#282938',
        bgJumboPg2: '#33000000'
      },
      screens: {
        '2xl': '1320px',
      },
      boxShadow: {
        'custom-shadow': '0 1px 4px 0 rgba(0, 0, 0, 0.16)',
      },
    },
  },
  plugins: [

  ],
}

