$(function() {
	
	function initMap(canvas, mapCenter) {
        var marker = new google.maps.Marker({
            position: mapCenter
        });

        var mapOptions = {
            center: mapCenter,
            zoom: 8
        };

        var map = new google.maps.Map(canvas, mapOptions);
        marker.setMap(map);
    }

	function manageMaps() {
		var mapModals = $('#profile_block2-content .modal');

        mapModals.each(function(index, elmt) {
            $(elmt).on('shown.bs.modal', function() {
                var canvas = $(this).find('.profile_obs-modal-right-panel'),
                	lat = canvas.data('lattitude'),
                	lng = canvas.data('longitude');
            	initMap(canvas, new google.maps.LatLng(lat,lng));
            });
        });
	}







	//"Changing email" modal management
	function emailModal() {
		//when clicking on the Edit icon
		$('#profile_email-link').on('click', function(e){
			
			//just load the reset request form into the modal body
			$('#profile_email-modal-body').load($(e.target).data('action'), function() {
				
				//add a submit event to the modal form that was just loaded inside the body
				$('#profile_email-modal-body form').on('submit', function(e){
					e.preventDefault();

					//we change the submit button to loading state
					$('#profile_email-modal-button').button('loading');
					$('#profile_email-modal-button>span:first-child').addClass('btn-loading');

					//AJAX call using POST
				});
			});
		});
	}

	//"Changing password" modal management
	function passwordModal() {
		//when clicking on the Edit icon
		$('#profile_pass-link').on('click', function(e){
			
			//just load the reset request form into the modal body
			$('#profile_pass-modal-body').load($(e.target).data('action'), function() {
				
				//add a submit event to the modal form that was just loaded inside the body
				$('#profile_pass-modal-body form').on('submit', function(e){
					e.preventDefault();

					//we change the submit button to loading state
					$('#profile_pass-modal-button').button('loading');
					$('#profile_pass-modal-button>span:first-child').addClass('btn-loading');

					//AJAX call using POST
				});
			});
		});
	}

	//Manage AJAX for modal displays throughout the profile page
	function modalOpening() {
		emailModal();
		passwordModal();
	}







	manageMaps();
	modalOpening();

	$('ul.gallery').bsPhotoGallery({
	    "classes" : "col-xs-6 col-sm-4 col-md-3",
	    "hasModal" : true
	});
});
