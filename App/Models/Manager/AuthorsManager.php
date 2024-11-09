<?php
/**
 * Manager de la table authors
 */

 namespace App\Models\Manager;
 use \PDO;
 use \PDOException;

 /**
  * Gère les tuples dans la tables authors (CRUD)
  */
 class AuthorsManager
 {
    private PDO $pdo;

    /**
     * Instancie la classe PDO
     */
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=quotes', 'root', '');
    }

    function findAll()
    {
        $sql = 'SELECT * FROM quotes';
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

 }