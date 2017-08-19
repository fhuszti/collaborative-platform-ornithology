
  $('#observation_bird_name').autocomplete({
    source : function(requete, reponse){
      var value = $('#observation_bird_name').val();
      if(value === '' || value.length < 3) {
      $('#observation_bird_name').empty();
    } else {
      $.ajax({
        type:"GET",
        url : pathControllerSearch,
        data : 'search=' + value,
        success : function(donnee){
        console.log(donnee);
        reponse($.map(donnee, function(objet){
          return objet.name;
        }));
        }
      });
    }}
  });
