<?php
include('includes/config.php');
if(isset($_POST['submit']))
{

$file = $_FILES['image']['name'];
$file_loc = $_FILES['image']['tmp_name'];
$folder="images/"; 
$new_file_name = strtolower($file);
$final_file=str_replace(' ','-',$new_file_name);

$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$gender=$_POST['gender'];
$mobileno=$_POST['mobileno'];
$address=$_POST['address'];

if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $image=$final_file;
    }
$notitype='Create Account';
$reciver='Admin';
$sender=$email;

$sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
$querynoti = $dbh->prepare($sqlnoti);
$querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
$querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
$querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
$querynoti->execute();    
    
$sql ="INSERT INTO users(name,username,email, password, gender, address, mobile, image, status) VALUES(:name,:username, :email, :password, :gender,:address, :mobileno,  :image, 1)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':username',$username, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':gender', $gender, PDO::PARAM_STR);
$query-> bindParam(':address', $address, PDO::PARAM_STR);
$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
$query-> bindParam(':image', $image, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again";
}

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

	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">

	function validate()
        {
            var extensions = new Array("jpg","jpeg");
            var image_file = document.regform.image.value;
            var image_length = document.regform.image.value.length;
            var pos = image_file.lastIndexOf('.') + 1;
            var ext = image_file.substring(pos, image_length);
            var final_ext = ext.toLowerCase();
            for (i = 0; i < extensions.length; i++)
            {
                if(extensions[i] == final_ext)
                {
                return true;
                
                }
            }
            alert("Image Extension Not Valid (Use Jpg,jpeg)");
            return false;
        }
        
</script>
</head>

<body>
	<div class="login-page bk-img">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center text-bold mt-2x">Register</h1>
                        <div class="hr-dashed"></div>
						<div class="well row pt-2x pb-3x bk-light text-center">
                         <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                            <div class="form-group">
                            <label class="col-sm-1 control-label"> full Name<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="name" placeholder ="last/name/middname"class="form-control" required>
                            </div>
                            <label class="col-sm-1 control-label">Email<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">Password<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" id="password" required >
                            </div>

                            <label class="col-sm-1 control-label">username<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="username" class="form-control" required>
                            </div>
                            </div>

                             <div class="form-group">
                            <label class="col-sm-1 control-label">Gender<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <select name="gender" class="form-control" required>
                            <option value="" disabled selected hidden>Gender</option>   
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                            </div>
                            <div>
                            <label class="col-sm-1 control-label">Phone<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="number" name="mobileno" class="form-control" required>
                            </div>
                            </div>
                             <div class="form-group">
                            <label class="col-sm-1 control-label">Avtar<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <div><input type="file" name="image" class="form-control"></div>
                            </div>
                             <div class="form-group">
                            <label class="col-sm-1 control-label">Address<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <select name="address" class="form-control" required>
                            <option value="" disabled selected hidden>Barangay</option>   
                            <option value="Abuno">Abuno</option>
                            <option value="Acmac">Acmac</option>
                            <option value="Bagong Silang">Bagong Silang</option>
                            <option value="Bonbonon">Bonbonon</option>
                            <option value="Bunawan">Bunawan</option>
                            <option value="Buru-un">Buru-un</option>
                            <option value="Dalipuga">Dalipuga</option>
                            <option value="Del Carmen">Del Carmen</option>
                            <option value="Digkilaan">Digkilaan</option>
                            <option value="Ditucalan">Ditucalan</option>
                            <option value="Dulag">Dulag</option>
                            <option value="Hinaplanon">Hinaplanon</option>
                            <option value="Hindang">Hindang</option>
                            <option value="Kabacsanan">Kabacsanan</option>
                            <option value="Kalilangan">Kalilangan</option>
                            <option value="Kiwalan">Kiwalan</option>
                            <option value="Lanipao">Lanipao</option>
                            <option value="Luinab">Luinab</option>
                            <option value="Mainit">Mainit</option>
                            <option value="Mandulog">Mandulog</option>
                            <option value="Maria Cristina">Maria Cristina</option>
                            <option value="Pala-o">Pala-o</option>
                            <option value="Panoroganan">Panoroganan</option>
                            <option value="Poblacion">Poblacion</option>
                            <option value="Puga-an">Puga-an</option>
                            <option value="Rogongon">Rogongon</option>
                            <option value="San Miguel">San Miguel</option>
                            <option value="San Roque">San Roque</option>
                            <option value="Santa Elena">Santa Elena</option>
                            <option value="Santa Filomena">Santa Filomena</option>
                            <option value="Santiago">Santiago</option>
                            <option value="Santo Rosario">Santo Rosario</option>
                            <option value="Saray-Tibanga">Saray-Tibanga</option>
                            <option value="Suarez">Suarez</option>
                            <option value="Tambacan">Tambacan</option>
                            <option value="Tibanga">Bagong Silang</option>
                            <option value="Tipanoy">Tipanoy</option>
                            <option value="Tomas L. Cabili (Tominobo Proper)">Tomas L. Cabili (Tominobo Proper)</option>
                            <option value="Tominobo Upper">Tominobo Upper</option>
                            <option value="ubod">ubod</option>
                            <option value="Ubaldo Laya">Ubaldo Laya</option>
                            <option value="Upper Hinaplanon">Upper Hinaplanon</option>
                            <option value="Villa Verde">Villa Verde</option>
                            </select>
                            </div>




                            </div>

								<br>
                                <button class="btn btn-primary" name="submit" type="submit">Register</button>
                                </form>
                                <br>
                                <br>
								<p>Already Have Account? <a href="index.php" >Signin</a></p>
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

</body>
</html>