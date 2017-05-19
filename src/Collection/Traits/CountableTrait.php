<?php

namespace Collection\Traits;

trait CountableTrait
{
    /**
     * Count elements of an object
     *
     * @return integer
     */
    public function count()
    {
        return count($this->items);
    }
}
