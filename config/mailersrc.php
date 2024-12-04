<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'johanpaul109@gmail.com';                     //SMTP username
    $mail->Password   = 'leia jkwo nlhe alrm';                               //SMTP password
    $mail->SMTPSecure ="tls";          //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //disable certificate verification(not recommender for production)
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
        
    );

    //Recipients
    $mail->setFrom('johanpaul109@gmail.com', 'monkam');
                                                              //Add a recipient
    $mail->addAddress('johanjoans2@gmail.com');               //Name is optional
    //$mail->addReplyTo('monkamsorel@gmail.com', 'monkam');
   

    //Attachments
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '<p> Here is the subject </p>';
    $mail->Body    = '<P>This is the HTML message body <b>in bold!</b></p>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}