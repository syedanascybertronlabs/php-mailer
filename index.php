<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include('functions/crud.php');

if(isset($_POST['btn_add_data']))
{   
    $u_name=$_POST['u_name'];
    $u_sub=$_POST['u_sub'];
    $u_email=$_POST['u_email'];
    $u_msg=$_POST['u_msg'];
   

    insert("null,
      '$u_name',
      '$u_sub',
      '$u_email',
      '$u_msg'","contactus");

    //mail function
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username= 'thomasritch76@gmail.com';
    $mail->Password= 'cikijmndzpcywqyh';
    $mail->SMTPSecure= 'ssl';
    $mail->Port= '465';

    $mail->setFrom('thomasritch76@gmail.com');
    $mail->addAddress($_POST["u_email"]);
    $mail->isHTML (true);
    
    $mail->Subject= $_POST["u_sub"];
    $mail->Body= $_POST["u_msg"];
    $mail->send();
    
    echo
    "
    <script>
    alert('Sent Sucessfully');
    document.location.href='index.php';
    </script>
    ";
    
}  
    




//_________________________________________________



if(isset($_POST["btn_add_data"])){

    

}
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">

<input type="text" name="u_name" placeholder="Full Name" required=""><br>
<input type="text" name="u_sub" placeholder="Subject" required=""><br>
<input type="email" name="u_email" placeholder="Email" required=""><br>

<textarea name="u_msg" rows="10" cols="30" placeholder="Message" required=""></textarea><br>
<button type="submit" name="btn_add_data">Submit Message</button>
</form>

</body>
</html>