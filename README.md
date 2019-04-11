# llos-template

## Usage

Just fork this repository, run `pnpm` to install all of the dependencies and you should be ready to go.

### Build: `pnpm run build`
Will run all of the following tasks sequentially:
- **`pnpm run build:styles`:** processes `main.pcss` using PostCSS and a bunch of plugins
- **`pnpm run build:icons`:** processes any files on `/assets/img/icons/*.svg` and creates a sprite
- **`pnpm run build:pot`:** looks for translatable strings on `*.twig` files and creates a `theme.pot` file

### Watch: `pnpm run watch`
Will watch all of the paths and config files and run the necessary tasks when anything changes:
- **`pnpm run watch:styles`:** will run `pnpm run build:styles` if anything changes
- **`pnpm run watch:icons`:** will run `pnpm run build:icons` if anything changes
- **`pnpm run watch:pot`:** will run `pnpm run build:pot` if anything changes
