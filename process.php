<?php
    $error = array(); // array to hold validation errors
    $data = array(); // array to pass back data

    if( isset( $_POST["url"] )) {
        $data['success'] = true;
        $data['response'] = 'Thank You! Your message has been sent.';
    } else {
        if ( empty( $_POST["name"] ) OR empty( $_POST["email"] ) OR empty( $_POST["message"] ) ) {
            // Check that data was sent to the mailer
            $data['success'] = false;
            $data['response'] = "Please fill out all the fields.";
        } else {
            // validate the variables ========
            // Get the form fields and remove whitespace
            $name = strip_tags( trim( $_POST["name"] ) );
                $name = str_replace( array("\r","\n" ), array( " ", " " ), $name );
            $email = filter_var( trim( $_POST["email"] ), FILTER_SANITIZE_EMAIL );
            $message = htmlspecialchars( trim( $_POST["message"] ) );

            $recipient = "contact@jonathanchue.com";

            // Set the email subject
            $subject = "New Message from $name (Jonathan Chue)";

            // Build the email content
            $email_content = "Name: $name\n";
            $email_content .= "Email: $email\n\n";
            $email_content .= "$message\n";

            // Build the email headers
            $email_headers = "From: $name <$email>";

            if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
                // Check that email was valid
                $data['success'] = false;
                $data['response'] = "Please enter a valid email.";
            } else if ( mail( $recipient, $subject, $email_content, $email_headers )) {
                $data['success'] = true;
                $data['response'] = 'Thank You! Your message has been sent!';
            }
        }
    }

    // return all our data to an AJAX call
    echo json_encode( $data );
?>
