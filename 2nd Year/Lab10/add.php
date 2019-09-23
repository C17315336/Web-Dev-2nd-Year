<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<html>
    <body>
        <?php
        require_once "config.php";
        if ( isset($_POST['FirstName']) && isset($_POST['LastName'])
        && isset($_POST['Email']) && isset($_POST['Phone'])) {
        $n = mysqli_real_escape_string($link,$_POST['FirstName']);
        $d = mysqli_real_escape_string($link,$_POST['LastName']);
        $p = mysqli_real_escape_string($link,$_POST['Email']);
        $s = mysqli_real_escape_string($link,$_POST['Phone']);
        $sql = "INSERT INTO addressbook (FirstName, LastName, Email, Phone) VALUES ('$n', '$d', '$p', '$s')";
        echo "<pre>\n$sql\n</pre>\n";
        mysqli_query($link,$sql);
        echo 'Success - <a href="welcome.php">Continue...</a>'; return;
        }
        ?>
        <p>Add A New Contact</p>
        <form method="post">
        <p>First Name:
        <input type="text" name="FirstName"></p>
        <p>Last Name:
        <input type="text" name="LastName"></p>
        <p>Email:
        <input type="text" name="Email"></p>
        <p>Phone:
        <input type="text" name="Phone"></p>
        <p><input type="submit" value="Add New"/>
        <a href="welcome.php">Cancel</a></p>
        </form>
    </body>
</html>