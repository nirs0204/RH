<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href=<?= base_url("assets_CLIENT/vendors/feather/feather.css"); ?>>
  <link rel="stylesheet" href=<?= base_url("assets_CLIENT/vendors/ti-icons/css/themify-icons.css"); ?>>
  <link rel="stylesheet" href=<?= base_url("assets_CLIENT/vendors/css/vendor.bundle.base.css"); ?>>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href=<?= base_url("assets_CLIENT/css/vertical-layout-light/style.css"); ?>>
  <!-- endinject -->
  <link rel="shortcut icon" href=<?= base_url("assets_CLIENT/images/favicon.png"); ?> />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src=<?= base_url("assets_CLIENT/images/logo.svg"); ?> alt="logo">
              </div>
              <h4>Nouveau ici?</h4>
              <h6 class="font-weight-light">L'inscription est simple. Cela ne prend que quelques étapes</h6>
             
              <?php if(isset($error)){ ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $error ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php } ?>

             
             
              <form  action="<?= bu('CTC_Client/addClient')?>" method="POST" class="pt-3">
                <div class="form-group">
                  <input type="email" name="email"  class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" name="mdp" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mot de passe">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      J'accepte tous les termes et conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">S'inscrire</button>
                </div>
                </form>
                <div class="text-center mt-4 font-weight-light">
                Vous avez déjà un compte?<a href="<?= bu('CTC_Client/index')?>" class="text-primary">Se connecter</a>
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
  <script src=<?= base_url("assets_CLIENT/vendors/js/vendor.bundle.base.js"); ?>></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src=<?= base_url("assets_CLIENT/js/off-canvas.js"); ?>></script>
  <script src=<?= base_url("assets_CLIENT/js/hoverable-collapse.js"); ?>></script>
  <script src=<?= base_url("assets_CLIENT/js/template.js"); ?>></script>
  <script src=<?= base_url("assets_CLIENT/js/settings.js"); ?>></script>
  <script src=<?= base_url("assets_CLIENT/js/todolist.js"); ?>></script>
  <!-- endinject -->
</body>

</html>
