<?php

namespace Collection\Traits;

trait IteratorAggregateTrait
{
    /**
     * Retrieve the items as an ArrayIterator.
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
}
