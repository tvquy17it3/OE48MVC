$(document).ready(function() {
	$("#file").on('change', function() {
        $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
	});
});
