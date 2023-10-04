<!DOCTYPE html>
<html lang="en">

<body>
  
      <!-- ITO NI CORPS DU SITE -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CV</h4>
                  <form  action="<?= bu('CTC_Cv/insert') ?>" method="POST"  class="form-sample">
                    <p class="card-description">
                      Info personnel
                    </p>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nom </label>
                            <div class="col-sm-9">
                              <input name="nom" type="text" class="form-control" />
                            </div>
                          </div>
                       </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Prénom</label>
                          <div class="col-sm-9">
                            <input name="prenom" type="email" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Telephone</label>
                          <div class="col-sm-9">
                            <input name="tel" type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Adresse</label>
                          <div class="col-sm-9">
                            <input name="add" type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date de naissance</label>
                          <div class="col-sm-9">
                            <input type="date" name="dtn" class="form-control" placeholder="dd/mm/yyyy"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Experience</label>
                          <div class="col-sm-9">
                            <textarea name="exp" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Diplome</label>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="diplome" id="membershipRadios2" value="option2">
                                Doctorat
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="diplome" id="membershipRadios1" value="" checked>
                                Master
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="diplome" id="membershipRadios3" value="">
                                Licence
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3"></div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="diplome" id="membershipRadios4" value="option4">
                                BACC
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="diplome" id="membershipRadios5" value="option5">
                                BEPC
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="diplome" id="membershipRadios6" value="option6">
                                CEPE
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Langue</label>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="langue1" id="membershipRadios2" value="" checked>
                                Malagasy
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="langue2" id="membershipRadios1" value="">
                                Anglais
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="langue3" id="membershipRadios2" value="">
                                Francais
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sexe</label>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sexe" id="membershipRadios2" value="" checked>
                                Homme
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sexe" id="membershipRadios1" value="">
                                Femme
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sexe" id="membershipRadios2" value="">
                                LGBT
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Situation matrimoniale</label>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sm" id="membershipRadios2" value="">
                                Marie(e)
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sm" id="membershipRadios1" value="">
                                Divorce(e)
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sm" id="membershipRadios2" value="" checked>
                                Celibataire
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <button type="submit" class="btn btn-primary mr-2">Valider</button>
                    </div>
                  </form>
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
