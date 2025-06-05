<?php
include '../model/CvModel.php'; // récup les données du fichier CvModel.php

    foreach($cv as $test) {
        $id = $test['id'];
        $name = $test['name'];
        $firstName = $test['firstName'];
        $region = $test['region'];
        $city = $test['city'];
        $job = $test['job'];
        $birth = $test['birth'];
        $skills = $test['skills'];
        $email = $test['email'];
    }
