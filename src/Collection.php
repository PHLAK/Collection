<?php

namespace PHLAK\Collection;

use ArrayAccess;
use Closure;
use Countable;
use IteratorAggregate;
use PHLAK\Collection\Interfaces\Arrayable;
use PHLAK\Collection\Traits\ArrayableTrait;
use PHLAK\Collection\Traits\ArrayAccessTrait;
use PHLAK\Collection\Traits\CountableTrait;
use PHLAK\Collection\Traits\IteratorAggregateTrait;
use PHLAK\Collection\Traits\MathableTrait;

class Collection implements Arrayable, ArrayAccess, Countable, IteratorAggregate
{
    use ArrayableTrait, ArrayAccessTrait, CountableTrait, IteratorAggregateTrait, MathableTrait;

    /** @var array Array of items in this Collection */
    protected $items;

    /**
     * Collection\Collection constructor; runs on object creation.
     *
     * @param array $items Array of items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Static make function; alias for __construct.
     *
     * @param array $items Array of items
     *
     * @return Collection
     */
    public static function make(array $items = [])
    {
        return new static($items);
    }

    /**
     * Iterate over each item in the collection and perform an action via a
     * callback function.
     *
     * @param Closure $callback Callback function to run against each element in
     *                          the collection
     *
     * @return Collection
     */
    public function each(Closure $callback)
    {
        // return array_walk($this->items, $callback);
        foreach ($this->items as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * Collapse a collection of arrays into a single, flat collection.
     *
     * @return Collection
     */
    public function collapse()
    {
        $flattenedArray = [];

        foreach ($this->items as $item) {
            if (is_array($item)) {
                $flattenedArray = array_merge($flattenedArray, $item);
            }
        }

        return new static($flattenedArray);
    }

    /**
     * Transform each item in the collection via a callback function.
     *
     * @param Closure $callback Callback function to run against each element in
     *                          the collection
     *
     * @return Collection
     */
    public function map(Closure $callback)
    {
        return new static(array_map($callback, $this->items));
    }

    /**
     * Transform each item in the colleciton via the callback function then
     * flatten it when done.
     *
     * @param Closure $callback Callback function to run against each element in
     *                          the collection
     *
     * @return Collection
     */
    public function flatmap(Closure $callback)
    {
        return $this->map($callback)->collapse();
    }

    /**
     * Filter the items in a collection returning only the items where the
     * callback function returns true.
     *
     * @param Closure $callback Callback function to run against each element in
     *                          the collection
     *
     * @return Collection
     */
    public function filter(Closure $callback)
    {
        return new static(array_filter($this->items, $callback, ARRAY_FILTER_USE_BOTH));
    }

    /**
     * Filter the items in a collection returning only the items where the
     * callback function returns `false` (opposite of the filter method).
     *
     * @param Closure $callback Callback function to run against each element in
     *                          the collection
     *
     * @return Collection
     */
    public function reject(Closure $callback)
    {
        return $this->filter(function ($value, $key) use ($callback) {
            return ! $callback($value, $key);
        });
    }

    /**
     * Iteratively reduce the collection to a single value using a callback
     * function.
     *
     * @param Closure $callback Callback function to run against each element in
     *                          the collection
     *
     * @return mixed A single value
     */
    public function reduce(Closure $callback, $initial = null)
    {
        return array_reduce($this->items, $callback, $initial);
    }

    /**
     * Rotate a multidimensional array, turning the rows into columns and the
     * columns into rows.
     *
     * @return Collection
     */
    public function transpose()
    {
        $items = array_map(function (...$items) {
            return $items;
        }, ...$this->values());

        return new static($items);
    }

    /**
     * Append one or more items to the end of the collection.
     *
     * @param mixed $items One or more items to append
     *
     * @return Collection
     */
    public function append(...$items)
    {
        array_push($this->items, ...$items);

        return $this;
    }

    /**
     * Prepend one or more items to the beginning of the collection.
     *
     * NOTE: Items are prepended in the order they are passed so they stay in
     * the same order
     *
     * @param mixed $items One or more items to prepend
     *
     * @return Collection
     */
    public function prepend(...$items)
    {
        array_unshift($this->items, ...$items);

        return $this;
    }

    /**
     * Pad the collection with a value to the specified length.
     *
     * @param int $length New length of the array
     * @param mixed $value Value used to pad the array
     *
     * @return Collection
     */
    public function pad($length, $value)
    {
        return new static(array_pad($this->items, $length, $value));
    }

    /**
     * Return the collection with items in reverse order.
     *
     * @return Collection
     */
    public function reverse()
    {
        return new static(array_reverse($this->items));
    }

    /**
     * Shuffles (randomizes) the order of the items in the collection.
     *
     * @return Collection
     */
    public function shuffle()
    {
        $items = $this->items;

        shuffle($items);

        return new static($items);
    }

    /**
     * Return a random item from the collection.
     *
     * @return mixed A random item
     */
    public function random()
    {
        $key = array_rand($this->items);

        return $this->items[$key];
    }
}
