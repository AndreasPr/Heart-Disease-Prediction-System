<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        # Sender Data
        $fullname = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["fullname"])));
        $contact_email = filter_var(trim($_POST["contact_email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);


        require 'PHPMailer/PHPMailerAutoload.php';
        require 'credential.php';

        $mail = new PHPMailer;

        // $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL;                 // SMTP username
        $mail->Password = PASS;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom($contact_email, 'HDPS');
        $mail->addAddress(EMAIL);     // Add a recipient

        $mail->addReplyTo($contact_email);

        $mail->isHTML(true);                                  // Set email format to HTML

        //$mail->Subject = $_POST['subject'];
        $mail->Subject = 'NEW MESSAGE';
        $mail->Body    = '
        <div>
        Name: '.$fullname.'<br>
        Email: '.$contact_email.'<br>
        Message: '.$message.'<br>
        </div>';
        $mail->AltBody = 'This is the body message ';

        if(!$mail->send()) {
            echo "Oops! Something went wrong, we couldn't send your message.";
            #echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Thank You! Your message has been sent.';
        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
