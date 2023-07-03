<?php

class CitationDAO
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($citation)
    {


        $query = "INSERT INTO citations (titre, lien_lecture, lien_telecharger, citation, status,  date_publication) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$citation->getTitre(), $citation->getLienLecture(), $citation->getLienTelecharger(), $citation->getCitation(), $citation->getStatus(), $citation->getDatePublication()]);
        $citation->setId($this->db->lastInsertId());
        return $citation;
    }


    public function getById($id)
    {
        $query = "SELECT * FROM predications WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($predication)
    {
        $query = "UPDATE predications SET titre = ?, lien_lecture = ?, lien_telecharger = ?, date = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$predication->getTitre(), $predication->getLienLecture(), $predication->getLienTelecharger(), $predication->getDate(), $predication->getId()]);
        return $stmt->rowCount() > 0;
    }

    public function delete($id)
    {
        $query = "DELETE FROM citations WHERE citation_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function getAll()
    {
        $query = "SELECT * FROM citations ORDER BY citation_id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $citations = [];
        foreach ($results as $result) {
            $citation = new Citation(
                $result['titre'],
                $result['lien_lecture'],
                $result['lien_telecharger'],
                $result['citation'],
                $result['status'],
                $result['date_publication']
            );
            $citation->setId($result['citation_id']);
            $citations[] = $citation;
        }

        return $citations;
    }


    public function updateStatus($id)
    {
        $query = "UPDATE citations SET status = CASE WHEN citation_id = ? THEN 'active' ELSE 'desactive' END";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function getActiveElement()
    {
        $query = "SELECT * FROM citations WHERE status = 'active' LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Citation(
            $result['titre'],
            $result['lien_lecture'],
            $result['lien_telecharger'],
            $result['citation'],
            $result['status'],
            $result['date_publication']
        );
    }
}
