<?php


class Citation
{
    private $id;
    private $titre;
    private $lienLecture;
    private $lienTelecharger;
    private $citation;
    private $status;
    private $datePublication;

    public function __construct($titre, $lienLecture, $lienTelecharger, $citation, $status, $datePublication)
    {
        $this->titre = $titre;
        $this->lienLecture = $lienLecture;
        $this->lienTelecharger = $lienTelecharger;
        $this->citation = trim($citation);
        $this->status = $status;
        $this->datePublication = $datePublication;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getLienLecture()
    {
        return $this->lienLecture;
    }

    public function setLienLecture($lienLecture)
    {
        $this->lienLecture = $lienLecture;
    }

    public function getLienTelecharger()
    {
        return $this->lienTelecharger;
    }

    public function setLienTelecharger($lienTelecharger)
    {
        $this->lienTelecharger = $lienTelecharger;
    }

    public function getCitation()
    {
        return $this->citation;
    }

    public function setCitation($citation)
    {
        $this->citation = trim($citation);
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getDatePublication()
    {
        return $this->datePublication;
    }

    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;
    }
}
