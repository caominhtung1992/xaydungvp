<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ham send mail su dung thu vien phpmailer
function send_mail_helper($mailto,$subject,$mailcontent,$listfile=array()){
	require_once APPPATH."helpers/phpmailer/class.phpmailer.php";
    require_once APPPATH."helpers/phpmailer/class.smtp.php";
    $mail = new PHPMailer(true);
    $mail->IsSMTP(); // telling the class to use SMTP
    try {
        $mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
        $mail->SMTPDebug  = false;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "SMTP";                 // sets the prefix to the servier
        $mail->Host       = "ssl://smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username   = "php.thietkewebsite@gmail.com";  // GMAIL username
        $mail->Password   = "30141592654";            // GMAIL password
        $mail->AddReplyTo('php.thietkewebsite@gmail.com', ''.$_SERVER['HTTP_HOST'].'');
        $mail->AddAddress($mailto, '0');
        $mail->SetFrom('php.thietkewebsite@gmail.com',''.$_SERVER['HTTP_HOST'].'');
		$mail->IsHTML(true);
		$mail->CharSet  = 'UTF-8';
        $mail->Subject = $subject;
        //$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
		$mail->Body=$mailcontent;
//        $mail->MsgHTML($mailcontent);
		if(is_array($listfile)){
			foreach($listfile as $f){
				$mail->AddAttachment($f);
			}
		}elseif(is_file($listfile)){
			$mail->AddAttachment($listfile);
		}
        $mail->Send();
        return true;
    } catch (phpmailerException $e) {
        return $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        return $e->getMessage(); //Boring error messages from anything else!
    }
}
?>