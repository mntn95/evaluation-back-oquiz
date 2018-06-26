<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<div class="col-md-6 offset-md-3 my-3">
    <h2>Inscription</h2>

    <!-- Je garde cette div cachée qui affichera les éventuelles erreurs, ou la validation de l'inscription' -->
    <div class="alert d-none" role="alert" id="alertSignup" >
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="content">
            
        </div>
    </div>


    <form action="<?= $router->generate('user_ajaxsignup') ?>" method="post" id="signup">
      <div class="form-group">
        <label for="exampleInputFirstName1">First Name</label>
        <input type="firstName" class="form-control" name="firstName" id="exampleInputFirstName1" aria-describedby="firstNameHelp" placeholder="Enter first name">
      </div>
      <div class="form-group">
        <label for="exampleInputLastName1">Last Name</label>
        <input type="lastName" class="form-control" name="lastName" id="exampleInputLastName1" aria-describedby="LastNameHelp" placeholder="Enter last name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword2">Confirmation</label>
        <input type="password" class="form-control" name="passwordConfirm" id="exampleInputPassword2" placeholder="Confirm Password">
      </div>
      <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
