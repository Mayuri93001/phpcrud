<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $address = htmlspecialchars(trim($_POST['address']));

    // Database connection details
    $servername = "localhost";
    $username = "root"; 
    $password_db = ""; 
    $dbname = "first_db";


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // Create connection
    $conn = mysqli_connect($servername, $username, $password_db, $dbname);
    
    // Check connection
    //if (!$conn) {
      // die("Connection failed: " . mysqli_connect_error());
    //}
      // echo "Connection success";

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO tbl_user (first_name, last_name, email_id, password, address) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Preparation failed: " . $conn->error);
    }

    $hashed_password = md5($password);
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $address);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    //error statment
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate input
        if (empty($_POST['first_name'])) {
            echo json_encode(['error' => 'First name is required.']);
            exit;
        }
       
    }


    // Close connections
    $stmt->close();
    $conn->close();
}
?>


