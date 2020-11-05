<?php
session_start();
$con = mysqli_connect("localhost","root","","heart_disease_prediction_system");
$error = "";
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT username, password FROM users WHERE username= '".$username."' AND password= '".$password."'";
  $result = mysqli_query($con, $query);
  $row_patients=mysqli_fetch_assoc($result);
  $username_patients = $row_patients["username"];
  $password_patients = $row_patients["password"];

  $query_doctor = "SELECT username, password FROM doctors WHERE username= '".$username."' AND password= '".$password."'";
  $result_doctor = mysqli_query($con, $query_doctor);
  $row_doctor=mysqli_fetch_assoc($result_doctor);
  $username_doctor = $row_doctor["username"];
  $password_doctor = $row_doctor["password"];


	if($username == $username_patients && $password == $password_patients)
	{  
    $_SESSION['username'] = $username_patients;
    $_SESSION['password'] = $password_patients;
    header("Location: home.php");
	}
  else if($username == $username_doctor && $password == $password_doctor)
  {
    $_SESSION['username'] = $username_doctor;
    $_SESSION['password'] = $password_doctor;
    header("Location: home_doctor.php");
  }
	else
	{
		$error = "Invalid Username or Password!!!";
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

    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>

<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Sign In</h3>
        <div class="d-flex justify-content-end social_icon">
          <span><i class="fab fa-facebook-square"></i></span>
          <span><i class="fab fa-google-plus-square"></i></span>
          <span><i class="fab fa-twitter-square"></i></span>
        </div>
      </div>
      <div class="card-body">
        <span><?php echo $error; ?></span><span></span>         
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="username" name="username">
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="password" name="password">
          </div>
          <div class="row align-items-center remember">
            <input type="checkbox">Remember Me
          </div>
          <div class="form-group">
            <input type="submit" value="Login" name="submit" class="btn float-right login_btn">
          </div>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links">Don't have an account?
          <a href="signup.php">Sign Up</a>
        </div>
      </div>
    </div>
  </div>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>