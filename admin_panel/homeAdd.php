<?php
// Include database connection
include '../include/config.php';

// Define variables and initialize with empty values
$home_img_src = $home_img_alt = $para = "";
$home_img_src_err = $home_img_alt_err = $para_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate home image source
    if (empty(trim($_POST["home_img_src"]))) {
        $home_img_src_err = "Please enter the home image source.";
    } else {
        $home_img_src = trim($_POST["home_img_src"]);
    }

    // Validate home image alt
    if (empty(trim($_POST["home_img_alt"]))) {
        $home_img_alt_err = "Please enter the home image alt.";
    } else {
        $home_img_alt = trim($_POST["home_img_alt"]);
    }

    // Validate paragraph
    if (empty(trim($_POST["para"]))) {
        $para_err = "Please enter the paragraph.";
    } else {
        $para = trim($_POST["para"]);
    }

    // Check input errors before inserting into database
    if (empty($home_img_src_err) && empty($home_img_alt_err) && empty($para_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO home (home_img_src, home_img_alt, para) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($connecction, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_home_img_src, $param_home_img_alt, $param_para);

            // Set parameters
            $param_home_img_src = $home_img_src;
            $param_home_img_alt = $home_img_alt;
            $param_para = $para;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to home page
                header("location: admin.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    // mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Home Information</title>
    <style>
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group .error {
            color: red;
        }
        .form-group .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            margin: 1rem;
            text-decoration: none;
            align-items: center;
        }
        .form-group .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Add Home Information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Home Image Source</label>
                <input type="text" name="home_img_src" value="<?php echo $home_img_src; ?>">
                <span class="error"><?php echo $home_img_src_err; ?></span>
            </div>
            <div class="form-group">
                <label>Home Image Alt</label>
                <input type="text" name="home_img_alt" value="<?php echo $home_img_alt; ?>">
                <span class="error"><?php echo $home_img_alt_err; ?></span>
            </div>
            <div class="form-group">
                <label>Paragraph</label>
                <textarea name="para"><?php echo $para; ?></textarea>
                <span class="error"><?php echo $para_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="button" value="Submit">
                <a href="admin.php" class="button">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
