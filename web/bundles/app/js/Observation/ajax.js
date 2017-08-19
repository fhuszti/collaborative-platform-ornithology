	$("form").on("submit",function(e) {
		e.preventDefault();
		var form = $('form')[0];
		var formData = new FormData(form);

		$.ajax({
			url : pathControllerObservation,
			type : 'POST', 
			data : formData,
			contentType: false, 
			processData: false,
			success :function(e) {
				$('#containerObservation').animate({ height: '0px' }, 1000, function() {
				$(this).hide(0, function() {
				$('#thanks').show(1000);
				});
			});
      	}
    });
  });
