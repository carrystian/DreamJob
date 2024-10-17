<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNewSpecialistBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phoneNumber = trim($_POST['phoneNumber']);
    $hireDate = trim($_POST['hireDate']);
    $experienceYears = trim($_POST['experienceYears']);
    $address = trim($_POST['address']);

    // Ensure required fields are not empty
    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($hireDate)) {
        // Debugging to check data being sent
        var_dump($firstName, $lastName, $email, $phoneNumber, $hireDate, $experienceYears, $address);

        // Insert into database
        $query = insertIntoITSpecialist($pdo, $firstName, $lastName, $email, $phoneNumber, $hireDate, $experienceYears, $address);

        if ($query) {
            header("Location: index.php");
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no required fields are empty";
    }
}


// Edit IT Specialist
if (isset($_POST['editSpecialistBtn'])) {
    $specialistID = $_GET['specialistID'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phoneNumber = trim($_POST['phoneNumber']);
    $hireDate = trim($_POST['hireDate']);
    $experienceYears = trim($_POST['experienceYears']);
    $address = trim($_POST['address']);

    // Ensure required fields are not empty
    if (!empty($specialistID) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($hireDate)) {
        // Update record
        $query = updateITSpecialist($pdo, $specialistID, $firstName, $lastName, $email, $phoneNumber, $hireDate, $experienceYears, $address);

        if ($query) {
            header("Location: index.php");
        } else {
            echo "Update failed";
        }
    } else {
        echo "Make sure that no required fields are empty";
    }
}

// Delete IT Specialist
if (isset($_POST['deleteSpecialistBtn'])) {
    $specialistID = $_GET['specialistID'];

    // Delete record
    $query = deleteITSpecialist($pdo, $specialistID);

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Deletion failed";
    }
}

?>
