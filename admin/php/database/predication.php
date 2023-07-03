<?php

class PredicationDAO
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($predication)
    {
        print_r($predication);

        $query = "INSERT INTO predications (titre, lien_lecture, lien_telecharger, status,  date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$predication->getTitre(), $predication->getLienLecture(), $predication->getLienTelecharger(), $predication->getStatus(), $predication->getDate()]);
        $predication->setId($this->db->lastInsertId());
        return $predication;
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
        $query = "DELETE FROM predications WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function getAll()
    {
        $query = "SELECT * FROM predications";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $predications = [];
        foreach ($results as $result) {
            $predication = new Predication(
                $result['titre'],
                $result['lien_lecture'],
                $result['lien_telecharger'],
                $result['status'],
                $result['date']
            );
            $predication->setId($result['id']);
            $predications[] = $predication;
        }

        return $predications;
    }


    public function updateStatus($id)
    {
        $query = "UPDATE predications SET status = CASE WHEN id = ? THEN 'active' ELSE 'desactive' END";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function getActiveElement()
    {
        $query = "SELECT * FROM predications WHERE status = 'active' LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Predication(
            $result['titre'],
            $result['lien_lecture'],
            $result['lien_telecharger'],
            $result['status'],
            $result['date']
        );
    }
}
