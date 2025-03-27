<?php
declare(strict_types=1);

namespace Core;

/**
 * Data container with array access implementation.
 */
interface DataObjectInterface
{
    /**
     * Add data to the object.
     *
     * @param array $data
     * @return      $this
     */
    public function addData(array $data): self;

    /**
     * Overwrite data in the object.
     *
     * @param  mixed $key
     * @param  mixed  $value
     * @return        $this
     */
    public function setData(mixed $key, mixed $value = null): self;

    /**
     * Object data getter.
     * If $key is not defined will return all the data as an array.
     * Otherwise, it will return value of the element specified by key.
     *
     * @param  string $key
     * @return mixed
     */
    public function getData(string $key = ''): mixed;

    /**
     * Unset data from the object.
     *
     * @param string $key
     * @return       $this
     */
    public function unsetData(string $key = ''): self;

    /**
     * Converts object data into array with keys.
     *
     * @param  array $keys
     * @return array
     */
    public function toArray(array $keys = []): array;
}
