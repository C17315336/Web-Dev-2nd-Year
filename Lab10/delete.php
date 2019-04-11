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
        if ( isset($_POST['delete']) && isset($_POST['id']) ) {
        $id = mysqli_real_escape_string($link,$_POST['id']);
        $sql = "DELETE FROM addressbook WHERE id = $id";
        echo "<pre>\n$sql\n</pre>\n";
        mysqli_query($link,$sql);
        echo 'Success - <a href="welcome.php">Continue...</a>'; return;
        }
        $id = mysqli_real_escape_string($link,$_GET['id']);
        $result = mysqli_query($link,"SELECT FirstName,id FROM addressbook WHERE id='$id'");
        $row = mysqli_fetch_row($result);
        echo "<p>Confirm: Deleting $row[0]</p>\n";
        echo('<form method="post"><input type="hidden" ');
        echo('name="id" value="'.htmlentities($row[1]).'">'."\n");
        echo('<input type="submit" value="Delete" name="delete">');
        echo('<a href="welcome.php">Cancel</a>'); echo("\n</form>\n");
        ?>
    </body>
</html>