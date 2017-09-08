<?php

namespace PHLAK\Collection\Traits;

trait ArrayableTrait
{
    /**
     * Return all items in the collection as an array.
     *
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * Return all of the keys of the collection.
     *
     * @return array An array of all the keys in the collection
     */
    public function keys()
    {
        return array_keys($this->items);
    }

    /**
     * Return all the values of the collection.
     *
     * @return array The values of the collection
     */
    public function values()
    {
        return array_values($this->items);
    }
}
