<?php
// Include database connection
include '../include/config.php';

// Define variables and initialize with empty values
$social_img_src = $img_alt = $link = "";
$social_img_src_err = $img_alt_err = $link_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate social image source
    if (empty(trim($_POST["social_img_src"]))) {
        $social_img_src_err = "Please enter the social image source.";
    } else {
        $social_img_src = trim($_POST["social_img_src"]);
    }

    // Validate image alt
    if (empty(trim($_POST["img_alt"]))) {
        $img_alt_err = "Please enter the image alt.";
    } else {
        $img_alt = trim($_POST["img_alt"]);
    }

    // Validate link
    if (empty(trim($_POST["link"]))) {
        $link_err = "Please enter the link.";
    } else {
        $link = trim($_POST["link"]);
    }

    // Check input errors before inserting into database
    if (empty($social_img_src_err) && empty($img_alt_err) && empty($link_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO home_social (social_img_src, img_alt, link) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($connecction, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_social_img_src, $param_img_alt, $param_link);

            // Set parameters
            $param_social_img_src = $social_img_src;
            $param_img_alt = $img_alt;
            $param_link = $link;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to admin page
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
    <title>Add Social Information</title>
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
        <h2>Add Social Information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Social Image Source</label>
                <input type="text" name="social_img_src" value="<?php echo $social_img_src; ?>">
                <span class="error"><?php echo $social_img_src_err; ?></span>
            </div>
            <div class="form-group">
                <label>Image Alt</label>
                <input type="text" name="img_alt" value="<?php echo $img_alt; ?>">
                <span class="error"><?php echo $img_alt_err; ?></span>
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" value="<?php echo $link; ?>">
                <span class="error"><?php echo $link_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="button" value="Submit">
                <a href="admin.php" class="button">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
