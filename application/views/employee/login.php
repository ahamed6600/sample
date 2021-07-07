<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#10aff4">
  <title>Login</title>
  <link href="<?= base_url() ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/css/style.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url() ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  
  <style>
      @media only screen and (min-width: 992px) {
          .cmplogo {
            display: none;
          }
        }
        
        @media only screen and (max-width: 991px) {
          .cmplogo {
            width: 70%;
            margin: -50px auto 25px auto;
            display: block;
          }
        }
  </style>
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0  my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-3 d-none d-lg-block"></div>
              <div class="col-lg-6">
                <div class="p-55">
                  <img class="cmplogo" src="<?= base_url() ?>uploads/logo/"> 
                  <!--<h1 class="company-logo" style="text-align: center;color:#fff;font-weight: 900!important;padding-bottom: 50px;">E Dukaan</h1>-->
                  <div class="text-center">
                    <!-- <h1 class="h4 text-gray-900 mb-4">LOGIN</h1> -->
                  </div>
                  <form class="user" method="post" action="<?= base_url()?>logging_in">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <center>
                      <input type="submit" value="Login" class="btn btn-primary login-btn">
                    </center>
                      
                    
                  </form>
                  
                  
                </div>
              </div>
              <div class="col-lg-3 d-none d-lg-block"></div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>
</body>
</html>
