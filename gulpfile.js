var
	gulp = require('gulp'),
	concatCss = require('gulp-concat-css'),
	minifyCSS = require('gulp-minify-css'),
	notify = require("gulp-notify")
;

gulp.task('concat', function () {
	gulp.src('./_dev/_styles/**/*.css')
		.pipe(concatCss("main.css"))
		.pipe(minifyCSS({keepBreaks:true}))
		.pipe(gulp.dest('css/'))
		.pipe(notify("Watch Complete!"));
});

gulp.task('jade', function () {
	gulp.src('./_dev/_makeups/_pages/*.html')
	.pipe(gulp.dest('html/'))
	.pipe(notify("Jade Complete!"));
});

gulp.task('watch', function(){
	gulp.watch('_dev/_styles/**/*.css', ['concat']);
	gulp.watch('_dev/_makeups/**/*.html', ['jade']);
});



