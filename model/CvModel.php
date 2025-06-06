<?php
require_once '../bootstrap.php';
function getDataCv() {
    return[[             //Tableau multi 
        'id' => 1,
        'name' => 'Martin',
        'firstName' => 'Enzo',
        'region' => 'France',
        'job' => 'Etudiant',
        'birth' => '03/06/2005',
        'city' => 'Angers',
        'skills' => [''], // Tableau de compétences  'PHP', 'JavaScript', 'HTML', 'CSS','MySQL'
        'email' => 'enzo.martin6885@gmail.com'
    ]];
}