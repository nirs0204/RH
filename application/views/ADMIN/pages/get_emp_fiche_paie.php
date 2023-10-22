<?php if(!isset($emp)) $emp=array(); ?>
<?php if(!isset($posts)) $posts=array(); ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

  <body>
  <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <!-- General elements -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Créer fiche de paie d'un employé
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <form action="<?php echo site_url('CTA_FicheDepaie/create_formulaire_fichedepaie') ?>" method="get">

                  <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Employé</span>
                      <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="idemploye">
                          
                      <?php foreach ($emp as $employe) { ?>
                              <option value="<?php echo $employe->idemploye; ?>"><?php echo $employe->nom; ?></option>
                          <?php } ?>
                          
                      </select>
                  </label>
                      <br>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Date d'insertion de la fiche de paie</span>
                        <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="date"
                        name="date"
                        />
                    </label>
                    <br>
                    <div>
                        <button
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            type="submit"
                        >
                        Valider
                        </button>
                    </div>
                </form>
            </div>
          </div>
        </main>
  </body>

</html>