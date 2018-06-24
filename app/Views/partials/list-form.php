                <form action="<?= $url ?>" method="POST" id="quizForm<?= $key ?>" class="questionForm" >
                    <div class="form-check">
                    <input class="exampleRadios<?= $key ?> form-check-input" type="radio" name="exampleRadios" value="<?= key($questionsOfQuiz[$key]->getProp1()) ?>">
                    <label class="form-check-label" for="exampleRadios1">
                       <?= implode($questionsOfQuiz[$key]->getProp1()) ?>
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="exampleRadios<?= $key ?> form-check-input" type="radio" name="exampleRadios" value="<?= key($questionsOfQuiz[$key]->getProp2()) ?>">
                    <label class="form-check-label" for="exampleRadios1">
                       <?= implode($questionsOfQuiz[$key]->getProp2()) ?>
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="exampleRadios<?= $key ?> form-check-input" type="radio" name="exampleRadios" value="<?= key($questionsOfQuiz[$key]->getProp3()) ?>">
                    <label class="form-check-label" for="exampleRadios1">
                       <?= implode($questionsOfQuiz[$key]->getProp3()) ?>
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="exampleRadios<?= $key ?> form-check-input" type="radio" name="exampleRadios" value="<?= key($questionsOfQuiz[$key]->getProp4()) ?>">
                    <label class="form-check-label" for="exampleRadios1">
                       <?= implode($questionsOfQuiz[$key]->getProp4()) ?>
                    </label>
                    </div>
                </form>