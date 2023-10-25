<?php 
session_start();
if (!isset($_SESSION["log"])) {
    header('location:login.php');
    } else  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Profile | Registration and Login System</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
       
<?php 
include_once('includes/config.php'); 

$userid=$_SESSION['id'];
$query=mysqli_query($con,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>

                        <h1 class="mt-4"><?php echo $result['fname'];?>'s Profile</h1>
                        <div class="card mb-4">
                     
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>First Name</th>
                                       <td><?php echo $result['fname'];?></td>
                                   </tr>
                                   <tr>
                                       <th>Last Name</th>
                                       <td><?php echo $result['lname'];?></td>
                                   </tr>
                                   <tr>
                                       <th>Email</th>
                                       <td colspan="3"><?php echo $result['email'];?></td>
                                   </tr>
                                     <tr>
                                       <th>Contact No.</th>
                                       <td colspan="3"><?php echo $result['contactno'];?></td>
                                   </tr>
                                    </tbody>
                                </table>

                                <a class="nav-link" href="edit-profile.php">
                                <div class="sb-nav-link-icon"></div>
                                Edit Your Profile Info
                            </a>
                                <a class="nav-link" href="index.php">
                                <div class="btn btn-primary">Signout</div>
                                
                            </a>
                            </div>
                        </div>
<?php } ?>

                    </div>
                </main>
            </div>
        </div>

    </body>
</html>
