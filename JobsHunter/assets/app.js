/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */


const $ = require('jquery');

// import './bootstrap';
require('bootstrap');
require('bootstrap-select');
// require('Hinclude/hinclude'); /* issu with bootstrap-select */
require('bootstrap-icons/font/bootstrap-icons.css');
require('bootstrap-select/dist/css/bootstrap-select.min.css');
require('trix/dist/trix.css');

// any CSS you import will output into a single css file (app.css in this case)
// import './styles/app.css';
import './styles/app.scss';

import './scripts/main.js';
import './scripts/document.js';
import './scripts/general-information.js';

// used in GeneralInformation/edit
require('bs-custom-file-input');

/**
 * import and initialize bs-custom-file-input
 * to:
 *  show file input name in <input type='file' /> after picking a file
 *  drag and drop file in input field
 */
import bsCustomFileInput from 'bs-custom-file-input'
bsCustomFileInput.init()

import Trix from "trix"
document.addEventListener("trix-before-initialize", () => {
    // Change Trix.config if you need
  })