<?php
require 'phpmailer/vendor/autoload.php';

function send_mail_contact($toAddress, $toName, $fromAddress, $fromName, $subject, $message, $prompt) {

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = "fmiflights@gmail.com";
    $mail->Password = "^e4#tY6t6N*&8zwY";
    $mail->addAddress($toAddress, $toName);
    $mail->addReplyTo($fromAddress, $fromName);
    $mail->setFrom($fromAddress, $fromName);
    $mail->Subject = $subject;
    $mail->Body = $message;


    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo $prompt;
    }
}

function send_mail($toAddress, $toName, $subject, $message) {

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = "fmiflights@gmail.com";
    $mail->Password = "^e4#tY6t6N*&8zwY";
    $mail->addAddress($toAddress, $toName);
    $mail->setFrom("fmiflights@gmail.com", "FMI Flights");
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->IsHTML(true);


    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL)
    && preg_match('/@.+\./', $email);
}

function make_secret($len=5) {
    $salt = '';

    for ( $i = 0; $i < $len; $i++ )
    {
        $num   = rand(33, 126);

        if ( $num == '92' )
        {
            $num = 93;
        }

        $salt .= chr( $num );
    }

    return $salt;
}

function make_hash() {
    $pass = "";

    $unique_id 	= uniqid( mt_rand(), TRUE );
    $prefix		= make_secret();
    $unique_id .= md5( $prefix );

    usleep( mt_rand(15000,1000000) );

    mt_srand( (double)microtime()*1000000 );
    $new_uniqueid = uniqid( mt_rand(), TRUE );

    $final_rand = md5( $unique_id.$new_uniqueid );

    mt_srand();

    for ($i = 0; $i < 35; $i++)
    {
        $pass .= $final_rand{ mt_rand(0, 31) };
    }

    return $pass;
}

function get_ip() {
    $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                // trim for safety measures
                $ip = trim($ip);
                // attempt to validate IP
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}

function validate_ip($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}