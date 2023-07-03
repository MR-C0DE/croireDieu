<?php

class Suggestion
{
    private $id;
    private $titre;
    private $lienAbout;
    private $description;
    private $date_publication;

    // Constructeur
    public function __construct($id, $titre, $lienAbout, $description, $date_publication)
    {
        $this->id = $id;
        $this->titre = trim($titre);
        $this->lienAbout = $lienAbout;
        $this->description = trim($description);
        $this->date_publication = $date_publication;
    }

    // Getter pour l'ID
    public function getId()
    {
        return $this->id;
    }

    // Setter pour l'ID
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter pour le titre
    public function getTitre()
    {
        return $this->titre;
    }

    // Setter pour le titre
    public function setTitre($titre)
    {
        $this->titre = trim($titre);
    }

    // Getter pour le lienAbout
    public function getLienAbout()
    {
        return $this->lienAbout;
    }

    // Setter pour le lienAbout
    public function setLienAbout($lienAbout)
    {
        $this->lienAbout = $lienAbout;
    }

    // Getter pour la description
    public function getDescription()
    {
        return $this->description;
    }

    // Setter pour la description
    public function setDescription($description)
    {
        $this->description = trim($description);
    }

    // Getter pour la date de publication
    public function getDatePublication()
    {
        return $this->date_publication;
    }

    // Setter pour la date de publication
    public function setDatePublication($date_publication)
    {
        $this->date_publication = $date_publication;
    }
}
