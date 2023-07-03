<?php
date_default_timezone_set('America/New_York');
include_once 'database/predication.php';
include_once 'database/citation.php';
include_once 'database/suggestion.php';
class DataBase
{

    private $pdo;

    public function __construct()
    {

        try {
            $user = "root";
            $password = "";
            $this->pdo = new PDO('mysql:host=localhost;dbname=believegod;charset=utf8', $user, $password);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }



    public function predication()
    {
        return new PredicationDAO($this->pdo);
    }

    public function citation()
    {
        return new CitationDAO($this->pdo);
    }

    public function suggestion()
    {
        return new SuggestionDAO($this->pdo);
    }
}
