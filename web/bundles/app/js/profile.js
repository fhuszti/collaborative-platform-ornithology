$(function() {
	
	function initMap(param = null) {
		if (param == null) {
			param = {lat: 36.8451807, lng: 10.1031312};
		}
	  	
	  	var map = new google.maps.Map(document.getElementById('gmaps_canvas'), {
	    	zoom: 8,
	    	center: param
	  	});
	  	
	  	google.maps.event.trigger(map, "resize");
	  	
	  	var marker = new google.maps.Marker({
	    	position: param,
	    	map: map
	  	});
	}

	function manageObservationModal() {
		var observations = $('#profile_block2-content .observation-row');

        observations.each(function(index, elmt) {
            $(elmt).on('click', function(e) {
            	e.preventDefault();

            	//get the observation data
            	var image = $(this).data('image') ? $(this).data('image') : null,
            		name = $(this).data('name'),
            		date = $(this).data('date'),
            		country = $(this).data('country'),
            		comment = $(this).data('comment') ? $(this).data('comment') : null,
            		lat = $(this).data('lattitude'),
            		lng = $(this).data('longitude');

            	//modal window elements
            	var modal = $('#profile_obs-modal'),
            		modal_left = modal.find('.profile_obs-modal-left-panel'),
            		modal_right = $('#gmaps_canvas'),
            		modal_comment = modal.find('.profile_obs-modal-comment-panel'),
            		ul = $('<ul></ul>'),
            		obsDiv = $(e.target);

            	//we reset everything in case the modal has been opened and is filled with content already
            	modal_left.html('');
            	modal_right.html('');
            	modal_comment.html('');

            	//add the image if there is one
            	if (image !== null) {
	            	$('<img src="'+image+'" alt="'+name+'" />').appendTo(modal_left);
	            }

	            //add the informations list
	            $('<li>'+name+'</li>').appendTo(ul);
	            $('<li>'+date+'</li>').appendTo(ul);
	            $('<li>'+country+'</li>').appendTo(ul);
	            ul.appendTo(modal_left);

	            //add the comment if there is one
            	if (comment !== null) {
	            	//<br> obligatoire, sinon le commentaire ne s'affiche pas
	            	$('<hr />'+comment+'<br />').appendTo(modal_comment);
	            }

				//initialise the map once the modal is fully loaded and visible after a click on an observation
				modal.on('shown.bs.modal', function () {
					if (typeof google === 'object' && typeof google.maps === 'object') {
					 	initMap( {lat: parseFloat(lat), lng: parseFloat(lng)} );
					}
				});
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







	//initialise la galerie photos
	function initGallery() {
		$('ul.gallery').bsPhotoGallery({
		    "classes" : "col-xs-6 col-sm-4 col-md-3",
		    "hasModal" : true
		});
	}





	$.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyCEL05YUkkeIBtLXDKcrZyM4kIkgbEOYS8");

	manageObservationModal();
	modalOpening();
	initGallery();
});
