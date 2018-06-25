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

        // $id_author = $urlParams['id_author'];
        // Je veux les quiz de mon compte
        $quizByAuthorID = QuizModel::findByAuthor($urlParams['id']);
        
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
        $questionByQuizId = QuestionModel::findQuizById($id);

        $currentUrl = $_SERVER['REQUEST_URI'];

        $dataToViews = [
            'quizOfAuthor' => $quizById,
            'questionsOfQuiz' => $questionByQuizId,
            'url' => $currentUrl,
            'id' => $id
        ];

        

        $this->show('front/quiz', $dataToViews);

    
    }

}