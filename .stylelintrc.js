module.exports = {
  extends: [
    'stylelint-config-standard',
  ],
  rules: {
    'at-rule-empty-line-before': [
      'always', {
        except: ['inside-block', 'blockless-after-same-name-blockless', 'first-nested'],
        ignore: ['after-comment'],
        ignoreAtRules: ['apply', 'screen', 'font-face'],
      },
    ],
    'at-rule-no-unknown': [
      true, {
        ignoreAtRules: ['tailwind', 'variants', 'responsive', 'apply', 'screen'],
      },
    ],
    'property-no-unknown': [
      true, {
        ignoreProperties: ['font-path']
      },
    ],
  },
}
