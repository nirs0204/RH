<?php if(!isset($posts)) $posts=array(); ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
 
  <body>
    <!-- ITY NO CORPS DU SITE -->
           
    <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Demande de conge
            </h2>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="<?php echo site_url('CTA_Besoin/save_need') ?>" method="post">

                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Type
                </span>
                    <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="type"
                    >
                        <option value="">Maternite</option>
                        <option value="">Paternite</option>
                        <option value="">Normal</option>
                    </select>
                </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Nombre de jour
                </span>
                  <input
                          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                          type="number" min=0 placeholder="en jour"
                          name="nbjour"
                  />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Date debut de conge</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="date"
                  name="datedebut"
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
