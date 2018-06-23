<header>
  <h1 class="title">oQuiz</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <?php if ($connectedUser !== false) : ?>
              <h6>Bonjour <?= $connectedUser->getFirst_name() ?></h6>
          <?php else : ?>
              <h6>Bienvenue</h6>
          <?php endif; ?>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= $router->generate('main_home') ?>">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <?php if ($connectedUser !== false) : ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?= $router->generate('user_account') ?>">Mon compte</a>
            </li>
              <?php else : ?>
              <li class="nav-item active">
                  <a class="nav-link" href="<?= $router->generate('user_login') ?>">Connexion</a>
              </li>
              <?php endif; ?>
            <li class="nav-item active">
            <?php if ($connectedUser !== false) : ?>
                <form class="nav-link" action="<?= $router->generate('user_logout') ?>" method="post">
                    <button class="menu-hover border-0 bg-transparent">Déconnexion</button>
                </form>
            <?php else : ?>
                <a class="nav-link" href="<?= $router->generate('user_signup') ?>">
                    <i class="fas fa-edit"></i>Inscription</a>
            <?php endif; ?>
            </li>
          </ul>
        </div>
    </nav>
</header>
