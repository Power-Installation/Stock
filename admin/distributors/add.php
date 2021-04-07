<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.jpg" type="image/x-icon">
    <?php
        include ('../../required/connection.php');
        session_start();
    ?>
    <title><?php echo $company;?> | Admin</title>

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
      <span class="brand-text font-weight-light"><?php echo $sitename;?></span>
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
            <a href="./" class="nav-link active">
              <i class="nav-icon fas fa-truck-loading"></i>
              <p>
                Distributors
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="../brands/" class="nav-link">
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
            <h1 class="m-0">Distributors</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../">Admin</a></li>
              <li class="breadcrumb-item"><a href="./">Distributors</a></li>
              <li class="breadcrumb-item active">Add Distributor</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <div class="card card-primary">
                    <div class="card-header with-border">
						<h3 class="card-title">Add Distributor</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <div>
                                <input type="text" autocomplete="off" name="name" placeholder="Location Name" class="form-control" required/>
                            </div>
                        </div>
        				<div class="form-group">
                            <label for="street" class="control-label">Street</label>
                            <div>
                                <input type="text" autocomplete="off" name="street" placeholder="Street" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="number" class="control-label">Number</label>
                            <div>
                                <input type="text" autocomplete="off" name="number" placeholder="Number" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="addition" class="control-label">Addition</label>
                            <div>
                                <input type="text" autocomplete="off" name="addition" placeholder="Addition" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zipcode" class="control-label">Zipcode</label>
                            <div>
                                <input type="text" autocomplete="off" name="zipcode" placeholder="Zipcode" class="form-control" required/>
                            </div>
                        </div>
        		        <div class="form-group">
                            <label for="city" class="control-label">City</label>
                            <div>
                                <input type="text" autocomplete="off" name="city" placeholder="City" class="form-control" required/>
                            </div>
                        </div>
				        <div class="form-group">
                            <label for="country" class="control-label">Country</label>
                            <div>
                                <input type="text" autocomplete="off" name="country" placeholder="Country" class="form-control"/>
                            </div>
                        </div>
				        <div class="form-group">
                            <label for="email" class="control-label">E-mail</label>
                            <div>
                                <input type="email" autocomplete="off" name="email" placeholder="Email" class="form-control"/>
                            </div>
                        </div>
				        <div class="form-group">
                            <label for="phone" class="control-label">Phone</label>
                            <div>
                                <input type="tel" autocomplete="off" name="phone" placeholder="Phone Number" class="form-control"/>
                            </div>
                        </div>
				        <div class="form-group">
                            <label for="website" class="control-label">Website</label>
                            <div>
                                <input type="url" autocomplete="off" name="website" placeholder="Website url" class="form-control"/>
                            </div>
                        </div>
                        <div class="box-footer">
    	        			<button type="submit" class="btn btn-success btn-sm">Add Distributor</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
	<?php include('../../required/footer.php'); ?>
  </footer>
<!-- ./wrapper -->
</div>
<!-- REQUIRED SCRIPTS -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $distname = $conn->real_escape_string($_POST['name']);
        $street = $conn->real_escape_string($_POST['street']);
		$number = $conn->real_escape_string($_POST['number']);
		$bus = $conn->real_escape_string($_POST['addition']);	
        $zipcode = $conn->real_escape_string($_POST['zipcode']);
        $city = $conn->real_escape_string($_POST['city']);
		$country = $conn->real_escape_string($_POST['country']);
		$mail = $conn->real_escape_string($_POST['email']);
		$phone = $conn->real_escape_string($_POST['phone']);
		$website = $conn->real_escape_string($_POST['website']);
		
        $adddistributor = "INSERT INTO locations (distname, street, number, bus, zipcode, city, country, mail, phone, website)"
            . "VALUES ('$locname', '$street', '$number', '$bus', '$zipcode', '$city', '$country', '$mail', '$phone', '$website')";
		}

        if ($conn->query($adddistributor) === true) {
            $_SESSION['message'] = "$distname has been added.";
            header("location: ./index.php");
        }
        else {
            $_SESSION['message'] = "$distname could not be added";
        }
        mysqli_close($conn);
?>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
