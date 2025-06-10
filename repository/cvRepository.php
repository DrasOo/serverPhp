<?php

class CvRepository
{
    private $cvList = [];

    public function __construct()
    {
        $path = REPOSITORY_PATH . '/DataCv.json'; // Chemin vers le fichier JSON contenant les données des CV
        if (file_exists($path)) {
            $jsonData = file_get_contents($path); // Lit le contenu du fichier JSON
            $data = json_decode($jsonData, true); // Décode le JSON en tableau associatif
            if (is_array($data)) {
                foreach ($data as $cvData) {
                    $this->cvList[] = new DataCV($cvData); // Crée une instance de DataCV pour chaque entrée et l'ajoute à la liste
                }
            }
        }
    }

    public function findById($id) // Trouve un CV par son ID
    {
        foreach ($this->cvList as $cv) {
            if ($cv->getId() == $id) {
                return $cv; // Retourne le CV correspondant à l'ID
            }
        }
        return null; // Retourne null si aucun CV n'est trouvé
    }

    public function findAll() // Retourne tous les CV dans une liste
    {
        return $this->cvList;
    }

    /*public function save($data)
    {
        $data['id'] = count($this->cvList) + 1;
        $this->cvList[] = $data;
        return true;
    }*/

    
}