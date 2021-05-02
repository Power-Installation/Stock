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
            <a href="./" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Articles
              </p>
            </a>
          </li>          
		  <li class="nav-item">
            <a href="../unit" class="nav-link">
              <i class="nav-icon fas fa-ruler"></i>
              <p>
                Units
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
            <h1 class="m-0">Articles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../">Admin</a></li>
              <li class="breadcrumb-item active">Articles</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Articles</h3>
				  <div class="card-tools">
				  	<a href="./add.php"><button type="button" class="btn btn-sm fa-pull-right btn-primary">Create Article</button></a>
				  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="articles" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Item</th>
					            <th>Distributor</th>
                      <th>Category</th>
                      <th>Price / piece</th>
					            <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
					 $articles = "SELECT * FROM items INNER JOIN categories ON items.idcategories = categories.idcategories INNER JOIN distributors ON items.iddistributors = distributors.iddistributors INNER JOIN brands ON items.idbrand = brands.idbrands";
					 
					 $getarticles = mysqli_query($conn, $articles);
					  
					 if(! $getarticles) {
						 die('Could not fetch data: '.mysqli_error($conn));
					 }
					 
					 while($row = mysqli_fetch_assoc($getarticles)) {
						 ?>
					  <tr class="align-middle">
					  	<td class="text-center"><?php echo htmlspecialchars($row['itemname']);?></td>
						
            <td class="text-center"><?php echo htmlspecialchars($row['distname']);?></td>
						<td class="text-center"><?php echo htmlspecialchars($row['categoryname']);?></td>
						<td class="text-center"><?php echo htmlspecialchars($row['priceperitem']);?></td>									
						<td>
							<form name="id" action="edit.php" method="get">
								<input type="hidden" name="id" value="<?php echo htmlspecialchars($row['idserial']);?>"/>
								<input type="submit" value="edit article"/>
							</form>
						</td>
					  </tr>
					 <?php };?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    $("#articles").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#articles_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
