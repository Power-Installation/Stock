<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.jpg" type="image/x-icon">
    <?php
        include ('../../required/connection.php');
        session_start();

        $distlist = "SELECT * FROM distributors";
        $brandlist = "SELECT * FROM brands";
        $catlist = "SELECT * FROM categories";
        $unitlist = "SELECT * FROM unit";

        $getdist = mysqli_query($conn, $distlist);
        $getbrand = mysqli_query($conn, $brandlist);
        $getcat = mysqli_query($conn, $catlist);
        $getunit = mysqli_query($conn, $unitlist);
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
              <li class="breadcrumb-item"><a href="./">Articles</a></li>
              <li class="breadcrumb-item active">Add Article</li>
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
						<h3 class="card-title">Edit Article</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="articlename" class="control-label">Article Name</label>
                            <div>
                                <input type="text" autocomplete="off" name="articlename" placeholder="Article Name" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dist" class="control-label">Distributor</label>
                            <div>
                                <select name="dist" class="form-control">
                                <?php
                                  if (! $getdist) {
                                    die('Could not get distributors: '.mysqli_error($conn));
                                  }
                                  while($row = mysqli_fetch_assoc($getdist)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row['iddistributors']);?>"><?php echo htmlspecialchars($row['distname']);?></option>
                                  <?php }
                                ;?>
                                </select>
                            </div>
                        </div>
        				        <div class="form-group">
                            <label for="brand" class="control-label">Brand</label>
                            <div>
                                <select name="brand" class="form-control">
                                <?php
                                  if (! $getbrand) {
                                    die('Could not get brands: '.mysqli_error($conn));
                                  }
                                  while($row1 = mysqli_fetch_assoc($getbrand)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row1['idbrands']);?>"><?php echo htmlspecialchars($row1['brandname']);?></option>
                                  <?php }
                                ;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label">Category</label>
                            <div>
                                <select name="category" class="form-control">
                                <?php
                                  if (! $getcat) {
                                    die('Could not get categories: '.mysqli_error($conn));
                                  }
                                  while($row2 = mysqli_fetch_assoc($getcat)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row2['idcategories']);?>"><?php echo htmlspecialchars($row2['categoryname']);?></option>
                                  <?php }
                                ;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="control-label">Unit</label>
                            <div>
                                <select name="unit" class="form-control">
                                <?php
                                  if (! $getunit) {
                                    die('Could not get distributors: '.mysqli_error($conn));
                                  }
                                  while($row3 = mysqli_fetch_assoc($getunit)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row3['idunit']);?>"><?php echo htmlspecialchars($row3['unitname']);?> (<?php echo htmlspecialchars($row3['shortname']);?>)</option>
                                  <?php }
                                ;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="priceperitem" class="control-label">Price per Item</label>
                            <div>
                                <input type="text" autocomplete="off" name="priceperitem" placeholder="Price per Item" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quota" class="control-label">Minimum Quota</label>
                            <div>
                                <input type="text" autocomplete="off" name="quota" placeholder="Minimum Quota" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="serial" class="control-label">Internal Serial Number</label>
                            <div>
                                <input type="text" autocomplete="off" name="serial" placeholder="Internal Serial Number" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="articledesc" class="control-label">Article Description</label>
                            <div>
                                <input type="text" autocomplete="off" name="articledesc" placeholder="Addition" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <div>
                                <input type="file" autocomplete="off" name="image" class="form-control"/>
                            </div>
                        </div>
                        <div class="box-footer">
    	        			<button type="submit" class="btn btn-success btn-sm">Add Article</button>
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
  if(empty($_POST['image'])) {
    $articlename = $conn->real_escape_string($_POST['articlename']);
    $brand = $conn->real_escape_string($_POST['brand']);
		$distributor = $conn->real_escape_string($_POST['dist']);
		$unit = $conn->real_escape_string($_POST['unit']);	
    $priceperitem = $conn->real_escape_string($_POST['priceperitem']);
    $category = $conn->real_escape_string($_POST['category']);
    $description = $conn->real_escape_string($_POST['articledesc']);
    $quota = $conn->real_escape_string($_POST['quota']);
    $serial = $conn->real_escape_string($_POST['serial']);
		
    $altaddarticle = "INSERT INTO items (itemname, description, idcategories, priceperitem, iddistributors, idbrand, quota, idunit, idserial)"
            . "VALUES ('$articlename', '$description', '$category', '$priceperitem', '$distributor', '$brand', '$quota', '$unit', '$serial')";
    $altartiimg = "INSERT INTO images (idserial)". "VALUES ('$serial')";

    if ($conn->query($altaddarticle) && $conn->query($altartiimg) === true) {
      $_SESSION['message'] = "$articlename has been added.";
      header("location: ./index.php");
    }
    else {
      $_SESSION['message'] = "$articlename could not be added";
    }
  mysqli_close($conn);
  }
  else {
    $articlename = $conn->real_escape_string($_POST['articlename']);
    $brand = $conn->real_escape_string($_POST['brand']);
		$distributor = $conn->real_escape_string($_POST['dist']);
		$unit = $conn->real_escape_string($_POST['unit']);	
    $priceperitem = $conn->real_escape_string($_POST['priceperitem']);
    $category = $conn->real_escape_string($_POST['category']);
    $description = $conn->real_escape_string($_POST['articledesc']);
    $quota = $conn->real_escape_string($_POST['quota']);
    $serial = $conn->real_escape_string($_POST['serial']);

    $name = $_FILES['file']['name'];
  	$target_dir = "../../img/articles/";
  	$target_file = $target_dir . basename($_FILES["file"]["name"]);
		
    $addarticle = "INSERT INTO items (itemname, description, idcategories, priceperitem, iddistributors, idbrand, quota, idunit, idserial)"
            . "VALUES ('$articlename', '$description', '$category', '$priceperitem', '$distributor', '$brand', '$quota', '$unit', '$serial')";
    $artiimg = "INSERT INTO images (imgname, idserial)". "VALUES ('$name', '$serial')";

    // Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

      // Insert record
      $sql1 = mysqli_query($conn,$artiimg);
      $sql2 = mysqli_query($conn, $addarticle);

      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

    }

  if ($sql1 && $sql2 === true) {
    $_SESSION['message'] = "$articlename has been created.";
        header("location: ./index.php");
    }
    else {
        $_SESSION['message'] = "$articlename could not be created.";
    }
  mysqli_close($conn);
  }
}
?>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>