<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/CvModel.php';
require_once SERVICE_PATH . '/baseService.php'; // Import de la fonction safeValue et import de la fonction getAge
require_once REPOSITORY_PATH . '/cvRepository.php'; // Import du repository pour récupérer les données du CV

$repository = new CvRepository();
$cv = $repository->findById(1);
if (!$cv) {
    // Redirection ou message d’erreur propre
    http_response_code(404);
    echo 'CV non trouvé.';
    exit;
}


