<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../resources/admin/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../resources/admin/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../resources/admin/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../resources/admin/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
   
    <div class="main-panel">
     
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-4">              
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">ADMIN Login</h4>
                    <p class="card-category">PLease Fill The Details</p>
                  </div>
                  <div class="card-body">
                    <form method="post" action="Login/verify">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email ID" required="required">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                          </div>
                        </div>
                      </div>                      
                      <button type="submit" class="btn btn-primary pull-right">Login</button>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>             
            </div>          
          </div>
        </div>
      </div>
      
    </div>
  </div>
 
  <!--   Core JS Files   -->
  <script src="../resources/admin/js/core/jquery.min.js"></script>
  <script src="../resources/admin/js/core/popper.min.js"></script>
  <script src="../resources/admin/js/core/bootstrap-material-design.min.js"></script>
  <script src="../resources/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
 
</body>

</html>