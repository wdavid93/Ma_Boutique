<?php
namespace App\Service;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require_once dirname(dirname(dirname(__FILE__))).'/vendor/autoload_runtime.php';
require_once dirname(dirname(dirname(__FILE__))).'/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once dirname(dirname(dirname(__FILE__))).'/vendor/phpmailer/phpmailer/src/SMTP.php';
// require 'src/PHPMailer.php';
// require 'src/SMTP.php';
// class Mailer {
//     public function send() {
//     //Create an instance; passing `true` enables exceptions
//     $mail = new PHPMailer(true);
    
//     try {
//         //Server settings
//         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//         $mail->isSMTP();                                            //Send using SMTP
//         $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
//         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//         $mail->Username   = 'sportif_wd@hotmail.fr';                     //SMTP username
//         $mail->Password   = 'mima1951**';                               //SMTP password
//         //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//         $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
//         $mail->Port       = 486;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
//         //Recipients
//         $mail->setFrom('sportif_wd@hotmail.fr', 'Mailer');
//         $mail->addAddress('william.david93000@gmail.com', 'Dest');     //Add a recipient
//         // $mail->addAddress('ellen@example.com');               //Name is optional
//         // $mail->addReplyTo('info@example.com', 'Information');
//         // $mail->addCC('cc@example.com');
//         // $mail->addBCC('bcc@example.com');
    
//         //Attachments
//         // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//         // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
//         //Content
//         $mail->isHTML(true);                                  //Set email format to HTML
//         $mail->Subject = 'Here is the subject';
//         $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
//         $mail->send();
//         echo 'Message has been sent';
//     } catch (phpmailerException $e) {
//         echo $e->errorMessage(); //Pretty error messages from PHPMailer
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }}
// }

//require_once('../class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
// class Mailer {
//     public function send() {
//         $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

//         $mail->IsSMTP(); // telling the class to use SMTP

//         try {
//         $mail->Host       = "mail.yourdomain.com"; // SMTP server
//         $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
//         $mail->SMTPAuth   = true;                  // enable SMTP authentication
//         $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
//         $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
//         $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
//         $mail->Username   = "william.david93000@gmail.com";  // GMAIL username
//         $mail->Password   = "mima1951";            // GMAIL password
//         $mail->AddReplyTo('william.david93000@gmail.com', 'First Last');
//         $mail->AddAddress('whoto@otherdomain.com', 'John Doe');
//         $mail->SetFrom('william.david12160@gmail.com', 'First Last');
//         $mail->AddReplyTo('name@yourdomain.com', 'First Last');
//         $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
//         $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
//         //$mail->MsgHTML(file_get_contents('contents.html'));
//         $mail->MsgHTML('test');
//         //  $mail->AddAttachment('images/phpmailer.gif');      // attachment
//         //  $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
//         $mail->Send();
//         echo "Message Sent OK<p></p>\n";
//         } catch (phpmailerException $e) {
//         echo $e->errorMessage(); //Pretty error messages from PHPMailer
//         } catch (Exception $e) {
//         echo $e->getMessage(); //Boring error messages from anything else!
//         }
//     }
// }


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'src/PHPMailer.php';
// require 'src/SMTP.php';
// require 'src/Exception.php';

// Load Composer's autoloader
//require 'vendor/autoload.php';
class Mailer {
    public function sendMailDirect() {
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->SMTPDebug = 2;
        $mail->isSMTP();                                            // Send using SMTP

        $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sportif_wd@hotmail.fr';                     //SMTP username
        $mail->Password   = 'mima5158**';                               //SMTP password
        // //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                 // sets the prefix to the servier
        // $mail->Port       = 486;              
        // $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        // $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        // $mail->Username   = 'william.david93000@gmail.com';         // SMTP username
        // $mail->Password   = 'mima1951';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
        );
        //Recipients
        $mail->setFrom('sportif_wd@hotmail.fr', 'will');
        $mail->addAddress('william.david12160@gmail.com', 'william david');     // Add a recipient
        $mail->addAddress('sportif_wd@hotmail.fr', 'william david');                // Name is optional
        /*$mail->addReplyTo('info@exemple.com', 'Information');
        $mail->addCC('cc@exemple.com');
        $mail->addBCC('bcc@exemple.com');*/


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Test Mailler Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        // $mail->send();
        // echo 'Message has been sent';

        if(!$mail->send()) {
            echo 'Erreur, message non envoyé.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
         } else {
            echo 'Le message a bien été envoyé !';
         }
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
}