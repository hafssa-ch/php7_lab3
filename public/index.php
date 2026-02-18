<?php

spl_autoload_register(function ($class) {

    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/';

    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use App\Entity\Filiere;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use App\Service\PrinterService;

echo "=== DEMO LAB 3 ===" ."<br>" . "<br>";

$fInfo = new Filiere(1, "Informatique");

$e1 = new Etudiant(null, "samira", "samira@example.com", $fInfo);
$e2 = new Etudiant(null, "sami", "sami@example.com", $fInfo);

$ens1 = new Enseignant(null, "Dr Mohemed", "Mohamed@example.com", "Maitre de conferences");

$personnes = [$e1, $e2, $ens1];

$printer = new PrinterService();
$printer->printLabels($personnes);

echo  "<br>" . "=== EXPORT TABLEAU ===" . "<br>" ."<br>";
echo json_encode($e1->toArray(), JSON_PRETTY_PRINT) . "<br>";
echo json_encode($ens1->toArray(), JSON_PRETTY_PRINT) . "<br>";
