<?php

class Database{

    private static $_database;

    //
    //INSTANCIE LA CONNEXION A LA DATABASE
    //
    protected static function setDatabase(){

        self::$_database = new PDO (
            "mysql:host=localhost;dbname=cogip;charset=utf8",'root',''
        );

        self::$_database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }


    //
    //RECUPERE LA CONNEXION A LA DATABASE
    //
    protected function getDatabase(){

        if(self::$_database === null){
            self::setDatabase();
        }

        return self::$_database;
    }


    //
    //FONCTION POUR RECUPERER CHAQUE TABLES AVEC COMME PARAM LE NOM DU TABLEAU ET LA CLASSE A CREER POUR AFFICHER LES DATAS
    //
    protected function getTable($table,$obj){

        $tab = [];

        $req = self::$_database->prepare('SELECT * FROM '.$table.' ORDER BY id asc');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){

            //
            //crée une nouvelle instance de l'objet facture
            //
            $tab[] = new $obj($data);
        }

        return $tab;
        $req->closeCursor();
    }
}
