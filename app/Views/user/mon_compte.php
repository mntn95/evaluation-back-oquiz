<?php $this->layout('layout', ['title' => 'Mon compte']) ?>
<?php foreach ($quizOfAuthor as $currentList) : ?>
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