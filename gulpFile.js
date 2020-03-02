var gulp = require('gulp'),
	brouserSinc= require('browser-sync'),
	minCss = require('gulp-clean-css'),
	reName = require('gulp-rename'),
	imageMin = require('gulp-imagemin'),
	autoPrefix = require('gulp-autoprefixer'),
	less = require('gulp-less'),
	plumber = require('gulp-plumber'),
	mediaGroup = require('gulp-group-css-media-queries');

 

 	gulp.task('less', function(){
 		 gulp.src('project/less/main.less')
 		.pipe(plumber())
 		.pipe(less())
 		.pipe(autoPrefix(['last 10 versions'], {cascade:true}))
 		.pipe(mediaGroup())
 		.pipe(gulp.dest('project/css'))
 		.pipe(brouserSinc.reload({stream:true}))
 	});

 	gulp.task('min-css',function(){
 		return gulp.src('project/css/main.css')
 		.pipe(minCss())
 		.pipe(reName({suffix:'.min'}))
 		.pipe(gulp.dest('min'));
 	})

 	gulp.task('img', function(){
 		return gulp.src('project/img/**/*')
 		.pipe(imageMin({
 			interlaced:true,
 			progressive:true,
 		}))
 		.pipe(gulp.dest('min/img-min'))
 	});
  
 	gulp.task('browser-sync', function(){
 		brouserSinc({
 			proxy:"task-list",
 			// server: {
 			// 	baseDir:'project'
 			// }
 		})
 	});

 	gulp.task('watch',['browser-sync','less'], function(){
 		gulp.watch('project/less/**/*.less',['less']);
 		gulp.watch('project/*.html',brouserSinc.reload);
 		gulp.watch('project/*.php',brouserSinc.reload);
 		gulp.watch('project/js/*.js',brouserSinc.reload);

 	});


