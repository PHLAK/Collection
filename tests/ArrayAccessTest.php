<?php

use Collection\Collection;

class ArrayAccessTest extends PHPUnit_Framework_TestCase
{
    /** @var Collection Instance of Collection */
    protected $collection;

    public function setUp()
    {
        $this->collection = Collection::make(['foo', 'bar', 'baz']);
    }

    public function test_it_can_retrieve_a_value_by_index()
    {
        $this->assertEquals('bar', $this->collection[1]);
    }

    public function test_it_can_set_a_value_by_index()
    {
        $this->collection[1337] = 'qux';
        $this->assertEquals('qux', $this->collection[1337]);
    }

    public function test_it_can_be_appended()
    {
        $this->collection[] = 'qux';
        $this->assertEquals(['foo', 'bar', 'baz', 'qux'], $this->collection->all());
    }

    public function test_it_can_check_if_a_value_isset()
    {
        $this->assertTrue(isset($this->collection[0]));
        $this->assertFalse(isset($this->collection[5]));
    }
}
