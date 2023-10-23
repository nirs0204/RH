<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
 <?php  $this->load->view('ADMIN/pages/template/page-head'); ?>
  <body>
    <!-- ITY NO CORPS DU SITE -->
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
            Windmill
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="index.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Demande de conge</span>
              </a>
            </li>
          </ul>
          <ul>
       
      </aside>

      <!-- Mobile sidebar -->
    <?php  $this->load->view('ADMIN/pages/template/menu-head'); ?>

    <!-- bar de menu-->
           
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

            <?php if(isset($error)){ ?>
                    <div class="alert alert-danger alert-dismissible fade show" id="notif" role="alert" style="background-color: rgba(255, 0, 0, 0.5); color: white; border-radius: 5px; height: 40px; padding-top: 10px;">
                        <strong style="padding-left: 20px; margin-top: 10px;">Error!</strong> <?php echo $error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                <?php } ?>
                <br>
            <form action="<?php echo site_url('CTA_Conge/leave_request_submit') ?>" method="post">

                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Type
                </span>
                    <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="type"
                    >
                        <option value="maternite">Maternite</option>
                        <option value="paternite">Paternite</option>
                        <option value="normal">Normal</option>
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
