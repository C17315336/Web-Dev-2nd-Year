<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $address = $price = $beds = $baths = $description = $wifi = $available = "";

$name_err = $address_err = $price_err = $beds_err = $baths_err = $description_err = $wifi_err = $available_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate price
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter the price amount.";     
    } elseif(!ctype_digit($input_price)){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = $input_price;
    }
    
    // Validate beds
    $input_beds = trim($_POST["beds"]);
    if(empty($input_beds)){
        $beds_err = "Please enter the beds amount.";     
    } elseif(!ctype_digit($input_beds)){
        $beds_err = "Please enter a positive integer value.";
    } else{
        $beds = $input_beds;
    }
    
    // Validate baths
    $input_baths = trim($_POST["baths"]);
    if(empty($input_baths)){
        $baths_err = "Please enter the baths amount.";     
    } elseif(!ctype_digit($input_baths)){
        $baths_err = "Please enter a positive integer value.";
    } else{
        $baths = $input_baths;
    }
    
    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter an description.";     
    } else{
        $description = $input_description;
    }
    
    // Validate wifi
    $input_wifi = trim($_POST["wifi"]);
    //if(empty($input_wifi)){
       // $wifi_err = "Please enter a wifi.";
   // } elseif(!filter_var($input_wifi, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $wifi_err = "Please enter a valid wifi.";
   // } else{
        $wifi = $input_wifi;
   // }
    
    // Validate available
   $input_available = trim($_POST["available"]);
   // if(empty($input_available)){
   //     $available_err = "Please enter a available.";
   // } elseif(!filter_var($input_available, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
   //     $available_err = "Please enter a valid available.";
   // } else{
        $available = $input_available;
   // }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($price_err) && empty($beds_err) && empty($baths_err) && empty($description_err) && empty($wifi_err) && empty($available_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO locations (name, address, price, beds, baths, description, wifi, available) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_name, $param_address, $param_price, $param_beds, $param_baths, $param_description, $param_wifi, $param_available);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_price = $price;
            $param_beds = $beds;
            $param_baths = $baths;
            $param_description = $description;
            $param_wifi = $wifi;
            $param_available = $available;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Location</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Location</h2>
                    </div>
                    <p>Please fill this form and submit to add location record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($beds_err)) ? 'has-error' : ''; ?>">
                            <label>beds</label>
                            <input type="text" name="beds" class="form-control" value="<?php echo $beds; ?>">
                            <span class="help-block"><?php echo $beds_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($baths_err)) ? 'has-error' : ''; ?>">
                            <label>baths</label>
                            <input type="text" name="baths" class="form-control" value="<?php echo $baths; ?>">
                            <span class="help-block"><?php echo $baths_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>wifi</label>
                            <input type="checkbox" name="wifi" class="form-control" value="<?php echo $wifi; ?>">
                        </div>
                        <div class="form-group">
                            <label>available</label>
                            <input type="checkbox" name="available" class="form-control" value="<?php echo $available; ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>