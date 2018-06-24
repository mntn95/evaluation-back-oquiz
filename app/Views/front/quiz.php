<?php $this->layout('layout', ['title' => 'Quiz']) ?>
<h2><?= $quizOfAuthor[0]->getTitle() ?></h2>
<h5 class="card-title"><?= $quizOfAuthor[0]->getDescription() ?></h5>
<div class="container d-flex flex-wrap" data-id="<?= $id ?>">
    <?php foreach ($questionsOfQuiz as $key => $value) : ?>
        <div class="card col-3 m-1">
            <div class="card-body bg-light">
                <p class="card-text">
                    <?= $this->e($questionsOfQuiz[$key]->getQuestion()) ?>
                </p>
                
                <?php if ($connectedUser !== false) : ?>
                <?= $this->insert('partials/list-form', [
                    'quizOfAuthor' => $quizOfAuthor,
                    'questionsOfQuiz' => $questionsOfQuiz,
                    'key' => $key,
                    'url' => $url,
                    'id' => $id,
                    'exampleRadios' => 'exampleRadios'
                ]) ?>
                <?php else : ?>
                <ol>
                    <li><?= implode($questionsOfQuiz[$key]->getProp1()) ?></li>
                    <li><?= implode($questionsOfQuiz[$key]->getProp2()) ?></li>
                    <li><?= implode($questionsOfQuiz[$key]->getProp3()) ?></li>
                    <li><?= implode($questionsOfQuiz[$key]->getProp4()) ?></li>
                </ol>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<button type="button" class="btn btn-primary btn-lg btn-block m-2" id="checkQuiz">OK</button>