<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/CvModel.php';

    $nbSkills = 0;
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
