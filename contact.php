<!DOCTYPE html>
<html>
<head>
    <title>Database Connection</title>
</head>
<body>

    <h1>Database Connection</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "agricultures";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }/*else{
        echo "connected successfully";
         exit();
    }
    */
     $stmt = $conn->prepare("INSERT INTO Contact (Name, Email, Subject, Message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $Name, $Email, $Subject, $Message);
    $result = $conn->query($sql);
    if($result->num_rows> 0) {
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Email </th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["Name"] . "</td>
                    <td>" . $row["Email"] . "</td>
                    <td>" . $row["Subject"] . "</td>
                    <td>" . $row["Message"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
    $conn->close();
    ?>

</body>
</html>