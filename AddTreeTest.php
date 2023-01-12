<?php

declare(strict_types=1);

use classes\garden\Garden;
use classes\trees\AppleTree;
use classes\trees\PearTree;

require_once __DIR__ . "/classes/trees/AppleTree.php";
require_once __DIR__ . "/classes/trees/PearTree.php";
require_once __DIR__ . "/classes/garden/Garden.php";

/**
 * Класс для тестирования функции добавления деревьев в сад.
 *
 * @property string $uniqCode
 * @property integer $minCountFruit
 * @property integer $maxCountFruit
 */
class AddTreeTest extends \PHPUnit\Framework\TestCase
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

        $this->assertEquals($countAppleTree, $garden->getCountTrees()['AppleTree']);
        $this->assertEquals($countPearTree, $garden->getCountTrees()['PearTree']);
    }

    public function providerPower ()
    {
        return array (
            array (2, 2),
            array (2, 3),
            array (5, 3)
        );
    }
}