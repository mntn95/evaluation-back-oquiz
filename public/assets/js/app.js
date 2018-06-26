var app = {
  init: function() {
    console.log('init');
    // Inscription
    $('#signup').on('submit', app.signupSubmit);
    // Connexion
    $('#signin').on('submit', app.signinSubmit);
    // Gestion des réponses du quiz
    $('input').on('click', app.afterMath);
    // Gestion des couleurs des niveaux
    $(document).ready(app.levelColor);
  },

  // A chaque click d'un bouton RADIO
  afterMath : function() {

    // Je vais stocker en data la valeur du bouton a son ancètre qui doit changer de couleur
    // selon la validité de la réponse
    var parent = $(this).parent().parent().parent().parent();
    parent.data("answer", $(this).val());

    // Au click du bouton OK, je vérifie les réponses
    $('#checkQuiz').on('click', function() {

    // Si la réponse est valide, je change parent en vert
    if (parent.data("answer") == 'right') {
      parent.removeClass('border-primary');
      parent.removeClass('border-warning');
      parent.addClass('border-success');
      parent.find('.card-header').addClass('bg-success');
    }
    
    // Si la réponse n'est pas valide, je change parent en jaune
    else if (parent.data("answer") == 'wrong') {
      parent.removeClass('border-dark');
      parent.removeClass('border-success');
      parent.addClass('border-warning');
      parent.find('.card-header').addClass('bg-warning');
    }

    // J'enleve la couleur des levels qui pourraient etre rendus invisibles selon les réponses (jaune sur jaune par ex)
    parent.find( "p:contains('Débutant')" ).removeClass('text-success');
    parent.find( "p:contains('Confirmé')" ).removeClass('text-warning');
    parent.find( "p:contains('Expert')" ).removeClass('text-danger');

    // Je rend visible l'anecdote de chaque question ainsi que son lien wiki
    parent.find('.d-none').removeClass('d-none').next().removeClass('d-none');

    // Je cherche les elements ayant la classe bg success afin de connaitre le nombre de mes bonnes réponses
    // puis je les affiche
    var score = $('.bg-success').length;

    // Si l'utilisateur atteint un score supérieur a 5, la div tourne au vert
    if (score < 5) {
      $('.score').addClass('alert alert-warning').html('Votre score : '+score+' /10');
    }
    // Sinon, elle tourne au jaune
    else if (score > 5 ) {
      $('.score').removeClass('alert alert-warning');
      $('.score').addClass('alert alert-success').html('Votre score : '+score+' /10');
    }
    
  })

},

  // Méthode qui permet de changer la couleur du p selon son contenu
  // Ici elle sert a donner de l'importance au level de chaque question
  levelColor: function() {
  
    $( "p:contains('Débutant')" ).addClass('text-success');
    $( "p:contains('Confirmé')" ).addClass('text-warning');
    $( "p:contains('Expert')" ).addClass('text-danger');
    
  },

  // Gestion de la connexion en Ajax
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

  // Gestion de l'inscription en Ajax
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
      var $alertDiv = $('#alertSignup');
      var $content = $alertDiv.find('.content');
      
      // Si ok
      if (response.code == 1) {
        // J'ajoute la classe danger
        $alertDiv.removeClass('alert-danger').addClass('alert-success');
        // J'affiche le message de succès
        $content.html('Inscription réussie');
        // J'affiche la div
        $alertDiv.removeClass('d-none');
        
        
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
        $alertDiv.removeClass('d-none');
      }
      
    }).fail(function() {
      alert('ajax failed');
    });
  },
};

$(app.init);
