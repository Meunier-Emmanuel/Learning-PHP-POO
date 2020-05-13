<?php

class db{

    private $db;

    public function __construct($name)
    {
        try
        {
            $this->db = new PDO('mysql:host=localhost;dbname='.$name.';charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
        
    }

    public function getDb(){
        return $this->db ; 
    }
}