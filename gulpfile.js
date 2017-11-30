const elixir = require('laravel-elixir');
const imagemin = require('gulp-imagemin');
const pngquant = require('imagemin-pngquant');
require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */
process.env.DISABLE_NOTIFIER = true;
elixir((mix) => {
    mix.copy('node_modules/vue', 'public/assets/js/vendor/vue')
    .copy('node_modules/vue-infinite-scroll', 'public/assets/js/vendor/vue-infinite-scroll')
    .copy('node_modules/quill-render', 'public/assets/js/vendor/quill-render');

    mix.sass('app.scss')
        .sass('profile.scss')
        .sass('coverage.scss')
        .sass('coverage-new.scss')
        .sass('directory.scss')
        .sass('landing.scss')
        .sass('gamification.scss')
        .sass('leaderboard.scss')
        .sass('messages.scss')
        .webpack('app.js')
        .webpack('sidebar.js')
        .webpack('payments.js')
        .webpack('leads.js')
        .webpack('contacts.js')
        .webpack('calendar.js')
        .webpack('subscribe.js')
        .webpack('dashboard.js')
        .webpack('messages.js')
        .webpack('coverage.js')
        .webpack('coverage-new.js')
        .webpack('coverage-form.js')
        .webpack('coverage-insurance.js')
        .webpack('patients.js')
        .webpack('medical.js')
        .webpack('gamification.js')
        .webpack('directory-doctor.js')
        .webpack('directory-agent.js')
        .webpack('directory-support-group.js')
        .webpack('doctor-activity.js')
        .webpack('patient-view.js')
        .webpack('patient-appointments.js')
        .webpack('patient-information.js')
        .webpack('patient-medications.js')
        .webpack('patient-allergies.js')
        .webpack('patient-flags.js')
        .webpack('patient-laboratory.js')
        .webpack('patient-problem.js')
        .webpack('patient-erx.js')
        .webpack('appointments.js') //cath
        .webpack('tellme.js')
        .webpack('landing.js')
        .webpack('subscriptions.js')
        .webpack('patient-directory.js') //cath
        .webpack('staff.js');

});

gulp.task('images', function() {
    return gulp.src('resources/assets/images/**/*.+(png|jpg|gif|svg)')
        .pipe(imagemin({
            progressive: true,
            use: [pngquant()]
        }))
        .pipe(gulp.dest('public/images'));
});

gulp.task('fonts', function() {
    return gulp.src('resources/assets/fonts/**/*')
        .pipe(gulp.dest('public/fonts'))
});
