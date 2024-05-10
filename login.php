<?php
 
 if(isset($_POST['login'])) {
    require('./config/db.php');


  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL );
  $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING );
 

   $stmt = $pdo -> prepare('SELECT * from customeraccount WHERE email=?');
   $stmt -> execute([$email]);
   $customer =$stmt -> fetch();



   if (isset($customer)) {
    if( password_verify($password, $customer->password)) {
        echo" Password is correct";
        $_SESSION['customerID']= $cusotmer-> id;
        header('Location:http://localhost/Iteration3/profile.php');
    
    } else {
         $wrongLogin= " Email or password is incorrect";
    }  
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>

 <!-- Font-Awesome css file link  -->

<!-- custom css file link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/signpage.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css">
</head>
<!-- hero section -->

<nav class="navbar"></nav>
<body>



<!-------------- the header section ends here ------------------->


<!-------------- the form section starts here in home section---------------------------->

<section class="form-container">
<form action="login.php" method="POST" onsubmit="return onsubmitForm()">
<h2 style= "text-align:center;">Login </h2>

<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
<br />
<?php if(isset($wrongLogin)) { ?>
 <p style= "background-color: lightgreen;"> <?php echo $wrongLogin?> </p>
<?php }  ?>
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password "
(pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" ) title (" It must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters")
required>
</div><br>
<div class="form-group">
<input type="submit" name="login" class="btn btn-primary" value="Login">
</div>
  <p2>Don't have an account? <a href="signup.php" style="color:dodgerblue">Sign up now</a>.</p2>
</div>
</form>
</div>

    
</section>
<!-------------- the form ends here in home section---------------------------->

  

<!-------------- the footer section starts here ------------------->
<footer>
</footer>

	   <script src = "js/nav.js"></script>
	   <script src = "js/home.js"></script>
	   <script src = "js/footer.js"></script>
     <script src="js/formvalidation.js"></script>
</body>
</html>

<!----------------- the footer section ends here -------------------->