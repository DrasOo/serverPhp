<?php
require_once '../../bootstrap.php';
require_once REPOSITORY_PATH . '/cvRepository.php';

header('Content-Type: application/json');

$repo = new CvRepository('database');
$users = $repo->findAll();

// Transforme tous les objets UserModel en tableaux
$userArray = array_map(fn($user) => $user->toArray(), $users);

echo json_encode(['data' => $userArray]);
exit;