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
                  <h4 class="card-title">Hoverable Table</h4>
                  <p class="card-description">
                    Add class <code>.table-hover</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Candidat</th>
                          <th>Age(Ans)</th>
                          <th>Date entretien</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(isset($entretien)) { ?>
                    <?php  foreach ($entretien as $row) { ?>  
                        <tr>
                          <td><?php echo isset($row['candidat']) ? $row['candidat'] : ''; ?> </td>
                          <td><?php echo isset($row['age']) ? $row['age'] : ''; ?>  </td>
                          <td><?php echo isset($row['heure_entretien']) ? $row['heure_entretien'] : ''; ?> </td>
                        </tr>
                        <?php } ?>
                    <?php } ?>
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
  <!-- End custom js for this page-->
</body>

</html>
