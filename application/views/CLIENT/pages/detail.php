<?php if(!isset($detail)) $detail=array(); ?>
<!DOCTYPE html>
<html lang="en">


<body>
  
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Detail Poste : <?php echo $detail['nomtache']; ?></h4>
                  <p class="card-description">
                    Les pré-requis pour ce poste <code>.<?php echo $detail['nom']; ?></code>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                      <tr>
                          <th>Personnel à embauché </th>
                          <td><?php echo $detail['personnel']; ?> personnes</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th>Diplome requis </th>
                          <td><?php echo $detail['diplome']; ?> (en dessus)</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th>Experience professionnel </th>
                          <td><?php echo $detail['experience']; ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th>Nationalite </th>
                          <td><?php echo $detail['nationalite']; ?></th>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th>Genre (si possible)</th>
                          <td><?php echo $detail['sexe']; ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th>Situation matrimoniale (si possible)</th>
                          <td><?php echo $detail['smatri']; ?>(e)</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th>Date fin Annonce </th>
                          <td><?php echo $detail['datefin']; ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div class="row">
                <div class="col-md-10"></div>
                  <div class="col-md-2">  
                     <a type="button" class="btn btn-info" href="<?= bu('CTC_Client')?>?besoin=<?php echo $detail['idbesoin']; ?>" >Postuler</a>
                  </div>
                </div>
              </div>
            </div>
           
           
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</body>

</html>
