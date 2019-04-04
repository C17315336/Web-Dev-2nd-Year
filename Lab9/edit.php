<html>
    <body>
        <?php
        require_once "db.php";
        if ( isset($_POST['PName']) && isset($_POST['Description'])
        && isset($_POST['Price']) && isset($_POST['Stock']) && isset($_POST['id']) ) {
        $n = mysqli_real_escape_string($db,$_POST['PName']);
        $d = mysqli_real_escape_string($db,$_POST['Description']);
        $p = mysqli_real_escape_string($db,$_POST['Price']);
        $s = mysqli_real_escape_string($db,$_POST['Stock']);
        $id = mysqli_real_escape_string($db,$_POST['id']);
        $sql = "UPDATE Product SET PName='$n', Description='$d', Price='$p', Stock='$s' WHERE id='$id'";
        echo "<pre>\n$sql\n</pre>\n";
        mysqli_query($db,$sql);
        echo 'Updated - <a href="index.php">Continue...</a>'; return;
        }
        $id = mysqli_real_escape_string($db,$_GET['id']);
        $result = mysqli_query($db,"SELECT id, PName, Description, Price, Stock FROM Product WHERE id='$id'");
        $row = mysqli_fetch_row($result);
        $n = htmlentities($row[1]);
        $d = htmlentities($row[2]);
        $p = htmlentities($row[3]);
        $s = htmlentities($row[4]);
        $id = htmlentities($row[0]);
        echo <<< _END
        <p>Edit Product</p>
        <form method="post">
        <p>Name:
        <input type="text" name="PName" value="$n"></p>
        <p>Description:
        <input type="text" name="Description" value="$d"></p>
        <p>Price:
        €<input type="number" name="Price" value="$p"></p>
        <p>Stock:
        <input type="number" name="Stock" value="$s"></p> <input type="hidden" name="id" value="$id">
        <p><input type="submit" value="Update"/>
        <a href="index.php">Cancel</a></p>
        </form>
        _END
        ?>
    </body>
</html>