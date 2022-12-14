<?php declare(strict_types=1);

namespace Luna;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Luna\Response;

/**
 *
 */
class HttpResolver
{

    function __construct()
    {
        // Takes raw data from the request
        $json = json_decode(file_get_contents('php://input'), true);

        if (empty($_GET) && empty($_POST) && empty($json)) {
            echo Response::new(false, 400, [
                "error" => "Empty request",
            ]);
            return;
        }

        if (isset($json["submit_contact"])) {
            echo $this->handleContactForm($json);
        } else {
            echo Response::new(false, 400, [
                "error" => "Request not handled",
                "json" => $json,
            ]);
        }
    }

    protected function handleContactForm(array $form): string
    {
        $mail = new PHPMailer(true);
        try {
            // Prepare form
            unset($form["submit_contact"]);
            $fields = [];
            foreach ($form as $field) {
                $fields[] = htmlentities($field['label'] ?? 'Not found') . ': ' . htmlentities($field['value'] ?? '[empty]');
            }

            // Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL_USERNAME;                     //SMTP username
            $mail->Password   = EMAIL_SECRET;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = EMAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Recipients
            $mail->setFrom(EMAIL_USERNAME, 'No-reply');
            $mail->addAddress('stefaniakmarzena0@gmail.com', 'Marzena Stefaniak');     //Add a recipient
            $mail->addAddress('michal.dzierzbicki@vp.pl', 'Marzena Stefaniak');     //Add a recipient
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            // Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'New appointment';
            $mail->Body    = 'Form:<br><ul><li>' . implode('</li><li>', $fields) . "</li></ul>";
            $mail->AltBody = 'Form: ' . implode(', ', $fields);

            $mail->send();
            return Response::new(true, 200);
        } catch (Exception $e) {
            return Response::new(false, 500, [
                "error" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"
            ]);
        }
    }
}
