<?php

declare(strict_types=1);

namespace classes\fruits;

/**
 * Абстрактный класс для фруктов.
 *
 * @property integer $weight
 * @property integer $minWeight
 * @property integer $maxWeight
 */
abstract class Fruit
{
    protected int $weight;
    protected static int $minWeight;
    protected static int $maxWeight;

    /**
     * Конструктор, генерирует рандомный вес для фрукта
     */
    public function __construct()
    {
        $this->weight = rand(static::$minWeight, static::$maxWeight);
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getNameFruit(): string
    {
        $classname = get_class($this);

        if (preg_match('@\\\\([\w]+)$@', $classname, $matches)) {
            $classname = $matches[1];
        }

        return $classname;
    }
}
