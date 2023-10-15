<?php 
  if(!isset($services)) $services=array();
  $this->load->view('ADMIN/pages/template/page-head');

  $this->load->view('ADMIN/pages/template/menu-bar');

  $this->load->view('ADMIN/pages/template/menu-head');
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
 
  <body>
  <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <!-- General elements -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Questionnaire
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="<?php echo base_url('CTC_Question/store') ?>" method="post">

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Service</span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="idservice">
                        
                    <?php foreach ($services as $service) { ?>
                            <option value="<?php echo $service->idservice; ?>"><?php echo $service->nom; ?></option>
                        <?php } ?>
                        
                    </select>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Question</span>
                <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text" placeholder="posez une question"
                        name="question"
                />
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Coefficient</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="number" placeholder="" name="coef"/>
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
