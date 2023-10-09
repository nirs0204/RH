<?php if(!isset($poste)) $poste=array(); ?>
<?php if(!isset($apply)) $apply=array(); ?>
<?php if(!isset($complete)) $complete=array(); ?>
<?php if(!isset($client)) $client=array(); ?>
<!DOCTYPE html>
<html lang="en">

<body>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Procedure de Canditature au poste</h4>
                  <p class="card-description">
                    Etape pour postuler <code>.<?php echo $poste['nomtache']; ?></code>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th>1-</th>
                          <td></td>
                          <td>Check de Connexion Ok</td>
                          <td></td>
                          <td><a class="badge badge-<?php echo $client['s'] ?>" href="<?php echo $client['p']; ?>" >Completed</a></td>
                        </tr>
                        <tr>
                          <th>2-</th>
                            <td></td>
                          <td>Séléction de cv : Remplir le cv électronique</td>
                            <td></td>
                            <td><a class="badge badge-<?php echo $apply['s'] ?>"  href="<?php echo base_url($apply['p']); ?>">Completed</a></td>
                        </tr>
                        <tr>
                          <th>3-</th>
                            <td></td>
                          <td>Questionnaire de recrutement : Remplir le questionnaire</td>
                            <td></td>
                            <td><a class="badge badge-<?php echo $complete['s'] ?>"  href="<?php echo base_url($complete['p']); ?>">In progress</a></td>
                        </tr>
                        <tr>
                          <th>4-</th>
                            <td></td>
                          <td>Entretien en cas de succes aux 2 dernieres cités ci-dessus</td>
                            <td></td>
                            <td><a class="badge badge-warning" href="#">In progress</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
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
  <!-- container-scroller -->
  
</body>

</html>
