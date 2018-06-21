<?php $this->layout('layout', ['title' => 'Home']) ?>

  <body>
      
      <main>
        <h2>Bienvenue sur O'Quiz</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum et assumenda similique ipsa dicta sunt reiciendis quod commodi tenetur! Veritatis fuga sapiente nesciunt, a commodi, eveniet accusantium unde et alias, perspiciatis quos nulla natus qui atque quasi sit officiis! Adipisci exercitationem, quasi laboriosam mollitia eum debitis vero commodi, rem animi temporibus modi ad repellendus dicta explicabo voluptates reprehenderit minima tenetur quaerat vitae!</p>
      <?php foreach ($listOfQuiz as $currentList) : ?>
        <div class="col 4">
            <div class="">
                <h2><?= $this->e($currentList->getTitle()) ?></h2>
                <p><?= $this->e($currentList->getDescription()) ?></p>
            </div>
            <div class="">
                <p>
                    créé par <?= $this->e($currentList->getIdAuthor()) ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
      </main>
      <footer>

      </footer>

  </body>
</html>

