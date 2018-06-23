<?php

// oQuiz => app/
// Controllers => Controllers/
// au final => app/Controllers/
namespace oQuiz\Controllers;
use oQuiz\Models\QuizModel;
use oQuiz\Models\QuestionModel;


class QuizController extends CoreController {
    public function myAccount() {
        // Je veux les quiz de mon compte
        $quizByAuthorID = QuizModel::findByAuthor(1);
        
        $dataToViews = [
            'quizOfAuthor' => $quizByAuthorID
        ];
        $this->show('user/mon_compte', $dataToViews);
    }

    public function quizDetail($urlParams) {
        $id = $urlParams['id'];
        // $qId = QuestionModel::getId();
        // Je veux un quiz depuis son ID
        $quizById = QuizModel::findById($id);
        $questionByQuizId = QuestionModel::findById($id);

        $dataToViews = [
            'quizOfAuthor' => $quizById,
            'questionsOfQuiz' => $questionByQuizId,
        ];

        $this->show('front/quiz', $dataToViews);
    }

}