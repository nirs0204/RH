
<?php if(!isset($emp)) $emp=array(); ?>
<?php if(!isset($posts)) $posts=array(); ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

  <body>
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Liste personnel
            </h2>
            
           
            <div class="col-md-1">
                <div class="p-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                   
                      <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                            Genre
                            </span>
                            <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            >
                            <option value="3">Homme</option>
                            <option value="2">Femme</option>
                            <option value="1">Autre</option>
                            </select>
                      </label>

                      <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                            Ordre Age
                            </span>
                            <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            >
                            <option value="asc">croissant</option>
                            <option value="desc">décroissant</option>
                            </select>
                      </label>

                      <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                            Poste
                            </span>
                            <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            >
                            <?php foreach ($posts as $poste) { ?>
                              <option value="<?php echo $poste->idtache; ?>" ><?php echo $poste->nomtache; ?></option>
                            <?php } ?>
                            </select>
                      </label>


                        <br>

                      <div>
                        <button
                          class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        >
                          Filtrer
                        </button>
                      </div>
                  
              </div>
            </div>
            
                    
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Nom & prénom</th>
                      <th class="px-4 py-3">Genre</th>
                      <th class="px-4 py-3">Poste Occupé</th>
                      <th class="px-4 py-3">Détails</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach ($emp as $val) { ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold"><?php echo $val->nom; ?> <?php echo $val->prenom; ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?php echo $val->age; ?> ans 
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?php $genre = $val->genre;
                        if($genre == 1){echo 'autre';}
                        if($genre == 2){echo 'femme';}
                        if($genre == 3){echo 'homme';}
                       ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                          <?php echo $val->nomtache; ?> 
                      </td>
                      <td class="px-4 py-3 text-sm">
                              <div>
                                  <button
                                    class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                  >
                                    Fiche de Poste
                                  </button>
                              </div>
                      </td>
                    </tr>

                  
                    <?php } ?>
                  </tbody>
                </table>
              </div>
             
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
