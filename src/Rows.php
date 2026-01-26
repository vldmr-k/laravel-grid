<?php

namespace Boduch\Grid;

class Rows implements \IteratorAggregate, \Countable, \ArrayAccess
{
    /**
     * @var Row[]
     */
    protected $rows = [];

    /**
     * @param array $rows
     */
    public function __construct(array $rows = [])
    {
        $this->rows = $rows;
    }

    /**
     * @see IteratorAggregate::getIterator()
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->rows);
    }

    /**
     * Add row
     *
     * @param Row $row
     * @return Rows
     */
    public function addRow(Row $row)
    {
        $this->rows[] = $row;

        return $this;
    }

    /**
     * @see Countable::count()
     */
    public function count(): int
    {
        return count($this->rows);
    }

    /**
     * Returns the iterator as an array
     *
     * @return array
     */
    public function toArray()
    {
        return iterator_to_array($this->getIterator(), true);
    }

    /**
     * @param int $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->rows[$offset]);
    }

    /**
     * @param int $offset
     * @return Row|mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->rows[$offset] ?? null;
    }

    /**
     * @param int $offset
     * @param Row $value
     */
    public function offsetSet($offset, $value): void
    {
        throw new \InvalidArgumentException('offsetSet() currently not implemented.');
    }

    /**
     * @param int $offset
     */
    public function offsetUnset($offset): void
    {
        throw new \InvalidArgumentException('offsetUnset() currently not implemented.');
    }
}
