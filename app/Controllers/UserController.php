<?php

// oQuiz => app/
// Controllers => Controllers/
// au final => app/Controllers/
namespace oQuiz\Controllers;
use oQuiz\Models\QuizModel;

class UserController extends CoreController {
    public function myAccount() {
        // Je veux les quiz de mon compte
        $quizByAuthorID = QuizModel::find(1);
        
        $dataToViews = [
            'quizOfAuthor' => $quizByAuthorID
        ];
        $this->show('user/mon_compte', $dataToViews);
    }

    public function quizDetail() {
        // Je veux un quiz depuis son ID
        $quizByID = QuizModel::findById(1);
        
        $dataToViews = [
            'quizOfAuthor' => $quizByID
        ];
        $this->show('user/mon_compte', $dataToViews);
    }
}