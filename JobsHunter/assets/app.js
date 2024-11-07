/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

const $ = require('jquery');

require('bootstrap');
require('bootstrap-select');
// require('Hinclude/hinclude'); /* issue with bootstrap-select */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

import './scripts/main.js';
import './scripts/document.js';
import './scripts/general-information.js';
import './scripts/company.js';
import './scripts/tinymce.js';

/**
 * import and initialize bs-custom-file-input
 * to:
 *  show file input name in <input type='file' /> after picking a file
 *  drag and drop file in input field
 * used in GeneralInformation/edit
 */
import bsCustomFileInput from 'bs-custom-file-input'
bsCustomFileInput.init()
