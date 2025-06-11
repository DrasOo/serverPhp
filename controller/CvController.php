<?php
require_once REPOSITORY_PATH . '/CvRepository.php';
require_once SERVICE_PATH . '/baseService.php';

// on recupère les données sans en connaitre la source
//$repo = new CvRepository();
//$repo = new CvRepository('json');
$repo = new CvRepository('fake_db');

$cv = $repo->findById(1);
