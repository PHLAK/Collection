<?php

use Collection\Collection;
use Collection\Interfaces\Arrayable;

class CollectionTest extends PHPUnit_Framework_TestCase
{
    /** @var Collection Instance of Collection */
    protected $collection;

    public function setUp()
    {
        $this->collection = Collection::make(['foo', 'bar', 'baz']);
    }

    // TODO: test_it_is_flattenable
    // TODO: test_it_is_flatmapable

    public function test_it_can_be_initialize_via_the_constructor()
    {
        $this->assertInstanceOf(Collection::class, new Collection(['foo', 'bar', 'baz']));
    }

    public function test_it_can_be_initialize_via_the_make_method()
    {
        $this->assertInstanceOf(Collection::class, Collection::make(['foo', 'bar', 'baz']));
    }

    public function test_it_implements_the_necessary_interfaces()
    {
        $this->assertInstanceOf(Arrayable::class, $this->collection);
        $this->assertInstanceOf(ArrayAccess::class, $this->collection);
        $this->assertInstanceOf(Countable::class, $this->collection);
        $this->assertInstanceOf(IteratorAggregate::class, $this->collection);
    }

    public function test_it_can_retreive_items_using_array_notation()
    {
        $this->assertEquals('foo', $this->collection[0]);
        $this->assertEquals('bar', $this->collection[1]);
        $this->assertEquals('baz', $this->collection[2]);
    }

    public function test_it_is_eachable()
    {
        $this->collection->each(function ($item) {
            $this->assertNotEmpty($item);
        });
    }

    public function test_it_is_mappable()
    {
        $prices = Collection::make([42, 350, 1337]);

        $formattedPrices = $prices->map(function ($price) {
            return '$' . number_format($price / 100, 2);
        });

        $this->assertEquals(Collection::make([
            '$0.42', '$3.50', '$13.37'
        ]), $formattedPrices);
    }

    public function test_it_is_filterable()
    {
        $menu = Collection::make([
            'burger' => ['price' => 450],
            'fries' => ['price' => 99],
            'soda' => ['price' => 150],
            'cookie' => ['price' => 75]
        ]);

        $dollarMenu = $menu->filter(function ($item) {
            return $item['price'] <= 100;
        });

        $this->assertEquals([
            'fries' => ['price' => 99],
            'cookie' => ['price' => 75]
        ], $dollarMenu->all());
    }

    public function test_it_is_rejectable()
    {
        $products = Collection::make([
            'desk' => ['quantity' => 2],
            'chair' => ['quantity' => 4],
            'table' => ['quantity' => 0],
            'sofa' => ['quantity' => 0]
        ]);

        $inStockProducts = $products->reject(function ($item) {
            return $item['quantity'] == 0;
        });

        $this->assertEquals([
            'desk' => ['quantity' => 2],
            'chair' => ['quantity' => 4]
        ], $inStockProducts->all());
    }

    public function test_it_is_reducible()
    {
        $roundScores = Collection::make([25, 42, 69, 535, 666]);

        $totalScore = $roundScores->reduce(function ($carry, $score) {
            $carry += $score;

            return $carry;
        });

        $this->assertEquals(1337, $totalScore);
    }

    public function test_it_is_transposable()
    {
        $collection = Collection::make([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
        ]);

        $this->assertEquals(Collection::make([
            [1, 4, 7],
            [2, 5, 8],
            [3, 6, 9]
        ]), $collection->transpose());
    }

    public function test_it_is_appendable()
    {
        $collection = Collection::make([1]);

        $this->assertEquals([1, 3], $collection->append(3)->all());
        $this->assertEquals([1, 3, 3, 7], $collection->append(3, 7)->all());
    }

    public function test_it_is_prependable()
    {
        $collection = Collection::make([7]);

        $this->assertEquals([3, 7], $collection->prepend(3)->all());
        $this->assertEquals([1, 3, 3, 7], $collection->prepend(1, 3)->all());
    }

    public function test_it_is_shuffleable()
    {
        $shuffled = $this->collection->shuffle();

        while ($this->collection == $shuffled) {
            $shuffled = $this->collection->shuffle();
        }

        $this->assertNotEquals($this->collection, $shuffled);
    }

    public function test_it_can_be_randomized()
    {
        $randomItem = $this->collection->random();

        $this->assertContains($randomItem, $this->collection->all());
    }

    public function test_it_throws_an_exception_when_summing_non_integers()
    {
        var_dump($this->collection->sum());
    }
}
