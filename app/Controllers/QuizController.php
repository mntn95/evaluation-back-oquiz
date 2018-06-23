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
        $quizByAuthorID = QuizModel::find(1);
        
        $dataToViews = [
            'quizOfAuthor' => $quizByAuthorID
        ];
        $this->show('user/mon_compte', $dataToViews);
    }

    public function quizDetail($urlParams) {
        $id = $urlParams['id'];

        // Je veux un quiz depuis son ID
        $quizById = QuizModel::findById($id);
        $questionByQuizId = QuestionModel::findById($id);
        $bigProps = [];
        foreach($questionByQuizId as $key => $value) {
            $prop1 = $questionByQuizId[$key];
            $prop2 = $questionByQuizId[$key];
            $prop3 = $questionByQuizId[$key];
            $prop4 = $questionByQuizId[$key];
            
            $props = [
                'propo1' => $prop1->getProp1(),
                'propo2' => $prop2->getProp2(),
                'propo3' => $prop3->getProp3(),
                'propo4' => $prop4->getProp4()
            ];
            shuffle($props);
            array_push($bigProps, $props);
        };
        $dataToViews = [
            'quizOfAuthor' => $quizById,
            'questionsOfQuiz' => $questionByQuizId,
            'bigProps' => $bigProps
        ];
        dump($bigProps);

        $this->show('front/quiz', $dataToViews);
    }

}