<?php

namespace oQuiz\Models; 

use oQuiz\Utils\Database; 
use PDO;



 class QuestionModel extends CoreModel {
    /** @var string */
    protected $id_quiz;
    /** @var string */
    protected $question;
    /** @var string */
    protected $prop1;
    /** @var string */
    protected $prop2;
    /** @var string */
    protected $prop3;
    /** @var string */
    protected $prop4;
    /** @var int */
    protected $id_level;
    /** @var string */
    protected $anecdote;
    /** @var string */
    protected $wiki;

    const TABLE_NAME = 'questions';

    // Je crée une méthode qui va gérer les propositions
    public function __construct($shuffledProps=[], $props1='', $props2='', $props3='', $props4='') {
        // Je crée un array qui va récuperer ces propositions et les stocker
        // J'indique à l'avance si la réponse est correcte ou fausse
        $props = [
          $props1 = [ 'right'=> $this ->getProp1()],
          $props2 = [ 'wrong'=> $this ->getProp2()],
          $props3 = [ 'wrong'=> $this ->getProp3()],
          $props4 = [ 'wrong'=> $this ->getProp4()]
        ];

        // Je mélange l'array
        shuffle($props);

        // Je les stocke dans leur propriétés respectives, melangées cette fois-ci
        $shuffledProps = [
          $this->prop1 = $props[0],
          $this->prop2 = $props[1],
          $this->prop3 = $props[2],
          $this->prop4 = $props[3]
        ];
    }

    // Je veux récuperer questions qui ont l'id voulue
    public static function findById(int $id) {
        $questionById = parent::findById($id);
     
        return $questionById;
    }

    // Je veux récupérer les levels en faisant un JOIN
    public static function findLevelById(int $id) {
        $sql = '
        SELECT name
        FROM levels JOIN '.static::TABLE_NAME.'
        ON levels.id = '.static::TABLE_NAME.'.id_level 
        WHERE '.static::TABLE_NAME.'.id = :id
        ';

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        
        $result = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Je veux récuperer les quiz par leur ID
    public static function findQuizById(int $id) {
        $sql = '
        SELECT *
        FROM '.static::TABLE_NAME.'
        WHERE id_quiz = :id
        ';
        $pdo = Database::getPDO();

            $pdoStatement = $pdo->prepare($sql);

            $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

            $pdoStatement->execute();

            $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);
            return $result;
    }

    // CRUD
    protected function find() : bool {}
    protected function insert() : bool {}
    protected function update() : bool {}
    protected function delete() : bool {}

    /**
     * Get the value of id_quiz
     */ 
    public function getId_quiz()
    {
        return $this->id_quiz;
    }

    /**
     * Set the value of id_quiz
     *
     * @return  self
     */ 
    public function setId_quiz($id_quiz)
    {
        $this->id_quiz = $id_quiz;

        return $this;
    }

    /**
     * Get the value of question
     */ 
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set the value of question
     *
     * @return  self
     */ 
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get the value of prop1
     */ 
    public function getProp1()
    {
        return $this->prop1;
    }

    /**
     * Set the value of prop1
     *
     * @return  self
     */ 
    public function setProp1($prop1)
    {
        $this->prop1 = $prop1;

        return $this;
    }

    /**
     * Get the value of prop2
     */ 
    public function getProp2()
    {
        return $this->prop2;
    }

    /**
     * Set the value of prop2
     *
     * @return  self
     */ 
    public function setProp2($prop2)
    {
        $this->prop2 = $prop2;

        return $this;
    }

    /**
     * Get the value of prop3
     */ 
    public function getProp3()
    {
        return $this->prop3;
    }

    /**
     * Set the value of prop3
     *
     * @return  self
     */ 
    public function setProp3($prop3)
    {
        $this->prop3 = $prop3;

        return $this;
    }

    /**
     * Get the value of prop4
     */ 
    public function getProp4()
    {
        return $this->prop4;
    }

    /**
     * Set the value of prop4
     *
     * @return  self
     */ 
    public function setProp4($prop4)
    {
        $this->prop4 = $prop4;

        return $this;
    }

    /**
     * Get the value of id_level
     */ 
    public function getId_level()
    {
        return $this->id_level;
    }

    /**
     * Set the value of id_level
     *
     * @return  self
     */ 
    public function setId_level($id_level)
    {
        $this->id_level = $id_level;

        return $this;
    }

    /**
     * Get the value of anecdote
     */ 
    public function getAnecdote()
    {
        return $this->anecdote;
    }

    /**
     * Set the value of anecdote
     *
     * @return  self
     */ 
    public function setAnecdote($anecdote)
    {
        $this->anecdote = $anecdote;

        return $this;
    }

    /**
     * Get the value of wiki
     */ 
    public function getWiki()
    {
        return $this->wiki;
    }

    /**
     * Set the value of wiki
     *
     * @return  self
     */ 
    public function setWiki($wiki)
    {
        $this->wiki = $wiki;

        return $this;
    }
 }