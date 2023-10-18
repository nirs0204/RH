<?php if(!isset($news)) $news=array(); ?>
<?php if(!isset($entretien)) $entretien=array(); ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<!-- ... Le reste de votre code ... -->

  <body>


        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray- 700 dark:text-gray-200">
              Annonces
            </h2>

            <div class="container flex items-center justify-end h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
              <ul class="flex items-center flex-shrink-0 space-x-6">
                <!-- Theme toggler -->
                <!-- Notifications menu -->
                
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
      <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
        <span>Messages</span>
      </a>
    </li>
    <li class="flex">
      <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
        <span>Sales</span>
      </a>
    </li>
    <li class="flex">
      <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
        <span>Alerts</span>
      </a>
    </li>
  </ul>
</li>

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
                <!-- Profile menu -->
              </ul>
            </div>
            <div>
              <br>



         
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-5">
            <?php foreach ($news as $row) { ?>
              <a href="<?php echo site_url('CTA_Cv_list/cvlist/')?>?besoin=<?php echo $row->idbesoin; ?> &&pers=<?php echo $row->personnel; ?> ">
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                  Recherche: <?php echo $row->personnel; ?> employés
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  <?php echo $row->nomtache; ?>
                  </p>
                </div>
              </div>
              <!-- Card -->
                </a>
              <?php } ?>
            </div>

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Table d'entretien
            </h4>
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Candidats</th>
                      <th class="px-4 py-3">Status</th>
                      <th class="px-4 py-3">Status</th>
                      <th class="px-4 py-3">CV</th>
                      <th class="px-4 py-3">Questions</th>
                      <th class="px-4 py-3">Date d'entretien</th>
                      <th class="px-4 py-3"></th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php if(isset($entretien)) { ?>
                    <?php  foreach ($entretien as $row) { ?>  
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
                              alt="vide"
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold"> <?php echo isset($row['candidat']) ? $row['candidat'] : ''; ?> </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?php echo isset($row['age']) ? $row['age'] : ''; ?>   Ans
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <a
                          class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"
                          href="<?php echo site_url('CTA_Cv_list/refuser')?>?idclient=<?php echo isset($row['idclient']) ? $row['idclient'] : ''; ?>&&idbesoin=<?php echo isset($row['idbesoin']) ? $row['idbesoin'] : ''; ?>&&pers=<?php echo isset($row['personnel']) ? $row['personnel'] : ''; ?>"
                          >
                          Refuser
                        </a>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <a
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                          href="<?php echo site_url('CTA_Essai/')?>?idclient=<?php echo isset($row['idclient']) ? $row['idclient'] : ''; ?>&&idbesoin=<?php echo isset($row['idbesoin']) ? $row['idbesoin'] : ''; ?>"
                          >
                          Accepter
                    </a>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?php echo isset($row['total_cv_note']) ? $row['total_cv_note'] : ''; ?> 
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?php echo isset($row['noteclient']) ? $row['noteclient'] : ''; ?> 
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?php echo isset($row['heure_entretien']) ? $row['heure_entretien'] : ''; ?> 
                      </td>
                      <td >
                      <a href="index.html" class="btn btn-primary"  data-target="#exampleModal">
                       Détails
                    </a>
                      </td>
                    </tr>
                    <?php } ?>
                    <?php } ?>  
                      
                  </tbody>
                </table>
              </div>
              
            </div>

            <!-- Charts -->
            
            
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

  




  </body>
</html>
