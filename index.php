<?php
session_start();
require_once('../CafeteriaProject/admin/vendor/autoload.php');

use App\Classes\Orders;
use App\Classes\Products;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$prod = new Products();
$products = $prod->getAll();
$product = $prod->show($id);

// $ord = new Orders;
// $allLastOrders = $ord->lastorder($id);
// var_dump($allLastOrders);
// die();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./admin/assets/css/bootstrap.min.css">
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
                        

                        <?php if(!isset($_SESSION['name'])) { ?>
                        <li class="nav-item pe-1 ">
                            <a class="nav-link" href="./auth/login.php"> Login</a>
                        </li>
                        <li class="nav-item pe-1">
                            <a class="nav-link" href="./auth/signup.php"> Sign up</a>
                        </li>
                        <?php }else{ ?>
                            <li class="nav-item  pe-1">
                            <a class="nav-link active" aria-current="page" href="./admin/orders/myorder.php?id=<?= $_SESSION['user_id']?>"> MyOrder</a>
                        </li>
                            <li class="nav-item pe-1">
                            <a class="nav-link" href="./auth/logout.php"> Logout</a>
                        </li>
                        <?php } ?>


                        
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <section>
        <?php if($id > 0) : ?>
            <?php if(isset($_SESSION['name'])) { ?>

            <div class="container p-5">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
    
                            <form class="form-horizontal" action="./admin/orders/add.php" enctype="multipart/form-data" method="post">

                                <div class="table-responsive">
                                    <table class="table activitites">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-uppercase header">item</th>
                                                <th scope="col" class="text-uppercase header">Product</th>
                                                <th scope="col" class="text-uppercase">Quantity</th>
                                                <th scope="col" class="text-uppercase">price each</th>
                                                <th scope="col" class="text-uppercase">notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <input type="hidden" name="productId" value="<?= $product['id']; ?>">
                                            <input type="hidden" name="userId" value="<?= $_SESSION['user_id']?>">

                                            <tr>
                                                <td class="item">
                                                    <img class="card-img-top" src="./admin/products/upload.product/<?= $product['image']; ?>"  width="50px" height="50px" alt="Card image cap">
                                                </td>
                                                <td><?= $product['name']; ?></td>
                                                <td> <input type="text" class="form-control" id="amount" name="amount"></td>
                                                <td id="price"><?= $product['price']?>
                                                </td>
                                                <td> <input type="text" class="form-control" id="amount" name="notes"></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
    
                          <div class="border-top"> 
                                <div class="card-body">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Order
                                    </button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Page Content -->
            <?php }else{ ?> 
               <?php  header("location: ./auth/login.php") ?>

            <?php }?> 
            <?php endif ;?>
            


        <section class="Hosto bg-body-secondary " id="home">
            <div class="container pt-3">
                <div class="row pb-5 pt-3 bg-body-secondary ">
                   
                    <?php foreach ($products as $product) : ?>


                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="./admin/products/upload.product/<?= $product['image']; ?>" alt="Card image cap">

                            <div class="card-body">
                                <h5 class="card-title"><?= $product['name'] ?></h5>

                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="fw-bold">Price : </span> <?= $product['price'] ?> L.E</li>
                                <li class="list-group-item"><span class="fw-bold">Category : </span> <?= $product['category'] ?></li>
                                <!-- <li class="list-group-item">Vestibulum at eros</li> -->
                            </ul>
                            <div class="card-body">
                                <a href="index.php?id=<?= $product['id'] ?>" class="btn btn-primary">Oreder</a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>


            </div>
            </div>
        </section>

    </section>
    <script src="./admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>


</body>

</html>