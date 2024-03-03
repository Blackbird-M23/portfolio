<?php
// Include database configuration
include '../include/config.php';

// Define variables and initialize with empty values
$skills_tools = $skills_tools_name = $proficiency_level = "";
$skills_tools_err = $skills_tools_name_err = $proficiency_level_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate skills/tools type
    if (empty(trim($_POST["skills_tools"]))) {
        $skills_tools_err = "Please enter the skills/tools type.";
    } else {
        $skills_tools = trim($_POST["skills_tools"]);
    }

    // Validate name
    if (empty(trim($_POST["skills_tools_name"]))) {
        $skills_tools_name_err = "Please enter the name.";
    } else {
        $skills_tools_name = trim($_POST["skills_tools_name"]);
    }

    // Validate proficiency level
    if (empty(trim($_POST["proficiency_level"]))) {
        $proficiency_level_err = "Please enter the proficiency level.";
    } else {
        $proficiency_level = trim($_POST["proficiency_level"]);
    }

    // Check input errors before inserting into database
    if (empty($skills_tools_err) && empty($skills_tools_name_err) && empty($proficiency_level_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO experience (skills_tools, skills_tools_name, proficiency_level) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($connecction, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_skills_tools, $param_skills_tools_name, $param_proficiency_level);

            // Set parameters
            $param_skills_tools = $skills_tools;
            $param_skills_tools_name = $skills_tools_name;
            $param_proficiency_level = $proficiency_level;

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
    <title>Add Experience Information</title>
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
        <h2>Add Experience Information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Skills/Tools Type</label>
                <input type="text" name="skills_tools" value="<?php echo $skills_tools; ?>">
                <span class="error"><?php echo $skills_tools_err; ?></span>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="skills_tools_name" value="<?php echo $skills_tools_name; ?>">
                <span class="error"><?php echo $skills_tools_name_err; ?></span>
           
                </div>
            <div class="form-group">
                <label>Proficiency Level</label>
                <input type="text" name="proficiency_level" value="<?php echo $proficiency_level; ?>">
                <span class="error"><?php echo $proficiency_level_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="button" value="Submit">
                <a href="admin.php" class="button">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
