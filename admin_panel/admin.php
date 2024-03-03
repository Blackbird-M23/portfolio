<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .container {
            margin: 20px auto;
            max-width: 800px;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container c0">
        <h2>Home Information</h2>
        <table>
            <tr>
                <th>id</th>
                <th>home image source</th>
                <th>home image alt</th>
                <th>para</th>
                <th>action</th>
                
            </tr>
            <?php
            // Connect to MySQL database
            include '../include/config.php';

            // Fetch messages from database
            $sql = "SELECT * FROM home";
            $result = mysqli_query($connecction, $sql); // Corrected connection variable name
        
            if (mysqli_num_rows($result) > 0) { // Corrected method for getting the number of rows
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['home_img_src']."</td>";
                    echo "<td>".$row['home_img_alt']."</td>";
                    echo "<td>".$row['para']."</td>";
                    echo "<td>
                        <a href='homeUpdate.php?updateid=".$row['id']."' class='button'>Update</a>
                        <a href='homeDelete.php?deleteid=".$row['id']."' class='button'>Delete</a>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No messages found</td></tr>";
            }
            ?>
        </table>
        <a href="homeAdd.php" class="button">Add</a>
    </div>
    <div class="container home_social">
        <h2>Home Socials</h2>
        <table>
            <tr>
                <th>id</th>
                <th>social image src</th>
                <th>social image saltrc</th>
                <th>link</th>
                <th>action</th>
            </tr>
            <?php
            // Connect to MySQL database

            // Fetch messages from database
            $result = $connecction->query("SELECT * FROM home_social");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['social_img_src']."</td>";
                    echo "<td>".$row['img_alt']."</td>";
                    echo "<td>".$row['link']."</td>";
                    echo "<td>
                    <a href='socialUpdate.php?updateid=".$row['id']."' class='button'>Update</a>
                    <a href='socialDelete.php?deleteid=".$row['id']."' class='button'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No messages found</td></tr>";
            }
            ?>
        </table>
        <a href="homeSocialsAdd.php" class="button">Add</a>
    </div>
    <div class="container c1">
        <h2>About Me</h2>
        <table>
            <tr>
                <th>Id</th>
                <th>About image src</th>
                <th>About image alt</th>
                <th>para</th>
                <th>action</th>
            </tr>
            <?php
            // Connect to MySQL database

            // Fetch messages from database
            $result = $connecction->query("SELECT * FROM about_me");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['about_img_src']."</td>";
                    echo "<td>".$row['about_img_alt']."</td>";
                    echo "<td>".$row['para']."</td>";
                    echo "<td>
                    <a href='aboutMeUpdate.php?updateid=".$row['id']."' class='button'>Update</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No messages found</td></tr>";
            }
            ?>
        </table>
    </div>
    
    <div class="container exp">
        <h2>Experience</h2>
        <table>
            <tr>
                <th>id</th>
                <th>skills-tools type</th>
                <th>Name</th>
                <th>Profiency level</th>
                <th>action</th>
            </tr>
            <?php
            // Connect to MySQL database

            // Fetch messages from database
            $result = $connecction->query("SELECT * FROM experience");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['skills_tools']."</td>";
                    echo "<td>".$row['skills_tools_name']."</td>";
                    echo "<td>".$row['proficiency_level']."</td>";
                    echo "<td>
                    <a href='expUpdate.php?updateid=".$row['id']."' class='button'>Update</a>
                    <a href='expDelete.php?deleteid=".$row['id']."' class='button'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No messages found</td></tr>";
            }
            ?>
        </table>
        <a href="expAdd.php" class="button">Add</a>
    </div>

    <div class="container timeline">
        <h2>Timeline</h2>
        <?php
        // <a href='timelineAdd.php?deleteid=".$row['id']."' class='button'>Add</a>
        ?>
        <table>
            <tr>
                <th>id</th>
                <th>logo src</th>
                <th>logo src</th>
                <th>link</th>
                <th>institution name</th>
                <th>description</th>
                <th>action</th>
            </tr>
            <?php
            // Connect to MySQL database

            // Fetch messages from database
            $result = $connecction->query("SELECT * FROM timeline_data");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['logo_path']."</td>";
                    echo "<td>".$row['logo_alt']."</td>";
                    echo "<td>".$row['link']."</td>";
                    echo "<td>".$row['institution_name']."</td>";
                    echo "<td>".$row['description']."</td>";
                    echo "<td>
                    <a href='timelineUpdate.php?updateid=".$row['id']."' class='button'>Update</a>
                    <a href='timelineDelete.php?deleteid=".$row['id']."' class='button'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No messages found</td></tr>";
            }
            ?>
        </table>
        <a href="timelineAdd.php" class="button">Add</a>
    </div>

    <div class="container cN">
        <h2>Messages</h2>
        <table>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>subject</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            <?php
            // Connect to MySQL database

            // Fetch messages from database
            $result = $connecction->query("SELECT * FROM contact_messages");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['subject']."</td>";
                    echo "<td>".$row['message']."</td>";
                    echo "<td><a href='contactDelete.php?deleteid=".$row['id']."' class='button'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No messages found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>