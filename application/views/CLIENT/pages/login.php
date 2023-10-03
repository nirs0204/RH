<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href=<?php echo base_url("assets_CLIENT/vendors/feather/feather.css"); ?>>
  <link rel="stylesheet" href=<?php echo base_url("assets_CLIENT/vendors/ti-icons/css/themify-icons.css"); ?>>
  <link rel="stylesheet" href=<?php echo base_url("assets_CLIENT/vendors/css/vendor.bundle.base.css"); ?>>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href=<?php echo base_url("assets_CLIENT/css/vertical-layout-light/style.css"); ?>>
  <!-- endinject -->
  <link rel="shortcut icon" href=<?php echo base_url("assets_CLIENT/images/favicon.png"); ?> />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src=<?php echo base_url("assets_CLIENT/images/logo.svg"); ?> alt="logo">
              </div>
              <h4>Bonjour! Commençons</h4>
              <h6 class="font-weight-light">Connectez-vous pour continuer.</h6>

              
              <?php if(isset($error)){ ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?php echo $error ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              <?php } ?>

              <?php if(isset($success)){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <?php echo $success ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <?php } ?>

 
              <form action="<?php echo bu('CTC_Client/login')?>"  method="POST" class="pt-3">
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" name="mdp" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mot de passe">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Se connecter</button>
                  </form>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                   Gardez-moi connecté
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black"></a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>utiliser faceook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                Vous n'avez pas de compte ? <a href="<?php echo site_url('CTC_Client/register')?>" class="text-primary">S'inscrire</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src=<?php echo base_url("assets_CLIENT/vendors/js/vendor.bundle.base.js"); ?>></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src=<?php echo base_url("assets_CLIENT/js/off-canvas.js"); ?>></script>
  <script src=<?php echo base_url("assets_CLIENT/js/hoverable-collapse.js"); ?>></script>
  <script src=<?php echo base_url("assets_CLIENT/js/template.js"); ?>></script>
  <script src=<?php echo base_url("assets_CLIENT/js/settings.js"); ?>></script>
  <script src=<?php echo base_url("assets_CLIENT/js/todolist.js"); ?>></script>
  <!-- endinject -->
</body>

</html>
