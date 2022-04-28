let mix = require('laravel-mix')
let path = require('path')

mix.js('resources/js/field.js', 'dist/js').vue({ version: 3 })
  .webpackConfig({
    externals: {
         vue: 'Vue',
    },
      resolve: {
        symlinks: false
    },
    output: {
      uniqueName: 'chrisvasey/nova-google-autocomplete-field',
    }
  })

  mix.alias({
    'laravel-nova': path.join(__dirname, 'vendor/laravel/nova/resources/js/mixins/packages.js'),
  })