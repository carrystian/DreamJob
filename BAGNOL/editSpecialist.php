<?php 
require_once('dbConfig.php');
require_once('models.php'); 

// Get the specialist ID from the URL
if (isset($_GET['specialistID'])) {
    $specialistID = $_GET['specialistID'];
    $specialist = getITSpecialistByID($pdo, $specialistID);

    // Check if the specialist exists
    if (!$specialist) {
        die("Specialist not found.");
    }
} else {
    die("Specialist ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit IT Specialist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit IT Specialist</h2>
        <form action="handleForms.php?specialistID=<?php echo $specialist['SpecialistID']; ?>" method="POST">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($specialist['FirstName']); ?>" required>

            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($specialist['LastName']); ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($specialist['Email']); ?>" required>

            <label for="phoneNumber">Phone Number</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo htmlspecialchars($specialist['PhoneNumber']); ?>">

            <label for="hireDate">Hire Date</label>
            <input type="date" id="hireDate" name="hireDate" value="<?php echo htmlspecialchars($specialist['HireDate']); ?>" required>

            <label for="experienceYears">Experience Years</label>
            <input type="number" id="experienceYears" name="experienceYears" value="<?php echo htmlspecialchars($specialist['ExperienceYears']); ?>">

            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($specialist['Address']); ?>">

            <button type="submit" name="editSpecialistBtn">Update</button>
        </form>
    </div>
</body>
</html>
