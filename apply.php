
			<!-- End Navigation -->
			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(assets/img/contactimage.jpg);">
				<div class="container">
					<h1>Apply For A Job</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- Contact Page Section Start -->

			<!-- contact section End -->
			
			<!-- contact form -->
			<section class="contact-form">
				<div class="container">

					<h2>Fill The Form Bellow for Your Desired Position</h2>

					<div class="row">
						<div class="col-md-2">
							
						</div>
						<div class="col-md-8">
																					<?php
/**
 * This example shows how to handle a simple contact form.
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Import PHPMailer classes into the global namespace
$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
     $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
$mail->SMTPSecure = 'tls';
$mail->Host = 'blizzard.mxrouting.net';
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "apply@classicconstltd.com";
//Password to use for SMTP authentication
$mail->Password = "Cornellekacy45";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('from@example.com', 'Site Application');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('apply@classicconstltd.com', 'Site Application');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'Classic Construction International Ltd';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Phone Number: {$_POST['phone']}
Country: {$_POST['country']}
Date of Birth: {$_POST['dob']}
City/State: {$_POST['city']}
Address: {$_POST['address']}
Highest Level Of Education: {$_POST['hle']}
Working Experience: {$_POST['we']}
Job Tittle: {$_POST['jobt']}
Marital Status: {$_POST['ms']}
Can you move to canada to work?: {$_POST['workout']}
Message: {$_POST['description']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            echo "<div class='alert alert-success'>
  <strong>Sent!</strong> Your Application has Been Submitted. You will Receive a Message of Us.
</div>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?> 
<form method="post">

							<div class="col-md-6 col-sm-6">
								<label>Your Full Name</label>
						<input type="text" name="name" class="form-control" placeholder="Your Name">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<label>Your Email</label>
						<input type="email" name="email" class="form-control" placeholder="Your Email">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<label>Your Phone Number</label>
						<input type="text" name="phone" class="form-control" placeholder="Phone Number">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<label> Your Country</label>
					
						<input type="text" name="country" class="form-control" placeholder="Enter your Country">
				</div>

					<div class="col-md-12 col-sm-12">
						<label>Date Of Birth</label>
						<input type="date" name="dob" class="form-control" placeholder="Date Of Birth">
					</div>

						<div class="col-md-6 col-sm-6">
						<label>City/State</label>
						<input type="text" name="city" class="form-control" placeholder="City/State">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<label>Full Address</label>
						<input type="text" name="address" class="form-control" placeholder="Full Address">
					</div>

					<div class="col-md-12 col-sm-12">
						<label>Highest Level Of Education</label>
						<input type="text" name="hle" class="form-control" placeholder="Highest Level Of Education">
					</div>
					<div class="col-md-12 col-sm-12">
						<label>Working Experience</label>
						<input type="text" name="we" class="form-control" placeholder="Working Experience">
					</div>
					<div class="col-md-12 col-sm-12">
						<label>Job Title You are Applying For</label>
						<input type="text" name="jobt" class="form-control" placeholder="Working Experience">
					</div>
						<div class="col-md-6 col-sm-6">
						<label>Marital Status</label>
							<select class="form-control" name="ms" id="j-category">
										<option value="Married">Married</option>
										<option value="Single">Single</option>
										<option value="Engaged">Engaged</option>
									</select>
					</div>
					
					<div class="col-md-6 col-sm-6">
						<label>Can you move to canada to work?</label>
							<select class="form-control" name="workout" id="j-category">
										<option value="Yes">Yes</option>
										<option value="No">No</option>
										
									</select>
					</div>
					<div class="col-md-12 col-sm-12">
						<label>Upload Resume (It Should be in Pdf or Docx Format)</label>
						<input type="file" name="image" class="form-control" placeholder="Subject">
					</div>
					<div class="col-md-12 col-sm-12">
						<label>Give us a litle description about yourself</label>
						<textarea class="form-control" name="description" placeholder="Description"></textarea>
					</div>
					
					<div class="col-md-12 col-sm-12">
						<button type="submit" class="btn btn-primary">Apply Now</button>
					</div>
						</div>
						<div class="col-md-2">
							
						</div>
					</div>
					</form>
					
					
				</div>
			</section>
			<!-- Contact form End -->
			
		<?php include 'footer.php'; ?>