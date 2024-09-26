<?php 
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail=new PHPMailer();

    //SMPT Settings
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth=true;
    $mail->Username="hasinimarygold28@gmail.com";
    $mail->Password="vcxd keyd qglu dpts";
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';

    //Email Settings
 
    $mail->isHTML(true);
    $mail->setFrom($email,$name);
    $mail->addAddress("ajiajinika33@gmail.com");
    $mail->Subject=("$email($subject)");
    $mail->Body=($message);

    if($mail->send()){
        $status="Success";
        $response="Email is sent";
    }
    else{
        $status="Failed";
        $response="Something went wrong : <br>".$mail->ErrorInfo;
    }
    exit(json_encode(array("status"=> $status ,"response"=>$response)));

}
?>