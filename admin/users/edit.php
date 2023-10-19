<?php
require_once("../vendor/autoload.php");
use App\Classes\Users;

$user = new Users;

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id=0;
}


$user = $user->edit($id);
// var_dump($user);
// echo $id;
// die();









 if (isset($_POST['submit'])) {
  // $name = $_POST['username'];
  // $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirm_password'];
  // $RoomNo = $_POST['room'];
  // $Ext = $_POST['ext'];

  //prepare file
  $image = $_FILES['image'];
  $imageName = $image['name'];
  $imageTmpName = $image['tmp_name'];

  $imgExtension = ["jpg", "png", "jpeg", "gif", "psd"];
$imageNameExtenction = pathinfo($imageName, PATHINFO_EXTENSION);
  if (in_array(strtolower($imageNameExtenction), $imgExtension)) {
      $imageNameWithoutExtenction = pathinfo($imageName, PATHINFO_FILENAME);
      $imageNewName = "$imageNameWithoutExtenction-"  . uniqid() . ".$imageNameExtenction";
      move_uploaded_file($imageTmpName, "./upload.user/$imageNewName");
  } else {
      echo " your image must be end extension image  " . "<br>";
  }




  if($password  == $confirmpassword){
  $user = new Users;

  $user->name = $_POST['username'];
  $user->email = $_POST['email'];
  $user->password = $_POST['password'];
  $user->confirm_password = $_POST['confirm_password'];
  $user->room =  $_POST['room'];
  $user->ext = $_POST['ext'];
  $user->image = $imageNewName;
  $user->update($id);

}else{
  echo "confirm Password Not Correct" ;
  
}

}
 ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include_once '../includes/head.php' ?>
  </head>

  <body>
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
    <a href="./upload.user/"></a>
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
            <?php if(isset($inserResult)){ ?>
            <div class="alert alert-success">Added..</div>
            <?php } ?>

            <?php if(isset($errors) && !empty($errors)){ ?>
            <div class="alert alert-danger">
              <ul>
                <?php foreach($errors as $error){ ?>
                  <li><?php echo $error; ?></li>
                <?php } ?>
              </ul>
            </div>
            <?php } ?>

            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Add User</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="./index.php">All User</a>
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
                      <label
                        for="Name"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Name</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="Name" name="username" value="<?= $user['name'] ?>">
            
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="email"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Email</label
                      >
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
            
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="password"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Password</label
                      >
                      <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password">
            
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="confirm_password"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Confirm Password</label
                      >
                      <div class="col-sm-9">
                      <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="room"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Room.</label
                      >
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="room" name="room" value="<?= $user['room'] ?>">

                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="ext"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Ext.</label
                      >
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="ext" name="ext" value="<?= $user['ext'] ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="image"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Image</label
                      >
                      <div class="col-sm-9">
                      <input type="file" class="form-control" id="image" name="image">
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
