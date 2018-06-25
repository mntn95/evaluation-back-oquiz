<header>
  <h1 class="title text-primary">oQuiz</h1>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
          <?php if ($connectedUser !== false) : ?>
          <h6 class="navbar-brand mt-1">Bonjour <?= $connectedUser->getFirst_name() ?></h6>
          <?php else : ?>
          <h6 class="navbar-brand mt-1" href="#">Bienvenue</h6>
          <?php endif; ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= $router->generate('main_home') ?>">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <?php if ($connectedUser !== false) : ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?= $router->generate('user_account', ['id' => $connectedUser->getId()]) ?>">Mon compte</a>
            </li>
              <?php else : ?>
              <li class="nav-item active">
                  <a class="nav-link" href="<?= $router->generate('user_login') ?>">Connexion</a>
              </li>
              <?php endif; ?>
            <li class="nav-item ">
            <?php if ($connectedUser !== false) : ?>
                <form class="nav-link" action="<?= $router->generate('user_logout') ?>" method="post">
                    <button class="nav-link active border-0 p-0 bg-transparent">Déconnexion</button>
                </form>
            <?php else : ?>
                <a class="nav-link active" href="<?= $router->generate('user_signup') ?>">
                    <i class="fas fa-edit"></i>Inscription</a>
            <?php endif; ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>
