<?php

namespace App\Service;

use App\Entity\Personne;

final class PrinterService
{
    /**
     * @param Personne[] $personnes
     */
    public function printLabels(array $personnes): void
    {
        foreach ($personnes as $p) {
            if (!$p instanceof Personne) {
                throw new \InvalidArgumentException("Le tableau doit contenir des Personne.");
            }

            echo $p->getLabel() . "<br>";
        }
    }
}
