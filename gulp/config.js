module.exports = function (plugins) {
    return {
        sass: {
            pattern: 'scss/**/*.scss'
        },
        autoprefixer: {
            browsers: [
                'last 2 versions',
                'safari 5',
                'ie 8',
                'ie 9',
                'opera 12.1',
                'ios 6',
                'android 4'
            ],
            cascade: true
        },
        js: {
            pattern: 'js/**/*.js'
        },
        path: {
            public: 'web',
            frontendAssets: 'app/Resources/assets',
            bower: 'vendor/bower_components'
        },
        production: !!plugins.util.env.production,
        sourceMaps: !plugins.util.env.production,
        revManifestPath: 'app/Resources/assets/rev-manifest.json'
    }
};