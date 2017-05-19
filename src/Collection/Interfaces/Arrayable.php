<?php

namespace Collection\Interfaces;

interface Arrayable
{
    /**
     * Return all items in the collection as an array
     *
     * @return array
     */
    public function all();

    /**
     * Return all of the keys of the collection
     *
     * @return array An array of all the keys in the collection
     */
    public function keys();

    /**
     * Return all the values of the collection
     *
     * @return array The values of the collection
     */
    public function values();
}
