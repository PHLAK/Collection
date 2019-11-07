<?php

use PHLAK\Collection\Collection;
use PHPUnit\Framework\TestCase;

class IteratorAggregateTest extends TestCase
{
    public function test_it_is_foreachable()
    {
        $collection = Collection::make([true, true, true]);

        foreach ($collection as $item) {
            $this->assertTrue($item);
        }
    }
}
