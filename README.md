# llos-template

## Usage

Just fork this repository, run `yarn` to install all of the dependencies and you should be ready to go.

### Default: `gulp`
Will run the default task (`gulp build`).

### Build: `gulp build`
Will run all of the following tasks sequentially:
- **`gulp build:styles`:** processes `tailwind-setup.pcss` using PostCSS and a bunch of plugins
- **`gulp build:icons`:** processes any files on `/assets/img/icons/*.svg` and creates a sprite
- **`gulp build:pot`:** looks for translatable strings on `*.tiwg` files and creates a `theme.pot` file

### Watch: `gulp watch`
Will watch all of the paths and config files and run the necessary tasks when anything changes:
- **`gulp watch:styles`:** will run `gulp build:styles` if anything changes
- **`gulp watch:icons`:** will run `gulp build:icons` if anything changes
- **`gulp watch:pot`:** will run `gulp build:pot` if anything changes
