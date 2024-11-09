<?php
/**
 * Manager de la table authors
 */

 namespace App\Models\Manager;
 use \PDO;
 use \PDOException;
 use \App\Core\Database\Db;

 /**
  * Gère les tuples dans la tables authors (CRUD)
  */
 class AuthorsManager
 {
    private PDO $pdo;

    /**
     * Instancie la classe PDO
     */
    public function __construct(PDO $db)
    {
        $this->pdo = $db;
    }

    function findAll()
    {
        $sql = 'SELECT * FROM quotes';
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

 }