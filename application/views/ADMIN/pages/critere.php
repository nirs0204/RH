<?php if(!isset($posts)) $posts=array(); ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
 
  <body>
      <!-- ITY NO CORPS DU SITE --> 
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <!-- General elements -->
            <h4
              class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Critere
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="<?php echo site_url('CTA_Critere/save_criteria');?>" method="post">
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Besoin
                </span>
                    <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="besoin"
                    >
                        <?php foreach ($posts as $poste) { ?>
                            <option value="<?php echo $poste->idtache; ?>"><?php echo $poste->nomtache; ?></option>
                        <?php } ?>
                    </select>
                </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Diplome
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="diplome"
                >
                  <option value="Master">Master</option>
                  <option value="Licence">Licence</option>
                  <option value="Bacc">BACC</option>
                  <option value="Bepc">BEPC</option>
                    <option value="Cepe">CEPE</option>
                </select>
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Experience</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="experience"
                  type="text"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Langue num 1
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="langue1"
                >
                  <option value="Malagasy">Malagasy</option>
                  <option value="Aucun">Aucun</option>
                </select>
              </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Langue num 2
                </span>
                    <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="langue2"
                    >
                        <option value="Anglais">Anglais</option>
                        <option value="Aucun">Aucun</option>
                    </select>
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Langue num 3
                </span>
                    <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="langue3"
                    >
                        <option value="Francais">Francais</option>
                        <option value="Aucun">Aucun</option>
                    </select>
                </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Nationalite
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="nationalite"
                >
                  <option value="Malagasy">Malagasy</option>
                  <option value="Etranger">Etranger</option>
                </select>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Sexe
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="sexe"
                >
                  <option value="Homme">Homme</option>
                  <option value="Femme">Femme</option>
                  <option value="Autre">Autre</option>
                </select>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Situation matrimoniale
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="smatri"
                >
                  <option value="Marie">Marie(e)</option>
                  <option value="Divorce">Divorce(e)</option>
                  <option value="Celibataire">Celibataire</option>
                </select>
              </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Fin de l'annonce</span>
                    <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="date"
                            name="datefin"
                    />
                </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Debut entretien</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="date"
                  name="debutentretien"
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
      </div>
    </div>
  </body>
</html>
