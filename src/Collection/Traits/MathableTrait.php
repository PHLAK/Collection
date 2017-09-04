<?php

namespace Collection\Traits;

trait MathableTrait
{
    /**
     * Calculate the sum of the items in the collection.
     *
     * @return int|float Sum of items in the collection; 0 if collection is empty
     */
    public function sum()
    {
        return array_sum($this->items);
    }

    /**
     * Calculate the product of the itmes in th ecollection.
     *
     * @return int|float Product of items in the colllction; 0 if collection is empty
     */
    public function product()
    {
        return array_product($this->items);
    }
}
