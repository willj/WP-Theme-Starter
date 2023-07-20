const themeName = 'theme-starter';

const { series, src, dest, parallel, watch } = require('gulp');
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const fs = require('fs');
const revhash = require('rev-hash');
const evstream = require('event-stream');
const sass = require("gulp-sass")(require('sass'));
const cssmin = require("gulp-clean-css");
const concat = require("gulp-concat");

function script(){
    return src(`./${themeName}/script/${themeName}.js`)
        .pipe(uglify())
        .pipe(rename({extname: ".min.js"}))
        .pipe(dest(`./${themeName}/build`));
}

function versionScript(cb){

    fs.readFile(`./${themeName}/script/${themeName}.min.js`, (err, data) => {
        if (err) cb(err);
        let hash = revhash(data);
        fs.writeFile(`./${themeName}/build/script-version`, hash, (err) => {
            if (err) cb(err);
        });
    })

    cb();
}

function sassCss(){

    return  src(`./${themeName}/sass_src/**/*.scss`)
            .pipe(sass().on('error', sass.logError))
            .pipe(rename("__build.css"))
            .pipe(dest(`./${themeName}/build/`))
            .pipe(cssmin({compatibility: "ie7", restructuring: false}))
            .pipe(rename(`${themeName}.min.css`))
            .pipe(dest(`./${themeName}/build/`));
}

function versionStyle(cb){

    fs.readFile(`./${themeName}/build/${themeName}.min.css`, (err, data) => {
        if (err) cb(err);
        let hash = revhash(data);
        fs.writeFile(`./${themeName}/build/style-version`, hash, (err) => {
            if (err) cb(err);
        });
    })

    cb();
}

exports.watch = () => {
    watch(`${themeName}/sass_src/**/*.scss`, series(sassCss, versionStyle));
    watch([`${themeName}/script/*.js`, `!${themeName}/script/${themeName}.min.js`], series(script, versionScript));
};

exports.default = parallel( 
    series(script, versionScript),
    series(sassCss, versionStyle)
);