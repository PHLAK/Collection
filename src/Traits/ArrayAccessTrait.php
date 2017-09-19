<?php

namespace PHLAK\Collection\Traits;

trait ArrayAccessTrait
{
    /**
     * Whether an offset exists.
     *
     * @param mixed $offset an offset to check for
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->items);
    }

    /**
     * Offset to retrieve.
     *
     * @param mixed $offset the offset to retrieve
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    /**
     * Assign a value to the specified offset.
     *
     * @param mixed $offset the offset to assign the value to
     * @param mixed $value  the value to set
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    /**
     * Unset an offset.
     *
     * @param mixed $offset the offset to unset
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }
}
