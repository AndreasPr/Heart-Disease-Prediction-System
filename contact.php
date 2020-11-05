	<?php 
	session_start();
	if(isset($_SESSION['username'])=="") {
		header("Location: index.php");
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
			    <link rel="stylesheet" type="text/css" href="css/contact_style.css">


				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


			    <title>Contact</title>
			  </head>
			  <body>
				<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navigation_bar">
				  <a class="navbar-brand" href="home.php">
			    	<img src="images/HDPS.png" width="135" height="90" alt="heart_disease_prediction_system_logo">
			  	  </a>
				  <a class="navbar-brand" href="home.php">Home</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNav">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item active">
				        <a class="nav-link" href="about.php">About us <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="services.php">Services</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="viewpatientsresults.php">Results</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="chart.php">Charts</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="contact.php">Contact</a>
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

		<img src="images/contact.jpg" class="img-fluid" alt="Responsive image">

		<section class="contact_section">
			<div id="contact_form">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-md-8 col-lg-6 pb-5">
		                    
		                    <form action="contact_form.php" method="POST" class="contact__form">
		                        <div class="card border-primary rounded-0">
		                            <div class="card-header p-0">
		                                <div class="bg-info text-white text-center py-2">
		                                    <h3><i class="fa fa-envelope"></i> Get in touch with us</h3>
		                                </div>
		                            </div>
		                            <div class="card-body p-3">
		                                <div class="form-group">
		                                    <div class="input-group mb-2">
		                                        <div class="input-group-prepend">
		                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
		                                        </div>
		                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Insert your name" required>
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <div class="input-group mb-2">
		                                        <div class="input-group-prepend">
		                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
		                                        </div>
		                                        <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Insert your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <div class="input-group mb-2">
		                                        <div class="input-group-prepend">
		                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
		                                        </div>
		                                        <textarea class="form-control" name="message" placeholder="Insert your message" id="message" required></textarea>
		                                    </div>
		                                </div>
		                                <div class="text-center">
		                                    <input type="submit" value="Send" name="send" id="send" class="btn btn-info btn-block rounded-0 py-2">
		                                </div>
		                            </div>
		                        </div>
		                        <!--<div id="progress"></div>-->
		                        <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                    Your message was sent successfully.
                                </div>
		                    </form>
		        		</div>
						<div class="col-12 col-md-8 col-lg-6 pb-5">
							<p id="brief_text">Whether you want to give us a call about a donation, enquire about fundraising or find out how to visit us, we want to hear from you and we'll endeavour to help in whatever way we can.</p>

							<div class="container">
								<div class="row">
								<div class="direct_line d-flex flex-row align-items-center justify-content-start">
									<div class="direct_line_title text-center">Direct Line</div>
									<div class="direct_line_num text-center">+30 210 5534567</div>
								</div>
								</div>
							</div>

							<div id="address_phone_email">
								<h5 class="address_phone_email_title">Address</h5><p>170 William St, New York, NY 10038</p>
								<h5 class="address_phone_email_title">Phone</h5><p>(585) 275-2475</p>
								<h5 class="address_phone_email_title">Email</h5><p>hdps@gmail.com</p>
							</div>

						</div>

					</div>
				</div>
			</div>
		</section>

		<?php
		/*$con = mysqli_connect("localhost","root","","heart_disease_prediction_system");

		if (isset($_POST['send'])) 
		{
			$username = $_SESSION['username'];
			$fullname = $_POST['fullname'];
			$contact_email = $_POST['contact_email'];
			$message = $_POST['message'];

			$query = "INSERT INTO contact (username, name, email, message) VALUES ('$username', '$fullname', '$contact_email', '$message')";
			$result = mysqli_query($con,$query);
		}*/
		?>

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
			    echo "<script>alert('Message could not be sent.');</script>";
			    #echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo '<script>alert("Message has been sent");</script>';
			}
		}

		}
	}
	?>

			<footer class="footer">
			<div class="container bottom_border">
			<div class="row">

			<div class=" col-sm-4 col-md col-sm-4  col-12 col">
			<h5 class="headin5_amrc col_white_amrc pt2">About Dr. Mehmet Aktas, MD</h5>
			
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
			<li><a href="about.php">About us</a></li>
			<li><a href="services.php">Services</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="viewpatientsresults.php">Results</a></li>
			<li><a href="chart.php">Charts</a></li>
			</ul>
			
			<p class="text-center">Copyright @2019 | Designed With by HDPS</p>

			<ul class="social_footer_ul">
			<li><a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
			<li><a href="https://twitter.com/?lang=en"><i class="fab fa-twitter"></i></a></li>
			<li><a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a></li>
			<li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
			</ul>
			
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

				<script src="js/main.js"></script>

			    <!-- Optional JavaScript -->
			    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
			    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
			  </body>
			</html>