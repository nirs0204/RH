
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
              Insertion comge employe
            </h2>
                    
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
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                 
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
                            <p class="font-semibold">Larry Hotman</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                             22 ans 
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                            genre1
                      </td>
                      <td class="px-4 py-3 text-xs">
                         Poste
                      </td>
            
                    </tr>

                  </tbody>
                </table>
              </div>
             
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
