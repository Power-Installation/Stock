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

        $distlist = "SELECT * FROM distributors";
        $brandlist = "SELECT * FROM brands";
        $catlist = "SELECT * FROM categories";
        $unitlist = "SELECT * FROM unit";
        $articlelist = "SELECT * FROM items INNER JOIN images ON items.serial = images.idserial where idserial = '$id'";

        $getdist = mysqli_query($conn, $distlist);
        $getbrand = mysqli_query($conn, $brandlist);
        $getcat = mysqli_query($conn, $catlist);
        $getunit = mysqli_query($conn, $unitlist);
        $getarticles = mysqli_query($conn, $articlelist);

        if(! $getarticles) {
          die('Could not retreive requested data: '.mysqli_error($conn));
        }
        while($row = mysqli_fetch_assoc($getarticles)) {
          $article = htmlspecialchars($row['itemname']);
          $description = htmlspecialchars($row['description']);
          $priceperitem = htmlspecialchars($row['priceperitem']);
          $quota = htmlspecialchars($row['quota']);
          $serial = htmlspecialchars($row['serial']);
          $image = htmlspecialchars($row['imgname']);
        }
        $defimage = "../../articles/".$image;
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
              <i class="nav-icon fas fa-cog"></i>
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
              <li class="breadcrumb-item"><a href="./">Articles</a></li>
              <li class="breadcrumb-item active">Edit Article</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card-body">
              <div class="row">
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                  <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">
                      <?php echo $article;?>
                    </h3>
                    <div class="col-12">
                      <img src="<?php echo $defimage;?>" class="product-image" alt="article image">
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                      <h3 class="my-3"><?php echo $article;?></h3>
                      <div class="form-group">
                          <label for="articlename" class="control-label">Article Name</label>
                          <div>
                            <input type="text" autocomplete="off" name="articlename" value="<?php echo $article;?>" class="form-control" required/>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                          <div>
                            <input type="text" autocomplete="off" name="articlename" value="<?php echo $description;?>" class="form-control" required/>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="brand" class="control-label">Brand</label>
                          <div>
                            <select name="brand" class="form-control">
                                <?php
                                  if (! $getdist) {
                                    die('Could not get distributors: '.mysqli_error($conn));
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
                        <label for="dist" class="control-label">Distributor</label>
                        <div>
                          <select name="dist" class="form-control">
                                <?php
                                  if (! $getdist) {
                                    die('Could not get distributors: '.mysqli_error($conn));
                                  }
                                  while($row2 = mysqli_fetch_assoc($getdist)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row2['iddistributors']);?>"><?php echo htmlspecialchars($row2['distname']);?></option>
                                  <?php }
                                ;?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="cat" class="control-label">Category</label>
                          <div>
                            <select name="cat" class="form-control">
                                <?php
                                  if (! $getdist) {
                                    die('Could not get distributors: '.mysqli_error($conn));
                                  }
                                  while($row3 = mysqli_fetch_assoc($getcat)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row3['idcategories']);?>"><?php echo htmlspecialchars($row3['categoryname']);?></option>
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
                                  while($row4 = mysqli_fetch_assoc($getunit)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row4['idunit']);?>"><?php echo htmlspecialchars($row4['unitname']);?> (<?php echo htmlspecialchars($row4['shortname']);?>)</option>
                                  <?php }
                                ;?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="priceperitem" class="control-label">Price Per Item</label>
                        <div>
                          <input type="text" autocomplete="off" name="priceperitem" value="<?php echo $priceperitem;?>" class="form-control" required/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="serial" class="control-label">Serial</label>
                        <div>
                          <input type="text" autocomplete="off" name="serial" value="<?php echo $serial;?>" class="form-control" required/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="quota" class="control-label">Minimum quota</label>
                        <div>
                          <input type="text" autocomplete="off" name="quota" value="<?php echo $quota;?>" class="form-control" required/>
                        </div>
                      </div>                      
                      <div class="form-group">
                            <label for="image" class="control-label">Change Image</label>
                            <div>
                                <input type="file" autocomplete="off" name="image" class="form-control"/>
                            </div>
                        </div>
                  </div>
                </form>
              </div>
            </div>
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
    $newarticle = $conn->real_escape_string($_POST['articlename']);
    $newbrand = $conn->real_escape_string($_POST['brand']);
		$newdist = $conn->real_escape_string($_POST['dist']);
		$newunit = $conn->real_escape_string($_POST['unit']);	
    $newpriceperitem = $conn->real_escape_string($_POST['priceperitem']);
    $newcategory = $conn->real_escape_string($_POST['category']);
    $newdesc = $conn->real_escape_string($_POST['articledesc']);
    $newquota = $conn->real_escape_string($_POST['quota']);
    $newserial = $conn->real_escape_string($_POST['serial']);
		
    $updatealtaddarticle = "UPDATE items SET itemname = '$newarticle', description = '$newdesc', idcategories = '$newcategory', priceperitem = '$newpriceperitem', iddistributors = '$newdist', idbrand = '$newbrand', quota = '$newquota', idunit = '$newunit', idserial = '$newserial' WHERE idserial = '$id'";
    $updatealtartiimg = "UPDATE images SET idserial = '$newserial' WHERE idserial = '$id'";

    if ($conn->query($updatealtaddarticle) && $conn->query($updatealtartiimg) === true) {
      $_SESSION['message'] = "$articlename has been updated to $newarticle.";
      header("location: ./index.php");
    }
    else {
      $_SESSION['message'] = "$articlename could not be update to $newarticle.";
    }
  mysqli_close($conn);
  }
  else {
    $newarticle = $conn->real_escape_string($_POST['articlename']);
    $newbrand = $conn->real_escape_string($_POST['brand']);
		$newdist = $conn->real_escape_string($_POST['dist']);
		$newunit = $conn->real_escape_string($_POST['unit']);	
    $newpriceperitem = $conn->real_escape_string($_POST['priceperitem']);
    $newcategory = $conn->real_escape_string($_POST['category']);
    $newdesc = $conn->real_escape_string($_POST['articledesc']);
    $newquota = $conn->real_escape_string($_POST['quota']);
    $newserial = $conn->real_escape_string($_POST['serial']);

    $newname = $_FILES['file']['name'];
  	$target_dir = "../../img/articles/";
  	$target_file = $target_dir . basename($_FILES["file"]["name"]);
		
    $updatearticle = "UPDATE items SET itemname = '$newarticle', description = '$newdesc', idcategories = '$newcategory', priceperitem = '$newpriceperitem', iddistributors = '$newdist', idbrand = '$newbrand', quota = '$newquota', idunit = '$newunit', idserial = '$newserial' WHERE idserial = '$id'";
    $updateartiimg = "UPDATE images SET imgname = '$newname', idserial = '$newserial' WHERE idserial = '$id'";

    // Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

      // Insert record
      $sql1 = mysqli_query($conn, $updateartiimg);
      $sql2 = mysqli_query($conn, $updateaddarticle);

      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

    }

  if ($sql1 && $sql2 === true) {
    $_SESSION['message'] = "$articlename has been updated to $newarticle.";
        header("location: ./index.php");
    }
    else {
        $_SESSION['message'] = "$articlename could not be updated to $newarticle.";
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