<?php

class Predication
{
    private $id;
    private $titre;
    private $lienLecture;
    private $lienTelecharger;
    private $status;
    private $date;

    public function __construct($titre, $lienLecture, $lienTelecharger, $status, $date)
    {
        $this->titre = $titre;
        $this->lienLecture = $lienLecture;
        $this->lienTelecharger = $lienTelecharger;
        $this->status = $status;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getLienLecture()
    {
        return $this->lienLecture;
    }

    public function getLienTelecharger()
    {
        return $this->lienTelecharger;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setLienLecture($lienLecture)
    {
        $this->lienLecture = $lienLecture;
    }

    public function setLienTelecharger($lienTelecharger)
    {
        $this->lienTelecharger = $lienTelecharger;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
}
