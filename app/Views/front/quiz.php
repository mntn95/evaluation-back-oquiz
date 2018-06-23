<?php $this->layout('layout', ['title' => 'Quiz']) ?>
<h2><?= $quizOfAuthor[0]->getTitle() ?></h2>
<h5 class="card-title"><?= $quizOfAuthor[0]->getDescription() ?></h5>
<div class="d-flex flex-wrap">
    <?php foreach ($questionsOfQuiz as $key => $value) : ?>
        <div class="card col-3 m-1" style="width: 18rem;">
            <div class="card-body">
                <p class="card-text">
                    <?= $this->e($questionsOfQuiz[$key]->getQuestion()) ?>
                </p>
                
                <?php if ($connectedUser !== false) : ?>
                <form>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                       <?= implode($questionsOfQuiz[$key]->getProp1()) ?>
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                       <?= implode($questionsOfQuiz[$key]->getProp2()) ?>
                    </label>
                    </div><div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                       <?= implode($questionsOfQuiz[$key]->getProp3()) ?>
                    </label>
                    </div><div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                       <?= implode($questionsOfQuiz[$key]->getProp4()) ?>
                    </label>
                    </div>
                </form>
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
