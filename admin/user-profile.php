<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:../index.php');
  } else{
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin Profile | Registration and Login System</title>
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
                <main>
                    <div class="container-fluid px-4">
                        
<?php 
$query=mysqli_query($con,"select * from users");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4">User: <?php echo $result['fname'];?></h1>
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
                            </div>
                        </div>
                       
<?php } ?>

                    </div>
                </main>
            </div>
        </div>

<?php } ?>
<div class="card-footer text-center py-3">
                                        <div class="small"><a href="../index.php">Back to Home Page</a></div>
                                    </div>
    </body>
</html>