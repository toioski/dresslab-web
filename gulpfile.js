// Load dependencies
var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')(),
    sass = require('gulp-ruby-sass'),
    del = require('del'),
    shell = require('gulp-shell'),
    config = require('./gulp/config')(plugins),
    Pipeline = require('./gulp/pipeline');

var app = {};

app.addStyle = function (paths, outputFilename) {

    var options = {
        noCache: true,
        compass: false,
        bundleExec: false,
        sourcemap: true
    };

    // Don’t write sourcemaps of sourcemaps
    var filter = plugins.filter(['*.css', '!*.map'], {restore: true});

    return sass(paths, options)
        .pipe(plugins.plumber())
        .pipe(plugins.debug())
        .pipe(plugins.sourcemaps.init())
        //.pipe(plugins.autoprefixer(config.autoprefixer))
        //.pipe(filter)
        .pipe(plugins.concat('assets/css/' + outputFilename))
        .pipe(config.production ? plugins.minifyCss() : plugins.util.noop())
        .pipe(plugins.rev())
        .pipe(plugins.sourcemaps.write('.'))
        //.pipe(filter.restore)
        .pipe(gulp.dest(config.path.public))
        // write the rev-manifest.json file for gulp-rev

        .pipe(plugins.rev.manifest(config.revManifestPath, {
            merge: true
        }))
        .pipe(gulp.dest('.'));
};

app.addScript = function (paths, outputFilename) {
    return gulp.src(paths)
        .pipe(plugins.plumber())
        .pipe(plugins.if(config.sourceMaps, plugins.sourcemaps.init()))
        .pipe(plugins.concat('assets/js/' + outputFilename))
        .pipe(config.production ? plugins.uglify() : plugins.util.noop())
        .pipe(plugins.rev())
        .pipe(plugins.if(config.sourceMaps, plugins.sourcemaps.write('.')))
        .pipe(gulp.dest(config.path.public))
        // write the rev-manifest.json file for gulp-rev
        .pipe(plugins.rev.manifest(config.revManifestPath, {
            merge: true
        }))
        .pipe(gulp.dest('.'));
};

app.copy = function (srcFiles, outputDir) {
    return gulp.src(srcFiles)
        .pipe(gulp.dest(outputDir));
};


// ---------------- //
// DEFINIZIONE TASK //
// ---------------- //

gulp.task('styles', function () {
    var pipeline = new Pipeline(app);

    pipeline.add([
        config.path.bower + '/bootstrap/dist/css/bootstrap.min.css',
        config.path.bower + '/font-awesome/css/font-awesome.min.css',
        config.path.frontendAssets + '/scss/index.scss'
    ], 'frontend.css');

    return pipeline.run(app.addStyle);
});


gulp.task('scripts', ['styles'], function () {
    var pipeline = new Pipeline(app);

    pipeline.add([
        config.path.bower + '/jquery/dist/jquery.js',
        config.path.bower + '/angular/angular.js',
        config.path.bower + '/angular-poller/angular-poller.js',
        config.path.bower + '/angular-resource/angular-resource.js',
        config.path.bower + '/nya-bootstrap-select/dist/js/nya-bs-select.js'
    ], 'frontend-deps.js');

    pipeline.add([
        config.path.frontendAssets + '/' + config.js.pattern
    ], 'frontend.js');

    return pipeline.run(app.addScript);
});

gulp.task('fonts', ['clean'], function () {
    return app.copy(
        config.path.bower + '/font-awesome/fonts/*',
        config.path.public + '/assets/fonts'
    );
});

gulp.task('select', function() {
    return app.copy(
        config.path.bower + '/nya-bootstrap-select/dist/css/nya-bs-select.min.css',
        config.path.public + '/assets/css'
    );
});

gulp.task('images', function () {
    var pipeline = new Pipeline(app);

    pipeline.add([
        config.path.frontendAssets + '/images/**/*'
    ], config.path.public + '/assets/images');

    return pipeline.run(app.copy);
});

gulp.task('clean', function () {
    del.sync(config.revManifestPath);
    del.sync(config.path.public + '/assets/css/*');
    del.sync(config.path.public + '/assets/js/*');
    del.sync(config.path.public + '/assets/fonts/*');
    del.sync(config.path.public + '/assets/images/*');
});

gulp.task('watch', function () {
    gulp.watch(config.path.frontendAssets + '/' + config.sass.pattern, ['styles']);
    gulp.watch(config.path.frontendAssets + '/' + config.js.pattern, ['scripts']);
});

gulp.task('db', shell.task([
    './bin/console doctrine:schema:drop --dump-sql',
    './bin/console doctrine:schema:drop --force',
    './bin/console doctrine:schema:create',
    './bin/console doctrine:fixtures:load --fixtures=src/AppBundle/DataFixtures/ORM'
]));

// Task composti
gulp.task('default', ['clean', 'styles', 'select', 'scripts', 'fonts', 'images', 'watch', 'db']);

gulp.task('build:production', ['clean', 'styles', 'select', 'scripts', 'fonts', 'images', 'db']);