const Encore = require('@symfony/webpack-encore');
const CopyPlugin = require('copy-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    .addEntry('app', './assets/app.js')

    // Copy TinyMCE plugins and skins to the public directory
    .addPlugin(new CopyPlugin({
        patterns: [
            { from: './node_modules/tinymce/plugins', to: 'plugins' },
            { from: './node_modules/tinymce/themes', to: 'themes' },
            { from: './node_modules/tinymce/skins', to: 'skins' },
        ]
    }))
    // Add TinyMCE to your assets
    .addEntry('tinymce', './assets/scripts/tinymce.js')

    // PDF Styles for KNP Snappy
    .addStyleEntry('pdf_styles', './assets/styles/pdf_styles.scss')

    // Enables BrowserSync to automatically reload your browser whenever you 
    // make changes to specified files
    .addPlugin(new BrowserSyncPlugin(
        {
            host: 'localhost',
            port: 3000,
            proxy: 'http://127.0.0.1:8000', // Your Symfony server URL
            files: [
                'templates/**/*.twig',
                'public/build/**/*.js',
                'public/build/**/*.css'
            ],
            notify: false,
            open: false
        },
        { reload: true }
    ))

    // enables the Symfony UX Stimulus bridge (used in assets/bootstrap.js)
    .enableStimulusBridge('./assets/controllers.json')

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-proposal-class-properties');
    })

    // enables @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })

    // enables Sass/SCSS support
    .enableSassLoader((options) => {
        options.sassOptions = {
            quietDeps: true, // disable sass 2/dart-sass warnings
        }
    })

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use React
    //.enableReactPreset()

    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    //.enableIntegrityHashes(Encore.isProduction())

    // uncomment if you're having problems with a jQuery plugin
    .autoProvidejQuery()
    ;

module.exports = Encore.getWebpackConfig();
