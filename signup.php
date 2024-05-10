<?php
 
 if(isset($_POST['submit'])) {
    require('./config/db.php');

 /*$name=$_POST["name"];
 $email=$_POST["email"];
 $password=$_POST["password"];
 $address=$_POST["address"]; 
 $phone=$_POST["phone"];
 $country=$_POST["country"];
echo $name . " " . $email . " " . $password ."" . $address ."" . $phone . "" . $country;
 */

  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING );
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL );
  $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING );
  $passwordHashed = password_hash($password, PASSWORD_DEFAULT );
  $address = filter_var($_POST["address"], FILTER_SANITIZE_STRING );
  $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING );
  $country = filter_var($_POST["country"], FILTER_SANITIZE_STRING );


  if (filter_var($email, FILTER_VALIDATE_EMAIL) ) {
   $stmt = $pdo -> prepare('SELECT * from customeraccount WHERE email=?');
   $stmt -> execute([$email]);
   $totalCustomers =$stmt -> rowCount();

   if ($totalCustomers > 0) {
    $emailTaken="User with this email already exists";
   }else {
    $stmt = $pdo -> prepare('INSERT INTO customeraccount(name, email, password, address, phone, country) VALUES(?,?,?,?,?,?) ');
    $stmt -> execute([$name, $email, $passwordHashed, $address, $phone, $country]);
    header('Location:http://localhost/Iteration3/index.php');
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
<link rel="stylesheet" href="css/styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<!-- hero section -->


<body>

<nav class="navbar"></nav>


<!-------------- the header section ends here ------------------->


<!-------------- the form section starts here in home section---------------------------->

<section class="form-container">
<form action="signup.php" method="POST" onsubmit="return onsubmitForm()">
<h2 style= "text-align:center;">Signup for Account</h2>
<label for="name">Name</label>
<input type="text" name="name" id="name" class="form-control" placeholder="Enter your name"required>

<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
<br />
<?php if(isset($emailTaken)) { ?>
 <p style= "background-color: lightgreen;"> <?php echo $emailTaken?> </p>
<?php } ?>
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password "
(pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" ) title (" It must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters")
required>
</div>
<div class="form-group">
<label for="address">Address</label>  
<input type="text" name="address" id="address" class="form-control" placeholder="Enter your address " required>
</div>
<div class="form-group">
<label for="phone">Phone</label>
<input type="" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" required>
</div>
<div class="form-group">
<label for="country">Country</label>
<input type="text" name="country" id="country" class="form-control" placeholder="Enter your country" required>
</div><br>
<div class="form-group">
<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
</div>
<p2> I agree all <a href="https://help.kathmandu.com.au/support/solutions/articles/51000164481-website-terms-conditions" style="color:dodgerblue">Terms, Conditons & Privacy</a>.</p2>
<div class="text-box">
  <p2>Already have an account? <a href="login.php" style="color:dodgerblue">Log in</a>.</p2>
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