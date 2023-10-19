<?php
require_once('../vendor/autoload.php');
session_start();
use App\Classes\Orders;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$ord = new Orders;
$allOrders = $ord->showMyOrder($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand " href="#home"><i class="fa-solid fa-mug-hot text-primary pe-2 "></i> Cafeteria</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0 me-5">
                    <li class="nav-item pe-1 ">
                            <a class="nav-link"  href="./myorder.php?id=<?= $_SESSION['user_id']?>"> My Order</a>
                    </li>
                    <li class="nav-item pe-1 ">
                            <a class="nav-link"  href="../../index.php"> Back</a>
                    </li>

                                                
                    </ul>

                </div>
            </div>
        </nav>
    </header>
   
        <section class="Hosto bg-body-secondary " id="home">


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
                        <th>Product</th>
                          <th>Order Date</th>
                          <th>Status</th>
                          <th>Amount</th>
                          <th>Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($allOrders as $order) : ?>
                        <tr>
                        <td><?= $order['name'] ?></td>
                          <td><?= $order['order_date'] ?></td>
                          <td><?= $order['status'] ?></td>
                          <td><?= $order['amount'] ?></td>
                          <td><?= $order['amount'] * $order['price'] ?></td>

                                                    
                          <td>
                            
                            <a href="delete.php?id=<?= $order['id'] ?>" class="btn btn-danger" onclick="if(!confirm('Are you sure')){return false; }">Cansel</a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Page Content -->

        </div>

<

            </div>
            </div>
        </section>

    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>


</body>

</html>