<?php
declare(strict_types=1);

namespace Core;

use function trim;
use function htmlspecialchars;
use function array_key_exists;

class DataObject implements DataObjectInterface
{
    private array $data = [];

    /**
     * DataObject constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function addData(array $data): self
    {
        if ($this->data === []) {
            $this->setData($data);

            return $this;
        }

        foreach ($data as $key => $value) {
            $this->setData($key, $value);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setData($key, mixed $value = null): self
    {
        if ($key === (array)$key) {
            $this->data = $this->_prepareData($key);
        } else {
            $this->data[$key] = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getData(string $key = ''): mixed
    {
        if ('' === $key) {
            return $this->data;
        }

        return array_key_exists($key, $this->data) ? $this->data[$key] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function unsetData(string $key = ''): self
    {
        if ('' === $key) {
            $this->setData([]);
        } else if (array_key_exists($key, $this->data)) {
            unset($this->data[$key]);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(array $keys = []): array
    {
        if (empty($keys)) {
            return $this->data;
        }

        $result = [];
        foreach ($keys as $key) {
            $result[$key] = $this->data[$key] ?? null;
        }

        return $result;
    }

    /**
     * Converts data into valid format.
     *
     * @param  array $keys
     * @return array
     */
    private function _prepareData(array $keys): array
    {
        $result = [];
        foreach($keys as $index => $value) {
            $result[$index] = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
        }

        return $result;
    }
}
