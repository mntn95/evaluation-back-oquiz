Session qui enregistre les clefs des réponses

$_SESSION['0'] = 'two'

Chargement page 
=> if session is empty
    ->on affiche le form pour jouer


=> is session is !empty
    -> if $key = one/good
        ->class="success"
    -> else
        ->class="fail"
    
