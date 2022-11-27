<?php
namespace App\Models;

use \PDO;
use \PDOException;
use \PDOStatement;

class Database
{
    private string $host;
    private string $user;
    private string $pass;
    private string $dbName;
    private static ?PDO $connexion = NULL;
    private false|PDOStatement $request;

    /**
     * Constructeur de la classe Database
     * @param string $host Le host de la base de données
     * @param string $user L'utilisateur de la base de données
     * @param string $dbName Le nom de la base de données
     * @param string $pass Le mot de passe de la base de données
     */
    public function __construct(string $host, string $user, string $dbName, string $pass)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbName = $dbName;
    }

    /**
     * Connexion à la base de données à l'aide de PDO
     * @return PDO|PDOException
     */
    public static function connect (): PDO|PDOException
    {
        try
        {
            // Condition pour savoir si PDO a déjà été instancié
            // Cela permet de ne pas refaire de connexion à la base de donnée si elle a déjà été faite
            if (is_null(self::$connexion))
            {
                $path = "mysql:host=self::host;dbname=$this->dbName;charset=utf8";
                $pdo = new PDO($path, $this->user, $this->pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connexion = $pdo;
            }
            return self::$connexion;
        }
        catch (PDOException $e)
        {
            throw new PDOException($e->getMessage() , (int)$e->getCode());
        }
    }

    /**
     * Requête préparée
     * @param string $query La requête SQL
     * @param array $array Les paramètres SQL
     * @return bool|PDOStatement
     */
    public function prepReq(string $query, array $array = []): bool|PDOStatement
    {
        $this->request = $this->connect()->prepare($query);
        $this->request->execute($array);
        return $this->request;
    }

    /**
     * Récupère les données
     * @return bool|array
     */
    public function fetchData(): bool|array
    {
        return $this->request->fetchAll(PDO::FETCH_OBJ);
    }
}