                <!-- L'utilisateur est connecté, il peut clicker sur les boutons radio et jouer -->
                <form action="<?= $url ?>" method="POST" class="questionForm" >
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" value="<?= key($questionsOfQuiz[$key]->getProp1()) ?>">
                    <label class="form-check-label">
                       <?= implode($questionsOfQuiz[$key]->getProp1()) ?>
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" value="<?= key($questionsOfQuiz[$key]->getProp2()) ?>">
                    <label class="form-check-label">
                       <?= implode($questionsOfQuiz[$key]->getProp2()) ?>
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" value="<?= key($questionsOfQuiz[$key]->getProp3()) ?>">
                    <label class="form-check-label">
                       <?= implode($questionsOfQuiz[$key]->getProp3()) ?>
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" value="<?= key($questionsOfQuiz[$key]->getProp4()) ?>">
                    <label class="form-check-label">
                       <?= implode($questionsOfQuiz[$key]->getProp4()) ?>
                    </label>
                    </div>
                </form>