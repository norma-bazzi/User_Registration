<?php 
session_start();



if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm=$_POST['confirmpassword'];
    $contact=$_POST['contact'];

    $passwordhash=password_hash($password, PASSWORD_DEFAULT);
    $errors=array();

    
if(strlen($password) <8){
    array_push($errors,"Password Must Be At Least 8 Characters");
}
if ($password!==$confirm){
    array_push($errors,"Password doesnt match");
}

//require database
require_once('includes/config.php');

$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
    array_push($errors,"Email already exists");
}

if(count($errors)>0){
    foreach($errors as $error){
        echo "<div class='alert alert-danger'>$error</div>";
    }
}
else{
    //no errors insert to database
    $msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$passwordhash','$contact')");

if($msg)
{
    echo "<div class='alert alert-success'> You Are Registered Successfully </div>";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>User Signup</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script type="text/javascript"></script>

    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
<h2 align="center">User Registration</h2>
<hr />
<h3 class="text-center font-weight-light my-4">Create Account</h3></div>
<div class="card-body">
<form method="post" action="signup.php">
<div class="row mb-3">
<div class="col-md-6"><div class="form-floating mb-3 mb-md-0">
<input class="form-control" name="fname" type="text" required /><label>First Name</label></div></div>
                                                
<div class="col-md-6"><div class="form-floating">
<input class="form-control"  name="lname" type="text" required /><label>Last Name</label></div></div>
</div>

<div class="form-floating mb-3">
<input class="form-control" name="email" type="email" required /><label>Email</label>
</div>
 
<div class="form-floating mb-3">
<input class="form-control" name="contact" type="text" required /><label>Phone Number</label>
</div>
        
<div class="row mb-3"><div class="col-md-6"><div class="form-floating mb-3 mb-md-0">
<input class="form-control" name="password" type="password" required/><label>Password</label></div>
</div>                                              

<div class="col-md-6"><div class="form-floating mb-3 mb-md-0">
<input class="form-control" name="confirmpassword" type="password" required /><label for="inputPasswordConfirm">Confirm Password</label></div></div>
</div>
                                            
<div class="mt-4 mb-0"><div class="d-grid">
<button type="submit" class="btn btn-primary btn-block" name="submit">Create Account</button></div>
</div>
 </form>
 </div>
                                   
 <div class="card-footer text-center py-3">
 <div class="small"><a href="login.php">Have an account? login in Now</a></div>
  <div class="small"><a href="index.php">Back to Home</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
