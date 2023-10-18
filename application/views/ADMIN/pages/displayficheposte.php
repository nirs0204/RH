<!DOCTYPE html>
<html lang="en">
    
    <body>
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                <h1 class="card-title" >Fiches de poste</h1>
                <ul class="flex items-center flex-shrink-0 space-x-6" >
                    <?php foreach ($fichesP as $job) : ?>
                        <li class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300" >
                            <h2 class="block mt-4 text-sm" >Job Title: <?php echo $job->mission; ?></h2>
                            <p class="block mt-4 text-sm" >Responsibility: <?php echo $job->responsabilite; ?></p>
                            <p class="block mt-4 text-sm" >Objective: <?php echo $job->objectif; ?></p>
                            <p class="block mt-4 text-sm" >Required Competence: <?php echo $job->competence_requise; ?></p>
                            <p class="block mt-4 text-sm" >Superior: <?php echo $job->superieur_hierarchique; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </main>
    </body>
</html>