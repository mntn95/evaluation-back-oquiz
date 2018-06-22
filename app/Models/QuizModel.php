<?php

namespace oQuiz\Models; // TODO changer namespace

use oQuiz\Utils\Database; // TODO changer namespace
use PDO;



 class QuizModel extends CoreModel {
    /** @var string */
    protected $title;
    /** @var string */
    protected $description;
    /** @var int */
    protected $id_author;




    // self => la classe dans laquelle est écrit le mot clé "self"
    // static => la classe courante = la classe depuis laquelle on a appelé la méthode
    // parent => la classe parente (dont on a hérité)
    // $this => l'objet courant
    // &copy; Georges : self c'est la classe où est écrit le code, static c'est la classe qui est en train d'utiliser la méthode
    




    const TABLE_NAME = 'quizzes';



    public static function findAll() : array {
        
        // J'utilise la méthode qui a été héritée (celle du parent)
        $quizList = parent::findAll();
     
        return $quizList;
    }

    public static function find(int $id_author) {
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

    public static function findById() {
        $sql = '
        SELECT *
        FROM '.static::TABLE_NAME.'
        WHERE id = :id
    ';
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