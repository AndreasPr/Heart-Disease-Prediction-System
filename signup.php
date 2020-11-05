<?php
session_start();
$con = mysqli_connect("localhost","root","","heart_disease_prediction_system");
$error = "";
$success = "";
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $user_option = $_POST['user_option'];

  if($user_option == "Doctor")
  {
    $doctor_id = $_POST['doctor_id'];

    $query_doctor_id = "SELECT doctorId FROM doctorids WHERE doctorId = '".$doctor_id."'  ";
    $result = mysqli_query($con, $query_doctor_id);

    $query_check_doctor = "SELECT username FROM doctors WHERE username = '".$username."' ";
    $result2 = mysqli_query($con, $query_check_doctor);

    if(mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) == 0)
    {
      $query = "INSERT INTO doctors (username, email, password, confirm_password) VALUES ('$username', '$email', '$password', '$confirm_password')";

      if($password === $confirm_password) 
      {
        mysqli_query($con, $query);
        $success = "You have created your account successfully!";
      }
      else
      {
        $error = "Password and Confirm Password are NOT equal!";
      }
    }
    else
    {
      $error = "DoctorID does not exist OR Username exists in our database!";
    }

  }//user option doctor
  else
  {
    $query_check_patient = "SELECT username FROM users WHERE username = '".$username."' ";
    $result = mysqli_query($con, $query_check_patient);

    if(mysqli_num_rows($result) > 0)
    {
      $error = "Username exists in our database!";
    }
    else
    {
      $query = "INSERT INTO users (username, email, password, confirm_password) VALUES ('$username', '$email', '$password', '$confirm_password')";

      if($password === $confirm_password) 
      {
        mysqli_query($con, $query);
        $success = "You have created your account successfully!";
      }
      else
      {
        $error = "Password and Confirm Password are NOT equal!";
      }
      
    }
    
  }//user option patient

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

    <link rel="stylesheet" type="text/css" href="css/signup_style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <title>Sign up</title>
  </head>
  <body>

<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card" style="height: 550px;">
      <div class="card-header">
        <h3>Sign Up</h3>
        <div class="d-flex justify-content-end social_icon">
          <span><i class="fab fa-facebook-square"></i></span>
          <span><i class="fab fa-google-plus-square"></i></span>
          <span><i class="fab fa-twitter-square"></i></span>
        </div>
      </div>
      <div class="card-body">
        <span id="span_error_message"><?php echo $error; ?></span>        
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="username" name="username" required="required">
          </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required"> 
          </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="password" name="password" required="required">
          </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password" required="required">
          </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <select class="form-control" name="user_option" required="required" id="select_user">
              <option value="Doctor">Doctor</option>
              <option value="Patient">Patient</option>
            </select>
          </div>

          <div class="input-group form-group" id="id_for_disappear">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Doctor ID" name="doctor_id" required="required">
          </div>

          <div class="form-group">
            <input type="submit" value="Sign Up" name="submit" class="btn float-right login_btn">
          </div>
          <span id="span_success_message"><?php echo $success; ?></span>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links">Have an account?
          <a href="index.php">Login</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $("#select_user").change(function () {
        var end = this.value;
        if (end == "Patient"){
          $("#id_for_disappear").hide().find(':input').attr('required', false);
        }
        else
        {
          $("#id_for_disappear").show().find(':input').attr('required', true);
        }

    });
});
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>