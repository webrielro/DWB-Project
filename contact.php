<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../Mcvshop/components/db.php');
include('../Mcvshop/components/navbar.php');
include ('../Mcvshop/components/hero.php');
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senderEmail = $_POST['email']; 
    $senderName = $_POST['name']; 
    $message = $_POST['message']; 

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'testdwbproject@gmail.com'; 
        $mail->Password = 'xqazyiyhxbscsqgf';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender and recipient settings
        $mail->setFrom('testdwbproject@gmail.com', 'Your Name'); 
        $mail->addReplyTo($senderEmail, $senderName); 
        $mail->addAddress('testdwbproject@gmail.com', 'DWBTestContact');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Message from ' . $senderName;
        $mail->Body = 'Message: ' . $message; 

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];    

        $mail->send();
        $successMessage = 'Email has been sent successfully!';
    } catch (Exception $e) {
        $successMessage = 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link href="./css/navbar.css" rel="stylesheet">
    <link href="./css/hero.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <?php if (!empty($successMessage)) : ?>
            <div class="alert <?php echo ($successMessage === 'Email has been sent successfully!') ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>
        <form id="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="areaform" class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="btnform">Submit</button>
        </form>
    </div>
</body>
</html>
<?php
include('../Mcvshop/components/footer.php');?>