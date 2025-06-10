<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/CvModel.php';
require_once SERVICE_PATH . '/baseService.php'; // Import de la fonction safeValue et import de la fonction getAge
require_once MODEL_PATH . '/modelPOO.php'; // Import de la classe DataCV
require_once REPOSITORY_PATH . '/cvRepository.php'; // Import du repository pour récupérer les données du CV

$firstCvRepo = new CvRepository(); // On crée une instance de CvRepository pour accéder aux données du CV
$cv = $firstCvRepo->findById(1); // On cherche le CV avec l'ID 1 (le mien)

if ($cv !== null) {
    $firstCv = $cv; // On stocke le CV trouvé dans la variable $firstCv

    $name = $firstCv->getName();
    $firstName = $firstCv->getFirstName();
    $region = $firstCv->getRegion();
    $city = $firstCv->getCity();
    $job = $firstCv->getJob();
    $birth = $firstCv->getBirth();
    $skills = $firstCv->getSkills();
    $email = $firstCv->getEmail();
    $age = getAge($birth); // On utilise la fonction getAge pour calculer l'âge à partir de la date de naissance
    $id = $firstCv->getId();
    // fallback skills si nécessaire
    if ($skills === null || !is_array($skills)) {
        $skills = []; // Si le $skills n'est pas un tableau, on initialise à un tableau vide grâce à getValue et is_array
    }
} else {
    // Gérer le cas où aucun CV n'est trouvé
    $name = $firstName = $region = $city = $job = $birth = $email = null;
    $skills = [];
    $age = $id = null;
}


