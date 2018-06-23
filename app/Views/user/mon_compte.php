<?php $this->layout('layout', ['title' => 'Mon compte']) ?>
<h2>Mon compte</h2>
    <div class="d-flex flex-wrap">
    <?php foreach ($quizOfAuthor as $currentList) : ?>
      <div class="card m-1" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $this->e($currentList->getTitle()) ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?= $this->e($currentList->getDescription()) ?></h6>
          <p class="card-text"><?= $this->e($currentList->getIdAuthor()) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
    </div>