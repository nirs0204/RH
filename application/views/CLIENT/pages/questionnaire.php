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
                  <form action="<?php echo base_url("CTC_Reponse"); ?>" method="GET">
                        <?php for($i=0 ; $i<count($questions); $i++ ) { ?>
                             <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                      <p class="card-description"><?php echo $questions[$i]['question']; ?></p>
                                      <?php foreach ($reponse[$questions[$i]['question']] as $rps) : ?>
                                          <div class="form-check">
                                              <label class="form-check-label">
                                                  <input type="checkbox" name="reponse[]" value=" <?php echo $rps['idreponse']; ?>" class="form-check-input">
                                                  <?php echo $rps['reponse']; ?>
                                              </label>
                                          </div>
                                      <?php endforeach; ?>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>   
                            <div class="row">
                              <div class="col-md-10"></div>
                                <div class="col-md-2">  
                                    <div class="template-demo">
                                      <button type="submit" class="btn btn-primary">Valider</button>
                                    </div>
                                </div>
                              </div>
                          </div>               
                  </form>
                </div>
                 
              </div>
            </div>
           
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
       

</body>

</html>
