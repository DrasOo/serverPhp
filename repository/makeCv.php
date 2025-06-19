<?php

require_once MODEL_PATH . '/MakeUserModel.php';
class MakeUserController
{
    public function create()
    {
        //Récupération et validation des données POST
        $name = $_POST['name'] ?? '';
        $firstName = $_POST['firstName'] ?? '';
        $region = $_POST['region'] ?? null;
        $city = $_POST['city'] ?? null;
        $job = $_POST['job'] ?? null;
        $birth = !empty($_POST['birth']) ? new DateTimeImmutable($_POST['birth']) : null;
        $cellphone = $_POST['cellphone'] ?? null;
        $skills = !empty($_POST['skills']) ? explode(',', $_POST['skills']) : [];
        $email = $_POST['email'] ?? '';

        //Création du modèle
        $user = new MakeUserModel(
            //id,
            $name,
            $firstName,
            $region,
            $city,
            $job,
            $birth,
            $cellphone,
            $skills,
            $email
        );
    }
}