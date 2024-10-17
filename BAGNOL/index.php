<?php 
require_once('dbConfig.php');
require_once('models.php'); 

// Retrieve all IT Specialists
$itSpecialists = seeAllITSpecialists($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Specialist Management</title>
    <style>
        /* Updated CSS as provided above */
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}
.container {
    max-width: 800px; /* Increase width for more space */
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
table {
    width: 100%;
    margin-top: 30px;
    border-collapse: collapse;
    overflow-x: auto; /* Enable horizontal scrolling */
}
th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}
th {
    background-color: #007bff;
    color: white;
}
.action-buttons button {
    margin-right: 5px;
    padding: 5px 10px;
    font-size: 14px;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Insert IT Specialist</h2>
        <form action="handleForms.php" method="POST">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phoneNumber">Phone Number</label>
            <input type="tel" id="phoneNumber" name="phoneNumber">

            <label for="hireDate">Hire Date</label>
            <input type="date" id="hireDate" name="hireDate" required>

            <label for="experienceYears">Experience Years</label>
            <input type="number" id="experienceYears" name="experienceYears">

            <label for="address">Address</label>
            <input type="text" id="address" name="address">

            <button type="submit" name="insertNewSpecialistBtn">Submit</button>
        </form>

        <h2>IT Specialists List</h2>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Hire Date</th>
                    <th>Experience Years</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($itSpecialists): ?>
                    <?php foreach ($itSpecialists as $specialist): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($specialist['FirstName']); ?></td>
                            <td><?php echo htmlspecialchars($specialist['LastName']); ?></td>
                            <td><?php echo htmlspecialchars($specialist['Email']); ?></td>
                            <td><?php echo htmlspecialchars($specialist['PhoneNumber']); ?></td>
                            <td><?php echo htmlspecialchars($specialist['HireDate']); ?></td>
                            <td><?php echo htmlspecialchars($specialist['ExperienceYears']); ?></td>
                            <td><?php echo htmlspecialchars($specialist['Address']); ?></td>
                            <td class="action-buttons">
                                <form action="editSpecialist.php" method="GET" style="display:inline;">
                                    <input type="hidden" name="specialistID" value="<?php echo $specialist['SpecialistID']; ?>">
                                    <button type="submit" name="editSpecialistBtn">Edit</button>
                                </form>
                                <form action="handleForms.php?specialistID=<?php echo $specialist['SpecialistID']; ?>" method="POST" style="display:inline;">
                                    <button type="submit" name="deleteSpecialistBtn" onclick="return confirm('Are you sure you want to delete this specialist?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>