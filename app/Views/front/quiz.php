<?php $this->layout('layout', ['title' => 'Quiz']) ?>

<h2><?= $quizOfAuthor[0]->getTitle() ?></h2>
<h5 class="card-title"><?= $quizOfAuthor[0]->getDescription() ?></h5>
<div class="d-flex flex-wrap">
    <?php foreach ($questionsOfQuiz as $currentQuestions) : ?>
        <div class="card col-3 m-2" style="width: 18rem;">
            <div class="card-body">
                <p class="card-text">
                    <?= $this->e($currentQuestions->getQuestion()) ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
