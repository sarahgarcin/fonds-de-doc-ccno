/*

---------------------------------------
User settings for GUlp
---------------------------------------

*/

/* List all the JavaScript plugin files you are using in `pluginScripts`
 * to define their loading order.
 */
module.exports.pluginScripts = [
  'node_modules/jquery/dist/jquery.js',
  'assets/js/p5.js', 
  'assets/js/slick.min.js', 
  'node_modules/photoswipe/dist/photoswipe.min.js', 
  'node_modules/photoswipe/dist/photoswipe-ui-default.min.js'
];

/* List all the Styles plugin files you are using in `pluginStyles`
 * to define their loading order.
 */
module.exports.pluginStyles = [
  'node_modules/font-awesome/css/font-awesome.css', 
  'node_modules/photoswipe/dist/photoswipe.css', 
  'node_modules/photoswipe/dist/default-skin/default-skin.css', 
  'assets/css/slick.css',
  'assets/css/slick-theme.css'
];

/* List all your JavaScript file in `userScripts` to define
 * their order of concatenation.
 */
module.exports.userScripts = [
	'assets/js/sketch.js',
  'assets/js/main.js'
];

/* Name your LESS config file to load.
 * Managing more than one LESS/CSS should be from @imports in LESS.
 */
module.exports.userStyles = [
  'assets/scss/main.scss'
];

/* To enable automatic reloading on .js and .less files compilation,
 * as well as other niceties from [browser sync](https://www.browsersync.io/)
 * write your local dev url in the localDevUrl variable.
 */
module.exports.localDevUrl = '';
