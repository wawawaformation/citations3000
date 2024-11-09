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

    public function findAll():array
    {
        $sql = 'SELECT * FROM quotes';
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOne(int $id): array
    {
        $sql = 'SELECT * FROM quotes WHERE id = ?';
        $q = $this->pdo->prepare($sql);
        $q->execute([$id]);
        return $q->fetch();
    }

    public function delete(int $id) : bool
    {
        $sql = 'DELETE FROM quotes WHERE id=?';
        $q = $this->pdo->prepare($sql);
        return $q->execute([$id]);
    }

    public function add(array $data): int
    {
        //INSERT INTO quotes (champs) VALUES (?)

        $champs = [];
        $interrogations = [];
        $valeurs = [];

        foreach($data as $key=>$value){
            $champs[] = $key;
            $interrogations[] = '?';
            $valeurs[] = $value;
        }

        $sql = 'INSERT INTO quotes(' 
            . implode(', ', $champs) 
            . ') VALUES ('
            . implode(', ', $interrogations);

        $q = $this->pdo->prepare($sql);
        $q->execute($valeurs);
        return $this->pdo->lastInsertId();

      }

    public function update(array $data, int $id): array
    {
        //UPDATE quotes SET
        // $champs = ?, $cha
        $champs = [];
        $valeurs = [];
        foreach($data as $key=>$value){
            $champs[] = $key . ' = ?';
            $valeurs[] = $value;
        }

        $valeurs[] = $id;

        $sql = 'UPDATE quotes SET '
            .implode(', ', $champs)
            . ' WHERE id= ?';

        $q = $this->pdo->prepare($sql);
        $q->execute($valeurs);

        return $this->findOne($id);
    }

  
 }