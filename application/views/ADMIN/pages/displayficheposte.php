<!DOCTYPE html>
<html lang="en">
    <body>
        <h1>Job Descriptions</h1>
        <ul>
            <?php foreach ($descriptionsPoste as $job) : ?>
                <li>
                    <h2>Job Title: <?php echo $job->mission; ?></h2>
                    <p>Responsibility: <?php echo $job->responsabilite; ?></p>
                    <p>Objective: <?php echo $job->objectif; ?></p>
                    <p>Required Competence: <?php echo $job->competence_requise; ?></p>
                    <p>Superior: <?php echo $job->superieur_hierarchique; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>