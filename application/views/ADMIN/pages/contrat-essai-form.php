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
            Besoin personnel
        </h4>
        <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
            <form action="<?php echo site_url('') ?>" method="post">
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Nom
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="nom"
                        value=""
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
                        value=""
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
                        value=""
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
                        value=""
                    />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Situation familiale
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="smatri"
                        value=""
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
                        value=""
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
                        value=""
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
                        value=""
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
                        value=""
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
                        value=""
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
                  Tape le
                </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="date"
                        name="creationessai"
                        value=""
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
