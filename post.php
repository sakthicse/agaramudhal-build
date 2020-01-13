<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "123";
$name="123 ...";
echo $name;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agaram";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $email=$_POST["email"];
    $feedback=$_POST["feedback"];
    // $conn = mysqli_connect('$servername','$username','$password','$dbname');
    $conn = msqli_connect('localhost', 'root', '', 'agaram');
    if($conn->connect_error){
        // die("Connection failed:");
        die("Connection failed");
    }
    $sql="INSERT INTO feedback (email, username, feedback) VALUES ('$email', '$name', '$feedback')";
    if($conn->query($sql)===TRUE){
        http_response_code(201);
        echo json_encode(array("message"=>"Feedback was created."));
    }
    else{
        echo "Error".$sql."<br>".$conn->error;
        http_response_code(400);
        echo json_encode(array("message"=>"Unable to create feedback."));
    }
    $conn->close();
}else{
    echo "asdf";
}
// if($_SERVER['REQUEST_METHOD'] == 'POST'){   
//     $sname = "localhost";
// 	$username = "root";
// 	$password = "Root@123";
// 	$dbname = "agaram";
//     $name=$_POST["name"];
//     $email=$_POST["email"];
//     $feedback=$_POST["feedback"];
//     $conn = new mysqli($sname, $username, $password, $dbname);    // Check connection    
//     if ($conn->connect_error) {        
//         die("Connection failed: " . $conn->connect_error);    
//     }        
//     $sql = "INSERT INTO feedback (email, username, feedback)    VALUES ($email, $name, $feedback)";        
//     if ($conn->query($sql) === TRUE) {              
//         http_response_code(201);        
//         echo json_encode(array("message" => "Feedback was created."));    
//     } else {        
//             echo "Error: " . $sql . "<br>" . $conn->error;
//              http_response_code(400);              
//              echo json_encode(array("message" => "Unable to create feedback."));
//     }        $conn->close();
// }else{
//     echo "Get ...";
// }

?>
