<?php

namespace oQuiz\Models; 

use oQuiz\Utils\Database; 
use PDO;



 class QuizModel extends CoreModel {
    /** @var string */
    protected $title;
    /** @var string */
    protected $description;
    /** @var int */
    protected $id_author;


    const TABLE_NAME = 'quizzes';


    // Je veux récupérer tous les quiz
    public static function findAll() : array {
        
        // J'utilise la méthode qui a été héritée (celle du parent)
        $quizList = parent::findAll();
     
        return $quizList;
    }

    // Je veux récupérer les quiz de l'auteur
    public static function findByAuthor(int $id_author) {
       
        $sql = '
        SELECT *
        FROM '.static::TABLE_NAME.'
        WHERE id_author = :id_author
    ';
    $pdo = Database::getPDO();
    // J'utilise "prepare" !!
    $pdoStatement = $pdo->prepare($sql);
    // Je fais les bindValue
    $pdoStatement->bindValue(':id_author', $id_author, PDO::PARAM_INT);
    
    // J'exécute ma requete
    $pdoStatement->execute();
    
    // Je récupère le résultat sous forme d'objet
    // !Attention! Objet sous forme FQCN
    // self::class => a pour valeur le FQCN de la classe actuelle
    $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);
    
    return $result;
    }


    public static function findById(int $id) {
        $quizById = parent::findById($id);
     
        return $quizById;
    }


    // Méthode qui signe les quiz par l'id de leur auteur
    public static function findAuthorById(int $id) {
        $sql = '
        SELECT first_name
        FROM users JOIN quizzes
        ON users.id = quizzes.id_author 
        WHERE quizzes.id = :id
        ';
       
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        
        $result = $pdoStatement->fetchAll();
        return $result;
    }

    // Méthode qui change l'id de l'auteur par son nom
    public function findAuthorName($id) {
        return self::findAuthorById($id)[0][0];
    }

    // CRUD
    protected function find() : bool {

    }
    protected function insert() : bool {

    }
    protected function update() : bool {

    }
    protected function delete() : bool {

    }

    // GETTERS
    public function getTitle() : string {
        return $this->title;
    }
    public function getDescription() : string {
        return $this->description;
    }
    public function getIdAuthor() : int {
        return $this->id_author;
    }

    // SETTERS
    public function setTitle(string $title) {
        $this->title = $title;
    }
    public function setDescription(string $description) {
        $this->description = $description;
    }
    public function setIdAuthor(int $id_author) {
        $this->id_author = $id_author;
    }
}
