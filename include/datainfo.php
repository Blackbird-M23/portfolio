<?php

    $host = 'localhost';
    $dbname = 'portfolio';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        $response = array('status' => 'error', 'message' => 'Database connection failed: ' . $e->getMessage());
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        
        if ($stmt->execute([$name, $email, $subject, $message])) {
            $response = array('status' => 'success', 'message' => 'Message sent successfully!');
            //header('Location: /portfolio2.0/#contact');
            
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to insert data into the database.');
        }
    }
    else {
        $response = array('status' => 'error', 'message' => 'Invalid request!');
    }

    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

?>