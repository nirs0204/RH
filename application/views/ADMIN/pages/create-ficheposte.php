<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
 
  <body>
  <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <!-- General elements -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Insertion Fiche Poste
            </h4>
            <div class="container px-6 mx-auto grid" >
                <a class="mb-4 text-lg font-semibold text-gray-600 dark:text-white-300" >Options</a>
                <li class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300" >
                  <ul><a href="<?php echo base_url('CTA_FichePoste/displayFichePostView'); ?>" >Détails fiche de poste</a></ul>
                </li>
            </div>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <form action="<?php echo base_url('CTA_FichePoste/store') ?>" method="post">

                  <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Service</span>
                      <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="idservice">
                          
                      <?php foreach ($service as $services) { ?>
                              <option value="<?php echo $services->idservice; ?>"><?php echo $services->nom; ?></option>
                          <?php } ?>
                          
                      </select>
                  </label>
                  <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Tache</span>
                      <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="idtache">
                          
                      <?php foreach ($tache as $taches) { ?>
                              <option value="<?php echo $taches->idtache; ?>"><?php echo $taches->nomtache; ?></option>
                          <?php } ?>
                          
                      </select>
                  </label>

                  <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Mission</span>
                          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" placeholder="" name="mission"/>
                  </label>
                  <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Responsabilite</span>
                          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" placeholder="" name="responsb"/>
                  </label>
                  <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Objectif</span>
                          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" placeholder="" name="objecti"/>
                  </label>
                  <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Competences requis</span>
                          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" placeholder="" name="cpreq"/>
                  </label>
                  <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Superieur Hierarchique</span>
                          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" placeholder="" name="suphi"/>
                  </label>
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
