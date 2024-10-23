<html>
<head>
    <title>Dispaly</title>
    <style>
        .update, .delete
        {
            background-color: green;
            color: white;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 22px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;

        }
        .delete 
        {
            background-color: red;
        }
    </style>
</head>

<?php
include("connect.php"); 
if (!isset($conn)) {
    die("Database connection not established.");
}

$sql = "SELECT id, first_name, last_name, address, email_id FROM tbl_user";
$result = $conn->query($sql); 

if ($result && $result->num_rows > 0) {
    echo " <table border='1'cellspacing = '7' width=100%>
                <h2><mark>Displaying All Records</mark></h2>
            <tr>
                <th width=5%>ID</th>
                <th width=10%>First Name</th>
                <th width=10%>Last Name</th>
                <th width=15%>address</th>
                <th width=25%>email_id</th>
                <th width=15%>operation</th>
            </tr>";
           
    while ($row = $result->fetch_assoc()) { 
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['first_name']) . "</td>
                <td>" . htmlspecialchars($row['last_name']) . "</td>
                <td>" . htmlspecialchars($row['address']) . "</td>
                <td>" . htmlspecialchars($row['email_id']) . "</td>

                <td><a href='update.php?id=" . htmlspecialchars($row['id']) . "&fn=" . htmlspecialchars($row['first_name']) . "&ln=" . htmlspecialchars($row['last_name']) . "&add=" . htmlspecialchars($row['address']) . "&em=" . htmlspecialchars($row['email_id']) . "'><input type='submit' value='UPDATE' class='update'></a>

                 <a href='delete.php?id=" . htmlspecialchars($row['id']) . "&fn=" . htmlspecialchars($row['first_name']) . "&ln=" . htmlspecialchars($row['last_name']) . "&add=" . htmlspecialchars($row['address']) . "&em=" . htmlspecialchars($row['email_id']) . "'><input type='submit' value='DELETE' class='delete' onclick = 'return checkdelete()'></a></td>

              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results found.";
}

$conn->close(); 
?>


<script>
    function checkdelete()
    {
        return confirm('Are you sure to delete these record ?');
    }
</script>






