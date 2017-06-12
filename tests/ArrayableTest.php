<?php

use Collection\Collection;

class ArrayableTest extends PHPUnit_Framework_TestCase
{
    /** @var Collection Instance of Collection */
    protected $collection;

    public function setUp()
    {
        $this->collection = Collection::make([
            'foo' => 'FOO',
            'bar' => 'BAR',
            'baz' => 'BAZ'
        ]);
    }

    public function test_it_can_return_all_item_as_an_array()
    {
        $this->assertEquals([
            'foo' => 'FOO',
            'bar' => 'BAR',
            'baz' => 'BAZ'
        ], $this->collection->all());
    }

    public function test_it_can_return_the_keys_as_an_array()
    {
        $this->assertEquals(['foo', 'bar', 'baz'], $this->collection->keys());
    }

    public function test_it_can_return_the_values_as_an_array()
    {
        $this->assertEquals(['FOO', 'BAR', 'BAZ'], $this->collection->values());
    }
}
