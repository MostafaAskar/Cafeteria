<?php
require_once '../vendor/autoload.php';


use App\Classes\Products;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // $product = $_POST['product'];
  // $price = $_POST['price'];
  // $category = $_POST['category'];
  //prepare file
  $image = $_FILES['image'];
  $imageName = $image['name'];
  $imageTmpName = $image['tmp_name'];
 

  $imgExtension = ["jpg", "png", "jpeg", "gif", "psd" , "webp"];
  $imageNameExtenction = pathinfo($imageName, PATHINFO_EXTENSION);
    if (in_array(strtolower($imageNameExtenction), $imgExtension)) {
        $imageNameWithoutExtenction = pathinfo($imageName, PATHINFO_FILENAME);
        // echo $imageNameWithoutExtenction;
        // die();
        $imageNewName = "$imageNameWithoutExtenction-"  . uniqid() . ".$imageNameExtenction";
        move_uploaded_file($imageTmpName, "./upload.product/$imageNewName");
    } else {
         echo " your image must be end extension image  " ;
    }

  $prod = new Products;

  $prod->product = $_POST['product'];
  $prod->price = $_POST['price'];
  $prod->category = $_POST['category'];
  $prod->image = $imageNewName;
  $prod->store();
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<!-- <a href="../products/upload.product/"></a> -->
<head>
  <?php include_once '../includes/head.php' ?>
</head>

<body>
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
      <?php include_once '../includes/main_header.php' ?>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
      <?php include_once '../includes/aside.php' ?>
    </aside>
    <!-- <a href="../../uploades/"></a> -->
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        <div class="row">
          <?php if (isset($inserResult)) { ?>
            <div class="alert alert-success">Added..</div>
          <?php } ?>

          <?php if (isset($errors) && !empty($errors)) { ?>
            <div class="alert alert-danger">
              <ul>
                <?php foreach ($errors as $error) { ?>
                  <li><?php echo $error; ?></li>
                <?php } ?>
              </ul>
            </div>
          <?php } ?>

          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add Products</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php">All Products</a>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <form class="form-horizontal" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="product" class="col-sm-3 text-end control-label col-form-label">product</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="product" placeholder="product Here" name="product" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="price" class="col-sm-3 text-end control-label col-form-label">price</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="price" placeholder="price Here" name="price" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="MGRSSN" class="col-sm-3 text-end control-label col-form-label">category</label>
                    <div class="col-sm-9">
                       <select class="form-select" name="category">
                        <option selected>Open this select category</option>
                        <option value="hot">Hot Drinks</option>
                        <option value="cold">cold drinks</option>
                        <option value="juice">Juice</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="exampleInputEmail1" class="col-sm-3 text-end control-label col-form-label">Product Picture</label>
                    <div class="col-sm-9">
                    <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" name="submit" class="btn btn-primary">
                        Add
                      </button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Page Content -->

      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer text-center">
        <?php include_once '../includes/footer.php' ?>
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <?php include_once '../includes/scripts.php' ?>
  <!-- This Page JS -->

</body>

</html>