const gulp = require('gulp');
const concat = require('gulp-concat');
const through = require('through2');
const path = require('path');

const modules_js_path = path.resolve(__dirname+"/../../Resources/js/modules.js");

let normalizeRoutes = function() {
	return through.obj(function(file, encoding, callback) {
		let file_path = ~file.path.indexOf("Panel") ? '' : `\t...require('${file.path.replace(file.base, '@external_modules').replace(/\\/g, '/')}').default, `;
		file.contents = Buffer.from(file_path);
		callback(null, file);
	});
}
let concatRoutes = function() {
	return through.obj(function(file, encoding, callback) {
		file.contents = Buffer.from('export default [\n\t'+(file.contents.toString().replace(/\n/g, '').replace(/,\s$/, '').replace(/,/g, ",\n").trim()) +'\n];');
		callback(null, file);
	});
}

exports.default = function (cb) {
	return gulp.src('../**/Resources/js/**/routes.js') // Get source files with gulp.src
	.pipe(normalizeRoutes())
	.pipe(concat(path.basename(modules_js_path)))
	.pipe(concatRoutes())
	.pipe(gulp.dest(path.dirname(modules_js_path))) // Outputs the file in the destination folder
};
