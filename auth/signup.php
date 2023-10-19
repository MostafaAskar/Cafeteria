<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/assets/images/favicon.png" />
    <!-- Custom CSS -->
    <link href="../admin/assets/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
       
        <div class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
        ">
            <div class="auth-box border-top border-secondary">
                <div id="loginform">
                    <div class="text-center pt-3 pb-3">
                        <h1>Cafeteria</h1>
                    </div>
                    <!-- Form -->
                    
                    <form class="form-horizontal" action="handlesignup.php" enctype="multipart/form-data" method="post">
                  <div class="card-body">
                  <div class="form-group row">
                      <label
                        for="Name"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Name</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="Name" name="username">
            
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="email"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Email</label
                      >
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email">
            
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
                      <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="room"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Room.</label
                      >
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="room" name="room">

                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="ext"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Ext.</label
                      >
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="ext" name="ext">
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
                        Sign Up
                      </button>
                    </div>
                  </div>
                </form>
                </div>
            </div>
        </div>
       
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../admin/assets/js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../admin/assets/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader").fadeOut();
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $("#to-recover").on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $("#to-login").click(function() {
            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>
</body>

</html>