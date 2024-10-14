<?php include("signup.php");?>

<?php
// Fetch data
$sql = "SELECT first_name, last_name, email_id, address FROM tbl_user";
$result = $pdo->query($sql); // Use $pdo here

// Check if there are results
if ($result->rowCount() > 0) {
    // Display data in a table
    echo "<table border='1'>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email ID</th>
                <th>Address</th>
            </tr>";
    
    // Output data of each row
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { // Use fetch() instead of mysqli_fetch_assoc()
        echo "<tr>
                <td>" . htmlspecialchars($row['first_name']) . "</td>
                <td>" . htmlspecialchars($row['last_name']) . "</td>
                <td>" . htmlspecialchars($row['email_id']) . "</td>
                <td>" . htmlspecialchars($row['address']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results found.";
}

// Close connection (optional with PDO, as it closes automatically)
// $pdo = null;
?>




