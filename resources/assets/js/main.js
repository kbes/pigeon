// Import the core braw
window.KB = require('./vendor/kb');

// Import all controllers
var loader = require('concatenify');
concatenify('./controllers/*.js');

// Let's go!
KB.init();