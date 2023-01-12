<?php

declare(strict_types=1);

namespace classes\fruits;

/**
 * Класс представляюший собой грушу.
 *
 * @property integer $weight
 * @property integer $minWeight
 * @property integer $maxWeight
 */
class Pear extends Fruit
{
    protected int $weight;
    protected static int $minWeight = 130;
    protected static int $maxWeight = 170;

    /**
     * Конструетор
     */
    public function __construct()
    {
        parent::__construct();
    }
}
