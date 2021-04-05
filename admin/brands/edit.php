<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.jpg" type="image/x-icon">
    <?php
        include ('../../required/connection.php');
        session_start();
		$id = htmlspecialchars($_GET["id"]);
    ?>
    <title>Power Installation | Admin</title>

  <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" href="../../">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index.php" class="brand-link">
      <img src="../../img/logo.png" alt="PILogo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PI Stock</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="../accounts/" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Accounts
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="../locations/" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                Locations
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="../distributors/" class="nav-link">
              <i class="nav-icon fas fa-truck-loading"></i>
              <p>
                Distributors
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="./" class="nav-link active">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Brands
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="../categories/" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="../items" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Articles
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="../settings" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Brands</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../">Admin</a></li>
              <li class="breadcrumb-item"><a href="./">Brands</a></li>
              <li class="breadcrumb-item active">Edit Brand</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
			<?php
				$brands = "SELECT * FROM brands WHERE idbrands ='$id'";
				$getbrands = mysqli_query($conn, $brands);
			
				if(! $getbrands) {
					die('Could not fetch requested date: '.mysqli_error($conn));
				}
				while($row = mysqli_fetch_assoc($getbrands)) {
					$brandname = htmlspecialchars($row['brandname']);
					$website = htmlspecialchars($row['website']);
					$logo = htmlspecialchars($row['logo']);
				}
			
				$logo_src = "./logo/".$logo;
			?>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <div class="box box-primary">
                    <div class="box-header with-border">
						<h3 class="box-title">Edit Brand</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="brandname" class="control-label">Name</label>
                            <div>
                                <input type="text" autocomplete="off" name="<?php echo $brandname;?>" placeholder="Brand Name" class="form-control" required/>
                            </div>
                        </div>
        				<div class="form-group">
                            <label for="website" class="control-label">Website url</label>
                            <div>
                                <input type="text" autocomplete="off" name="<?php echo $website;?>" placeholder="Website url" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file" class="control-label">Logo</label>
                            <div>
                                <input type="file" autocomplete="off" name="file" valu="<?php echo $logo;?>" class="form-control"/>
                            </div>
							<img src='<?php echo $logo_src;?>'>
                        </div>
                        <div class="box-footer">
    	        			<button type="submit" class="btn btn-success btn-sm" name="logo-upload">Add Brand</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
	<?php include('../../required/footer.php'); ?>
  </footer>
</div>
<!-- ./wrapper -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$newname = $_FILES['file']['name'];
  		$target_dir = "./logo/";
  		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$newbrand1 = $conn->real_escape_string($_POST['brandname']);
    	$website1 = $conn->real_escape_string($_POST['website']);

  		// Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  		// Valid file extensions
  		$extensions_arr = array("jpg","jpeg","png","gif");

  		// Check extension
  		if( in_array($imageFileType,$extensions_arr) ){
 
     		// Insert record
     		$addbrand = "UPDATE brands SET brandname = '$newbrand1', website = '$website1', logo = '$newname' WHERE idbrands = '$id'";
     		mysqli_query($con,$addbrand);
  
     		// Upload file
     		move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

  		}
	
		if ($conn->query($addbrand) === true) {
			$_SESSION['message'] = "$brand has been updated.";
        	header("location: ./index.php");
    	}
    	else {
        	$_SESSION['message'] = "$brand could not be updated.";
    	}
    mysqli_close($conn);
    }

?>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
