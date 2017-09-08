<?php

namespace PHLAK\Collection\Traits;

trait CountableTrait
{
    /**
     * Count elements of an object.
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }
}
