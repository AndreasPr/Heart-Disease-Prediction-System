<?php 
session_start();
if(isset($_SESSION['username'])=="") {
	header("Location: index.php");
}
	$con = mysqli_connect("localhost","root","","heart_disease_prediction_system");

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
	    <link rel="stylesheet" type="text/css" href="css/viewpatientsdata_style.css">


	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<!-- Smooth Scroll -->
    	<script src="js/smooth-scroll.js"></script>

	    <title>View Data</title>
	  </head>
	  <body onload="ReplaceResult()">


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

<div class="table_personal_div">
<h2>Personal Information</h2>
<table class="table table-bordered table-responsive" >
  <thead>
    <tr>
      <th class="fit" style="background-color: #C43838; color: white;">Username</th>
      <th class="fit" style="background-color: #C43838; color: white;">Doctor</th>
      <th class="fit" style="background-color: #C43838; color: white;">Age</th>
      <th class="fit" style="background-color: #C43838; color: white;">Sex</th>
    </tr>
  </thead>
  <tbody>
  	<?php
	$query="SELECT * FROM patientsdata WHERE username = '".$_SESSION['username']."' ORDER BY age DESC LIMIT 1";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($result)) 
	{
	?>
    <tr>
      <td class="fit"><?php echo $row["username"]; ?></td>
      <td class="fit"><?php echo $row["doctor"]; ?></td>
      <td class="fit"><?php echo $row["age"]; ?></td>
      <td class="fit"><?php echo $row["sex"]; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<br><br>

<div class="col-lg-12 text-center">
	<div><span style="color: blue;">Blue</span> color to the table represents the elements of examinations which are <b>below</b> the <b>minimum</b> valid value.</div>
	<div><span style="color: red;">Red</span> color to the table represents the elements of examinations which are <b>above</b> the <b>maximum</b> valid value.</div>
</div>


<div class="table_exams_div" id="table_exams">
<h2>Results of examinations</h2>
<table class="table table-bordered table-responsive" >
  <thead>
    <tr>
      <th scope="fit" style="background-color: #C43838; color: white;">Chest Pain Type</th>
      <th scope="fit" style="background-color: #C43838; color: white;">Resting Blood Pressure</th>
      <th scope="fit" style="background-color: #C43838; color: white;">Serum Cholestrol</th>
      <th scope="fit" style="background-color: #C43838; color: white;">Fasting Blood sugar</th>
      <th scope="fit" style="background-color: #C43838; color: white;">Resting Electro<br>cardiogra<br>phic</th>
      <th scope="fit" style="background-color: #C43838; color: white;">ST-T wave abnormality</th>
      <th scope="fit" style="background-color: #C43838; color: white;">Ventricular hypertrophy</th>
      <th scope="fit" style="background-color: #C43838; color: white;">Maximum Heart Rate</th>
      <th scope="fit" style="background-color: #C43838; color: white;">Oldpeak</th>
      <th scope="fit" style="background-color: #C43838; color: white;">Vessels by flourosopy</th>
      <th scope="fit" style="background-color: #C43838; color: white;">Thal</th>
      <th scope="fit" style="background-color: #C43838; color: white;">Result</th>
    </tr>
  </thead>
  <tbody id="data_of_table">
  	<?php
	$query="SELECT * FROM patientsdata WHERE username = '".$_SESSION['username']."' ORDER BY age ASC";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($result)) 
	{
		$cp = $row["cp"];
		$trestbps = $row["trestbps"];
		$chol = $row["chol"];
		$fbs = $row["fbs"];
		$restecg = $row["restecg"];
		$thalach = $row["thalach"];
		$exang = $row["exang"];
		$oldpeak = $row["oldpeak"];
		$slope = $row["slope"];
		$ca = $row["ca"];
		$thal = $row["thal"];

	?>
    <tr>
      <td class="fit cp_id"><?php echo $row["cp"]; ?></td>
      <td class="fit trestbps_id"><?php echo $row["trestbps"]; ?></td>
      <td class="fit chol_id"><?php echo $row["chol"]; ?></td>
      <td class="fit fbs_id" ><?php echo $row["fbs"]; ?></td>
      <td class="fit restecg_id" ><?php echo $row["restecg"]; ?></td>
	  <td class="fit slope_id" ><?php echo $row["slope"]; ?></td>
	  <td class="fit exang_id"><?php echo $row["exang"]; ?></td>
	  <td class="fit thalach_id"><?php echo $row["thalach"]; ?></td>
      <td class="fit oldpeak_id" ><?php echo $row["oldpeak"]; ?></td>
      <td class="fit ca_id" ><?php echo $row["ca"]; ?></td>
      <td class="fit thal_id" ><?php echo $row["thal"]; ?></td>
      <td class="fit value_of_result" ><?php echo $row["result"]; ?><span id="result_replace"></span></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>


<?php
$query="SELECT min_rest, max_rest, min_cholesterol, max_cholesterol, min_heartrate, max_heartrate, min_oldpeak, max_oldpeak, min_vessels, max_vessels, min_thal, max_thal FROM patientsdata WHERE username = '".$_SESSION['username']."' ORDER BY age ASC";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result)) 
{
	$min_rest = $row['min_rest'];
	$max_rest = $row['max_rest'];
	$min_cholesterol = $row['min_cholesterol'];
	$max_cholesterol = $row['max_cholesterol'];
	$min_heartrate = $row['min_heartrate'];
	$max_heartrate = $row['max_heartrate'];
	$min_oldpeak = $row['min_oldpeak'];
	$max_oldpeak = $row['max_oldpeak'];
	$min_vessels = $row['min_vessels'];
	$max_vessels = $row['max_vessels'];
	$min_thal = $row['min_thal'];
	$max_thal = $row['max_thal'];

}

if($trestbps < $min_rest) 
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[1].style.color = "blue"';
	echo '</script>';
}
if($trestbps >= $max_rest)
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[1].style.color = "red"';
	echo '</script>';
}
if($chol < $min_cholesterol) 
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[2].style.color = "blue"';
	echo '</script>';
}
if($chol >= $max_cholesterol)
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[2].style.color = "red"';
	echo '</script>';
}
if($thalach < $min_heartrate) 
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[7].style.color = "blue"';
	echo '</script>';
}
if($thalach >= $max_heartrate)
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[7].style.color = "red"';
	echo '</script>';
}
if($oldpeak < $min_oldpeak) 
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[8].style.color = "blue"';
	echo '</script>';
}
if($oldpeak >= $max_oldpeak)
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[8].style.color = "red"';
	echo '</script>';
}
if($ca < $min_vessels) 
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[9].style.color = "blue"';
	echo '</script>';
}
if($ca >= $max_vessels)
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[9].style.color = "red"';
	echo '</script>';
}
if($thal < $min_thal) 
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[10].style.color = "blue"';
	echo '</script>';
}
if($thal >= $max_thal)
{
	echo '<script>';
	echo 'document.getElementById("data_of_table").lastElementChild.cells[10].style.color = "red"';
	echo '</script>';
}

?>
<br><br>


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