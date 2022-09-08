<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
     $user_name = $_POST['user_name'];
     $email_id = $_POST['email_id'];
     $subject = $_POST['subject'];
     $message = $_POST['message'];
     $sql = "INSERT INTO users (user_name,email_id,subject,message)
     VALUES ('$user_name','$email_id','$subject','$message')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>