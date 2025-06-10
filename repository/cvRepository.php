<?php

class CvRepository
{
    private $cvList = [];

    public function __construct()
    {
        
        $this->cvList = [
            new DataCV([
                'id' => 1,
                'name' => 'Martin',
                'firstName' => 'Enzo',
                'region' => 'France',
                'city' => 'Angers',
                'job' => 'Étudiant',
                'birth' => '2005-06-03',
                'skills' => ['PHP 8', 'JavaScript', 'HTML5', 'CSS3', 'MySQL'],
                'email' => 'enzo.martin6885@gmail.com'
            ]),
            new DataCV([
                'id' => 2,
                'name' => 'Dupont',
                'firstName' => 'Sophie',
                'region' => 'France',
                'city' => 'Nantes',
                'job' => 'Développeuse',
                'birth' => '1998-02-14',
                'skills' => ['Java', 'React', 'Symfony'],
                'email' => 'sophie.dupont@gmail.com'
            ])
        ];
    }

    public function findById($id)
    {
        foreach ($this->cvList as $cv) {
            if ($cv->getId() == $id) {
                return $cv;
            }
        }
        return null;
    }

    public function findAll()
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