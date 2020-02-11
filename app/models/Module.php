<?php

use App\Model\DB;

require 'DB.php';

class Module {

    private $pdo;

    public function __construct()
    {
        $this->pdo = DB::get();
    }

    public function create($libelle)
    {
        $req = $this->pdo->prepare('INSERT INTO module(libele) VALUES (?)');
        $req->bindParam(1, $libelle);
        $req->execute();

        header('Location: index.php');
    }

    public function show($id)
    {

    }

    public function update($id, $libelle)
    {
        $req = $this->pdo->prepare('UPDATE module SET libele = ? WHERE id = ' . $id);
        $req->bindParam(1, $libelle);
        $req->execute();

        header('Location: index.php');
    }

    public function delete($id)
    {

    }

    public function all()
    {
        return $modules = $this->pdo->query('SELECT * from module')->fetchAll();
    }

}