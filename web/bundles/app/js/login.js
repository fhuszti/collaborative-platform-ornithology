$(function() {
	
	//Manage AJAX for modal display with Forgotten Password feature
	function modalOpening() {
		//when clicking on the Forgotten Password link
		$('#login_forgotten-link').on('click', function(e){
			
			//just load the reset request form into the modal body
			$('#login_forgotten-pass-modal-body').load($(e.target).data('action'), function() {
				
				//add a submit event to the modal form that was just loaded inside the body
				$('#login_forgotten-pass-modal-form').on('submit', function(e){
					e.preventDefault();

					//we change the submit button to loading state
					$('#login_forgotten-pass-modal-button').button('loading');
					$('#login_forgotten-pass-modal-button>span:first-child').addClass('btn-loading');

					//AJAX call using POST
				});
			});
		});
	}







	modalOpening();
});
