<?php   
 session_start();  
 $conn=mysqli_connect("localhost","root","","sk");  
 $msg="";  
 if (isset($_POST['submit'])) {  
      //echo "<pre>";  n
      //print_r($_POST);  
      $email=mysqli_real_escape_string($conn,$_POST['email']);  
      $password=mysqli_real_escape_string($conn,$_POST['password']);  
      $sql=mysqli_query($conn,"select * from users where username='$email' && password='$password'");  
      $num=mysqli_num_rows($sql);  
      if ($num>0) {  
           //echo "found";  
           $row=mysqli_fetch_assoc($sql);  
           $_SESSION['ID']=$row['id']; 
           $_SESSION['fulname']=$row['name']; 
           $_SESSION['alogin']=$row['username'];  
           $_SESSION['Admin']=$row['admin'];  
           echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
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
          <input type="text" name="email" placeholder="Username" class="form-control" required> 
          <span></span>
          <label>Username</label>
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
 </body>  
 </html>  