<?php
include("connect.php");

if (!isset($conn)) {
    die("Database connection not established.");
}

$row = null; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email']; 
    $password = $_POST['password'];
    $address = $_POST['address'];

    
    $stmt = $conn->prepare("UPDATE tbl_user SET first_name=?, last_name=?, email_id=?, password=?, address=? WHERE id=?");
    $stmt->bind_param("sssssi", $first_name, $last_name, $email, $password, $address, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully!')</script>";
        ?>

            <meta http-equiv = "refresh" content = "0; url = http://localhost/Task1/display.php"/>


        <?php

    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_user WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/7a0ac3499a.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-boxm"> 
            <h1 id="title">UPDATE FORM</h1>
            <form name="userForm" action="update.php?id=<?php echo $id; ?>" method="POST" onsubmit="return validateForm()">
                <div class="input-group gridbox" style="display: grid; grid-template-columns: auto auto; gap: 10px;">
                    <div class="input-field" id="fn">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="first_name" placeholder="First Name" value="<?php echo htmlspecialchars($row['first_name'] ?? '', ENT_QUOTES); ?>" class="input" required>    
                    </div>


                    <div class="input-field" id="last_name">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="last_name" placeholder="Last Name" value="<?php echo htmlspecialchars($row['last_name'] ?? '', ENT_QUOTES); ?>" class="input" required>
                    </div>


                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($row['email_id'] ?? '', ENT_QUOTES); ?>"  class="input" required>
                    </div>


                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>


                    <div class="input-field" id="address">
                        <i class="fa-solid fa-map-marker-alt"></i>
                        <input type="text" name="address" placeholder="Address" value="<?php echo htmlspecialchars($row['address'] ?? '', ENT_QUOTES); ?>" required>    
                    </div>


                </div>
                <div class="btn-field">
                    <button type="submit" id="UPDATE DETAILS">UPDATE DETAILS</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            return true; 
        }
    </script>
</body>
</html>

