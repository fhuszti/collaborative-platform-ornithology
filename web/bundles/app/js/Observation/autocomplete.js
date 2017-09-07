
  $('#observation_birdName').autocomplete({
    source : function(requete, reponse){
      var value = $('#observation_birdName').val();
      if(value === '' || value.length < 3) {
      $('#observation_birdName').empty();
    } else {
      $.ajax({
        type:"GET",
        url : pathControllerSearch,
        data : 'search=' + value,
        success : function(donnee){
        reponse($.map(donnee, function(objet){
            return objet.name;
        }));
        }
      });
    }
  },

  // select: function( event, ui){
  //          $('#observation_bird_id').attr({value : ui.value});
  //          console.log(event);
  //          console.log(ui);
  //       }
  });





