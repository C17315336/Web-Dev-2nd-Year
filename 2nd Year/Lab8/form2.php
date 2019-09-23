<html>
<body>
    <?php
    echo "Enter your details below"
    ?>
    
    <form action="mysql.php" method="post">
        Username: <input type="text" name="User_Name"><br>
        Password: <input type="password" name="Password"><br>
        First Name: <input type="text" name="First_Name"><br>
        Last Name: <input type="text" name="Last_Name"><br>
        Age: <input type="number" name="Age"><br>
        <input type="submit">
        <input type="reset">
    </form>

</body>
</html>