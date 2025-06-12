<?php
require_once REPOSITORY_PATH . '/CvRepository.php';

// on recupère les données sans en connaitre la source
//$repo = new CvRepository();
//$repo = new CvRepository('json');
//$repo = new CvRepository('fake_db');
$repo = new CvRepository('database'); // Connexion à la base de données


$user = $repo->findById(1);