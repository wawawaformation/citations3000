<?php
namespace App\Core\Database;

use PDO;
use PDOException;

/**
 * Class Db
 *
 * Classe de connexion à la base de données étendant PDO.
 * Implémente un singleton pour assurer une instance unique de la connexion.
 */
class Db extends PDO
{
    /**
     * @var Db|null Instance unique de la classe Db (singleton).
     */
    static $instance;

    /**
     * Constructeur de la classe Db.
     *
     * @param string $dsn La chaîne de connexion DSN pour la base de données.
     * @param string $username Nom d'utilisateur pour la connexion.
     * @param string $password Mot de passe pour la connexion.
     */
    public function __construct(
        string $dsn = 'mysql:host=localhost;dbname=quotes', 
        string $username = 'root', 
        string $password = ''
    ) {
        parent::__construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Retourne l'instance unique de la classe Db.
     *
     * @return Db Instance de la connexion à la base de données.
     */
    static function getInstance(): Db
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}
