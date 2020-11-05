<?php 
session_start();
if(isset($_SESSION['username'])=="") {
	header("Location: index.php");
}
?>
	<!doctype html>
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
	    <link rel="stylesheet" type="text/css" href="css/services_style.css">


	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	    <title>Services Doctor</title>
	  </head>
	  <body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navigation_bar">
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

	<img src="images/services_image.jpg" class="img-fluid" alt="Responsive image">

<section id="services_section">
	<div class="container-fluid ">
		<div class="col-md-12 text-center"><p id="text_subtitle">This is Dr. Mehmet Aktas</p><h1 class="events">Our Services</h1></div><br><br>
		<div class="row">

			<div class="col-lg-4 col-sm-12">
				<div class="card" style="width: 18rem;" id="service1">
				<div class="card-body">
				    <h5 class="card-title">Heart Failure Program</h5>
				    <p class="card-text">The Heart Failure Program is the first such program in New York to earn the Gold Seal of Approval certification by The Joint Commission, the nation’s predominant, standards-setting .</p>
				</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12">
				<div class="card" style="width: 18rem;" id="service2">
					  <div class="card-body">
					    <h5 class="card-title">About Heart Disease</h5>
					    <p class="card-text">Symptoms of heart disease in your blood vessels.Chest pain, chest tightness, chest pressure and chest discomfort (angina).Shortness of breath.Pain, numbness, weakness or coldness.</p>
					  </div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12">
				<div class="card" style="width: 18rem;" id="service3">
					  <div class="card-body">
					    <h5 class="card-title">Risk factors</h5>
					    <p class="card-text">Risk factors for developing heart disease include:Age, Sex, Family history, Smoking, Certain chemotherapy drugs and radiation therapy for cancer, Poor diet etc.</p>
					  </div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-sm-12">
				<div class="card" style="width: 18rem;" id="service1">
				<div class="card-body">
				    <h5 class="card-title">Cardiac Surgery Services</h5>
				    <p class="card-text">Our surgeons provide the full range of consultative and therapeutic services to patients with extensive coronary artery disease, complex valve disorders, cardiac arrhythmias and advanced heart failure.</p>
				</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12">
				<div class="card" style="width: 18rem;" id="service2">
					  <div class="card-body">
					    <h5 class="card-title">Vascular & Endovascular Surgery Services</h5>
					    <p class="card-text">We emphasize the careful, comprehensive treatment of each patient, from disease prevention and early diagnosis through the full spectrum of treatment options.</p>
					  </div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12">
				<div class="card" style="width: 18rem;" id="service3">
					  <div class="card-body">
					    <h5 class="card-title">Preventive Cardiology Program</h5>
					    <p class="card-text">It is preventable and manageable through: Risk assessment,Early diagnosis, Treatment, Lifestyle changes.</p>
					  </div>
				</div>
			</div>

		</div>

	</div>
</section>

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
	<li><a href="predict.php">Predict</a></li>
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

		<script src="js/numscroller-1.0.js"></script>
		
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	  </body>
	</html>