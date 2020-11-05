<?php 
session_start();
if(isset($_SESSION['username'])=="") {
	header("Location: index.php");
}
?>

<?php 
$connect = mysqli_connect("localhost", "root", "", "heart_disease_prediction_system");
$query = "SELECT submit_date as hmeromhnia, cp as chest_pain, chol as cholesterol, trestbps as bps, fbs as fasting, restecg as resting, thalach as thal, exang as ventricular, oldpeak as old, slope as Slope, ca as Ca, thal as Thal FROM patientsdata WHERE username = '".$_SESSION['username']."' GROUP BY submit_date ORDER BY submit_date DESC LIMIT 6";
$rows = '';
$result = mysqli_query($connect,$query);
$total_rows = mysqli_num_rows($result);
if($total_rows > 0)
{
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}  
?>
	<!DOCTYPE html>
	<html lang="en">
	  <head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="css/footer_style.css"/>
	    <link rel="stylesheet" type="text/css" href="css/responsive.css"/>
	    <link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>


	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

		<!----------------Chart---------------------------->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
		<!------------------------------------------------->

		<!----------------Smooth Scroll-------------------->
    	<script src="js/smooth-scroll.js"></script>
    	
		<!------------------------------------------------->
		<script>

		$().ready(function() { 
		    Morris.Line({
		        element: 'cp_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['chest_pain'],
		        labels: ['chest_pain'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });
		    Morris.Line({
		        element: 'chol_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['cholesterol'],
		        labels: ['cholesterol'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });
		    Morris.Line({
		        element: 'trestbps_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['bps'],
		        labels: ['bps'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });
		    Morris.Line({
		        element: 'fbs_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['fasting'],
		        labels: ['fasting'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });
		    Morris.Line({
		        element: 'restecg_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['resting'],
		        labels: ['resting'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });
		    Morris.Line({
		        element: 'thalach_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['thal'],
		        labels: ['thal'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });
		    Morris.Line({
		        element: 'exang_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['ventricular'],
		        labels: ['ventricular'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });
		    Morris.Line({
		        element: 'oldpeak_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['old'],
		        labels: ['old'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });
		    Morris.Line({
		        element: 'slope_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['Slope'],
		        labels: ['Slope'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });
		    Morris.Line({
		        element: 'ca_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['Ca'],
		        labels: ['Ca'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });
		    Morris.Line({
		        element: 'thal_chart',
		        data: <?php echo json_encode($rows);?>,
		        xkey: 'hmeromhnia', 
		        ykeys: ['Thal'],
		        labels: ['Thal'],
		        lineColors: ['#0b62a4'],
		        xLabels: 'hmeromhnia',
		        xLabelAngle: 45,
		        smooth: true,
		        resize: true
		    });

		})
		</script>
	    <title>Chart</title>
	  </head>
	  <body>

		<nav class="navbar static-top navbar-expand-lg navbar-light bg-light" id="navigation_bar" style="">
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

			<br><br><br><br><br><br><br><br>
		<div id="charts_part">
			<div class="container">
				<div class="row" style="padding-bottom: 10%;">
					<div class="col-md-6">
						<div class="text-center"><h3>Cp Chart</h3></div>
						<div id='cp_chart'></div>
					</div>
					<div class="col-md-6">
						<div class="text-center"><h3>Cholesterol Chart</h3></div>
						<div id='chol_chart'></div>
					</div>
				</div>

				<div class="row" style="padding-bottom: 10%;">
					<div class="col-md-6">
						<div class="text-center"><h3>Trestbps Chart</h3></div>
						<div id='trestbps_chart'></div>
					</div>
					<div class="col-md-6">
						<div class="text-center"><h3>Fbs Chart</h3></div>
						<div id='fbs_chart'></div>
					</div>
				</div>

				<div class="row" style="padding-bottom: 10%;">
					<div class="col-md-6">
						<div class="text-center"><h3>Restecg Chart</h3></div>
						<div id='restecg_chart'></div>
					</div>
					<div class="col-md-6">
						<div class="text-center"><h3>Thalach Chart</h3></div>
						<div id='thalach_chart'></div>
					</div>
				</div>

				<div class="row" style="padding-bottom: 10%;">
					<div class="col-md-6">
						<div class="text-center"><h3>Exang Chart</h3></div>
						<div id='exang_chart'></div>
					</div>
					<div class="col-md-6">
						<div class="text-center"><h3>Oldpeak Chart</h3></div>
						<div id='oldpeak_chart'></div>
					</div>
				</div>

				<div class="row" style="padding-bottom: 10%;">
					<div class="col-md-6">
						<div class="text-center"><h3>Slope Chart</h3></div>
						<div id='slope_chart'></div>
					</div>
					<div class="col-md-6">
						<div class="text-center"><h3>Ca Chart</h3></div>
						<div id='ca_chart'></div>
					</div>
				</div>
				<div class="row" style="padding-bottom: 10%;">
					<div class="col-md-12">
						<div class="text-center"><h3>Thal Chart</h3></div>
						<div id='thal_chart'></div>
					</div>
				</div>
			</div>

			
		</div>



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
		<li><a href="about.php">About us</a></li>
		<li><a href="services.php">Services</a></li>
		<li><a href="contact.php">Contact</a></li>
		<li><a href="viewpatientsresults.php">Results</a></li>
		<li><a href="chart.php">Charts</a></li>
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