<?php 

include 'conn.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require "auth.php";

if(isset($_SESSION['id'])){
    header("location:mainpage.php");
}

$name = $_POST['name'];
$gstnumber = $_POST['gstnumber'];
$email = $_POST['email'];
$password = $_POST['password'];

$qry="insert into companyinfo(company_name,company_gst,company_email,company_password) values ('$name','$gstnumber','$email','$password')";
$result=mysqli_query($conn,$qry);



if($result){
    echo"Sucessfully registered as a User";

    $mail = new PHPMailer(true);

   try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $usermail;                     // SMTP username
    $mail->Password   = $userpass;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('loveleshcolaco.18@gmail.com', 'Mailer');
    $mail->addAddress($email);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Registered succesfully';
    $body = "Your email id is $email and password is $password";
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





    header('location:login.html');
}


else{
    echo"Error while registering";


}











?>