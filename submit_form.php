<?php
	session_start();

	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';
	require 'PHPMailer-master/src/Exception.php';


	// $mail = new PHPMailer(true);  
	$mail = new PHPMailer\PHPMailer\PHPMailer();

		$response= array();
		$response['success']=false;

	if (isset($_POST['name']) &&  !empty($_POST['name'])) {
		
		$name=@$_POST['name'];
		$email=@$_POST['email'];
		$mobile=@$_POST['mobile'];
		$guardian=@$_POST['guardian'];
		$address=@$_POST['address'];
		$class = @$_POST['class'];



		try {


	    //Server settings
	    $mail->SMTPDebug = false;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.hostinger.in';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'info@dpsfulbari.in';                 // SMTP username
	    $mail->Password = 'Sumanghosh@1';                           // SMTP password
	    // $mail->SMTPSecure = 'false';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->SMTPSecure = false;
	    $mail->SMTPAutoTLS = false;
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('info@dpsfulbari.in', 'Mailer');
	    $mail->addAddress('dpsfulbarischool@gmail.com', 'Dps');     // Add a recipient
	    // $mail->addAddress('ellen@example.com');               // Name is optional
	    // $mail->addReplyTo('info@example.com', 'Information');
	    // $mail->addCC('cc@example.com');
	    // $mail->addBCC('bcc@example.com');

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'You Just Got A New Query';
	    $mail->Body    = '

	    <html>
	    <head>
	    <title>You have Got A new Query</title>
	    </head>
	    <body>
	    <h1>Please Contact Soon '.$name.'</h1>
	    <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
	    <tr>
	    <th>Name:</th><td>'.$name.'</td>
	    </tr>
		<tr>
	    <th>Guardian Name:</th><td>'.$guardian.'</td>
	    </tr>
		<tr>
	    <th>Class:</th><td>'.$class.'</td>
	    </tr>
	    <tr style="background-color: #e0e0e0;">
	    <th>Email:</th><td>'.$email.'</td>
	    </tr>
		<tr>
	    <th>Mobile No:</th><td>'.$mobile.'</td>
	    </tr>
	    <tr>
	    <th>Address:</th><td>'.$address.'</td>
	    </tr>
	    </table>
	    </body>
	    </html>';
	    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	   
	    $response['success']=true;
	    $response['messege']= "Mail Sucessfully Sent";


	} catch (Exception $e) {

	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		$response['success']=false;
	    $response['messege']= "Something Went Wrong Please Try Again ";
	}

	echo json_encode($response);

	}else{

		$response['success']=false;
	    $response['messege']= "Something Went Wrong Please Try Again ";
	}
	
?>