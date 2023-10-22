
<?php if(!isset($emp)) $emp=array(); ?>
<?php if(!isset($sup)) $sup=array(); ?>
<?php if(!isset($fiche)) $fiche=array(); ?>
<?php if(!isset($sub)) $sub=array(); ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

  <body>
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">

          <br>
          <div class="container flex items-center justify-end h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
              <ul class="flex items-center flex-shrink-0 space-x-6">
                <li class="relative ml-auto">
                          <button id="svgButton" onclick="toggleMenu()">
                            <svg
                              class="w-5 h-5 cursor-pointer"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                              aria-label="Notifications"
                            >
                              <path
                                d="M3 5h14a1 1 0 010 2H3a1 1 0 010-2zm0 6h14a1 1 0 010 2H3a1 1 0 010-2zm0 6h14a1 1 0 010 2H3a1 1 0 010-2z"
                              ></path>
                            </svg>
                          </button>

                      <ul id="menuList" class="hidden absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700">
                        <li class="flex">
                          <a href="<?php echo site_url("CTA_List_employe"); ?>" class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                            <span>Liste personnel</span>
                          </a>
                        </li>
                        <li class="flex">
                          <a  href="<?php echo site_url("CTA_Essai/getEssai"); ?>" class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                            <span>En période d'essai</span>
                          </a>
                        </li>
                        <li class="flex">
                          <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                            <span>Alerts</span>
                          </a>
                        </li>
                      </ul>
                </li>
              </ul>

                <script>
                  // JavaScript pour basculer l'affichage du menu
                  function toggleMenu() {
                    var menuList = document.getElementById("menuList");
                    if (menuList.style.display === "none" || menuList.style.display === "") {
                      menuList.style.display = "block";
                    } else {
                      menuList.style.display = "none";
                    }
                  }
                </script>
                
              </ul>
            </div>
            <div>

            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Fiche de Poste
            </h2>
            
         
            
                    
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                      <tr>
                          <th class="px-0 py-4">Nom et Prénom </th>
                          <td ><?php echo $emp->nom ; ?> <?php echo $emp->prenom ; ?></td>
                      </tr>
                      <tr>
                          <th class="px-0 py-4">Date de naissance </th>
                          <td ><?php echo $emp->dtn ; ?></td>
                      </tr>
                      <tr>
                          <th class="px-0 py-4">Genre // sexe</th>
                          <td > <?php $genre = $emp->genre;if($genre == 1){echo 'autre';}if($genre == 2){echo 'femme';}if($genre == 3){echo 'homme';}?></td>
                      </tr>
                      <tr>
                          <th class="px-0 py-4">Numéro CIN</th>
                          <td ><?php echo $emp->cin ; ?></td>
                      </tr>
                      <?php foreach ($fiche as $f) : ?>
                      <tr>
                          <th class="px-0 py-4">Missions </th>
                          <td ><?php echo $f->mission; ?></td>
                      </tr>
                      <tr>
                          <th class="px-0 py-4">Responsablités </th>
                          <td ><?php echo $f->responsabilite; ?></td>
                      </tr>
                      <tr>
                          <th class="px-0 py-4">Objectifs</th>
                          <td ><?php echo $f->objectif; ?></td>
                      </tr>
                      <tr>
                          <th class="px-0 py-4">Compétences requises</th>
                          <td ><?php echo $f->competence_requise; ?></td>
                      </tr>
                      <tr>
                          <th class="px-0 py-4">Ses supérieurs :</th>
                          <td >
                          <?php for($i =1;$i<count($sup);$i++) { ?>
                                <p><?php echo $sup[$i]->nom; ?> <?php echo $sup[$i]->prenom_manager; ?>  - <?php echo $sup[$i]->nomtache; ?></p>
                            <?php } ?>
                          </td>
                      </tr>
                      <tr>
                          <th class="px-0 py-4">Ses subordonnées</th>
                          <td >
                            <?php for($i =0;$i<count($sub);$i++) { ?>
                                <p><?php echo $sub[$i]->nom; ?> <?php echo $sub[$i]->prenom; ?>  - <?php echo $sub[$i]->nomtache; ?></p>
                            <?php } ?>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
             
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
