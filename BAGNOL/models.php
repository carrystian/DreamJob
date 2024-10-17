<!-- Functions for interacting with the IT_Specialist table -->

<?php 

require_once 'dbConfig.php';

// Function to insert a new IT Specialist
function insertIntoITSpecialist($pdo, $first_name, $last_name, $email, $phone_number, $hire_date, $experience_years, $address) {
    $sql = "INSERT INTO IT_Specialist (FirstName, LastName, Email, PhoneNumber, HireDate, ExperienceYears, Address) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$first_name, $last_name, $email, $phone_number, $hire_date, $experience_years, $address]);

    if ($executeQuery) {
        return true;	
    }
}

// Function to retrieve all IT Specialists
function seeAllITSpecialists($pdo) {
    $sql = "SELECT * FROM IT_Specialist";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

// Function to get an IT Specialist by ID
function getITSpecialistByID($pdo, $specialist_id) {
    $sql = "SELECT * FROM IT_Specialist WHERE SpecialistID = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$specialist_id])) {
        return $stmt->fetch();
    }
}

// Function to update an IT Specialist
function updateITSpecialist($pdo, $specialist_id, $first_name, $last_name, $email, $phone_number, $hire_date, $experience_years, $address) {
    $sql = "UPDATE IT_Specialist 
            SET FirstName = ?, 
                LastName = ?, 
                Email = ?, 
                PhoneNumber = ?, 
                HireDate = ?, 
                ExperienceYears = ?, 
                Address = ? 
            WHERE SpecialistID = ?";
    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$first_name, $last_name, $email, $phone_number, $hire_date, $experience_years, $address, $specialist_id]);

    if ($executeQuery) {
        return true;
    }
}

// Function to delete an IT Specialist
function deleteITSpecialist($pdo, $specialist_id) {
    $sql = "DELETE FROM IT_Specialist WHERE SpecialistID = ?";
    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$specialist_id]);

    if ($executeQuery) {
        return true;
    }
}

?>
