<?php

use Collection\Collection;

class CountableTest extends PHPUnit_Framework_TestCase
{
    public function test_it_is_countable()
    {
        $collection = Collection::make(['foo', 'bar', 'baz']);

        $this->assertEquals(3, count($collection));
    }
}
