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
        && isset($_POST['Email']) && isset($_POST['Phone']) && isset($_POST['id']) ) {
        $n = mysqli_real_escape_string($db,$_POST['FirstName']);
        $d = mysqli_real_escape_string($db,$_POST['LastName']);
        $p = mysqli_real_escape_string($db,$_POST['Email']);
        $s = mysqli_real_escape_string($db,$_POST['Phone']);
        $id = mysqli_real_escape_string($db,$_POST['id']);
        $sql = "UPDATE addressbook SET FirstName='$n', LastName='$d', Email='$p', Phone='$s' WHERE id='$id'";
        echo "<pre>\n$sql\n</pre>\n";
        mysqli_query($db,$sql);
        echo 'Updated - <a href="welcome.php">Continue...</a>'; return;
        }
        $id = mysqli_real_escape_string($link,$_GET['id']);
        $result = mysqli_query($link,"SELECT id, FirstName, LastName, Email, Phone FROM addressbook WHERE id='$id'");
        $row = mysqli_fetch_row($result);
        $n = htmlentities($row[1]);
        $d = htmlentities($row[2]);
        $p = htmlentities($row[3]);
        $s = htmlentities($row[4]);
        $id = htmlentities($row[0]);
        echo <<< _END
        <p>Edit Contact</p>
        <form method="post">
        <p>Name:
        <input type="text" name="FirstName" value="$n"></p>
        <p>LastName:
        <input type="text" name="LastName" value="$d"></p>
        <p>Email:
        <input type="text" name="Email" value="$p"></p>
        <p>Phone:
        <input type="text" name="Phone" value="$s"></p> <input type="hidden" name="id" value="$id">
        <p><input type="submit" value="Update"/>
        <a href="welcome.php">Cancel</a></p>
        </form>
        _END
        ?>
    </body>
</html>