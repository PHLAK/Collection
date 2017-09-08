<?php

use PHLAK\Collection\Collection;

class MathableTest extends PHPUnit_Framework_TestCase
{
    public function test_it_can_sum_the_array_values()
    {
        $roundScores = Collection::make([1, 3, 3, 7]);

        $totalScore = $roundScores->sum();

        $this->assertEquals(14, $totalScore);
    }

    public function test_it_can_multiply_the_array_values()
    {
        $sandwichOptions = Collection::make([
            'breads' => 2,
            'meats' => 3,
            'cheeses' => 5
        ]);

        $combinations = $sandwichOptions->product();

        $this->assertEquals(30, $combinations);
    }
}
