<?php

// oQuiz => app/
// Controllers => Controllers/
// au final => app/Controllers/
namespace oQuiz\Controllers;
use oQuiz\Models\UserModel;

class UserController extends CoreController {
    public function myAccount() {
        // Je veux les quiz de mon compte
        $quizByID = UserModel::find(1);
        
        $dataToViews = [
            'quizOfAuthor' => $quizByID
        ];
        $this->show('user/mon_compte', $dataToViews);
    }

}