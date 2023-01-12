<?php

use classes\garden\Garden;
use classes\trees\AppleTree;
use classes\trees\PearTree;

require_once __DIR__ . "/classes/trees/AppleTree.php";
require_once __DIR__ . "/classes/trees/PearTree.php";
require_once __DIR__ . "/classes/garden/Garden.php";

function addTreesToGarden(Garden $garden, int $countAppleTree, int $countPearTree): void
{
    for ($i = 0; $i < $countAppleTree; $i++) {
        $garden->addTree(new AppleTree(uniqid()));
    }

    for ($i = 0; $i < $countPearTree; $i++) {
        $garden->addTree(new PearTree(uniqid()));
    }
}

$garden = new Garden();
addTreesToGarden($garden, 10, 15);

$garden->collectFruits();
$garden->outInfoAboutTrees();
$garden->outInfoAboutCountFruits();
$garden->outInfoAboutWeightFruits();