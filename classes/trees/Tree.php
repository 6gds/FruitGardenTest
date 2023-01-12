<?php

declare(strict_types=1);

namespace classes\trees;

use classes\fruits\Fruit;

require_once __DIR__ . '/../fruits/Fruit.php';

/**
 * Абстрактный класс для дерева.
 *
 * @property string $uniqCode
 * @property integer $minCountFruit
 * @property integer $maxCountFruit
 */
abstract class Tree
{
    protected string $uniqCode;
    protected static int $minCountFruit;
    protected static int $maxCountFruit;

    public function __construct(string $uniqCode)
    {
        $this->uniqCode = __CLASS__."_".$uniqCode;
    }

    /**
     * абстрактный метод для получения одного фрукта с дерева
     *
     * @return Fruit
     */
    abstract protected function getFruit() : Fruit;

    /**
     * Получает урожай с дерева
     *
     * @return array
     */
    public function getFruits(): array
    {
        $countFruits = rand(static::$minCountFruit, static::$maxCountFruit);
        $harvest = [];

        for ($i = 0; $i < $countFruits; $i++) {
            $harvest[] = static::getFruit();
        }

        return $harvest;
    }


    public function getNameTree(): string
    {
        $classname = get_class($this);

        if (preg_match('@\\\\([\w]+)$@', $classname, $matches)) {
            $classname = $matches[1];
        }

        return $classname;
    }
}
