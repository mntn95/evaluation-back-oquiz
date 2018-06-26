<?php

// oQuiz => app/
// Controllers => Controllers/
// au final => app/Controllers/
namespace oQuiz\Controllers;
use oQuiz\Models\QuizModel;
use oQuiz\Models\QuestionModel;
use oQuiz\Utils\User;




class QuizController extends CoreController {
    public function myAccount($urlParams) {

        // Je veux les quiz de l'utilisateur
        $quizByAuthorID = QuizModel::findByAuthor($urlParams['id']);
        
        // J'envoie mes données aux views
        $dataToViews = [
            'quizOfAuthor' => $quizByAuthorID
        ];
        $this->show('user/mon_compte', $dataToViews);
    }

    public function quizDetail($urlParams) {
        $id = $urlParams['id'];

        // Je veux le contenu d'un seul quiz
        $quizById = QuizModel::findById($id);
        $questionByQuizId = QuestionModel::findQuizById($id);

        $currentUrl = $_SERVER['REQUEST_URI'];

        // J'envoie mes données aux views
        $dataToViews = [
            'quizOfAuthor' => $quizById,
            'questionsOfQuiz' => $questionByQuizId,
            'url' => $currentUrl,
            'id' => $id
        ];

        $this->show('front/quiz', $dataToViews);

    
    }

}