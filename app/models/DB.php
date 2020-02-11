<?php
namespace App\Model;

use PDOStatement;

class DB {

    private $pdo = null;
    private static $instance = null;
    const DB_HOST = 'localhost';
    const DB_DATABASE = 'chall_web';
    const DB_USER = 'root';
    const DB_PASS = 'root';

    /**
     * Constructeur permettant d'initialiser la connexion
     * à la base de donnée
     */
    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_DATABASE, self::DB_USER, self::DB_PASS.'');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Retourne une instance de pdo
     *
     * @return DB|null
     */
    public static function get()
    {
        if(!self::$instance)
            self::$instance = new DB();
        return self::$instance;
    }

    /**
     * @param $query
     * @return false|PDOStatement
     */
    public function query($query)
    {
        return $this->pdo->query($query);
    }

    /**
     * @param $query
     * @return bool|PDOStatement
     */
    public function prepare($query)
    {
        return $this->pdo->prepare($query);
    }

    public static function save($sql, $params)
    {
        $req = self::get()->prepare($sql);
        for ($i = 0; $i < count($params); $i++) {
            $req->bindParam($i + 1, $params[$i]);
        }
        $req->execute();
    }

    public static function fetchAll($sql)
    {

        return self::get()->query($sql)->fetchAll();
    }

    public static function fetch($sql, $column)
    {
        return self::get()->query($sql)->fetch()[$column];
    }

    /**
     * @return string
     */
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

}