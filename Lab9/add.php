<html>
    <body>
        <?php
        require_once "db.php";
        if ( isset($_POST['PName']) && isset($_POST['Description'])
        && isset($_POST['Price']) && isset($_POST['Stock'])) {
        $n = mysqli_real_escape_string($db,$_POST['PName']);
        $d = mysqli_real_escape_string($db,$_POST['Description']);
        $p = mysqli_real_escape_string($db,$_POST['Price']);
        $s = mysqli_real_escape_string($db,$_POST['Stock']);
        $sql = "INSERT INTO Product (PName, Description, Price, Stock) VALUES ('$n', '$d', '$p', '$s')";
        echo "<pre>\n$sql\n</pre>\n";
        mysqli_query($db,$sql);
        echo 'Success - <a href="index.php">Continue...</a>'; return;
        }
        ?>
        <p>Add A New Product</p>
        <form method="post">
        <p>Name:
        <input type="text" name="PName"></p>
        <p>Description:
        <input type="text" name="Description"></p>
        <p>Price:
        €<input type="number" name="Price"></p>
        <p>Stock:
        <input type="number" name="Stock"></p>
        <p><input type="submit" value="Add New"/>
        <a href="index.php">Cancel</a></p>
        </form>
    </body>
</html>