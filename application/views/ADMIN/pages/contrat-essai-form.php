<?php if(!isset($cv)) $cv=array(); ?>
<?php if(!isset($emp)) $emp=array(); ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<body>
<!-- ITY NO CORPS DU SITE -->
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <!-- General elements -->
        <h4
            class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
        >
            Contrat d'essai
        </h4>
        <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
            <form action="<?php echo site_url('CTA_Essai/trial_contract_submit') ?>" method="post">
            <input type="hidden" name="genre" value="<?php echo isset($cv[0]->sexe) ? $cv[0]->sexe : '';?>">
            <input type="hidden" name="tache" value="<?php echo isset($cv[0]->idtache) ? $cv[0]->idtache : '';?>">
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Nom
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="nom"
                        value="<?php echo isset($cv[0]->nom) ? $cv[0]->nom : '';?>"
                    />
                </label>

                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Prenom
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="prenom"
                        value="<?php echo isset($cv[0]->prenom) ? $cv[0]->prenom : '';?>"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Date de naissance
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="date"
                        name="dtn"
                        value="<?php echo isset($cv[0]->dtn) ? $cv[0]->dtn : '';?>"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Lieu de naissance
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="lieun"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Adresse
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="adresse"
                        value="<?php echo isset($cv[0]->adresse) ? $cv[0]->adresse : '';?>"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  CIN
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="cin"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Contact
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="contact"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Pere
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="pere"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Mere
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="mere"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Debut de l'essai
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="date"
                        name="debutessai"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Fin de l'essai
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="date"
                        name="finessai"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Duree
                </span>
                    <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="number"
                            name="duree"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Nombre d'enfant
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="number"
                        min=0
                        name="naissance"
                    />
                </label>
               <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                    Superieur
                    </span>
                    <select name="sup"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    >
                    <?php foreach ($emp as $val) { ?>
                            <option value="<?php echo $val->idemploye; ?>"><?php echo $val->nom; ?> <?php echo $val->prenom; ?> - <?php echo $val->nomtache; ?> </option>
                    <?php } ?>
                    </select>
               </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Eventualite
                </span>
                    <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text"
                            name="eventualite"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Salaire
                </span>
                    <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text"
                            name="salaire"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Tape le
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="date"
                        name="creationessai"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Lieu de travail
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="lieutravail"
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Affilé à CNaps
                </span>
                    <div class="mt-2">
                        <label
                                class="inline-flex items-center text-gray-600 dark:text-gray-400"
                        >
                            <input
                                    type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="cnaps"
                                    value="1"
                            />
                            <span class="ml-2">Oui</span>
                        </label>
                        <label
                                class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                        >
                            <input
                                    type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="cnaps"
                                    value="2"
                            />
                            <span class="ml-2">Non</span>
                        </label>
                    </div>
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
