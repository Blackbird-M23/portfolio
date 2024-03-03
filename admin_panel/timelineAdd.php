<?php
// Include database configuration
include '../include/config.php';

// Define variables and initialize with empty values
$logo_src = $logo_alt = $link = $institution_name = $description = "";
$logo_src_err = $logo_alt_err = $link_err = $institution_name_err = $description_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate logo source
    if (empty(trim($_POST["logo_src"]))) {
        $logo_src_err = "Please enter the logo source.";
    } else {
        $logo_src = trim($_POST["logo_src"]);
    }
    
    // Validate logo alt
    if (empty(trim($_POST["logo_alt"]))) {
        $logo_alt_err = "Please enter the logo alt.";
    } else {
        $logo_alt = trim($_POST["logo_alt"]);
    }
    
    // Validate link
    if (empty(trim($_POST["link"]))) {
        $link_err = "Please enter the link.";
    } else {
        $link = trim($_POST["link"]);
    }

    // Validate institution name
    if (empty(trim($_POST["institution_name"]))) {
        $institution_name_err = "Please enter the institution name.";
    } else {
        $institution_name = trim($_POST["institution_name"]);
    }
    
    // Validate description
    if (empty(trim($_POST["description"]))) {
        $description_err = "Please enter the description.";
    } else {
        $description = trim($_POST["description"]);
    }
    
    // Check input errors before inserting into database
    if (empty($logo_src_err) && empty($logo_alt_err) && empty($link_err) && empty($institution_name_err) && empty($description_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO timeline_data (logo_path, logo_alt, link, institution_name, description) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($connecction, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_logo_src, $param_logo_alt, $param_link, $param_institution_name, $param_description);

            // Set parameters
            $param_logo_src = $logo_src;
            $param_logo_alt = $logo_alt;
            $param_link = $link;
            $param_institution_name = $institution_name;
            $param_description = $description;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to timeline page after insertion
                header("location: timeline.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($connecction);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Timeline Entry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"],
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        input[type="submit"]:hover,
        .button:hover {
            background-color: #45a049;
        }
        .cancel-button {
            background-color: #ccc;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Timeline Entry</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Logo Source</label>
                <input type="text" name="logo_src" value="<?php echo $logo_src; ?>">
                <span class="error"><?php echo $logo_src_err; ?></span>
            </div>
            <div class="form-group">
                <label>Logo Alt</label>
                <input type="text" name="logo_alt" value="<?php echo $logo_alt; ?>">
                <span class="error"><?php echo $logo_alt_err; ?></span>
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" value="<?php echo $link; ?>">
                <span class="error"><?php echo $link_err; ?></span>
            </div>
            <div class="form-group">
                <label>Institution Name</label>
                <input type="text" name="institution_name" value="<?php echo $institution_name; ?>">
                <span class="error"><?php echo $institution_name_err; ?></span>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" value="<?php echo $description; ?>">
                <span class="error"><?php echo $description_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="button" value="Submit">
                <a href="timeline.php" class="button">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
