<?php

// oQuiz => app/
// Controllers => Controllers/
// au final => app/Controllers/
namespace oQuiz\Controllers;
use oQuiz\Models\QuizModel;

class MainController extends CoreController {
    public function indexAction() {
        // Je veux tous les quiz de la DB
        $quizList = QuizModel::findAll();
        
        // J'envoie mes données aux views
        $dataToViews = [
            'listOfQuiz' => $quizList,
        ];
        $this->show('main/home', $dataToViews);
    }

}
