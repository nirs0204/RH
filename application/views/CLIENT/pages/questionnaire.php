<?php if(!isset($questions)) $questions=array();
 if(!isset($reponse)) $reponse=array();?>
<!DOCTYPE html>
<html lang="en">



<body>

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Questionnaire d'embauche</h4>
                  <form method="GET" action=<?php base_url('CTC_Question/verifyResponse') ?>>
                  <?php for($i=0 ; $i<count($questions); $i++ ) { ?>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <p class="card-description"><?php echo $questions[$i]['question']; ?></p>
                            <?php foreach ($reponse[$questions[$i]['question']] as $rps) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="reponsesquestion">
                                        <?php echo $rps['reponse']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                          </div>
                          </div>
                      </div>
                      <?php } ?>
                    </div>
                  </form>
                </div>
                 
              </div>
            </div>
           
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
       

</body>

</html>
