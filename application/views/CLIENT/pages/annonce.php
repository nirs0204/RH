<?php if(!isset($annonce)) $annonce=array(); ?>
<!DOCTYPE html>
<html lang="en">

<body>
  
    
      <!-- ITY NO CORPS DU SITE -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <h2>Annonces</h2>
              
              <div class="row">
              <?php  for($i=0; $i<count($annonce); $i++) { ?>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Offre d'emploi , Service : <?php echo $annonce[$i]->nomservice; ?></p>
                      <p class="fs-30 mb-2"><?php echo $annonce[$i]->nomtache; ?></p>
                      <p>Fin Annonce :<?php echo $annonce[$i]->datefin; ?></p>
                      <p><a type="button" class="btn btn-light" href="<?php echo site_url('CTC_Annonce/detail')?>?besoin=<?php echo $annonce[$i]->idbesoin; ?>">Details</a></p>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

</body>

</html>

