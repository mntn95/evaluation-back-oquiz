<?php

namespace oQuiz\Models; 

use oQuiz\Utils\Database; 
use PDO;

// abstract => interdiction de créer une instance de cette classe
abstract class CoreModel {
    protected $id;
    // self => la classe dans laquelle est écrit le mot clé "self"
    // static => la classe courante = la classe depuis laquelle on a appelé la méthode
    // parent => la classe parente (dont on a hérité)
    // $this => l'objet courant
    // &copy; Georges : self c'est la classe où est écrit le code, static c'est la classe qui est en train d'utiliser la méthode




    // Je veux récuperer tous les éléments de la table
    public static function findAll() : array {

        $sql = '
            SELECT *
            FROM '.static::TABLE_NAME.'
        ';
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);
        
        return $result;
    }



    // Méthode permettant de sauvegarder l'objet en DB
    public function save() : bool {
       // Si l'objet courant correspond à une ligne existante en DB
       if ($this->id > 0) {
        // Alors mise à jour
        return $this->update();
    }
    else {
        // Sinon, ajout (puis la propriété id récupère la nouvelle valeur)
        return $this->insert();
    }
    }

    // Je veux récuperer les élements de la table qui ont l'id voulue
    public static function findById(int $id) {
        $sql = '
        SELECT *
        FROM '.static::TABLE_NAME.'
        WHERE id = :id
        ';
        $pdo = Database::getPDO();
        
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        
        $pdoStatement->execute();
        
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);
        return $result;
    }

    // Pour être certain que les 4 méthodes du CRUD soient implémentées parmi les enfants de CoreModel
    // Je déclare des méthodes abstraites
    abstract protected function find() : bool;
    abstract protected function insert() : bool;
    abstract protected function update() : bool;
    abstract protected function delete() : bool;



    // GETTERS
    public function getId() : int {
        return $this->id;
    }
    
}
