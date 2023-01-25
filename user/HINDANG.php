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
    
if(isset($_POST['submit']))
  { 
   
    
    $categories=$_POST['categories'];
    $Problems=$_POST['Problems'];
    $name=$_SESSION['alogin'];
    $admin= $_SESSION['Admin'];
    $barangay=$_POST['barangay'];
    $sql="insert into problems (name, Problems, categories,barangay,admin) values (:name,:Problems,:categories,:barangay,:admin)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':Problems', $Problems, PDO::PARAM_STR);
    $query-> bindParam(':categories', $categories, PDO::PARAM_STR);
    $query-> bindParam(':barangay', $barangay, PDO::PARAM_STR);
    $query-> bindParam(':admin', $admin, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Successfully Reported";
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
    
    <title>Edit Profile</title>

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
<?php
        $sql = "SELECT * from users;";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $result=$query->fetch(PDO::FETCH_OBJ);
        $cnt=1; 
?>
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
    <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                       
                            <div class="col-md-12">
                            <h2>Report Problem</h2>
                                <div class="panel panel-default">
                                 <div class="panel-heading">Edit Info</div>


<div class="panel-body">
<form method="post"  enctype="multipart/form-data">

<div class="form-group">
    <input type="hidden" name="name" value="<?php echo htmlentities($result->name); ?>">s
    <label class="col-sm-2 control-label">Title<span style="color:red">*</span></label>
    <div class="col-sm-4">
    <select  name="categories" class="form-control">
                               <option value="" disabled selected hidden>Cathegories</option>
                               <option value="peace and order">peace and order</option>
                               <option value="Garbage disposal">Garbage disposal</option>
                               <option value="utiliy">utiliy</option>
                               <option value="livelihood problem">livelihood problem</option>
                               <option value="others">others</option>
                            </select>
    </div>

    <label class="col-sm-2 control-label">Barangay<span style="color:red"></span></label>
    <div class="col-sm-4">
    <input type="text" name="barangay" class="form-control" value="HINDANG" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Report Problem<span style="color:red">*</span></label>
    <div class="col-sm-10">
    <textarea class="form-control" rows="5" name="Problems"></textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-8 col-sm-offset-2">
        <button class="btn btn-primary" name="submit" type="submit">Send</button>
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