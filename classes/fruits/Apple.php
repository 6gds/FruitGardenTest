<?php

declare(strict_types=1);

namespace classes\fruits;

/**
 * Класс представляющий собой яблоко.
 *
 * @property integer $weight
 * @property integer $minWeight
 * @property integer $maxWeight
 */
class Apple extends Fruit
{
    protected int $weight;
    protected static int $minWeight = 150;
    protected static int $maxWeight = 180;

    /**
     * Конструетор
     */
    public function __construct()
    {
        parent::__construct();
    }
}
