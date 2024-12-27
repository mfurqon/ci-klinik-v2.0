// Call the dataTables jQuery plugin
$(document).ready(function() {
	if ($.fn.DataTable.isDataTable('#datatables-klinik')) {
        $('#datatables-klinik').DataTable().clear().destroy();
    }
    $('#datatables-klinik').DataTable({
		"paging": true,
		"searching": true,
		"info": true,
		"ordering": true,
		"autowidth": false,
	});
});