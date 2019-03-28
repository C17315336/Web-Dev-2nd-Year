<html>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "users";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            echo "Connected successfully <br>";
        
            $sql = "INSERT INTO Users (User_Name, Password, First_Name, Last_Name, Age)
            VALUES ('".$_POST["User_Name"]."', '".$_POST["Password"]."', '".$_POST["First_Name"]."', '".$_POST["Last_Name"]."', '".$_POST["Age"]."')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        ?>
    </body>
</html>