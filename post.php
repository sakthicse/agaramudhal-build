<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "123";

if($_SERVER['REQUEST_METHOD'] == 'POST'){   
    $servername = "localhost";
$username = "root";
$password = "Root@123";
$dbname = "agaram";
    $name=$_POST["name"];
    $email=$_POST["email"];
    $feedback=$_POST["feedback"];
    $conn = new mysqli($servername, $username, $password, $dbname);    // Check connection    
    if ($conn->connect_error) {        
        die("Connection failed: " . $conn->connect_error);    
    }        
    $sql = "INSERT INTO feedback (email, username, feedback)    VALUES ($email, $name, $feedback)";        
    if ($conn->query($sql) === TRUE) {        
        // echo "New record created successfully";        
        http_response_code(201);         // tell the user        
        echo json_encode(array("message" => "Feedback was created."));    
    } else {        
            echo "Error: " . $sql . "<br>" . $conn->error;
             http_response_code(400);         // tell the user        echo json_encode(array("message" => "Unable to create feedback."));
    }        $conn->close();
}else{
    echo "Get ...";
?>
