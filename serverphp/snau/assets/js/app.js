/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';


// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

/**uikit theme**/
import '../../node_modules/uikit/dist/css/uikit.my-theme.min.css';

UIkit.use(Icons);
// UIkit.notification('Hello world.');
console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
