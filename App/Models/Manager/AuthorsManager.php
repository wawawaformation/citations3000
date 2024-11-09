<?php
/**
 * Manager de la table authors
 */

 namespace App\Models\Manager;
 use App\Core\Interfaces\ManagerInterfaces;
 use \PDO;
 use \PDOException;
 use \App\Core\Database\Db;

 /**
  * Gère les tuples dans la tables authors (CRUD)
  */
 class AuthorsManager implements ManagerInterfaces
 {
    private PDO $pdo;

    /**
     * Instancie la classe PDO
     */
    public function __construct(PDO $db)
    {
        $this->pdo = $db;
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM authors';
        $q = $this->pdo->query($sql);
        return $q->fetchAll();
    }

    public function findOne(int $id): array
    {
        $sql = 'SELECT * FROM authors WHERE id = ?';
        $q = $this->pdo->prepare($sql);
        $q->execute([$id]);
        return $q->fetch();
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM authors WHERE id= ?';
        $q = $this->pdo->prepare($sql);
        return $q->execute([$id]);
    }

    public function add(array $data): int
    {
        $champs = [];
        $valeurs = [];
        $interrogations = [];
        foreach($data as $key=>$value)
        {
            $champs[]=$key;
            $interrogations[] = '?';
            $valeurs[] = $value;
        }

        $sql = 'INSERT INTO authors('
            .implode(', ', $champs)
            .') VALUES ('
            .implode(', ', $interrogations);

        $q = $this->pdo->prepare($sql);
        $q->execute($valeurs);

        return $this->pdo->lastInsertId();
    }


    public function update(array $data, int $id): array
    {
        //UPDATE authors set champ=?, champ=?
        $sets = [];
        $valeurs = [];
        foreach($data as $key=>$value)
        {
            $sets[] = $key . ' = ?';
            $valeurs[] = $value;
        }
        $valeurs[] = $id;

        $sql = 'UPDATE authors ' 
            . implode(', ', $sets)
            . ' WHERE id= ?';

        $q = $this->pdo->prepare($sql);
        $q->execute($valeurs);

        return $this->findOne($id);
    }



  
 }