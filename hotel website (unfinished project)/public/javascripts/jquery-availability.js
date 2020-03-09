$(document).ready(function() {
	$("#availability").blur(function() { // when focus out
		$("#message").html('checking availability...'); //before AJAX response
		var form_data = {
			action: 'check_availability',
			availability: $(this).val()
		};
		$.ajax({
			type: "POST",
			url: "room_availability.php",
			data: form_data,
			success: function(result) {
				$("#message").html(result);	
			}
		});
	});
});
