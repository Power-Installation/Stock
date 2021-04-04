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
            <a href="./" class="nav-link active">
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
            <h1 class="m-0">Accounts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../">Admin</a></li>
              <li class="breadcrumb-item"><a href="./">Accounts</a></li>
              <li class="breadcrumb-item active">Edit Account</li>
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
					$accounts = "SELECT * FROM accounts INNER JOIN roles ON accounts.idroles = roles.idRoles where idaccounts = '$id'";
					$getaccounts = mysqli_query($conn, $accounts);
					
					if(! $getaccounts) {
						die('Could not fetch requested data: '.mysqli_error($conn));
					}
					while($row = mysqli_fetch_assoc($getinfo)) {
						$firstname = htmlspecialchars($row['firstname']);
						$lastname = htmlspecialchars($row['lastname']);
						$birthdate = htmlspecialchars($row['birthdate']);
						$email = htmlspecialchars($row['email']);
						$phonework = htmlspecialchars($row['phonework']);
						$phoneprivate = htmlspecialchars($row['phoneprivate']);
						$username = htmlspecialchars($row['username']);
						$role = htmlspecialchars($row['rolesname']);
						$active = htmlspecialchars($row['active']);
					};
					?>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <div class="box box-primary">
                    <div class="box-header with-border">
						<h3 class="box-title">Modify Account</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <div>
                                <input type="text" autocomplete="off" name="username" placeholder="<?php echo htmlspecialchars($username);?>" class="form-control" required/>
                            </div>
                        </div>
        				<div class="form-group">
                            <label for="firstname" class="control-label">First Name</label>
                            <div>
                                <input type="text" autocomplete="off" name="firstname" placeholder="<?php echo htmlspecialchars($firstname);?>" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="control-label">Last Name</label>
                            <div>
                                <input type="text" autocomplete="off" name="lastname" placeholder="<?php echo htmlspecialchars($lastname);?>" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthdate" class="control-label">Birth Date</label>
                            <div>
                                <input type="date" autocomplete="off" name="birthdate" placeholder="<?php echo htmlspecialchars($birthdate);?>" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">E-mail</label>
                            <div>
                                <input type="email" autocomplete="off" name="email" placeholder="<?php echo htmlspecialchars($email);?>" class="form-control" required/>
                            </div>
                        </div>
        		        <div class="form-group">
                            <label for="phonework" class="control-label">Phone Work</label>
                            <div>
                                <input type="tel" autocomplete="off" name="phonework" placeholder="<?php echo htmlspecialchars($phonework);?>" class="form-control" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required/>
                            </div>
                        </div>
				        <div class="form-group">
                            <label for="phoneprivate" class="control-label">Phone Private</label>
                            <div>
                                <input type="tel" autocomplete="off" name="phoneprivate" placeholder="<?php echo htmlspecialchars($phoneprivate);?>" class="form-control" pattern="[0-9]{4}/[0-9]{2}.[0-9]{2}.[0-9]{2}"/>
                            </div>
                        </div>
						<div class="form-group">
                           	<label for="role" class="control-label">Role</label>
                            <div>
                                <select name="role" class="form-control">
                                    <?php
                                        $roles = 'SELECT * FROM roles';
                                        $getroles = mysqli_query($conn, $roles);

                                        if(! $getroles) {
                                            die('Kon geen groepen inladen: '. mysqli_error($conn));
                                        }

									    while($row1 = mysqli_fetch_assoc($getroles)) {
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row1['idRoles']); ?>"><?php echo htmlspecialchars($row1['rolename']); ?></option>
                                        <?php   }
                                        ?>
                                </select>
                            </div>
                        </div>
				        <div class="form-group">
                            <label for="active" class="control-label">Active Account</label>
                            <div>
                                <select name="active" class="form-control" required/>
									<option value="true">Yes</option>
									<option value="false">No</option>
								</select>
                            </div>
                        </div>
                        <div class="box-footer">
    	        			<button type="submit" class="btn btn-success btn-sm">Modify Account</button>
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
        $newusername = $conn->real_escape_string($_POST['name']);
        $newfirstname = $conn->real_escape_string($_POST['street']);
        $newlastname = $conn->real_escape_string($_POST['number']);
		$newbirthdate = $conn->real_escape_string($_POST['addition']);
		$newemail = $conn->real_escape_string($_POST['zipcode']);
        $newphonework = $conn->real_escape_string($_POST['city']);
        $newphoneprivate = $conn->real_escape_string($_POST['country']);
		$newrole = $conn->real_escape_string($_POST['role']);
		$newactive = $conn->real_escape_string($_POST['active']);
				
        $updateaccount = "UPDATE accounts SET firstname = '$newfirstname', lastname = '$newlastname', birthdate = '$newbirthdate', email = '$newemail', phonework = '$newphonework', phoneprivate = '$newphoneprivate', username = '$newusername', idroles = '$newrole', active = '$newactive' WHERE idAccounts = '$id'";

        if ($conn->query($updateaccount) === true) {
            $_SESSION['message'] = "$username has been modified.";
            header("location: ./index.php");
        }
        else {
            $_SESSION['message'] = "$username could not be modified";
        }
        mysqli_close($conn);
    };
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
