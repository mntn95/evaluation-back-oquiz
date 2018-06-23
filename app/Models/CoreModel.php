<?php

namespace oQuiz\Models; // TODO changer namespace

use oQuiz\Utils\Database; // TODO changer namespace
use PDO;

// abstract => interdiction de créer une instance de cette classe
abstract class CoreModel {
    protected $id;
    // self => la classe dans laquelle est écrit le mot clé "self"
    // static => la classe courante = la classe depuis laquelle on a appelé la méthode
    // parent => la classe parente (dont on a hérité)
    // $this => l'objet courant
    // &copy; Georges : self c'est la classe où est écrit le code, static c'est la classe qui est en train d'utiliser la méthode




    public static function findAll() : array {
        //echo self::class.'<br>';
        $sql = '
            SELECT *
            FROM '.static::TABLE_NAME.'
        ';
        $pdo = Database::getPDO();
        // J'utilise "prepare" !!
        $pdoStatement = $pdo->query($sql);
        
        // Je récupère le résultat sous forme d'array d'objets
        // !Attention! Objet sous forme FQCN
        // static::class => a pour valeur le FQCN de la classe actuelle
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);
        
        return $result;
    }



    // Méthode permettant de sauvegarder l'objet en DB
    public function save() : bool {
        // TODO
    }
        
    // Pour être certain que les 4 méthodes du CRUD soient implémentées parmi les enfants de CoreModel
    // Je déclare des méthodes abstraites
    public static function find(int $id_author) {
    }

    abstract protected function insert() : bool;
    abstract protected function update() : bool;
    abstract protected function delete() : bool;



    // GETTERS
    public function getId() : int {
        return $this->id;
    }
    
}
