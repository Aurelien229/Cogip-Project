<?php

class Invoices{

    private $_id;
    private $_ref;
    private $created_at;
    private $update_at;

     //
    //CETTE FONCTION VA NOUS RENVOYER AUX SETTERS POUR METTRE A JOUR LES DATAS RECUPERES SUR LES PROPRIETES AU DESSUS MAIS AVEC CERTAINS CONDITIONS
    //
    public function __construct(array $data){

        $this->hydrate($data);
    }

    public function hydrate(array $data){

        foreach ($data as $key => $value) {
            
            $method = 'set'.ucfirst($key);

            //
            //VERIFICATION SI LA METHODE EXISTE
            //

            if(method_exists($this,$method)){

                $this->{$method}($value);
            }
        }
    }

    //
    //SETTERS DOIT AVOIR LES MEMES NOMS QUE LES NOMS DES COLONNES DANS LES TABLES
    //
    public function setId($id){

        $id = (int) $id;

        if($id > 0){

            $this->_id = $id;
        }
    }

    public function setRef($ref){

        if(is_string($ref)){

            $this->_ref = $ref;
        }
    }

    public function setCreated_at($dateCreated){

        $this->created_at = $dateCreated;
    }

    public function setUpdate_at($dateUptade){

        $this->update_at = $dateUptade;
    }

    public function getId(){

        $id = $this->_id;

        return $id;
    }

    public function getRef(){

        $ref = $this->_ref;

        return $ref;
    }

    public function getCreated_at(){

        $dateCreated = $this->created_at;

        return $dateCreated;
    }

    public function getUpdate_at(){

        $dateUptade = $this->update_at;

        return $dateUptade;
    }

    
}