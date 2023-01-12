<?php

declare(strict_types=1);

namespace classes\trees;

use classes\fruits\Fruit;
use classes\fruits\Pear;

require_once __DIR__ . "/../fruits/Fruit.php";
require_once __DIR__ . "/../fruits/Pear.php";
require_once __DIR__ . "/Tree.php";

/**
 * Абстрактный класс для дерева".
 *
 * @property string $uniqCode
 * @property integer $minCountFruit
 * @property integer $maxCountFruit
 */
class PearTree extends Tree
{
    protected string $uniqCode;
    protected static int $minCountFruit = 0;
    protected static int $maxCountFruit = 20;

    public function __construct(string $uniqCode)
    {
        $this->uniqCode = __CLASS__."_".$uniqCode;
    }

    /**
     * Метод для получения урожая с дерева
     *
     * @return Fruit
     */
    public function getFruit() : Fruit
    {
        return new Pear();
    }
}
