
<?php   
 session_start();  
 $conn=mysqli_connect("localhost","root","","sk");  
 $msg="";  
 if (isset($_POST['submit'])) {  
      //echo "<pre>";  
      //print_r($_POST); 
      $status="SUPER"; 
      $code=mysqli_real_escape_string($conn,$_POST['code']);  
      $password=mysqli_real_escape_string($conn,$_POST['password']);  
      $sql=mysqli_query($conn,"select * from superuser where code='$code'&& password='$password'");  
      $num=mysqli_num_rows($sql);  
      if ($num>0) {  
           //echo "found";  
           $row=mysqli_fetch_assoc($sql);  
           $_SESSION['ID']=$row['id'];  
           $_SESSION['alogin']=$row['code']; 
           $_SESSION['name']=$row['name'];
           $_SESSION['status']=$row['status']; 
           echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
      }else{  
           $msg="Please Enter Valid details !";  
      }  
 }  
 ?>  

<!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <meta name="viewport" content="width=device-width, initial-scale=1">  
      <link rel="stylesheet" type="text/css" href="css/style1.css">  
      <title>Login Page</title>  
 </head>  
 <body>  
 <div class="main">  
       <h1>Login</h1>
      < <form method="post" action="">  
        <div class="txt_field">
          <input type="text" name="code" placeholder="CODE" class="form-control" required> 
          <span></span>
          <label>CODE</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" placeholder="Password" class="form-control" required>  
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
       <div class="btn-box">  
        <input type="submit" name="submit" value="Login" class="btn submit-btn"> 
        <div class="signup_link">
          Not a member? <a href="register.php">Signup</a>
                     </div>  
                     <div class="error">  
                          <?php echo $msg ?>  
                     </div>  
                </form>  
           </div>  
      </div>  
 </div>  
 

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
