<?php
require 'vendor/autoload.php';
class SendEmail{

    public static function SendMail($to,$subject,$content){
        $key ='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';

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("andreagcoke@hotmail.com","Andrea Coke");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain",$content);
        

        $sendgrid = new \SendGrid($key);

        try{
            $response = $sendgrid->send($email);
            return $response;
        }catch(Exception $e){
            echo 'Email exception caught : '.$e->getMessage() ."\n";
            return false;
            }
        }
    }


?>