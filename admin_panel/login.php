<?php
// config.php

$host = 'localhost';
$dbname = 'portfolio';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            text-align: center;
        }

        .header img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .input-box {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .input-box label {
            display: block;
            margin-bottom: .7rem;
            font-weight: bold;
        }

        .input-field {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-submit {
            width: 50%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .input-submit  {
            margin-left:5rem;
        }


        .input-submit:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
        .start{
            text-align: center;
        }
    </style>
<body>
    <div class="container">
       <div class="box">
        <div class="header">
            <header>
                <div class = "start"><p><strong>Admin Log in</strong></p></div>
            </header>
        </div>
        
        <div class="error-message">
        <?php
            session_start();

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
                $stmt = $pdo->prepare($sql);
            
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                
                $stmt->execute();
                if($stmt->rowCount() == 1) {
                    $_SESSION['isUserLoggedIn']=true;
                    $_SESSION['email']= $_POST['email'];
                    echo "<script>window.location.href = 'admin.php'</script>";
                    exit;
                } else {
                    echo "Invalid email or password";
                }
            }
            ?>
        </div>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-box">
                <label for="email">E-Mail</label>
                <input type="email" class="input-field" id="email" name="email" required>
            </div>
            <div class="input-box">
                <label for="pass">Password</label>
                <input type="password" class="input-field" id="pass" name="password" required>
                
            </div>
            <div class="input-box">
                <input type="submit" class="input-submit" value="SIGN IN">
            </div>
        </form>
       </div>
       <div class="wrapper"></div>
    </div>
</body>
</html>
