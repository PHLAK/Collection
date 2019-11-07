<?php

use PHLAK\Collection\Collection;
use PHPUnit\Framework\TestCase;

class CountableTest extends TestCase
{
    public function test_it_is_countable()
    {
        $collection = Collection::make(['foo', 'bar', 'baz']);

        $this->assertEquals(3, count($collection));
    }
}
