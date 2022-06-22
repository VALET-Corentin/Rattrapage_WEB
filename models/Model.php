<?php

//Contien les méthodes communes

abstract class Model
{
    private static $_bdd;

    //Instantiation de la bdd
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8', 'root', '');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //Récupère la connexion à la bdd
    protected function getBdd()
    {
        if(self::$_bdd == null)
            self::setBdd();
        return self::$_bdd;

    }

    protected function getAll($table, $obj)
    {
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM ' .$table. ' ORDER BY id desc');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}