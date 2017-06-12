<?php

use Collection\Collection;

class IteratorAggregateTest extends PHPUnit_Framework_TestCase
{
    public function test_it_is_foreachable()
    {
        $collection = Collection::make([true, true, true]);

        foreach ($collection as $item) {
            $this->assertTrue($item);
        }
    }
}
