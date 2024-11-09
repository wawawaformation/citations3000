<?php
namespace App\Core\Database;
use PDO;
use PDOException;

class Db extends PDO
{
    static $instance;
    public function __construct(
        string $dsn='mysql:host=localhost;dbname=quotes', 
        string $username = 'root', 
        string $password = '')
        {
           parent::__construct($dsn, $username, $password);
           $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
        
        }

    static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new self;
        }

        return self::$instance;
    }
}