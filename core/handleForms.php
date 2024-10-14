<?php

require_once 'dbConfig.php';
require_once 'models.php';



if (isset($_POST['insertBtn'])) {
    $first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$email = trim($_POST['email']);
	$phone_number = trim($_POST['phone_number']);
	$clinic_name = trim($_POST['clinic_name']);
	$specialization = trim($_POST['specialization']);
	$license_number = trim($_POST['license_number']);
    
    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($phone_number) && !empty($clinic_name)  && !empty($specialization)  && !empty($license_number)) {
			$query = insertRecords($pdo, $first_name, $last_name, 
			$email, $phone_number, $clinic_name, $specialization, $license_number);
            
            if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}

if (isset($_POST['editBtn'])) {
	$vet_id = isset($_POST['vet_id']) ? trim($_POST['vet_id']) : null;
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$email = trim($_POST['email']);
	$phone_number = trim($_POST['phone_number']);
	$clinic_name = trim($_POST['clinic_name']);
	$specialization = trim($_POST['specialization']);
	$license_number = trim($_POST['license_number']);

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    
    if ($vet_id === null || $vet_id === '' ||
    $first_name === '' || $last_name === '' || $email === '' || $phone_number === '' || $clinic_name === '' || $specialization  === '' || $license_number ==='') {
        echo "Make sure that all fields are not empty.";
    } else {
        $query = updateveterinarian($pdo, $vet_id, $first_name, $last_name, $email, $phone_number, $clinic_name, $specialization, $license_number);

    if ($query) {
        header("Location: ../index.php");
    }
    else {
        echo "Update failed";
    }
    
    }

}

if (isset($_POST['deleteBtn'])) {

	$query = deleteveterinarian($pdo, $_GET['vet_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}

}

?>