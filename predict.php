<?php 
session_start();
if(isset($_SESSION['username'])=="") {
	header("Location: index.php");
}
	$con = mysqli_connect("localhost","root","","heart_disease_prediction_system");

    $username = "";
    $input_username = "";
	$age = "";
	$sex = "";
	$id = 0;
	$cp = "";
	$trestbps = "";
	$chol = "";
	$fbs = "";
	$restecg = "";
	$thalach = "";
	$exang = "";
	$oldpeak = "";
	$slope = "";
	$ca = "";
	$thal = "";
	$error = "";

	if (isset($_POST['save'])) 
	{
        $username = $_SESSION['username'];
        $input_username = $_POST['input_username'];
		$age = $_POST['age'];
		$sex = $_POST['sex'];
		$cp = $_POST['cp'];
		$trestbps = $_POST['trestbps'];
		$chol = $_POST['chol'];
		$fbs = $_POST['fbs'];
		$restecg = $_POST['restecg'];
		$thalach = $_POST['thalach'];
		$exang = $_POST['exang'];
		$oldpeak = $_POST['oldpeak'];
		$slope = $_POST['slope'];
		$ca = $_POST['ca'];
		$thal = $_POST['thal'];

		//min & max values
		$min_rest = $_POST['min_rest'];//decimal(4,1)
		$max_rest = $_POST['max_rest'];//decimal(4,1)
		$min_cholesterol = $_POST['min_cholesterol'];//decimal(4,1)
		$max_cholesterol = $_POST['max_cholesterol'];//decimal(4,1)
		$min_heartrate = $_POST['min_heartrate'];//decimal(4,1)
		$max_heartrate = $_POST['max_heartrate'];//decimal(4,1)
		$min_oldpeak = $_POST['min_oldpeak'];//decimal(2,1)
		$max_oldpeak = $_POST['max_oldpeak'];//decimal(2,1)
		$min_vessels = $_POST['min_vessels'];//decimal(2,1)
		$max_vessels = $_POST['max_vessels'];//decimal(2,1)
		$min_thal = $_POST['min_thal'];//decimal(2,1)
		$max_thal = $_POST['max_thal'];//decimal(2,1)

		$query_check_patient_username = "SELECT username FROM users WHERE username = '".$input_username."' ";
	    $result_query = mysqli_query($con, $query_check_patient_username);

	    if(mysqli_num_rows($result_query) > 0)
	    {
	      
			ini_set('max_execution_time', 300);

			$command = escapeshellcmd("C:\\Users\\Admin\\AppData\\Local\\Programs\\Python\\Python35\\python C:\\xampp\\htdocs\\HeartDiseasePredictionSystem\\main_algorithm.py ".$age." ".$sex." ".$cp." ".$trestbps." ".$chol." ".$fbs." ".$restecg." ".$thalach." ".$exang." ".$oldpeak." ".$slope." ".$ca." ".$thal." ");
			$output = shell_exec($command);

			if(isset($output))
			{
				mysqli_query($con, "INSERT INTO patientsdata (username, doctor, age, sex, cp, trestbps, chol, fbs, restecg, thalach, exang, oldpeak, slope, ca, thal, result, min_rest, max_rest, min_cholesterol, max_cholesterol, min_heartrate, max_heartrate, min_oldpeak, max_oldpeak, min_vessels, max_vessels, min_thal, max_thal) VALUES ('$input_username','$username','$age', '$sex', '$cp', '$trestbps', '$chol', '$fbs', '$restecg', '$thalach', '$exang', '$oldpeak', '$slope', '$ca', '$thal', '$output', '$min_rest', '$max_rest', '$min_cholesterol', '$max_cholesterol', '$min_heartrate', '$max_heartrate', '$min_oldpeak', '$max_oldpeak', '$min_vessels', '$max_vessels', '$min_thal', '$max_thal')"); 
			}

	    }
	    else
	    {
	    	$error =  "Username does NOT exist in database!";
	    }

    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/footer_style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="css/predict_style.css">
    
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <title>Predict</title>
  </head>
  <body>
	<nav class="navbar  navbar-expand-lg navbar-light bg-light" id="navigation_bar">
	  <a class="navbar-brand" href="home_doctor.php">
    	<img src="images/HDPS.png" width="135" height="90" alt="heart_disease_prediction_system_logo">
  	  </a>
	  <a class="navbar-brand" href="home_doctor.php">Home</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="about_doctor.php">About us <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="services_doctor.php">Services</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="predict.php">Predict</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="contact_doctor.php">Contact</a>
	      </li>
	    </ul>
	    <span class="navbar-text nav-item dropdown" style="color: black; font-size: 110%;">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<div><img src="images/user.png" alt="user" /></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						  <p class="dropdown-item" style="color: #C43838;"><span style="font-weight: bold; cursor: pointer;">Welcome</span> <?php echo $_SESSION['username']; ?></p>
				          <a class="dropdown-item" href="logout.php" style="color: black;background-color: white;"> <img src="images/logout.png"> Logout</a>
				        </div>
					</span>
	  </div>
	</nav>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id = "form_input">

<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<span id="span_error_message" style="padding: 0.5%;"><?php echo $error; ?></span>
			<div class="form-group">
		      <label for="input_username" class="title_of_inputs">Username:</label>
		      <input type="text" class="form-control" id="input_username" name="input_username" value="" required="required" placeholder="e.g. John123">
		    </div>
		</div>
		<div class="col-lg-6">
			<span style="padding: 0.5%;"></span>
			<div class="form-group">
		      <label for="age" class="title_of_inputs">Age:</label>
		      <input type="text" class="form-control" id="age" name="age" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 65.0">
		    </div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<label class="title_of_inputs">Sex:</label>
			  <div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_male" name="sex" value="1.0" required="required">Male
			        <label class="form-check-label" for="radio_male">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_female" name="sex" value="0.0">Female
			        <label class="form-check-label" for="radio_female">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
		</div>
		<div class="col-lg-6">
			<label class="title_of_inputs">Chest Pain Type:</label>
			  <div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_typical_angina" name="cp" value="1.0" required="required">Typical Angina
			        <label class="form-check-label" for="radio_typical_angina">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_atypical_angina" name="cp" value="2.0">Atypical Angina
			        <label class="form-check-label" for="radio_atypical_angina">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_non_anginal_pain" name="cp" value="3.0">Non-anginal pain
			        <label class="form-check-label" for="radio_non_anginal_pain">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_asymptomatic" name="cp" value="4.0">Asymptomatic
			        <label class="form-check-label" for="radio_asymptomatic">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		      <label for="trestbps" class="title_of_inputs">Resting Blood Pressure(in mm Hg):</label>
		      <input type="text" class="form-control" id="trestbps" name="trestbps" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 120.0">
		    </div>
		    <div class="form-group" style="float: left;">
 				<label for="min_rest" class="title_of_inputs">Min</label>
				<input type="text" class="form-control" id="min_rest" name="min_rest" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 80.0">
		    </div>
		    <div class="form-group" style="float: left;">
				<label for="max_rest" class="title_of_inputs">Max</label>
				<input type="text" class="form-control" id="max_rest" name="max_rest" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 150.0">
		    </div>
		    <div style="clear: both;"></div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
		      <label for="chol" class="title_of_inputs">Serum Cholestrol in mg/dl:</label>
		      <input type="text" class="form-control" id="chol" name="chol" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 229.0">
		    </div>
		    <div class="form-group" style="float: left;">
 				<label for="min_cholesterol" class="title_of_inputs">Min</label>
				<input type="text" class="form-control" id="min_cholesterol" name="min_cholesterol" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 80.0">
		    </div>
		    <div class="form-group" style="float: left;">
				<label for="max_cholesterol" class="title_of_inputs">Max</label>
				<input type="text" class="form-control" id="max_cholesterol" name="max_cholesterol" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 150.0">
		    </div>
		    <div style="clear: both;"></div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
		<label class="title_of_inputs">Fasting Blood sugar >120 mg/dl:</label>
			<div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_true" name="fbs" value="1.0" required="required">True
			        <label class="form-check-label" for="radio_true">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div><br>
			<div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_false" name="fbs" value="0.0">False
			        <label class="form-check-label" for="radio_false">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
		</div>
		<div class="col-lg-6">
		  <label class="title_of_inputs">Resting Electrocardiographic Results:</label>
			<div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_normal" name="restecg" value="0.0" required="required">Normal
			        <label class="form-check-label" for="radio_normal">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
			<div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_stt" name="restecg" value="1.0">Having ST-T wave abnormality
			        <label class="form-check-label" for="radio_stt">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
			<div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_estes" name="restecg" value="2.0">Showing probable or definite left ventricular hypertrophy by Estes' criteria
			        <label class="form-check-label" for="radio_estes">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		      <label for="max_heart" class="title_of_inputs">Maximum Heart Rate Achieved:</label>
		      <input type="text" class="form-control" id="max_heart" name="thalach" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 129.0">
		    </div>
		    <div class="form-group" style="float: left;">
 				<label for="min_heartrate" class="title_of_inputs">Min</label>
				<input type="text" class="form-control" id="min_heartrate" name="min_heartrate" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 80.0">
		    </div>
		    <div class="form-group" style="float: left;">
				<label for="max_heartrate" class="title_of_inputs">Max</label>
				<input type="text" class="form-control" id="max_heartrate" name="max_heartrate" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 150.0">
		    </div>
		    <div style="clear: both;"></div>
		</div>
		<div class="col-lg-6">
		  <label class="title_of_inputs">Exercise induced angina:</label>
			<div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_yes" name="exang" value="1.0" required="required">Yes
			        <label class="form-check-label" for="radio_yes">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
			 <div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_no" name="exang" value="0.0">No
			        <label class="form-check-label" for="radio_no">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		      <label for="oldpeak" class="title_of_inputs">Oldpeak(ST depression induced by exercise):</label>
		      <input type="text" class="form-control" id="oldpeak" name="oldpeak" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 2.6">
		    </div>
		    <div class="form-group" style="float: left;">
 				<label for="min_oldpeak" class="title_of_inputs">Min</label>
				<input type="text" class="form-control" id="min_oldpeak" name="min_oldpeak" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 2.0">
		    </div>
		    <div class="form-group" style="float: left;">
				<label for="max_oldpeak" class="title_of_inputs">Max</label>
				<input type="text" class="form-control" id="max_oldpeak" name="max_oldpeak" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 3.0">
		    </div>
		    <div style="clear: both;"></div>
		</div>
		<div class="col-lg-6">
		  <label class="title_of_inputs">Slope(the slope of the peak exercise ST segment):</label>
			<div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_unsloping" name="slope" value="1.0" required="required">Unsloping
			        <label class="form-check-label" for="radio_unsloping">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
			<div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_flat" name="slope" value="2.0">Flat
			        <label class="form-check-label" for="radio_flat">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
			<div class="custom-radios">
			    <div>
			      <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio_downsloping" name="slope" value="3.0">Downsloping
			        <label class="form-check-label" for="radio_downsloping">
			          <span></span>
			        </label>
			      </div>
			    </div>
			  </div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		      <label for="ca" class="title_of_inputs">Number of major vessels (0-3) by flourosopy:</label>
		      <input type="text" class="form-control" id="ca" name="ca" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 2.0">
		    </div>
		    <div class="form-group" style="float: left;">
 				<label for="min_vessels" class="title_of_inputs">Min</label>
				<input type="text" class="form-control" id="min_vessels" name="min_vessels" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 2.0">
		    </div>
		    <div class="form-group" style="float: left;">
				<label for="max_vessels" class="title_of_inputs">Max</label>
				<input type="text" class="form-control" id="max_vessels" name="max_vessels" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 3.0">
		    </div>
		    <div style="clear: both;"></div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
		      <label for="thal" class="title_of_inputs">Thal:</label>
		      <input type="text" class="form-control" id="thal" name="thal" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 7.0">
		    </div>
		    <div class="form-group" style="float: left;">
 				<label for="min_thal" class="title_of_inputs">Min</label>
				<input type="text" class="form-control" id="min_thal" name="min_thal" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 3.0">
		    </div>
		    <div class="form-group" style="float: left;">
				<label for="max_thal" class="title_of_inputs">Max</label>
				<input type="text" class="form-control" id="max_thal" name="max_thal" value="" pattern="[0-9]+([\.][0-9]{1})" required="required" placeholder="e.g. 7.0">
		    </div>
		    <div style="clear: both;"></div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-12 text-center"><button type="submit" class="btn btn-danger" name="save">Save</button></div><br><br>

			<div class="form-group" id="result_textarea">
			  <label for="result" class="title_of_inputs">Result:</label>
			  <textarea class="form-control" rows="5" id="result" readonly="readonly"><?php if(isset($output)){echo $output;}  ?></textarea>
			</div>
		</div>
	</div>
    
</div>
</form>


<section id = "newsletter">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="newsletter_title">Subscribe to our newsletter</div>
				</div>
			</div>
			<form role="form" method="post" enctype="multipart/form-data">
				<div class="row newsletter_row">
					<div class="col-lg-12 text-center">
						<div class="newsletter_form_container">
							<input type="email" class="newsletter_input" name="subscribe_email" placeholder="Insert Your Email" required="required">
						</div>
					</div>
				</div>
				<div class="row" style="padding-top: 3%;">
					<div class="col text-center">
						<button class="btn btn-default" id="newsletter_button" name="subscribe_button" onclick="sendEmail()">subscribe</button>
					</div>
				</div>
			</form>
		</div>
	</section>

	<?php
	$con = mysqli_connect("localhost","root","","heart_disease_prediction_system");

	if (isset($_POST['subscribe_button'])) 
	{
		$username = $_SESSION['username'];
		$subscribe_email = $_POST['subscribe_email'];

		$query = "SELECT * FROM subscribe WHERE email = '".$subscribe_email."'";
		$result = mysqli_query($con,$query);

		if(mysqli_num_rows($result) > 0)
		{
			echo "<script>alert('Email already exists! You are NOT subscribed!') </script>";
		}
		else
		{
			$query = "INSERT INTO subscribe (username, email) VALUES ('$username', '$subscribe_email')";
			$result = mysqli_query($con,$query);


		if(isset($_POST['subscribe_button'])) {
			require 'PHPMailer/PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer;

			// $mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			$mail->AddEmbeddedImage('images/images_subscribe/header_image2.jpg', '1');

			$mail->setFrom(EMAIL, 'HDPS');
			$mail->addAddress($_POST['subscribe_email']);     // Add a recipient

			$mail->addReplyTo(EMAIL);

			$mail->isHTML(true);                                  // Set email format to HTML

			//$mail->Subject = $_POST['subject'];
			$mail->Subject = 'Welcome to HDPS';
			$mail->Body    = file_get_contents('email_message.html');
			$mail->AltBody = 'Thank you for your subscription!';

			if(!$mail->send()) {
			    echo "<script>alert('Message could not be sent.');";
			    #echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo '<script>alert("Message has been sent");</script>';
			}
		}

		}
	}
	?>

		  		<!--footer starts from here-->
		<footer class="footer">
		<div class="container bottom_border">
		<div class="row">

		<div class=" col-sm-4 col-md col-sm-4  col-12 col">
		<h5 class="headin5_amrc col_white_amrc pt2">About Dr. Mehmet Aktas, MD</h5>
		<!--headin5_amrc-->
		<p class="mb10">Dr. Mehmet Aktas is a cardiologist in Rochester, New York and is affiliated with multiple hospitals in the area, including Canandaigua Veterans Affairs Medical Center and Jones Memorial Hospital. He received his medical degree from State University of New York Upstate Medical University and has been in practice between 11-20 years. Dr. Aktas accepts several types of health insurance.</p>
		<p><i class="fa fa-location-arrow"></i> 601 Elmwood Ave, Rochester, NY, 14642 </p>
		<p><i class="fa fa-phone"></i> (585) 275-2475</p>
		<p><i class="fa fa fa-envelope"></i> mehmetaktas@gmail.com</p>
		</div>


		<div class="col-sm-4 col-md col-12 col">
			<h5 class="headin5_amrc col_white_amrc pt2">Our Locations</h5>
				<ul class="footer_ul2_amrc">
					<li><h4>New York</h4><p> 170 William St, New York, NY 10038</p></li>
					<li><h4>Athens</h4><p> Lourou 4-2, Athina 115 28</p></li>
				</ul>
		</div>


		<div class=" col-sm-12 col-md  col-12 col">
		<h5 class="headin5_amrc col_white_amrc pt2">Opening Hours</h5>
			<div class="opening_hours">
				<ul class="opening_hours_list">
					<li class="list_of_days_hours">
						<div class="details_of_days_hours"><font color="#999">Monday: 8:00am - 9:00pm</font></div>
					</li>
					<li class="list_of_days_hours">
						<div class="details_of_days_hours"><font color="#999">Thuesday: 8:00am - 9:00pm</font></div>
					</li>
					<li class="list_of_days_hours">
						<div class="details_of_days_hours"><font color="#999">Wednesday: 8:00am - 9:00pm</font></div>
					</li>
					<li class="list_of_days_hours">
						<div class="details_of_days_hours"><font color="#999">Thursday: 8:00am - 9:00pm</font></div>
					</li>
					<li class="list_of_days_hours">
						<div class="details_of_days_hours"><font color="#999">Friday: 8:00am - 7:00pm</font></div>
					</li>
				</ul>
			</div>
		</div>

		</div>
		</div>


		<div class="container">
		<ul class="foote_bottom_ul_amrc">
		<li><a href="index.php">Home</a></li>
		<li><a href="about_doctor.php">About us</a></li>
		<li><a href="services_doctor.php">Services</a></li>
		<li><a href="contact_doctor.php">Contact</a></li>
		</ul>
		<!--foote_bottom_ul_amrc ends here-->
		<p class="text-center">Copyright @2019 | Designed With by HDPS</p>

		<ul class="social_footer_ul">
		<li><a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
		<li><a href="https://twitter.com/?lang=en"><i class="fab fa-twitter"></i></a></li>
		<li><a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a></li>
		<li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
		</ul>
		<!--social_footer_ul ends here-->
		</div>

		</footer>

<script>
// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("navigation_bar").style.fontSize = "21px";
    document.getElementById("navigation_bar").style.paddingTop = "0px";
  } else {
    document.getElementById("navigation_bar").style.fontSize = "20px";
    document.getElementById("navigation_bar").style.paddingTop = "5px";
  }
}

</script>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		    <!-- Optional JavaScript -->
		    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		  </body>
		</html>