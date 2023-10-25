<?php session_start(); 
include_once('../includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
  $adminusername=$_POST['username'];
  $pass=($_POST['password']);

$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
    if($pass==$num["password"]){
$_SESSION['login']=$_POST['username'];
$_SESSION['adminid']=$num['id'];
header("location:user-profile.php");
    }else
    {
    echo "<div class='alert alert-danger'> Invalid username or password</div>";
    }
}
else
{
echo "<div class='alert alert-danger'> Invalid username or password</div>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin Login | Registration and Login System</title>
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">

<div class="card-header">
    <h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
 <div class="card-body">   
<form method="post">
<div class="form-floating mb-3">
<input class="form-control" name="username" type="text"  required/><label>Username</label>
</div>                                      

<div class="form-floating mb-3">
<input class="form-control" name="password" type="password" required /><label>Password</label>
</div>

<div class="align-items-center justify-content-between mt-6 mb-0">
<button class="btn btn-primary" name="login" type="submit">Login</button>
</div>
</form>
</div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../index.php">Back to Home Page</a></div>
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
