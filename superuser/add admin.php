<?php
session_start();
error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

if(isset($_GET['edit']))
	{
		$editid=$_GET['edit'];
	}



if(isset($_POST['submit']))
  {
	
	$username=$_POST['username'];
	$AdminEmail=$_POST['AdminEmail'];
	$Barangay=$_POST['Barangay'];
	$password=$_POST['password'];
	$userType=$_POST['userType'];
    $term_start=$_POST['term_start'];
	$term_end=$_POST['term_end'];
	$code=$_POST['code'];

	$sql="insert into admin (username, AdminEmail, Barangay,password,userType,term_start,term_end,code) values (:username, :AdminEmail, :Barangay,:password,:userType,:term_start,:term_end,:code) ";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':username', $username, PDO::PARAM_STR);
	$query-> bindParam(':AdminEmail', $AdminEmail, PDO::PARAM_STR);
	$query-> bindParam(':Barangay', $Barangay, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
	$query-> bindParam(':Barangay', $Barangay, PDO::PARAM_STR);
	$query-> bindParam(':userType', $userType, PDO::PARAM_STR);
	$query-> bindParam(':term_start', $term_end, PDO::PARAM_STR);
	$query-> bindParam(':term_end', $term_end, PDO::PARAM_STR);
	$query-> bindParam(':code', $code, PDO::PARAM_STR);
	$query->execute();
	$msg="Successfully added";
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Edit User</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>

	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Add Admin</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add Admin</div>
									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">
<div class="form-group">
<label class="col-sm-2 control-label">Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="username" class="form-control" required placeholder="Enter Name">
</div>


<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="email" name="AdminEmail" class="form-control" required placeholder="Enter Email">
</div>
</div>



<label class="col-sm-2 control-label">Barangay<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Barangay" class="form-control" required placeholder="Enter Barangay">
</div>



<label class="col-sm-2 control-label">UserType<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="userType" class="form-control" placeholder="Enter 1 or 2">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Password<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="txt" name="password" class="form-control"  required placeholder="Enter Password">
</div>

<label class="col-sm-2 control-label">code<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="code" class="form-control" required placeholder="Enter code">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Term Started<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" name="term_start" class="form-control"  required >
</div>

<label class="col-sm-2 control-label">Term ended<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" name="term_end" class="form-control" required >
</div>
</div>



<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit">Add Admin</button>
	</div>
</div>

</form>
									</div>
								</div>
							</div>
						</div>



					</div>
				</div>



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
	<script type="text/javascript">
				 $(document).ready(function () {
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>

</body>
</html>
<?php } ?>
