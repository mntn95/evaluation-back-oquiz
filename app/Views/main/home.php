<?php $this->layout('layout', ['title' => 'Home']) ?>

  <body>
      
      <main class="mt-5">
        <h2>Bienvenue sur O'Quiz</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum et assumenda similique ipsa dicta sunt reiciendis quod commodi tenetur! Veritatis fuga sapiente nesciunt, a commodi, eveniet accusantium unde et alias, perspiciatis quos nulla natus qui atque quasi sit officiis! Adipisci exercitationem, quasi laboriosam mollitia eum debitis vero commodi, rem animi temporibus modi ad repellendus dicta explicabo voluptates reprehenderit minima tenetur quaerat vitae!</p>
        <div class="d-flex flex-wrap">
      <?php foreach ($listOfQuiz as $currentList) : ?>
      <div class="card m-1" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><a href="<?= $router->generate('quiz_quizdetail', ['id' =>$currentList->getId()]) ?>"><?= $this->e($currentList->getTitle()) ?></a></h5>
          <h6 class="card-subtitle mb-2 font-weight-bold"><?= $this->e($currentList->getDescription()) ?></h6>
          <p class="card-text text-muted">by <?=$currentList->findAuthorName($currentList->getId())?></p>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
      </main>
      <footer>
      </footer>
  </body>
</html>

