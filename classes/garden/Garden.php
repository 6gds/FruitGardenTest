<?php

declare(strict_types = 1);

namespace classes\garden;

use classes\trees\Tree;

class Garden
{
    public array $trees= [];
    public array $collectedFruits = [];

    /**
     * Метод для добавления дерева в сад
     *
     * @param Tree $tree
     * @return void
     */
    public function addTree(Tree $tree): void
    {
        $this->trees[] = $tree;
    }

    /**
     * Метод подсчитывает количество деревьев каждого типа
     *
     * @return array
     */
    public function getCountTrees(): array
    {
        $countTrees= [];

        foreach ($this->trees as $tree) {
            if (!isset($countTrees[$tree->getNameTree()])) {
                $countTrees[$tree->getNameTree()] = 1;
            } else {
                $countTrees[$tree->getNameTree()] += 1;
            }
        }

        return $countTrees;
    }

    /**
     * Подсчитывает количество фруктов каждого типа
     *
     * @return array
     */
    public function getCountFruits(): array
    {
        $countedFruits = [];

        foreach ($this->collectedFruits as $nameFruits => $fruits) {
            $countedFruits[$nameFruits] = sizeof($this->collectedFruits[$nameFruits]);
        }

        return $countedFruits;
    }

    public function getWeightFruits(): array
    {
        $weightFruits = [];

        foreach ($this->collectedFruits as $nameFruit => $fruits) {
            foreach ($fruits as $fruit) {
                if (!array_key_exists($nameFruit, $weightFruits)) {
                    $weightFruits[$nameFruit] = $fruit->getWeight();
                } else {
                    $weightFruits[$nameFruit] += $fruit->getWeight();
                }
            }
        }

        return $weightFruits;
    }

    public function getCollectedFruits(): array
    {
        return $this->collectedFruits;
    }

    public function collectFruits(): void
    {
        foreach ($this->trees as $tree) {
            $fruits = $tree->getFruits();

            if (!empty($fruits[0])) {
                $nameFruit = $fruits[0]->getNameFruit();

                $this->collectedFruits[$nameFruit] = array_merge(
                    $this->collectedFruits[$nameFruit] ?? [],
                    $fruits
                );
            }
        }
    }

    public function outInfoAboutTrees(): void
    {
        $countTrees = $this->getCountTrees();

        foreach ($countTrees as $nameTree => $countTree) {
            echo $nameTree . " - " . $countTree;
            echo "<br/>";
        }
    }

    public function outInfoAboutCountFruits(): void
    {
        $collectedFruits = $this->getCountFruits();

        foreach ($collectedFruits as $nameFruit => $countFruit) {
            echo $nameFruit . " - " . $countFruit . " шт";
            echo "<br/>";
        }
    }

    public function outInfoAboutWeightFruits(): void
    {
        $weightFruits = $this->getWeightFruits();

        foreach ($weightFruits as $nameFruit => $weight) {
            echo $nameFruit . " - " . $weight . " гр";
            echo "<br/>";
        }
    }
}
