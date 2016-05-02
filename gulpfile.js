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
    var filter = plugins.filter(['*.css', '!*.map'], { restore: true });

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
        .pipe(filter.restore)
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


gulp.task('scripts', ['styles', 'shorthand'], function () { // mettendo ['styles'] forziamo questo task ad aspettare che finisca il task style
    var pipeline = new Pipeline(app);

    pipeline.add([
        config.path.bower + '/jquery/dist/jquery.js',
        config.path.bower + '/angular/angular.js',
        config.path.bower + '/angular-bootstrap/ui-bootstrap-tpls.js',
        config.path.bower + '/angular-ui-router/release/angular-ui-router.js',
        config.path.bower + '/Chart.js/Chart.js',
        config.path.bower + '/angular-chart.js/dist/angular-chart.js',
        config.path.bower + '/nganalytics/src/ng-analytics.js',
        config.path.bower + '/angular-ui-select/dist/select.js',
        config.path.bower + '/angular-sanitize/angular-sanitize.js'
    ], 'backend-deps.js');

    pipeline.add([
        config.path.coreBundleResources + '/js/angular/module/SymfonyRouter.js',
        config.path.backendAssets + '/js/ui-states.js',
        config.path.backendAssets + '/js/app.js',
        config.path.backendAssets + '/' + config.js.pattern

    ], 'backend.js');

    return pipeline.run(app.addScript);
});

gulp.task('fonts', function () {
    return app.copy(
        config.path.bower + '/font-awesome/fonts/*',
        config.path.public + '/assets/fonts'
    );
});

gulp.task('images', function () {
    var pipeline = new Pipeline(app);

    pipeline.add([
        config.path.backendAssets + '/images/**/*'
    ], config.path.public + '/assets/images/backend');

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
    gulp.watch(config.path.backendAssets + '/' + config.sass.pattern, ['styles']);
    gulp.watch(config.path.backendAssets + '/' + config.js.pattern, ['scripts']);
});

// Task composti
gulp.task('default', ['clean', 'styles', 'scripts', 'fonts', 'images', 'watch']);

gulp.task('build:production', ['clean', 'styles', 'scripts', 'fonts', 'images']);