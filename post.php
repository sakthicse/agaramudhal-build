<?php
$servername = "localhost";
$username = "root";
$password = "Root@123";
$dbname = "agaram";
if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["feedback"])){    
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
}?>
