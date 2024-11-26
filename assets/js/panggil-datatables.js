// This file is required by the index.html file and will
// be executed in the renderer process for that window.
// All of the Node.js APIs are available in this process.
// window.$ = window.jquery = require('./node_modules/jquery');
// window.dt = require('../../vendor/DataTablesKlinik/datatables.min.js')();
// window.$('#dataTablesKlinik').DataTable();

// Call the dataTables jQuery plugin
$(document).ready(function () {
	$("#dataTablesKlinik").DataTable();
});