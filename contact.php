<?php include 'header.php'; ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(assets/img/contactimage.jpg);">
				<div class="container">
					<h1>Contact Us</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- Contact Page Section Start -->
			<section class="contact-page">
				<div class="container">
				<h2>Drop A Mail</h2>
				
					<div class="col-md-4 col-sm-4">
						<div class="contact-box">
							<i class="fa fa-map-marker"></i>
							<p>1163 Quayside Dr, New Westminste<br>Canada</p>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="contact-box">
							<i class="fa fa-envelope"></i>
							<p><br>support@classconstructionltd
.com</p>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="contact-box">
							<i class="fa fa-phone"></i>
							<p>Call: +1 (805) 398-8263<br>WhatsApp: +1 (805) 398-8263</p>
						</div>
					</div>
					
				</div>
			</section>
			<!-- contact section End -->
			
			<!-- contact form -->
			<section class="contact-form">
				<div class="container">
					<h2>Drop A Mail</h2>
						    <?php
/**
 * This example shows how to handle a simple contact form.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "cornellekacy4@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "cornellekacy456";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('from@example.com', 'CCIL');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('support@classconstructionltd.com', 'Contact');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'Class Construction Internation Ltd';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Phone Number: {$_POST['phone']}
Subject: {$_POST['subject']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            echo '<div class="alert alert-success">
  <strong>Success!</strong> Message Successfuly sent. We will get back to you shortly
</div>';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?>
<form method="post">
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" name="name" placeholder="Your Name">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="email" class="form-control" name="email" placeholder="Your Email">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" name="phone" placeholder="Phone Number">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" name="subject" placeholder="Subject">
					</div>
					
					<div class="col-md-12 col-sm-12">
						<textarea class="form-control" name="message" placeholder="Message"></textarea>
					</div>
					
					<div class="col-md-12 col-sm-12">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					
				</div>
				</form>
			</section>
			<!-- Contact form End -->
			
		<?php include 'footer.php'; ?>