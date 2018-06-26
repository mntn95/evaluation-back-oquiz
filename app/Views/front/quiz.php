<?php $this->layout('layout', ['title' => 'Quiz']) ?>
<h2 class="mt-5"><?= $quizOfAuthor[0]->getTitle() ?></h2>
<h5 class="card-title font-italic"><?= $quizOfAuthor[0]->getDescription() ?></h5>
<p>by <?= $quizOfAuthor[0]->findAuthorName($quizOfAuthor[0]->getId())  ?></p>
<div class="score"></div>
<div class="container d-flex flex-wrap" data-id="<?= $id ?>">
    <?php foreach ($questionsOfQuiz as $key => $value) : ?>
    <div class="card border-primary m-3" style="max-width: 18rem">
    <div class="card-header"> <?= $this->e($questionsOfQuiz[$key]->getQuestion()) ?>
    <!-- La couleur du level est gérée directement en JS -->
    <p class="mt-2 font-italic"> <?= $questionsOfQuiz[$key]->findLevelById($questionsOfQuiz[$key]->getId())[0]['name'] ?></p>
    </div>
        <div class="card-body text-dark">
        <p class="card-text">
                <!-- Si l'utilisateur est connecté, j'insere la partial qui lui permettra de jouer au quiz -->
                <?php if ($connectedUser !== false) : ?>
                <?= $this->insert('partials/list-form', [
                    'quizOfAuthor' => $quizOfAuthor,
                    'questionsOfQuiz' => $questionsOfQuiz,
                    'key' => $key,
                    'url' => $url
                ]) ?>
                <!-- Sinon, je les affiche quand même sans qu'il puisse interagir avec -->
                <?php else : ?>
                <ol>
                    <li><?= implode($questionsOfQuiz[$key]->getProp1()) ?></li>
                    <li><?= implode($questionsOfQuiz[$key]->getProp2()) ?></li>
                    <li><?= implode($questionsOfQuiz[$key]->getProp3()) ?></li>
                    <li><?= implode($questionsOfQuiz[$key]->getProp4()) ?></li>
                </ol>
                <?php endif; ?>
                </p>
            <p class="card-text d-none font-italic"><?= $questionsOfQuiz[$key]->getAnecdote() ?></p>
            <a class="d-none font-italic" href="https://fr.wikipedia.org/wiki/<?= $questionsOfQuiz[$key]->getWiki() ?>">Wikipedia(<?= $questionsOfQuiz[$key]->getWiki() ?>)</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<button type="button" class="btn btn-primary btn-lg btn-block m-2" id="checkQuiz">OK</button>
