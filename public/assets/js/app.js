var app = {
  init: function() {
    console.log('init');
    // Inscription
    $('#signup').on('submit', app.signupSubmit);
    // Connexion
    $('#signin').on('submit', app.signinSubmit);
    // gestion du quiz
    $('input').on('click', app.afterMath);

    $(document).ready(app.levelColor);
  },


  afterMath : function() {


    var parent = $(this).parent().parent().parent().parent();
    parent.data("answer", $(this).val());


    $('#checkQuiz').on('click', function() {

    if (parent.data("answer") == 'right') {
      parent.removeClass('border-primary');
      parent.removeClass('border-warning');
      parent.addClass('border-success');
      parent.find('.card-header').addClass('bg-success');
    }
    
    else if (parent.data("answer") == 'wrong') {
      parent.removeClass('border-dark');
      parent.removeClass('border-success');
      parent.addClass('border-warning');
      parent.find('.card-header').addClass('bg-warning');
    }
    parent.find( "p:contains('Débutant')" ).removeClass('text-success');
    parent.find( "p:contains('Confirmé')" ).removeClass('text-warning');
    parent.find( "p:contains('Expert')" ).removeClass('text-danger');
    parent.find('.d-none').removeClass('d-none').next().removeClass('d-none');

    var score = $('.bg-success').length;
    if (score < 5) {
      $('.score').addClass('alert alert-warning').html('Votre score : '+score+' /10');
    }
    else if (score > 5 ) {
      $('.score').removeClass('alert alert-warning');
      $('.score').addClass('alert alert-success').html('Votre score : '+score+' /10');
    }
    
  })

},

  levelColor: function() {
  
    $( "p:contains('Débutant')" ).addClass('text-success');
    $( "p:contains('Confirmé')" ).addClass('text-warning');
    $( "p:contains('Expert')" ).addClass('text-danger');
    
  },


  signinSubmit: function(evt) {
    // On empeche l'envoi du formulaire
    evt.preventDefault();
    
    // On récupère les données du form
    var formData = $(this).serialize();
    
    // On exécute l'appel Ajax
    // L'URL à appeler est stockée dans l'attribut "action" du formulaire
    $.ajax({
      url : $(this).attr('action'),
      method : 'POST',
      dataType : 'json',
      data : formData
    }).done(function(response) {
      console.log(response);
      
      // Je stocke dans une variable la partie content pour ne pas faire pleins de recherches inutiles dans le DOM
      var $alertDiv = $('#alertSignin');
      var $content = $alertDiv.find('.content');
      
      // Si ok
      if (response.code == 1) {
        // J'ajoute la classe danger
        $alertDiv.removeClass('alert-danger').addClass('alert-success');
        // J'affiche le message de succès
        $content.html('Connexion réussie');
        // J'affiche la div
        $alertDiv.show();
        
        
        var urlToRedirect = response.redirect;
        
        // Je redirige après 2 secondes
        window.setTimeout(function() {
          location.href = urlToRedirect;
        }, 2000);
      }
      // Sinon, il y a des erreurs à afficher
      else {
        // J'ajoute la classe danger
        $alertDiv.addClass('alert-danger');
        // Je vide le contenu (anciennes erreurs)
        $content.html("");
        // Je parcours les erreurs retournées par l'appel Ajax
        $.each(response.errorList, function(index, value) {
          // Je crée un élément "div" avec du code html à l'intérieur
          var $currenterrorDiv = $('<div>', {
            html: value
          });
          // J'ajoute cet élément au DOM
          $content.append($currenterrorDiv);
        });
        // J'affiche la div
        $alertDiv.show();
      }
      
    }).fail(function() {
      alert('ajax failed');
      
    });
  },

  signupSubmit: function(evt) {
    // On empeche l'envoi du formulaire
    evt.preventDefault();
    
    // On récupère les données du form
    var formData = $(this).serialize();
    
    // On exécute l'appel Ajax
    // L'URL à appeler est stockée dans l'attribut "action" du formulaire
    $.ajax({
      url : $(this).attr('action'),
      method : 'POST',
      dataType : 'json',
      data : formData
    }).done(function(response) {
      console.log(response);
      
      // Je stocke dans une variable la partie content pour ne pas faire pleins de recherches inutiles dans le DOM
      var $alertDiv = $('#alertSignin');
      var $content = $alertDiv.find('.content');
      
      // Si ok
      if (response.code == 1) {
        // J'ajoute la classe danger
        $alertDiv.removeClass('alert-danger').addClass('alert-success');
        // J'affiche le message de succès
        $content.html('Connexion réussie');
        // J'affiche la div
        $alertDiv.show();
        
        
        var urlToRedirect = response.redirect;
        
        // Je redirige après 2 secondes
        window.setTimeout(function() {
          location.href = urlToRedirect;
        }, 2000);
      }
      // Sinon, il y a des erreurs à afficher
      else {
        // J'ajoute la classe danger
        $alertDiv.addClass('alert-danger');
        // Je vide le contenu (anciennes erreurs)
        $content.html("");
        // Je parcours les erreurs retournées par l'appel Ajax
        $.each(response.errorList, function(index, value) {
          // Je crée un élément "div" avec du code html à l'intérieur
          var $currenterrorDiv = $('<div>', {
            html: value
          });
          // J'ajoute cet élément au DOM
          $content.append($currenterrorDiv);
        });
        // J'affiche la div
        $alertDiv.show();
      }
      
    }).fail(function() {
      alert('ajax failed');
    });
  },
};

$(app.init);
