<?php
require_once('../vendor/autoload.php');
use App\Classes\Users;

$users= new Users();
$AllUsers =$users->getAll();
// var_dump($products);
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include_once '../includes/head.php' ?>
    <link
      href="../assets/css/dataTables.bootstrap4.css"
      rel="stylesheet"
    />
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

      <header class="topbar" data-navbarbg="skin5">
       <?php include_once '../includes/main_header.php' ?>
      </header>

      <aside class="left-sidebar" data-sidebarbg="skin5">
        <?php include_once "../includes/aside.php" ?>
      </aside>

      <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Users</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="./add.php">Add New</a></li>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- End Bread crumb -->

        <!-- Container fluid -->
        <div class="container-fluid">
          <!-- Start Page Content -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Room</th>
                          <th>Image</th>
                          <th>Ext.</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($AllUsers as $user) :?>
                        <tr>
                          <td><?= $user['name'] ?></td>
                          <td><?= $user['room'] ?></td>
                          <td><img src="./upload.user/<?= $user['image'];?>" width="50px" height="50px"></td>
                          <td><?= $user['ext'] ?></td>
                          <td>
                            <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-success">edit</a>
                            <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger" onclick="if(!confirm('Are you sure')){return false; }">delete</a>
                          </td>
                        </tr>
                        <?php endforeach?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Page Content -->

        </div>
        <!-- End Container fluid -->

        <!-- footer -->
        <footer class="footer text-center">
          <?php include_once '../includes/footer.php' ?>
        </footer>
        <!-- End footer -->
        
      </div>
      <!-- End Page wrapper -->
    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php include_once '../includes/scripts.php' ?>
    
    <!-- this page js -->
    <script src="../assets/js/datatables.min.js"></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
  </body>
</html>
