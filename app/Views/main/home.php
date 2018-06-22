<?php $this->layout('layout', ['title' => 'Home']) ?>

  <body>
      
      <main>
        <h2>Bienvenue sur O'Quiz</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum et assumenda similique ipsa dicta sunt reiciendis quod commodi tenetur! Veritatis fuga sapiente nesciunt, a commodi, eveniet accusantium unde et alias, perspiciatis quos nulla natus qui atque quasi sit officiis! Adipisci exercitationem, quasi laboriosam mollitia eum debitis vero commodi, rem animi temporibus modi ad repellendus dicta explicabo voluptates reprehenderit minima tenetur quaerat vitae!</p>
        <div class="d-flex flex-wrap">
      <?php foreach ($listOfQuiz as $currentList) : ?>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $this->e($currentList->getTitle()) ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?= $this->e($currentList->getDescription()) ?></h6>
          <p class="card-text">by <?= $this->e($currentList->getIdAuthor()) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
      </main>
      <footer>

      </footer>

  </body>
</html>

