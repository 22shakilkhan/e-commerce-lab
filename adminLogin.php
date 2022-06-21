<?php
session_start()
include('includes/config.php');
if(isset($_POST['admin_login'])){
    $adminname = mysqli_real_escape_string($db,$_POST['username']);
    $adminpassword = mysqli_real_escape_string($db,$_POST['password']);
    
    if(empty($adminname)){
        array_push($errors,"user name is required");
    }
    if (empty($adminpassword)) {
     array_push($errors, "Password is required");
  }
    if(count($errors)==0){
        $query = "select*from tbl_admin where admin_name = '$adminname' AND admin_password = '$adminpassword'";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result)==1){
            $_SESSION['admin_name'] = $adminname;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }
        else {
         array_push($errors, "Wrong username/password combination");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>SB Admin - Start Bootstrap Template</title>
 <!-- Bootstrap core CSS-->
 <link href="../css/bootstrap.min.css" rel="stylesheet">
 <!-- Custom fonts for this template-->
 <link href="../css/fontawesome.css" rel="stylesheet" type="text/css">
 <!-- Custom styles for this template-->
 <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body>
 <div class="container">
   <div class="card card-login mx-auto mt-5">
     <div class="card-header">Login</div>
     <div class="card-body">
       <form method="post" action="">
        <?php include('errors.php'); ?>
         <div class="form-group">
           <label for="exampleInputEmail1">Username</label>
           <input class="form-control"  type="text" name="username">
         </div>
         <div class="form-group">
           <label for="exampleInputPassword1">Password</label>
           <input class="form-control"  type="password" name="password">
         </div>
         <!--<div class="form-group">
           <div class="form-check">
             <label class="form-check-label">
               <input class="form-check-input" type="checkbox"> Remember Password</label>
           </div>
         </div>-->
         <button type="submit" class="btn btn-primary btn-block" name="admin_login">Login</button>
       </form>
       <div class="text-center">
        <!-- <a class="d-block small mt-3" href="register.php">Register an Account</a>-->
      <!-- <a class="d-block small" href="forgot-password.php">Forgot Password?</a>-->
       </div>
     </div>
   </div>
 </div>
 <!-- Bootstrap core JavaScript-->
 <script src="jquery/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- Core plugin JavaScript-->
 <script src="jquery-easing/jquery.easing.min.js"></script>
</body>
</html>