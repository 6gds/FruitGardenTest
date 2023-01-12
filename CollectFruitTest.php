<?php

declare(strict_types=1);

use classes\garden\Garden;
use classes\trees\AppleTree;
use classes\trees\PearTree;

require_once __DIR__ . "/classes/trees/AppleTree.php";
require_once __DIR__ . "/classes/trees/PearTree.php";
require_once __DIR__ . "/classes/garden/Garden.php";

class CollectFruitTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider providerPower
     */
    public function testPower(int $countAppleTree, int $countPearTree)
    {
        $garden = new Garden();

        for ($i = 0; $i < $countAppleTree; $i++) {
            $garden->addTree(new AppleTree(uniqid()));
        }

        for ($i = 0; $i < $countPearTree; $i++) {
            $garden->addTree(new PearTree(uniqid()));
        }

        $garden->collectFruits();
        $countFruits = $garden->getCountFruits();

        $this->assertGreaterThanOrEqual(40 * $countAppleTree, $countFruits['Apple'] ?? 0);
        $this->assertLessThanOrEqual(50 * $countAppleTree, $countFruits['Apple'] ?? 0);

        $this->assertGreaterThanOrEqual(0 * $countPearTree, $countFruits['Pear'] ?? 0);
        $this->assertLessThanOrEqual(20 * $countPearTree, $countFruits['Pear'] ?? 0);
    }

    public function providerPower ()
    {
        return array (
            array (2, 2),
            array (2, 3),
            array (5, 3),
            array (4, 8),
            array (2, 1)
        );
    }
}