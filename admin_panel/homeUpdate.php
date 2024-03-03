


<?php
// Include database configuration
include '../include/config.php';

// Check if updateid is provided
if(isset($_GET['updateid'])) {
    // Get the updateid from the URL
    $updateid = $_GET['updateid'];
    
    // Fetch data for the provided updateid
    $sql = "SELECT * FROM home WHERE id = $updateid";
    $result = mysqli_query($connecction, $sql);

    // Check if data is retrieved
    if(mysqli_num_rows($result) > 0) {
        // Fetch row
        $row = mysqli_fetch_assoc($result);

        // Check if form is submitted for update
        if(isset($_POST['submit'])) {
            // Get form data
            $home_img_src = $_POST['home_img_src'];
            $home_img_alt = $_POST['home_img_alt'];
            $para = $_POST['para'];

            // Update data in database
            $update_query = "UPDATE home SET home_img_src='$home_img_src', home_img_alt='$home_img_alt', para='$para' WHERE id=$updateid";
            if(mysqli_query($connecction, $update_query)) {
                // Redirect to admin page after update
                header("Location: admin.php");
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($connecction);
            }
        }
    } else {
        // No data found for the provided updateid
        echo "No record found.";
    }
} else {
    // No updateid provided in the URL
    echo "No updateid provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Home Information</title>
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
        <h2>Update Home Information</h2>
        <form method="post" action="">
            <label for="home_img_src">Home Image Source:</label><br>
            <input type="text" id="home_img_src" name="home_img_src" value="<?php echo $row['home_img_src']; ?>"><br>
            <label for="home_img_alt">Home Image Alt:</label><br>
            <input type="text" id="home_img_alt" name="home_img_alt" value="<?php echo $row['home_img_alt']; ?>"><br>
            <label for="para">Para:</label><br>
            <textarea id="para" name="para"><?php echo $row['para']; ?></textarea><br>
            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
