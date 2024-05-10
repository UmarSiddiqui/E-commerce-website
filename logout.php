<? php 
session_start();

if(isset($_SESSION )['customerID']) {
    session_destroy();
    header(header('Location:http://localhost/Iteration3/login.php');)
}
?>
