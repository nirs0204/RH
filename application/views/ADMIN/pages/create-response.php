<?php 
  if(!isset($services)) $services=array();
  $this->load->view('ADMIN/pages/template/page-head');
  $this->load->view('ADMIN/pages/template/menu-bar');
  $this->load->view('ADMIN/pages/template/menu-head');
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
 
  <body>
    
  <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Reponse
            </h2>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="<?php echo base_url('CTC_Reponse/store') ?>" method="post">

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Question</span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="idquestion">
                        <?php foreach ($questions as $question) { ?>
                            <option value="<?php echo $question->idquestion; ?>"><?php echo $question->question; ?></option>
                        <?php } ?>
                    </select>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Réponse</span>
                <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text" placeholder="mettez la réponse"
                        name="reponse"
                />
                </label>

                <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Vérification réponse</label>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="reponseVerif" id="membershipRadios2" value="true" required>
                                true
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="reponseVerif" id="membershipRadios1" value="false" required >
                                false
                              </label>
                            </div>
                          </div>
                    
                        </div>
                      </div>
                    </div>
                  <br>
                <div>
                    <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">Valider</button>
                </div>
                </form>
            </div>
          </div>
        </main>
  </body>
</html>
