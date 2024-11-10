<?php

namespace App\Models\Manager;

use App\Core\Interfaces\ManagerInterfaces;
use PDO;
use PDOStatement;

/**
 * Class Manager
 *
 * Classe abstraite pour gérer les opérations de base sur une table de base de données.
 * Implémente l'interface ManagerInterfaces.
 */
abstract class Manager implements ManagerInterfaces
{
    /**
     * @var PDO Instance de PDO pour l'accès à la base de données.
     */
    protected PDO $pdo;

    /**
     * @var string Nom de la table cible dans la base de données.
     */
    protected string $table;

    /**
     * Constructeur de la classe Manager.
     *
     * @param PDO $pdo Instance PDO pour la connexion à la base de données.
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;

        $table = get_called_class();
        $table = str_replace(__NAMESPACE__ . '\\', '', $table);
        $table = str_replace('Manager', '', $table);
        $this->table = strtolower($table);
    }

    /**
     * Prépare et exécute une requête SQL.
     *
     * @param string $sql La requête SQL à exécuter.
     * @param array|null $conditions Les conditions pour la requête (optionnel).
     * @return PDOStatement Résultat de la requête.
     */
    public function statement(string $sql, array $conditions = null): PDOStatement
    {
        if (is_null($conditions)) {
            $q = $this->pdo->query($sql);
        } else {
            $q = $this->pdo->prepare($sql);
            $q->execute($conditions);
        }
        return $q;
    }

    /**
     * Récupère tous les enregistrements de la table.
     *
     * @return array Liste des enregistrements.
     */
    public function findAll(): array
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $q = $this->statement($sql);
        return $q->fetchAll();
    }

    /**
     * Récupère un enregistrement unique par son identifiant.
     *
     * @param int $id Identifiant de l'enregistrement.
     * @return array|false L'enregistrement ou false s'il n'existe pas.
     */
    public function findOne(int $id): array|false
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id=?';
        $q = $this->statement($sql, [$id]);
        return $q->fetch();
    }

    /**
     * Ajoute un nouvel enregistrement à la table.
     *
     * @param array $data Données à insérer.
     * @return int L'ID de l'enregistrement inséré.
     */
    public function add(array $data): int
    {
        $champs = [];
        $valeurs = [];
        $interrogations = [];
        foreach ($data as $key => $value) {
            $champs[] = $key;
            $interrogations[] = '?';
            $valeurs[] = $value;
        }

        $sql = 'INSERT INTO ' . $this->table . '('
            . implode(', ', $champs)
            . ') VALUES ('
            . implode(', ', $interrogations)
            . ')';

        $q = $this->statement($sql, $valeurs);

        return $this->pdo->lastInsertId();
    }

    /**
     * Supprime un enregistrement de la table par son identifiant.
     *
     * @param int $id Identifiant de l'enregistrement.
     * @return bool True si la suppression a réussi, sinon false.
     */
    public function delete(int $id): bool
    {
        $sql = 'SELECT COUNT(id) FROM ' . $this->table . ' WHERE id= ?';
        $q = $this->statement($sql, [$id]);
        if (!$q->fetchColumn()) {
            return false;
        }

        $sql = 'DELETE FROM ' . $this->table . ' WHERE id= ?';
        $q = $this->pdo->prepare($sql);
        return $q->execute([$id]);
    }

    /**
     * Met à jour un enregistrement de la table.
     *
     * @param array $data Données de mise à jour.
     * @param int $id Identifiant de l'enregistrement à mettre à jour.
     * @return array Les données de l'enregistrement mis à jour.
     */
    public function update(array $data, int $id): array
    {
        $sets = [];
        $valeurs = [];
        foreach ($data as $key => $value) {
            $sets[] = $key . ' = ?';
            $valeurs[] = $value;
        }
        $valeurs[] = $id;

        $sql = 'UPDATE ' . $this->table . ' SET '
            . implode(', ', $sets)
            . ' WHERE id= ?';

        $q = $this->statement($sql, $valeurs);

        return $this->findOne($id);
    }
}
