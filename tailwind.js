/*

Tailwind - The Utility-First CSS Framework

A project by Adam Wathan (@adamwathan), Jonathan Reinink (@reinink),
David Hemphill (@davidhemphill) and Steve Schoger (@steveschoger).

Welcome to the Tailwind config file. This is where you can customize
Tailwind specifically for your project. Don't be intimidated by the
length of this file. It's really just a big JavaScript object and
we've done our very best to explain each section.

View the full documentation at https://tailwindcss.com.

*/

// const defaultConfig = require('tailwindcss/defaultConfig')()

const colors = {
  transparent: 'transparent',
  current: 'currentColor',
  inherit: 'inherit',

  black: '#000',
  'dark-gray': '#222',
  gray: '#e6e6e6',
  white: '#fff',

  red: '#f93838',
  lime: '#0f0',
  cyan: '#0ff',
  magenta: '#f0f',
  yellow: '#ff0',
}

const scaleObject = {}
const scale = { step: 5, limit: 60 }
Array(scale.limit / scale.step).fill()
  .map((x, i) => (i + 1) * scale.step + 'px')
  .forEach((value, key) => {
    scaleObject[(key + 1) * scale.step] = value
  })

const spacing = {
  px: '1px',
  border: '2px',
  0: '0',
  ...scaleObject,
  85: '85px',
  160: '160px',
}

const sizing = {
  auto: 'auto',
  px: '1px',
  15: '15px',
  20: '20px',
  25: '25px',
  30: '30px',
  35: '35px',
  40: '40px',
  45: '45px',
  50: '50px',
}

module.exports = {
  colors: colors,

  screens: {
    xs: '360px',
    sm: '480px',
    md: '768px',
    lg: '992px',
    xl: '1200px',
  },

  fonts: {
    aileron: [
      'Aileron',
      'system-ui',
      'BlinkMacSystemFont',
      '-apple-system',
      'Segoe UI',
      'Roboto',
      'Oxygen',
      'Ubuntu',
      'Cantarell',
      'Fira Sans',
      'Droid Sans',
      'Helvetica Neue',
      'sans-serif',
    ],
    nimbus: [
      'NimbusSanL',
      'system-ui',
      'BlinkMacSystemFont',
      '-apple-system',
      'Segoe UI',
      'Roboto',
      'Oxygen',
      'Ubuntu',
      'Cantarell',
      'Fira Sans',
      'Droid Sans',
      'Helvetica Neue',
      'sans-serif',
    ],
    oswald: [
      'Oswald',
      'system-ui',
      'BlinkMacSystemFont',
      '-apple-system',
      'Segoe UI',
      'Roboto',
      'Oxygen',
      'Ubuntu',
      'Cantarell',
      'Fira Sans',
      'Droid Sans',
      'Helvetica Neue',
      'sans-serif',
    ],
  },

  textSizes: {
    unset: 'unset',
    12: '12px',
    14: '14px',
    15: '15px',
    16: '16px',
    17: '17px',
    18: '18px',
    19: '19px',
    20: '20px',
    22: '22px',
    24: '24px',
    28: '28px',
    29: '29px',
    36: '36px',
    41: '41px',
    53: '53px',
    92: '92px',
    '5vw': '5vw',
  },

  fontWeights: {
    hairline: 100,
    thin: 200,
    light: 300,
    normal: 400,
    medium: 500,
    semibold: 600,
    bold: 700,
    extrabold: 800,
    black: 900,
  },

  leading: {
    none: 1,
    // 'tight': 1.1,
    normal: 1.2,
    loose: 2,
  },

  tracking: {
    tight: '-0.05em',
    normal: '0',
    wide: '0.05em',
  },

  textColors: colors,

  backgroundColors: colors,

  backgroundSize: {
    auto: 'auto',
    cover: 'cover',
    contain: 'contain',
  },

  borderWidths: {
    default: '2px',
    px: '1px',
    0: '0',
  },

  borderColors: global.Object.assign({
    default: colors.current,
  }, colors),

  borderRadius: {
    default: '0.25rem',
    0: '0',
    full: '9999px',
  },

  width: global.Object.assign({
    '1/2': '50%',
    '1/3': '33.33333%',
    '2/3': '66.66667%',
    '1/4': '25%',
    '3/4': '75%',
    '1/5': '20%',
    '2/5': '40%',
    '3/5': '60%',
    '4/5': '80%',
    '1/6': '16.66667%',
    '5/6': '83.33333%',
    '1/10': '10%',
    '3/10': '30%',
    '7/10': '70%',
    full: '100%',
    screen: '100vw',
  }, sizing),

  height: global.Object.assign({
    0: '0',
    full: '100%',
    'screen-80': '80vh',
    screen: '100vh',
  }, sizing),

  minWidth: {
    0: '0',
    full: '100%',
  },

  minHeight: {
    0: '0',
    full: '100%',
    screen: '100vh',
  },

  maxWidth: {
    90: '90px',
    full: '100%',
    'screen-xs': '360px',
    'screen-sm': '480px',
    'screen-md': '768px',
    'screen-lg': '992px',
    'screen-xl': '1200px',
  },

  maxHeight: {
    none: 'none',
    full: '100%',
    screen: '100vh',
  },

  padding: global.Object.assign({}, spacing),

  margin: global.Object.assign({
    auto: 'auto',
  }, spacing),

  negativeMargin: global.Object.assign({}, spacing),

  shadows: {
    default: '0 2px 4px 0 rgba(0,0,0,0.10)',
    md: '0 4px 8px 0 rgba(0,0,0,0.12), 0 2px 4px 0 rgba(0,0,0,0.08)',
    lg: '0 15px 30px 0 rgba(0,0,0,0.11), 0 5px 15px 0 rgba(0,0,0,0.08)',
    inner: 'inset 0 2px 4px 0 rgba(0,0,0,0.06)',
    outline: '0 0 0 3px rgba(52,144,220,0.5)',
    none: 'none',
  },

  zIndex: {
    auto: 'auto',
    0: 0,
    10: 10,
    20: 20,
    30: 30,
    40: 40,
    50: 50,
  },

  opacity: {
    0: '0',
    2: '0.025',
    5: '0.05',
    10: '0.1',
    30: '0.3',
    70: '0.7',
    100: '1',
  },

  svgFill: {
    current: colors.current,
  },

  svgStroke: {
    current: colors.current,
  },

  /*
  |-----------------------------------------------------------------------------
  | Modules                  https://tailwindcss.com/docs/configuration#modules
  |-----------------------------------------------------------------------------
  |
  | Here is where you control which modules are generated and what variants are
  | generated for each of those modules.
  |
  | Currently supported variants:
  |   - responsive
  |   - hover
  |   - focus
  |   - active
  |   - group-hover
  |
  | To disable a module completely, use `false` instead of an array.
  |
  */

  modules: {
    appearance: ['responsive'],
    backgroundAttachment: false,
    backgroundColors: ['hover', 'hocus', 'group-hover', 'group-focus', 'group-hocus'],
    backgroundPosition: [],
    backgroundRepeat: [],
    backgroundSize: [],
    borderCollapse: [],
    borderColors: [],
    borderRadius: [],
    borderStyle: ['responsive'],
    borderWidths: ['responsive'],
    cursor: [],
    display: ['responsive', 'hover', 'group-hover', 'group-focus'],
    flexbox: ['responsive', 'hover', 'group-hover', 'group-focus'],
    float: [],
    fonts: [],
    fontWeights: ['responsive'],
    height: ['responsive'],
    leading: ['responsive'],
    lists: ['responsive'],
    margin: ['responsive'],
    maxHeight: ['responsive'],
    maxWidth: ['responsive'],
    minHeight: ['responsive'],
    minWidth: ['responsive'],
    negativeMargin: ['responsive'],
    objectFit: [],
    objectPosition: [],
    opacity: ['hover', 'group-hover', 'group-hocus'],
    outline: ['focus'],
    overflow: ['responsive'],
    padding: ['responsive'],
    pointerEvents: [],
    position: ['responsive'],
    resize: false,
    shadows: false,
    svgFill: [],
    svgStroke: [],
    tableLayout: false,
    textAlign: ['responsive'],
    textColors: ['responsive', 'hover', 'hocus'],
    textSizes: ['responsive'],
    textStyle: ['responsive'],
    tracking: [],
    userSelect: false,
    verticalAlign: false,
    visibility: [],
    whitespace: [],
    width: ['responsive'],
    zIndex: [],
  },

  /*
  |-----------------------------------------------------------------------------
  | Plugins                                https://tailwindcss.com/docs/plugins
  |-----------------------------------------------------------------------------
  |
  | Here is where you can register any plugins you'd like to use in your
  | project. Tailwind's built-in `container` plugin is enabled by default to
  | give you a Bootstrap-style responsive container component out of the box.
  |
  | Be sure to view the complete plugin documentation to learn more about how
  | the plugin system works.
  |
  */

  plugins: [
    require('tailwindcss-interaction-variants')(),
    require('tailwindcss-background-extended')(),

    require('tailwindcss-alpha')({
      modules: { backgroundColors: true, textColors: true },
    }),
    require('tailwindcss-inset')({
      insets: { full: '100%' },
    }),
    require('tailwindcss-multi-column')({
      variants: ['responsive'],
      counts: [1, 2],
    }),
    require('tailwindcss-aspect-ratio')({
      ratios: {
        '1/1': [1, 1],
        '16/9': [16, 9],
      },
    }),
    require('tailwindcss-spinner')({
      name: 'is-loading',
      color: '#000',
      size: '1em',
      border: '2px',
    }),
  ],

  /*
  |-----------------------------------------------------------------------------
  | Advanced Options         https://tailwindcss.com/docs/configuration#options
  |-----------------------------------------------------------------------------
  |
  | Here is where you can tweak advanced configuration options. We recommend
  | leaving these options alone unless you absolutely need to change them.
  |
  */

  options: {
    prefix: '',
    important: false,
    separator: ':',
  },

}
